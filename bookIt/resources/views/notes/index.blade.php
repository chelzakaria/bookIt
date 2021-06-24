  @extends('layouts.app')
    @section('content') 
    <style>
        .btn:focus {
  box-shadow: none !important;
  outline: none !important; 
}
.example::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.example {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
    </style>
        <div class="container-fluid">
            <div class="row">
                @include('notes.layouts.sidebar')
                <div class="col">
                    <div class="container py-3">
                        <div class="d-flex flex-row">
                            <p style="font-weight:700; font-size:30px;">
                                Notes
                            </p>  
                          
                                {{-- {{auth()->user()->firstName}} --}}
                                <div class="mb-3 ml-auto mr-0" >
                                    <div class="btn-group dropleft position-absolute" style="top:30px; right: 155px">
                                        <a class="btn px-0 " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none; width:25px; height:25px">
                                            <img class="mr-5"   src="/images/icons/notification_off_icon.svg" alt="" style="width:99%  ; height:auto;">                                         </a>
                                      
                                        <div class="dropdown-menu mt-4 example" aria-labelledby="dropdownMenuLink " style=" width: 300px;
                                        max-height: 150px;  overflow-y: scroll;">
                                          {{-- <div class="dropdown-item " style="background:rgb(241, 236, 236)">a</div> --}}
                                          @if ($notifications->count())
                                          @foreach ($notifications as $notification)
                                          
                                          <div class="dropdown-item">
                                             
                                              @if ((strtotime($notification->due_date) - time())<= 300)
                                              {{$tasks->where('id', $notification->task_id)->first()->task_name}}
                                            

                                              @endif 
                                            </div>
                                        
                                          @endforeach
                                          @endif
                                          
                                           
                                        </div>
                                      </div>


                                   
                            
                                    <img  src="/storage/profile_images/{{Auth::user()->profile_image}}" alt="" style="width: 60px; height:60px; border-radius:50%">
                                </div>
                             
                              
                            
                        </div>
                        
                        <form action="{{route('notes.search')}}" method="POST" role="search" >

                        <div class="d-flex flex-row">
                                @csrf
                                 <div class="form-group d-inline mt-0">
                                    <select class="custom-select mb-0 mr-5"  name="word">
                                        <option selected="true" disabled="disabled" >Filter notes</option>
                                        <option>Quote</option>
                                        <option>Idea</option>
                                        <option>Thought</option>
                                        <option>Uncategorized</option>
                                    </select>
                                </div>
                                <button class="btn" type="submit" style="position: relative; bottom:5px"> <span class="iconify" data-inline="false" data-icon="codicon:filter-filled" style="color: #000; font-size: 30px;"></span></button>
                            </form>
                            {{--test--}}
                   
                            {{----}}
                            
                            <div class="ml-auto mr-0">
                                <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('createnote')}}" style="text-decoration: none; color:#fff;">Create new note</a> </button>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid #00000023;">
                        
                            <div class="row">
 
                                @if ($notes->count())
                                    @foreach ($notes as $note)
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            
                                         <div class="card mb-5 " style="width: 18rem; height:9rem;border-radius:10px;background:
                                         @switch($note->type)
                                            @case("Quote")
                                            {{$setting->quote_color}}

                                                @break

                                            @case("Idea")
                                            {{$setting->idea_color}}

                                                @break
                                                @case("Thought")
                                                {{$setting->thought_color}}

                                                @break
                                            @default
                                            {{$setting->uncategorized_color}}

                                        @endswitch
                                         ">
                                           {{-- <a href="#" class="position-absolute float-right" style="top:10px; right:10px"><img src="/images/icons/dots_icon.svg" alt="" style="height: auto;width:80%;"></a> --}}
                                           <div class="dropdown position-absolute" style="top:2px; right:2px">
                                            <a class="btn  " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="/images/icons/dots_icon.svg" alt="" style="height: auto;width:;">                                            </a>
                                          
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              <a class="dropdown-item" href="/notes/{{$note->id}}/edit">Edit</a>
                                              <button type="submit" class="btn dropdown-item" data-toggle="modal" data-target="#exampleModal"> <span class="" >Delete</span>  </button>
                                              {{-- <form class="d-inline" action="{{route('notes.destroy',  $note->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn dropdown-item"> <span class="" >Delete</span>  </button>
                                           
                                                </form> --}}
                                              
                                             
                                            </div>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this note?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                            
                                                        <div class="modal-footer">
                                                            <div class="row mt-3">
                                                                <div class="col">
                                                                    <button type="button" class="btn " data-dismiss="modal" style="background-color: #D4E5F9; font-weight:700;">Cancel</button>
                                                                </div>
                                                                <div class="col">
                                                                    <form class="d-inline" action="{{route('notes.destroy',  $note->id)}}" method="post">
                                                                        @csrf @method('DELETE')
                                            
                                                                        <button type="submit" name="create" class="btn btn-danger float-right" style="; font-weight: 700;">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                          </div>
                                         
                                             <div class="card-body pb-0">
                                                <a href="/notes/{{$note->id}}" style="text-decoration: none;color:black;">
                                             
                                               <span class="card-text " style="font-weight: 400;font-size:15px; 
                                                 height:4.2rem;     overflow: hidden;
                                                    display: -webkit-box;
                                                    -webkit-line-clamp: 3;
                                                    -webkit-box-orient: vertical;   
                                                 "> 
                                                 {!! html_entity_decode($note->body)!!}
                                              
                                                </span>  
                                        </a>
                                                  
                                                <p class="text-muted float-right mb-0 mt-4" style="font-weight: 300;font-size:13px;">{{ $note->updated_at->diffForHumans() }}</p>
                                                <p class="mb-0 mt-4 " style="font-weight: 700;font-size:12px;color:#353535">
                                               
                                                    {{-- title book --}}

                                                    @foreach ($books as $book)
                                                @if($book->id===$note->book_id) 

                                                   
                                                 {{$book->title}}
                                                @endif
                                                 @endforeach
                                                </p>
                                             </div>
                                           </div>
                                        </div>
                                     </div>
                                    @endforeach
                                @else
                                    <p>No notes found</p>
                                @endif
                               </div>

                    </div>
  
       
                </div>
  
            </div>
                        
        </div>
    @endsection  
 