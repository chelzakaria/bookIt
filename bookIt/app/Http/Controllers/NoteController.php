<?php

namespace App\Http\Controllers;
use App\Models\Note;
use CreateNotesTable;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();

        return view('notes.index',[
            'notes' => $notes
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'body' => 'required'
        ]);

       
        Note::create([
             
            'body' => $request->body,
            'type'=>$request->type
            

       ]);

     

      return back();
    }
}
