<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    
    public function index()
    {
        // $tasks = Task::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        //$tasks = Task::all();


         $tasks = Task::where('user_id', auth()->user()->id)->get();
         $count1 = Task::where('user_id', auth()->user()->id)->where('status','=','not started')->count();
         $count2 = Task::where('user_id', auth()->user()->id)->where('status','=','in progress')->count();
         $count3 = Task::where('user_id', auth()->user()->id)->where('status','=','done')->count();
        return view('tasks.index',[
            'tasks' => $tasks,
            'count1' =>$count1,
            'count2' =>$count2,
            'count3' =>$count3
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
            'notification' => 'required',
            'description' => 'required'
        ]);
 
        $book = DB::table('books')->where('title',$request->book)->first();
          
        $request->user()->tasks()->create([
            'task_name' => $request->task_name,
            'status'=>$request->status,
            'task_description'=>$request->description,
            'end_date'=>$request->end_date,
            'book_id'=>$book->id,
            'task_importance'=>$request->importance,
            'start_date'=>$request->end_date,
       ]);
    



       return redirect('tasks');
    }

    public function edit($id)
    {
        $task = Task::find($id);
         
        if(auth()->user()->id !== $task->user_id)
        {
            return abort(403, 'Unauthorized action.');
        } 
        return view('tasks.edit')->with('task', $task);
    }

    public function update(Request $request, $id)
    {
        
        $task = Task::find($id);
        if(auth()->user()->id !== $task->user_id)
        {
            return abort(403, 'Unauthorized action.');
        } 

        $this->validate($request, [
            'task_name' => 'required',
            'status' => 'required',
            'importance' => 'required',
            // 'book' => 'required',
            'end_date' =>'required|date',
            'description' => 'required'
            // 'notification' => 'required'
        ]);

        

        $task = Task::find($id);  
        $task->task_name = $request->input('task_name');
        $task->status = $request->input('status');
        $task->task_importance = $request->input('importance');
        $task->end_date = $request->input('end_date');
        $task->task_description = $request->input('description');



        
    

        $task->save();

        return redirect('tasks');
    }


    public function show($id){
        $task = DB::table('tasks')->find($id);
         if(auth()->user()->id !== $task->user_id)
        {
            return abort(403, 'Unauthorized action.');
        } 
        return view('tasks.show',[
            'note' => $task
        ]);
    }


    public function destroy($id)
    {
        $task = Task::find($id);
      if(auth()->user()->id !== $task->user_id)
        {
            return abort(403, 'Unauthorized action.');
        } 
        $task->delete();
         return redirect('tasks');
    }

    public function updatedrag($id)
    {
        $tab=explode(",",$id);
        for ($j=0; $j <sizeof($tab) ; $j++) 
        { 
            $x=str_replace("cd","",$tab[$j]);
            $task = Task::find($x);
            if(auth()->user()->id !== $task->user_id)
            {
                return abort(403, 'Unauthorized action.');
            }
            if($task->status!="not started")
            {
                $task->status="not started";
                $task->save();
            }
        }
    }

    public function updatedrag2($id)
    {
        $tab=explode(",",$id);
        for ($j=0; $j <sizeof($tab) ; $j++) 
        { 
            $x=str_replace("cd","",$tab[$j]);
            $task = Task::find($x);
            if(auth()->user()->id !== $task->user_id)
            {
                return abort(403, 'Unauthorized action.');
            }
            if($task->status!="in progress")
            {
                $task->status="in progress";
                $task->save();
            }
        }
    }

    public function updatedrag3($id)
    {
        $tab=explode(",",$id);
        for ($j=0; $j <sizeof($tab) ; $j++) 
        { 
            $x=str_replace("cd","",$tab[$j]);
            $task = Task::find($x);
            if(auth()->user()->id !== $task->user_id)
            {
                return abort(403, 'Unauthorized action.');
            }
            if($task->status!="done")
            {
                $task->status="done";
                $task->save();
            }
        }
    }
}
