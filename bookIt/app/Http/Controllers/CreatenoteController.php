<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Note;
class CreatenoteController extends Controller
{
    public function createnote()
    {
       
        $notes = Note::all();
        return view('createnote',['users' => $notes]);
    }
    public function create(Request $request) {
        $name = $request->input('note');
        
        DB::table('notes')->insert(
            ['body' => $name,'type' =>'quote']
        );
        
        return redirect()->route('notes');
     }
}
