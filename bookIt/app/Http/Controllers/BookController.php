<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index',[
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title' => 'required',
            'author' => 'required',
            'rating' => 'required',
            'num_page' => 'required',
            'cover' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover'))
        {
            $fileNameWithExt = $request->file('cover')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path = $request->file('cover')->storeAs('public/cover_images', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }
 
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'rating' => $request->rating,
            'num_page' =>$request->num_page,
            'cover' => $fileNameToStore
       ]);

       return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
            $book = DB::table('books')->find($id);
            return view('books.show',[
                'book' => $book
            ]);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'rating' => 'required',
            'num_page' => 'required',
            'cover' => 'image|nullable|max:1999'
        ]);

        $book->body = $request->input('title');
        $book->type = $request->input('author');
        $book->type = $request->input('rating');
        $book->type = $request->input('num_page');
        $book->type = $request->input('cover');
        $book->save();
        return redirect('books');
    }


 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $book = Book::find($id);
      
        $book->delete();
         return redirect('books');
    }

}
