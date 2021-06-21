<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = Task::where('user_id', auth()->user()->id)->get();

        $tasks = Task::all();

        return view('tasks.index',[
            'tasks' => $tasks
        ]);
        
    }
}
