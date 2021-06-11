<?php
namespace App\Http\Controllers;
use App\Models\Note;
use CreateNotesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NoteController extends Controller
{
  /*  public function show()
    {
        $user = DB::table('users')->find(3);
        return view('notes.show',[
            'user' => $user
        ]);

    }*/
    public function index()
    {
        $notes = Note::all();

        return view('notes.index',[
            'notes' => $notes
        ]);
    }
 

    public function store(Request $request){
       
        $this->validate($request,[
            'body' => 'required',
            'type' => 'required'
        ]);
 
        Note::create([
            'body' => $request->body,
            'type'=>$request->type
       ]);

      return back();
    }

}
