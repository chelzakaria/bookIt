<?php
namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\Book;
use App\Models\Notification;
use App\Models\Setting;
use App\Models\Task;
use CreateNotesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class NoteController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    {
        $notifications = Notification::where('user_id', Auth::user()->id)->get();  
        $Setting = Setting::where('user_id', Auth::user()->id)->first();  
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        $notes = Note::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        $books = Book::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        return view('notes.index',[
            'notes' => $notes,
            'books' =>$books,
            'setting' => $Setting,
            'notifications' => $notifications,
            'tasks' => $tasks,
            'selected' => "All"
        ]);
    }

    public function search(Request $request)
    {
        // dd($request->input('word'));
        $notifications = Notification::where('user_id', Auth::user()->id)->get();  
        $Setting = Setting::where('user_id', Auth::user()->id)->first();  
        if($request->input('word')!=="All")
       {
        $notes = Note::where('user_id', auth()->user()->id)->where('type','LIKE','%'.$request->input('word').'%')->orderBy('updated_at', 'desc')->get();
       }
       else {
        $notes = Note::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();

       }
        $books = Book::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        return view('notes.index',[
            'notes' => $notes,
            'books' =>$books,
            'notifications' => $notifications,
            'setting' => $Setting,
            'selected' => $request->input('word')

        ]);
     }
 

    public function store(Request $request){
       
        $this->validate($request,[
            'body' => 'required',
            'type' => 'required',
            'titlebook'=>'required'
        ]);
        $book = DB::table('books')->where('title',$request->titlebook )->first();

        // Note::create([
        //     'body' => $request->body,
        //     'type'=>$request->type,
        //     'idbook'=>$book->id
        // ]);
        $request->user()->notes()->create([
            'body' => $request->body,
            'type'=>$request->type,
            'book_id'=>$book->id
        ]);

       return redirect('notes');
    }
    public function show($id){
        $note = DB::table('notes')->find($id);
         if(auth()->user()->id !== $note->user_id)
        {
            return abort(403, 'Unauthorized action.');
        } 
        return view('notes.show',[
            'note' => $note
        ]);
    }

    public function update(Request $request, $id)
    {
        
        $note = Note::find($id);
        if(auth()->user()->id !== $note->user_id)
        {
            return abort(403, 'Unauthorized action.');
        } 

        $this->validate($request, [
            'body' => 'required',
            'type' => 'required'
        ]);

        

        $note = Note::find($id);  
        $note->body = $request->input('body');
        $note->type = $request->input('type');
        
    

        $note->save();

        return redirect('notes');
    }


    public function destroy($id)
    {
        $note = Note::find($id);
      if(auth()->user()->id !== $note->user_id)
        {
            return abort(403, 'Unauthorized action.');
        } 
        $note->delete();
         return redirect('notes');
    }

    public function edit($id)
    {
        $note = Note::find($id);
         
        if(auth()->user()->id !== $note->user_id)
        {
            return abort(403, 'Unauthorized action.');
        } 
        return view('notes.edit')->with('note', $note);
    }

}
