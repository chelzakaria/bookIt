<?php
namespace App\Http\Controllers;
use App\Models\Note;
use CreateNotesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NoteController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    {
        // dd(auth()->user());
        $notes = Note::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        return view('notes.index',[
            'notes' => $notes
        ]);
    }

    public function search(Request $request)
    {

        $notes = Note::where('type','LIKE','%'.$request->input('word').'%')->get();
      
        return view('notes.index',[
            'notes' => $notes
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
            'idbook'=>$book->id
        ]);

       return redirect('notes');
    }

    public function update(Request $request, $id)
    {
        

       
        $note = Note::find($id);
               

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
      
        $note->delete();
         return redirect('notes');
    }

    public function edit($id)
    {
        $note = Note::find($id);
         

        return view('notes.edit')->with('note', $note);
    }

}
