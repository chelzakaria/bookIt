<div class="d-none">
    {{$i=0}}
    @foreach ($notifications as $notification)
                @if (App\Models\Task::where('id', $notification->task_id)->first() &&  (strtotime($notification->due_date) - strtotime(\Carbon\Carbon::now())) < App\Models\Task::where('id', $notification->task_id)->first()->reminder_time && !$notification->seen && $tasks->where('id', $notification->task_id)->first()->status !=="done")
                {{$i++}}
                    @endif 
                    
                @endforeach
</div>
    {{-- {{auth()->user()->firstName}} --}}
    <div class="mb-3 ml-auto mr-0" >
        <div class="btn-group dropleft position-absolute" style="top:30px; right: 155px">
            <a class="btn px-0 " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none; width:25px; height:25px">
                <img class="mr-5"  @if ($i>0)
                src="/images/icons/notification_on_icon.svg"
                @else
                src="/images/icons/notification_off_icon.svg"
                @endif  alt="" style="width:99%  ; height:auto;">                                         </a>
          
            <div class="dropdown-menu mt-4 example" aria-labelledby="dropdownMenuLink " style=" min-width: 300px;
            max-height: 150px;  overflow-y: scroll;">
              {{-- <div class="dropdown-item " style="background:rgb(241, 236, 236)">a</div> --}}
              @if ($notifications->count())
              
              @foreach ($notifications as $notification)
              @if (App\Models\Task::where('id', $notification->task_id)->first() && (strtotime($notification->due_date) - strtotime(\Carbon\Carbon::now()) ) < $tasks->where('id', $notification->task_id)->first()->reminder_time && $tasks->where('id', $notification->task_id)->first()->status !=="done")
              <form action="{{route('notification.show', $notification->task_id)}}" method="POST">
                  @csrf
                  @if ($tasks->where('id', $notification->task_id)->first())
                      
                 
                <button type="submit" class="dropdown-item " @if(!$notification->seen) style="background: rgb(235, 229, 229)" bg-secondary @endif > 
                    You  have
                    @switch($tasks->where('id', $notification->task_id)->first()->reminder_time)
                        @case(300)
                            5 minutes
                            @break
                        @case(600)
                            10 minutes
                            @break
                        @case(900)
                            15 minutes
                            @break
                        @case(3600)
                            1 hour
                            @break
                        @case(7200)
                            2 hours
                            @break
                        @case(86400)
                            1 day
                            @break
                        @case(172800)
                            2 days
                            @break
                       
                        @default
                            
                    @endswitch
                    to complete  
                   <b> {{$tasks->where('id', $notification->task_id)->first()->task_name}}</b>
                      <br>
                      <span class="text-muted float-right" style="font-weight:600; font-size:12px;">{{$notification->due_date->subSeconds($tasks->where('id', $notification->task_id)->first()->reminder_time)->diffForHumans()}}</span>
 
                </button>
                @endif
              </form>
                @endif 
                
              @endforeach
            
              @endif 
            
        </div> 
            </div>
          </div>

          <img  src="/storage/profile_images/{{Auth::user()->profile_image}}" alt="" style="width: 60px; height:60px; border-radius:50%">