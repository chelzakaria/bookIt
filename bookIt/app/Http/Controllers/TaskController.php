<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'task_name' => 'required',
            'status' => 'required',
            'importance' => 'required',
            'book' => 'required',
            'end_date' =>'required|date',
            'notification' => 'required'
        ]);
 
          
    //     $request->user()->books()->create([
    //         'title' => $request->title,
    //         'author' => $request->author,
    //         'rating' => $request->rating,
    //         'num_page' =>$request->num_page,
    //         'cover' => $fileNameToStore,
    //         'description' => $request->description
    //    ]);
    Task::create([
            'task_name' => $request->task_name,
            'status'=>$request->status,
            'task_description'=>$request->description,
            'end_date'=>$request->end_date,
            'book_id'=>27,
            'task_importance'=>$request->importance,
            'start_date'=>$request->end_date,


        ]);



       return redirect('tasks');
    }
}
