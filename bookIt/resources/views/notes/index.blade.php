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
    .note-body:hover {cursor: pointer;}

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
                        @include('layouts.notification')

          
            
                               
                        
                                
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
                    @if(session('warning'))
                    <div class="col text-center w-75 mx-auto mb-3">
                          <div class="jumbotron py-2 mb-2 bg-warning    mx-auto">
                                {{ session('warning') }}
                          </div>
                    </div>
                @endif
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
                                            <a  data-toggle="modal" data-target="#showNote{{$note->id}}" style="text-decoration: none;color:black;">
                                         
                                           <span class="card-text " style="font-weight: 400;font-size:15px; 
                                             height:4.2rem;     overflow: hidden;
                                                display: -webkit-box;
                                                -webkit-line-clamp: 3;
                                                -webkit-box-orient: vertical; cursor: pointer;  
                                             "> 
                                             {!! html_entity_decode($note->body)!!}
                                          
                                            </span>  
                                    </a>
                                              
                                            <p class="text-muted float-right mb-0 mt-4" style="font-weight: 300;font-size:13px;">{{ $note->updated_at->diffForHumans() }}</p>
                                            <p class="mb-0 mt-4 " style="font-weight: 700;font-size:12px;color:#353535">
                                           
                                                {{-- title book --}}

                                                @foreach ($books as $book)
                                            @if($book->id===$note->book_id) 

                                               
                                             <span class="font-weight-bold">{{$book->title}}</span>
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
                                                        @if ($image->note_id==$note->id)
                                                            
                                                    
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
                            @endif
                                                        @endforeach
                                                        @endif
                                                        <div class="col">
                                                            <div class=" mt-3 mb-3 text-center " style="border-radius:10px; height:110px; width:175px; background:#D4E1F1; border:1px dashed #8A929D;     border-width:2px;  
                                                            ">
                                                           <label for="customFile"  class="my-4">
                                                            <img  src="/../images/icons/upload_image_icon.svg" alt="" style="width:35%;
                                                            height:auto; cursor: pointer;">
                                                            <p>Tap to add images</p>
                                                             <input type="file" id="customFile" name="note_images[]" style="position: absolute;z-index:-22;    bottom:7px; left:10px;font-weight:500;" multiple  >
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
                                                         <input type="file" id="customFile" name="note_images[]" style="position: absolute;z-index: -11; bottom:7px; left:90px;font-weight:500;" multiple>
                                                         </label>
                                                </div>
                                              
                                                   
                                             </div>
                                        </div>
                                     
             
                        <div class="modal-footer mt-3">
                     
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
                {{-- start of show note --}}
                @foreach ($notes as $note)
                    
                <div class="modal fade" id="showNote{{$note->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            <div class="modal-body    pt-4 pb-4">
                                     <div class="row" style="min-height: 95%">
                                    <div class="col  " style="font-size: 17px; line-height:35px; font-weight:500; ">
                                        {!! html_entity_decode($note->body) !!}
        
                                    </div>
                                     </div>
                                     @if ($images->where('note_id', $note->id)->count())
        
                                    <hr style="border-top: 1px solid #00000023;">
        
                                     <div class="row pr-3">
                                            
                                        @foreach ($images as $image)
                                        @if ($image->note_id === $note->id)
                                            
                                       
                                        <div class="col" >
                                            <div class=" mt-3 text-center " style="border-radius:10px; height:150px; width:150px;   ;
                                            ">
                                            <a  data-toggle="modal" data-target="#showImage{{$image->id}}" style="cursor: pointer">
                                            <img src="/storage/notes_images/{{$image->image}}" style="height:150px; width:150px;border-radius:2px; " alt="">
                                        </a>
                                             </div>
                                         </div>
                                   
                                         @endif
                                         
                                         
                                         
                                         
                                         
                                    
                                  
                                
                                    @endforeach
                                    <div class="d-flex justify-content-end mt-3">
                                        {!!$images->links()!!}
                                     </div>
                                    </div>
                                    @endif
                              
                            <hr style="border-top: 1px solid #00000023;">
                                 
                                 
                        </div>
                    </div>
                </div>

                </div>
                @foreach ($images as $image)
                <div class="modal fade" id="showImage{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
               
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                
                         <div class="modal-body">
                          <img src="/storage/notes_images/{{$image->image}}" alt="" style="width: 100%; height:auto;">
                         </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
             
            {{-- end of show note  --}}
                 
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
