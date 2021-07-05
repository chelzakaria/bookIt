@extends('layouts.app')
@section('content') 
        <style>
            ::placeholder{
            font-weight: 600;
            font-size: 16px;
            line-height: 20px;
            }

    label {
    color: #6F6D6D;
    font-weight: 600;
    font-size:13px;
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
                        <div class="d-none">
                            {{$i=0}}
                            @foreach ($notifications as $notification)
                                        @if ((strtotime($notification->due_date) - strtotime(\Carbon\Carbon::now())) < App\Models\Task::where('id', $notification->task_id)->first()->reminder_time && !$notification->seen && $tasks->where('id', $notification->task_id)->first()->status !=="done")
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
                                      @if ((strtotime($notification->due_date) - strtotime(\Carbon\Carbon::now()) ) < $tasks->where('id', $notification->task_id)->first()->reminder_time && $tasks->where('id', $notification->task_id)->first()->status !=="done")
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
                            </div>
                         
                          
                        
                    </div>
                    
                    <form action="{{route('notes.search')}}" method="POST" role="search" id="search_form">
                        @csrf

                    <div class="d-flex flex-row">
                             <div class="form-group d-inline mt-0">
                                <select class="custom-select mb-0 mr-5"  name="word" onchange="search()">
                                    <option  disabled="disabled" >Filter notes</option>
                                    <option @if ($selected==="Quote")
                                        selected="true"
                                    @endif >Quote</option>
                                    <option  @if ($selected==="Idea")
                                    selected="true"
                                @endif >Idea</option>
                                    <option @if ($selected==="Thought")
                                    selected="true"
                                @endif>Thought</option>
                                    <option @if ($selected==="Uncategorized")
                                    selected="true"
                                @endif>Uncategorized</option>
                                    <option @if ($selected==="All")
                                    selected="true"
                                @endif >All</option>
                                </select>
                            </div>
                            {{-- <button class="btn" type="submit" style="position: relative; bottom:5px"> <span class="iconify" data-inline="false" data-icon="codicon:filter-filled" style="color: #000; font-size: 30px;"></span></button> --}}
                            {{-- <input type="submit" id="search_submit"    value="search" >  --}}
                        </form>
                        {{--test--}}
               
                        {{----}}
                        
                        <div class="ml-auto mr-0">
                            <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;" data-toggle="modal" data-target="#createNote"> <a   style="text-decoration: none; color:#fff;">Create new note</a> </button>
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
                                          <a class="dropdown-item"  data-toggle="modal" data-target="#editNote{{$note->id}}" onclick=" ckeditor('body'+{{$note->id}})">Edit</a>
                                          <button type="submit" class="btn dropdown-item" data-toggle="modal" data-target="#exampleModal"> <span class="" >Delete</span>  </button>
                                     
                                          
                                         
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
                                            {{-- edit note modal --}}
                                            <div class="modal fade" id="editNote{{$note->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700; font-size:25px;">Edit Note
                                        </h5>
                                    
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('notes.update', $note->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                 @error('note_images')
                                                     {{$message}}
                                                 @enderror
                                                 <div class="col-md-4">
                                                         <div class="form-group">
                                                            <select class="custom-select"  name="type"   style="border-radius:10px; height:50px; ">
                                                                <option selected="true" disabled="disabled" >Select a category</option>
                                                                <option @if ($note->type=="Uncategorized") selected="true" @endif >Uncategorized</option>
                                                                <option @if ($note->type=="Quote") selected="true" @endif>Quote</option>
                                                                <option @if ($note->type=="Idea") selected="true" @endif>Idea</option>
                                                                <option @if ($note->type=="Thought") selected="true" @endif>Thought</option>
                                                            </select>
                                                         
                                                          </div>
                                                       </div>
                                                       
                                                  </div>  
                                                  <div class="row">
                        
                                                        <div class="col">
                                                     
                                                            <textarea class="form-control" id="body{{$note->id}}" placeholder="Enter the Description" name="body{{$note->id}}"  >
                                                                {{$note->body}}
                                                            </textarea>
                                                          </div>
                                                    </div>
                                                    <div class="row">
                                                        @if ($images->count())
                                                            
                                                        @foreach ($images as $image)
                                            
                                                        <div class="col-2">
                                                        
                        
                        
                        
                                                        
                        
                        
                                                            <div class=" mt-3 text-center " style="border-radius:10px; height:150px; width:150px;  
                                                            ">
                                                           <img src="/storage/notes_images/{{$image->image}}" style="height:150px; width:150px;border-radius:2px; " alt="">
                                                             </div>
                                                             <a class="btn" style="width:100%" data-toggle="modal" data-target="#exampleModal{{$image->id}}"   > <img src="/images/icons/delete_icon.svg" alt="" style="width: 17%; height:auto;" class="mx-auto">  </a>
                                                           
                                                         </div>
                                                         <div class="modal fade" id="exampleModal{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this image?</h5>
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
                                                                                 
                                                                                <a class="btn btn-danger " href="{{route('images.destroy', $image->id)}}" style="; font-weight: 700;"> <span>Delete</span>  </a>
                                                                                 
                                                                             </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                        
                                                        @endforeach
                                                        @endif
                                                        <div class="col">
                                                            <div class=" mt-5 mb-3 text-center " style="border-radius:10px; height:110px; width:175px; background:#D4E1F1; border:1px dashed #8A929D;     border-width:2px;  
                                                            ">
                                                           <label for="customFile"  class="my-4">
                                                            <img  src="/../images/icons/upload_image_icon.svg" alt="" style="width:35%;
                                                            height:auto; cursor: pointer;">
                                                            <p>Tap to add images</p>
                                                             <input type="file" id="customFile" name="note_images[]" style="position: absolute;z-index:-1;    bottom:7px; left:90px;font-weight:500;" multiple>
                                                             </label>
                                                            </div>
                                                          
                                                               
                                                         </div>
                                                         
                                                         
                                                  
                                                    </div>
                                                    @if ($images->count())
                        
                                                    <div class="d-flex justify-content-end mt-3">
                                                        {!!$images->links()!!}
                                                     </div>
                                                    @endif
                                                   
                                                  
                                     
                        </div>
            
                                    <div class="modal-footer">
                     
                                    <div class="col">
                                        <button type="button" class="btn float-left" data-dismiss="modal" style="background-color: #D4E5F9; font-weight:700;"> <a   style="text-decoration: none; color:#000;">Cancel</a> </button>
                                    </div>
                                    <div class="col">
                                        <button type="submit"  name="create" class="btn btn-primary float-right"
                                        style="background-color:#1F1A6B;font-weight:700;  " >Edit</button> 
                                    </div>
                          </form>
                         </div>
                    </div>
                </div>
            </div>
                                             {{-- end of edit note modal   --}}
                                            @endforeach
                                            </p>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                                @endforeach
                            @else
                                <p class="mx-auto">No notes found.</p>
                            @endif
                           </div>

                </div>

   
            </div>
            {{-- create note modal --}}
            <div class="modal fade" id="createNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700; font-size:25px;">Create Note
                            </h5>
                         
                        </div>
                        <div class="modal-body">
                            <div class="row mt-0">
                                @error('type')
                                <div class="col text-center ">
                                       
                                       <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
    
                                       {{$message}}
                                        </div>
    
                                        
                                </div>
                                @enderror
                                @error('body')
                                <div class="col text-center ">
                                    <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                                    {{$message}}
                                     </div>
                                    
                             </div>
                             @enderror
                            </div>
                             
                            <form action="{{route('notes')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                     
                                     <div class="col-md-4">
                                             <div class="form-group ">
                                                <select class="custom-select @error('type')
                                                border border-danger
                                                @enderror"   name="type"   style="border-radius:10px; height:50px; ">
                                                    <option selected="true" disabled="disabled" >Select a type</option>
                                                    <option>Uncategorized</option>
                                                    <option>Quote</option>
                                                    <option>Idea</option>
                                                    <option>Thought</option>
                                             </select>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                   <select class="custom-select @error('type')
                                                   border border-danger
                                                   @enderror"   name="titlebook"   style="border-radius:10px; height:50px; ">
                                                       <option selected="true" disabled="disabled" >Select a Book</option>
                                                        
                                                       @foreach ($books as $book)
                                                         <option>{{$book->title}}</option>  
                                                       @endforeach
                                                </select>
                                                 </div>
                                               </div>
                                           
                                      </div>  
                                    
                                      <div class="row">
                                        
                                            <div class="col">
                                              
    
                                                <textarea class="form-control" id="body" placeholder="Enter the Description" name="body"></textarea>
                               
    
                                                
                                              </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class=" mt-3 text-center " style="border-radius:10px; height:110px; width:175px; background:#D4E1F1; border:1px dashed #8A929D; z-index:12    border-width:2px;  
                                                ">
                                                    <label for="customFile"  class="my-4">
                                                        <img  src="/../images/icons/upload_image_icon.svg" alt="" style="width:35%;
                                                        height:auto; cursor: pointer; ">
                                                        <p>Tap to add images</p>
                                                         <input type="file" id="customFile" name="note_images[]" style="position: absolute;z-index: ; bottom:7px; left:90px;font-weight:500;" multiple>
                                                         </label>
                                                </div>
                                              
                                                   
                                             </div>
                                        </div>
                                     
             
                        <div class="modal-footer">
                     
                                    <div class="col">
                                        <button type="button" class="btn float-left" data-dismiss="modal" style="background-color: #D4E5F9; font-weight:700;"> <a   style="text-decoration: none; color:#000;">Cancel</a> </button>
                                    </div>
                                    <div class="col">
                                        <button type="submit"  name="create" class="btn btn-primary float-right"
                                        style="background-color:#1F1A6B;font-weight:700;  " >Create</button> 
                                    </div>
                         
                         </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end of create note modal --}}

          
        </div>
                    
    </div>











    
    <script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
        <script>
        CKEDITOR.replace('body');
      
        function ckeditor(name){
             CKEDITOR.replace(name);
        }
        // CKEDITOR.replace('body2');
        </script>
    <script>
       function search(value){
         var form = document.getElementById("search_form");
         
        form.submit()
       
       }
    </script>
@endsection  
