<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Note;
use App\Models\Task;
use App\Models\TaskHistory;
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
 
        $from = date('2021-06-01');
        $to = date('2021-07-01');


        $tasks_histories = TaskHistory::whereBetween('created_at', [$from, $to])->get();
        $tasks_count = 0;
        foreach($tasks as $task)
        {
             if($task_history = TaskHistory::where('task_id', $task->id)->where('new_status', 'done')->where('updated_at', '<=', $task->end_date)->orderBy('updated_at', 'desc')->first())
            {
                     $tasks_count++;
             }
             
        }


        return view('dashboard', [
            'notes' => $notes,
            'tasks' => $tasks,
            'books' => $books,
            'tasks_histories' => $tasks_histories,
            'tasks_count' => $tasks_count
            
        ]);
    }
}
