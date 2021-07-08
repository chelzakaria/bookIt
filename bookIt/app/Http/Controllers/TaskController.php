<?php

namespace App\Http\Controllers;
use App\Http\Middleware\CheckAccount;
use App\Models\Book;
use App\Models\Membership;
use App\Models\Notification;
use App\Models\Setting;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function __construct(){
        $this->middleware(['auth', CheckAccount::class]);
    }

    
    public function index()
    {
        // $tasks = Task::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        //$tasks = Task::all();

        $Setting = Setting::where('user_id', Auth::user()->id)->first();  
        $notifications = Notification::where('user_id', Auth::user()->id)->get();  

         $tasks = Task::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
         $count1 = Task::where('user_id', auth()->user()->id)->where('status','=','not started')->count();
         $count2 = Task::where('user_id', auth()->user()->id)->where('status','=','in progress')->count();
         $count3 = Task::where('user_id', auth()->user()->id)->where('status','=','done')->count();
         $books = Book::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();

    

        return view('tasks.index',[
            'tasks' => $tasks,
            'count1' =>$count1,
            'count2' =>$count2,
            'count3' =>$count3,
            'setting' => $Setting,
            'notifications' => $notifications,
            'books' => $books

        ]);
        
    }
    public function store(Request $request)
    {
         
        
        if($request->notification==="true"){
            $notification = "on";
            if($request->reminder_time){
            $alert_time = $request->reminder_time;
            }
            else {
                $alert_time = 600;
            }
        }
        else if($request->notification==="false") {
            $notification = "off";
            $alert_time = 0;
        }
        

        
        $this->validate($request,[
            'task_name' => 'required',
            'status' => 'required',
            'importance' => 'required',
            'book' => 'required',
            'end_date' =>'required|date',
            'description' => 'required',
             
        ]);
 
        $book = DB::table('books')->where('title',$request->book)->first();


        if(Membership::where('user_id', Auth::user()->id)->first()->account_type === "free" && !Membership::where('user_id', Auth::user()->id)->first()->end_date)
        {
            if(Task::where('user_id', Auth::user()->id)-> count() > 49)
            {
                return back()->with('warning', 'You reached your maximum tasks ! Try to upgrade your account.');
            }
        }


        if(Membership::where('user_id', Auth::user()->id)->first()->account_type === "free" && !Membership::where('user_id', Auth::user()->id)->first()->end_date)
        {
            if(Task::where('user_id', Auth::user()->id)->whereDate('created_at', '=', date('Y-m-d'))->count() > 2)
            {
                return back()->with('warning', 'You reached your maximum tasks per day');
            }
        }
          
       $id = 
       $request->user()->tasks()->create([
        'task_name' => $request->task_name,
        'status'=>$request->status,
        'task_description'=>$request->description,
        'end_date'=>$request->end_date,
        'book_id'=>$book->id,
        'task_importance'=>$request->importance,
        'start_date'=>$request->end_date,
        'notification' => $notification,
        'reminder_time' => $alert_time, 
       ])->id;

       $task = Task::find($id);
       if($notification=="on"){
         
        Notification::create([
            'task_id' => $task->id,
            'user_id' => Auth::user()->id,
             'status' => $task->status,
             'due_date' => $task->end_date,
             'seen' => 0
            ]);
    }
    
    DB::table('task_histories')->insert([
        'user_id' => Auth::user()->id,
        'task_id' => $task->id,
        'old_status' => $request->status,
        'new_status' =>$request->status,
        'created_at' => now(),
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
        if($request->notification==="true"){
            $notification = "on";
            $alert_time = $request->reminder_time;
        }
        else if($request->notification==="false") {
            $notification = "off";
            $alert_time = 0;
        }
        
        $task = Task::find($id);
        if(auth()->user()->id !== $task->user_id)
        {
            return abort(403, 'Unauthorized action.');
        } 

        $this->validate($request, [
            'task_name' => 'required',
            'status' => 'required',
            'importance' => 'required',
            'end_date' =>'required|date',
            'description' => 'required',
            
        ]);

        

        $task = Task::find($id);  

        DB::table('task_histories')->insert([
            'user_id' => Auth::user()->id,
            'task_id' => $task->id,
            'old_status' => $task->status,
            'new_status' =>$request->status,
            'created_at' => now(),
        ]);


        $task->task_name = $request->input('task_name');
        $task->status = $request->input('status');
        $task->task_importance = $request->input('importance');
        $task->end_date = $request->input('end_date');
        $task->task_description = $request->input('description');
        $task->notification = $notification;
        $task->reminder_time = $alert_time;
        $task->save();

        if($notification=="on"){
            
         if($Notif = Notification::where('task_id', $id)->first()){
           $Notif->due_date =  $task->end_date;
           $Notif->seen = 0;
           $Notif->save();
            }
            else {
                Notification::create([
                    'task_id' => $task->id,
                    'user_id' => Auth::user()->id,
                     'status' => $task->status,
                     'due_date' => $task->end_date,
                     'seen' => 0
                    ]);
            }
        }



        
    



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
                $old_status=$task->status;
                $new_status="not started";
                DB::table('task_histories')->insert([
                    'task_id' => $task->id,
                    'old_status' => $old_status,
                    'new_status' =>$new_status,
                    'created_at' =>  now(),
                    'updated_at' =>  now(),
                    'user_id' => $task->user_id
                ]);
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
                $old_status=$task->status;
                $new_status="in progress";
                DB::table('task_histories')->insert([
                    'task_id' => $task->id,
                    'old_status' => $old_status,
                    'new_status' =>$new_status,
                    'updated_at' =>  now(),
                    'created_at' =>  now(),
                    'user_id' => $task->user_id
                ]);
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
                $old_status=$task->status;
                $new_status="done";
                DB::table('task_histories')->insert([
                    'task_id' => $task->id,
                    'old_status' => $old_status,
                    'new_status' =>$new_status,
                    'updated_at' =>  now(),
                    'created_at' =>  now(),
                    'user_id' => $task->user_id
                ]);
                $task->status="done";
                $task->save();
            }
        }
    }
}
