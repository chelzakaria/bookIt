<?php

namespace App\Http\Controllers;
use App\Models\Note;
use CreateNotesTable;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return view('notes.index');
    }
    public function store(Request $request){
        $this->validate($request,[
            'body' => 'required'
        ]);

        $this->validate($request,[
            'type' => 'quote'
        ]);
        Note::create([
             
            'body' => $request->body,
            'type'=>$request->type
            

       ]);

     

      return back();
    }
}
