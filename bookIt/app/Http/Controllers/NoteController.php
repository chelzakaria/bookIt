<?php

namespace App\Http\Controllers;

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
            'created at' => 'required'
        ]);
        $this->validate($request,[
            'type' => 'required'
        ]);
    }
}
