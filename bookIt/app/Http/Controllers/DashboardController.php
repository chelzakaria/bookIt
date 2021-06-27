<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Note;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    {
        $notes = Note::where('user_id', Auth::user()->id)->get();  
        $tasks = Task::where('user_id', Auth::user()->id)->get();  
        $books = Book::where('user_id', Auth::user()->id)->get();  


        return view('dashboard', [
            'notes' => $notes,
            'tasks' => $tasks,
            'books' => $books
        ]);
    }
}
