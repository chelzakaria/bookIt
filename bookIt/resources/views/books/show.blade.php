@extends('layouts.app')
@section('content') 
<style>
    .checked {
  color: orange;
}

#select   {
                        font-family: fontAwesome;
                        
                    }
</style>
 
<!---->
<?php use App\Models\TimeRead; ?>
    <div class="container-fluid">
        <div class="row">
            @include('notes.layouts.sidebar')
            <div class="col">
                <div class="container py-3">
                    <div class="d-flex flex-row">
                        <p style="font-weight:700; font-size:30px;">
                            Books
                        </p>  
                        @include('layouts.notification')
                       
                    </div>
                    <div class="d-flex flex-row">
                        
                        <div>
                            <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('books')}}" style="text-decoration: none; color:#fff;">Back</a> </button>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #00000023;">
                

                    <div class="jumbotron  pt-4 pb-2" >
                        <div class="row" style="min-height: 55%">
                        <div class="col-6 col-md-5 col-lg-3" >
                            <div style="height:250px;width:auto">
                                <img class="card-img-top" style="border-radius:10px; width:100%;height:100%" src="/storage/cover_images/{{$book->cover}}" >
                            </div>
                           
                        </div>
                        <div class="col">
                            <div class="d-flex">
                                <p class="font-weight-bold mb-0" style="font-size: 22px;"> {{$book->title}}</p>

                                <div class="ml-5">
                                    <form id="play">
                                       
                                        <span id="book_id" style="visibility: hidden">{{$book->id}}</span>
                                        <span id="gettime" style="visibility: hidden" >
                                            {{-- @if ($reads->count())
                                            {{$reads->created_at}}
                                            @endif --}}
                                            </span>  
                                        <span id="idtime" style="visibility: hidden"> 
                                            {{-- @if ($reads->count())
                                            {{$reads->id}}
                                            @endif --}}
                                        </span>
                                        <span id="up" style="display:none"></span>
                                        @csrf
                                     <button type="submit" style="border-radius: 20px"   id="start_button" class="btn btn-success">
                                       Start 
                                        <i class="fa fa-play"></i>
                                    </button>
                                    </form>
                                </div>
                                <div class="ml-2 ">
                                    <button style="border-radius: 20px" type="button" id="timer_submit" class="btn btn-warning" onclick='buttonStopPress()'>
                                        Stop
                                        <i class="fa fa-pause"></i>
                                      </button>
                                </div>
                                
                                <div class="ml-3 mt-2 font-weight-bold" id="page_name"> 
                                    <div  class="item">  <div class="countup" id="countup1">
                                        <span id="hour">00</span>
                                        :
                                        <span id="min">00</span>
                                        :
                                        <span id="sec">00</span>
                                        
                                        </div>
                                    <div>&nbsp;</div>
                                   <h5>     <div class="mb-3" id="total_time" ></div>    </h5>  
                                     </div>
                                </div> 
                            </div>
                            <p style="font-size:15px;"> By <span style="color: #81ABEA; " > {{$book->author}} </span> </p>
                            <p class="mt-0">
                                <span class="fa fa-star @if($book->rating>=1) checked @endif"></span>
                                <span class="fa fa-star @if($book->rating>=2) checked @endif "></span>
                                <span class="fa fa-star @if($book->rating>=3) checked @endif "></span>
                                <span class="fa fa-star @if($book->rating>=4) checked @endif"></span>
                                <span class="fa fa-star @if($book->rating>=5) checked @endif"></span>
                            </p>
                                <hr style="border-top: 1px solid #00000023;" class="mb-2 mt-4">
                                <div>
                                   {{$book->description}}
                                </div>

                        </div>
                        <!---->
                        <div class="d-flex justify-content-end">

                            <div class="mr-3">
                                <a href="#r2">
                                <button type="button" class="btn btn-primary">
                                Notes <span class="badge badge-light">{{$count_notes}}</span>
                                  </button></a>
                                </div>

                            <div >
                                <a href="#r1">
                            <button type="button" class="btn btn-primary">
                                Tasks <span class="badge badge-light">{{$count_tasks}}</span>
                              </button></a>
                            </div>

                         
                        </div>
                        <!---->
                        </div>
                         <div class="row mt-5">
                            <div class="col-3 d-none d-lg-inline text-center">
                                <label class="custom-checkbox">
                                    <input id="chekcbox-input" type="hidden" name="read" @if($book->read) value="true" @else value="false" @endif>
                                    <span id="book_id" style="visibility: hidden">{{$book->id}}</span>
                                    <form id="read">
                                         @csrf
                                     <button type="submit"  id="button_read" class="btn" >
                                        <span class="custom-checkbox-text"><img id="checkbox-img" style="cursor: pointer" src="@if($book->read) /images/icons/read_true_icon.svg  @else /images/icons/read_false_icon.svg  @endif" alt=""  ></span>
                                    </button>
                                    </form>
                                    
                                    
                                    <p class="mt-2">You read it ? </p>
                                  </label>
                            </div>
                            <div class="col">
                                <hr style="border-top: 1px solid #00000023;" class="mb-3 mt-4">
                                <div class="row text-center">
                                    <div class="col">
                                        <p class="mb-2" style="font-weight: 400; font-size:16px;">Pages</p>
                                        <span class="iconify mt-0" data-inline="false" data-icon="fluent:document-one-page-20-filled" style="font-size: 40px;"></span>
                                        <p class="mt-2 mb-0" style="font-weight: 700; font-size:14px;"> <span> {{$book->num_page}} </span> Pages.</p>
                                    </div>
                                    <div class="col">
                                        <p class="mb-2" style="font-weight: 400; font-size:16px;">Publication date</p>
                                        <span class="iconify" data-inline="false" data-icon="clarity:date-solid" style="font-size: 40px;"></span>

                                        <p class="mt-2 mb-0" style="font-weight: 700; font-size:14px;">   
                                         
                                    <?php  echo date('d/m/Y', strtotime($book->created_at)); ?>
                                    </p>
                                    </div>
                                    <div class="col">
                                        <p class="mb-2" style="font-weight: 400; font-size:16px;">Category</p>
                                        <span class="iconify" data-inline="false" data-icon="bx:bxs-category" style="font-size: 40px;"></span>

                                        <p class="mt-2 mb-0" style="font-weight: 700; font-size:14px;">   {{$book->category}}  </p>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <hr style="border-top: 1px solid #00000023;">
                         <p class="font-weight-bold mb-4 " style="font-size: 22px;"> 
                            Book’s notes    
                        </p>
                         <div class="row" id="r2">
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
                                         
                                           
                                         
                                             <div class="card-body pb-0">
                                                <a   style="text-decoration: none;color:black;" data-toggle="modal" data-target="#showNote{{$note->id}}">
                                             
                                               <span class="card-text " style="font-weight: 400;font-size:15px; 
                                                 height:4.2rem;     overflow: hidden;
                                                    display: -webkit-box;
                                                    -webkit-line-clamp: 3;
                                                    -webkit-box-orient: vertical;  
                                                    cursor: pointer; 
                                                 "> 
                                                 {!! html_entity_decode($note->body)!!}
                                              
                                                </span>  
                                        </a>
                                                  
                                                <p class="text-muted float-right mb-0 mt-4" style="font-weight: 300;font-size:13px;">{{ $note->updated_at->diffForHumans() }}</p>
                                                <p class="mb-0 mt-4 " style="font-weight: 700;font-size:12px;color:#353535">
                                               
                                                    {{-- title book --}}

                                                    
                                                </p>
                                             </div>
                                           </div>
                                        </div>
                                     </div>
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
                                                                <a  style="cursor: pointer" data-toggle="modal" data-target="#showImage{{$image->id}}">
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
                                    @endforeach
                                @else
                                    <p class="mx-auto">This book has no notes.</p>
                                @endif
                              
                                @foreach ($images as $image)
                                <div class="modal fade" id="showImage{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                               
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                
                                         <div  class="modal-body">
                                          <img src="/storage/notes_images/{{$image->image}}" alt="" style="width: 100%; height:auto;">
                                         </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                             
                              
                         </div>
                         <hr style="border-top: 1px solid #00000023;">
                         <p class="font-weight-bold mb-4 " style="font-size: 22px;"> 
                            Book’s tasks    
                        </p>
                         <div class="row" id="r1">
                            @if ($tasks->count())
                                    @foreach ($tasks as $task)
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            
                                         <div class="card mb-5 " style="width: 18rem; height:9rem;border-radius:10px;background:
                                        @switch($task->task_importance)
                                                @case('high')
                                                    $setting->high_color
                                                    @break
                                                @case('medium')
                                                    {{$setting->medium_color}}
                                                    @break
                                                @case('low')
                                                    {{$setting->low_color}}
                                                    @break
                                              @endswitch
                                        ;">
                                         
                                           
                                         
                                             <div class="card-body pb-0">
                                                <a   style="text-decoration: none;color:black;">
                                             
                                               <span class="card-text " style="font-weight: 400;font-size:15px; 
                                                 height:4.2rem;     overflow: hidden;
                                                    display: -webkit-box;
                                                    -webkit-line-clamp: 3;
                                                    -webkit-box-orient: vertical;   
                                                 "> 
                                                 {{$task->task_description}}
                                              
                                                </span>  
                                        </a>
                                        <span class="badge 
                                        @if((strtotime($task->end_date) - time() ) < 300)
                                        badge-danger
                                        @elseif((strtotime($task->end_date) - time() ) < 86400) 
                                        badge-warning
                                        @else
                                        badge-success
                                        @endif
                                        py-1 px-2 mt-4 float-right">
                                            {{-- {{\Carbon\Carbon::parse($task->end_date)->rawFormat('d M')}} --}}
                                            {{\Carbon\Carbon::parse($task->end_date)->diffForHumans()}}
                                        </span>
                                                  
                                                 
                                                <p class="mb-0 mt-4 " style="font-weight: 700;font-size:12px;color:#353535">
                                               
                                                    {{$task->task_importance}}

                                                    
                                                </p>
                                             </div>
                                           </div>
                                        </div>
                                     </div>
                                    @endforeach
                                @else
                                    <p class="mx-auto">This book has no tasks.</p>
                                @endif
                              
                            
                             
                              
                         </div>
                         <div class="row mt-2">
                            <div class="col mb-0">
                                <hr style="border-top: 1px solid #00000023;" class="mb-2 mt-4">
                                <button type="button" class="btn d-inline"> <a  data-toggle="modal" data-target="#editBook{{$book->id}}"  style="text-decoration: none; color:#fff;"><img src="/images/icons/edit_icon.svg" alt="" style="width: 80%; height:auto;"></a> </button>

                                 
                                 
                                  <button data-toggle="modal" data-target="#exampleModal" type="submit" class="btn"> <img src="/images/icons/delete_icon.svg" alt="" style="width: 80%; height:auto;">  </button>
                            
 
                                 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this book?</h5>
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
                                                        <form class="d-inline" action="{{route('books.destroy',  $book->id)}}" method="post">
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
                            </div>
                       </div>


 
                           

                </div>

   
            </div>

        </div>
                 {{--  --}}
                 <div class="modal fade" id="editBook{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700; font-size:25px;">Edit Book
                                </h5>
                            
                            </div>
                            <div class="modal-body">
                                <form action="{{route('books.update', $book->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
        
                                                <input type="text" class="form-control" name="title" placeholder="Title" style="border-radius:10px; height:50px;"  autocomplete="off" value="{{ $book->title}}">
        
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
        
                                                <input type="text" class="form-control" name="author" placeholder="Author" style="border-radius:10px; height:50px;"  autocomplete="off" value="{{ $book->author}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="num_page" placeholder="Number of pages" style="border-radius:10px; height:50px;" autocomplete="off" min="1" value="{{ $book->num_page}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-4">
                                                 <div class="form-group">
                                                    <select class="custom-select"  name="category"   style="border-radius:10px; height:50px; ">
                                                        <option  disabled="disabled" >Select a category</option>
                                                        <option @if ($book->category==="Arts & Music")
                                                            selected
                                                        @endif>Arts & Music</option>
                                                        <option @if($book->category==="Biographies")
                                                            selected
                                                        @endif>Biographies</option>
                                                        <option @if ($book->category==="Business")
                                                            selected
                                                        @endif>Business</option>
                                                        <option @if ($book->category==="Comics")
                                                            selected
                                                        @endif>Comics</option>
                                                        <option @if ($book->category==="Computers & Tech")
                                                            selected
                                                        @endif>Computers & Tech</option>
                                                        <option @if ($book->category==="Cooking")
                                                            selected
                                                        @endif>Cooking</option>
                                                        <option @if ($book->category==="Entertainment")
                                                            selected
                                                        @endif>Entertainment</option>
                                                        <option @if ($book->category==="History")
                                                            selected
                                                        @endif>History</option>
                                                        <option @if ($book->category==="Arts & Music")
                                                            selected
                                                        @endif>Horror</option>
                                                        <option @if ($book->category==="Kids")
                                                            selected
                                                        @endif>Kids</option>
                                                        <option @if ($book->category==="Mysteries")
                                                            selected
                                                        @endif>Mysteries</option>
                                                        <option @if ($book->category==="Romance")
                                                            selected
                                                        @endif>Romance</option>
                                                        <option @if ($book->category==="Sci-Fi & Fantasy")
                                                            selected
                                                        @endif>Sci-Fi & Fantasy</option>
                                                        <option @if ($book->category==="Science")
                                                            selected
                                                        @endif>Science</option>
                                                        <option @if ($book->category==="Sports")
                                                            selected
                                                        @endif>Sports</option>
                                                        <option @if ($book->category==="True Crime")
                                                            selected
                                                        @endif>True Crime</option>
                                                        <option @if ($book->category==="Others")
                                                            selected
                                                        @endif>Others</option>
                                                    </select>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select id="select" class="custom-select"  name="rating"   style="border-radius:10px; height:50px; ">
                                                        <option selected="true" disabled="disabled" >Rating</option>
                                                        @for ($i = 1; $i < 6; $i++)
                                                        <option @if ($book->rating === $i)
                                                            selected
                                                        @endif  value={{$i}} style="color: #F0C808;">
                                                         @if ($i>=1)
                                                         &#xf005;
                                                         @endif &nbsp;
                                                         @if ($i>=2)
                                                         &#xf005;
                                                         @endif &nbsp;
                                                         @if ($i>=3)
                                                         &#xf005;
                                                         @endif &nbsp;
                                                         @if ($i>=4)
                                                         &#xf005;
                                                         @endif &nbsp;
                                                         @if ($i>=5)
                                                         &#xf005;
                                                         @endif
                                                 
                                                         @endfor
                                                
                                                    </select>
                                                
                                                 </div>
                                           </div>
                                          </div>  
                                          <div class="row">
                                                <div class="col">
                                                    <textarea rows="8" class=" py-4 form-control" name="description" placeholder="Description..." style=" 
                                                    border:none;
                                                    background: #e9f4ff;
                                                    border-radius: 12px;
                                                    outline:none;
                                                    padding:15px; 
                                                    resize: none;">{{$book->description}}</textarea>
                                                  </div>
                                            </div>
                                                <div class="row mt-3">
                                                  <div class="col">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="cover"  >
                                                        <label class="custom-file-label" for="customFile">Choose image</label>
        
                                                      </div>
                                                  </div>
                                                </div>
                                   
                                        
                                           
                                          
                             
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
                 {{--  --}}
    </div>
    <!--
    <script>
 function str(){
    var x=$('#gettime').text()
            var date0=new Date().getTime();
            var date2=new Date(x).getTime()
            var distance=date0-date2-3600000;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        var newcontent=  days + "d " + hours + "h "
        + minutes + "m " + seconds + "s "; 
    $('#up').html(newcontent);
        $('#demo').html(newcontent);
 }
 setInterval(str, 1000);    
          
  
          
 
        $('#play').on('submit',function(e){
            e.preventDefault();
            let book_id = $('#book_id').text();
            let timeid = $('#idtime').text();
           
    $.ajax({ 
        type:"post",
        url:"/read/"+book_id, 
        data: $('#play').serialize(),
        success: function(response){   
            console.log(response)
              
        setInterval(
        function () {
            var date0=new Date().getTime();
            var date2=new Date(x).getTime()
            var distance=date0-date2-3600000;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        var newcontent=  days + "d " + hours + "h "
        + minutes + "m " + seconds + "s "; 
    $('#up').html(newcontent);
        $('#demo').html(newcontent);
        }, 1000);  

        },
        error: function(error){
          
            console.log(error)
        }
    });
});


/*
 // var counte={{strtotime("now")+3600 }} 
var counter=parseInt(counte)
var auto_refresh = setInterval(
function () {
    var newcontent= counter ;
    $('#demo').html(newcontent);
    counter++
}, 1000); 
        //ajax
        // Set the date we're counting down to
      /*
        var countDownDate = new Date(time).getTime();
        
        // Update the count down every 1 second
        //
        var x;
          
        function myVar() {
        
        // Get today's date and time
        var now = new Date().getTime();
          
        // Find the distance between now and the count down date
        var distance = -countDownDate + now;
          
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
          
        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "EXPIRED";
        }
        }
        function start(){
          
          x = setInterval(myVar, 1000);
          
        }
        
        function stopColor() {
          countDownDate=new Date().getTime()
        clearInterval(x);
        
        }*/
        </script> -->
        <script>

            $(document).ready(function() {
              $("#checkbox-img").click(function() {
                  if ($("#chekcbox-input").val()=="true") {
                      $("#checkbox-img").attr("src","/images/icons/read_false_icon.svg");
                     
                     $("#chekcbox-input").val('false')
                  } else {
                      $("#checkbox-img").attr("src","/images/icons/read_true_icon.svg");
                      $("#chekcbox-input").val('true')
                  }
              });
          });

          // read book
          $('#read').on('submit',function(e){
            e.preventDefault();
 
            let book_id = $('#book_id').text();
 
        $.ajax({
        
        type:"post",
        url:"/book/read/"+book_id,
         
        data: $('#read').serialize(),
        success: function(response){   
            console.log(response)

        },
        error: function(error){
          
            console.log(error)
        }
    });
})
      </script>
@endsection