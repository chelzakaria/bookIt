@extends('layouts.app')
@section('content') 
<style>
    .checked {
  color: orange;

}

.wrapper{
 
  
}
.wrapper .search-input{
  background: #fff;
  width: 100%;
  border-radius: 5px;
  position: relative;
 }
.search-input input{
  height: 50px;
  width: 100%;
  outline: none;
  border: 1px solid #ced4da;
  border-radius: 5px;
  padding: 0 60px 0 20px;
  font-size: 18px;
 }
.search-input.active input{
  border-radius: 5px 5px 0 0;
}
.search-input .autocom-box{
  padding: 0;
  opacity: 0;
  border: 1px solid #ced4da;
  pointer-events: none;
  max-height: 280px;
  overflow-y: auto;
}
.search-input.active .autocom-box{
  padding: 10px 8px;
  opacity: 1;
  pointer-events: auto;
}
.autocom-box li{
  list-style: none;
  padding: 8px 12px;
  display: none;
  width: 100%;
  cursor: default;
  border-radius: 3px;
}
.search-input.active .autocom-box li{
  display: block;
}
.autocom-box li:hover{
  background: #efefef;
}
.search-input .icon{
  position: absolute;
  right: 0px;
  top: 0px;
  height: 50px;
  width: 50px;
  text-align: center;
  line-height: 55px;
  font-size: 20px;
  color: #1F1A6B;
  cursor: pointer;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
                    <div class="d-flex flex-row">
                        <form action="{{route('books.search')}}" method="POST" role="search" id="search_form">
                            @csrf
                             <div class="wrapper">
                                 <div class="search-input">
                                <a href="" target="_blank" hidden></a>
                                <input class="form-control" type="text" placeholder="Search for books..." name="title" autocomplete="off">
                                <div class="autocom-box ">
                                    
                                </div>
                                <div class="icon"><i class="fas fa-search"></i></div>
                              </div>
                            </div>
                            
                         </form>
                         @if ($search==="true")
                             
                        
                         <div class="ml-3 mt-2">
                            <button type="button" class="btn btn-info" style="background-color: #17a2b8; font-weight:700;"> <a href=" {{route('books')}}" style="text-decoration: none; color:#fff;">Clear</a> </button>
                        </div>
                        @endif
                        <div class="ml-auto mr-0">
                            <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('createbook')}}" style="text-decoration: none; color:#fff;">Add new book</a> </button>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #00000023;">
                    
                        <div class="row">
                            @if ($books->count())
                            @foreach ($books as $book)
                            <div class="col-md-3 mt-4">
                                <div class="col-md-12">
                                    <a href="/books/{{$book->id}}">
                                    <div class="card align-self-stretch ml-auto mr-auto" style="width: 180px; height:230px; border-radius:15px" >
                                        <img class="card-img-top" style="border-radius:15px; width:100%;height:100%" src="/storage/cover_images/{{$book->cover}}" >
                                  
                                      </div>
                                    </a>
                                     <div class="mx-5 mt-2 " style="text-align: center"><h6 class="font-weight-bold">{{$book->title}}</h6>
                                    <div class="mx-1 text-muted">{{$book->author}}</div>
                                    <p class="text-center"><span class="fa fa-star @if($book->rating>=1) checked @endif"></span>
                                        <span class="fa fa-star @if($book->rating>=2) checked @endif "></span>
                                        <span class="fa fa-star @if($book->rating>=3) checked @endif "></span>
                                        <span class="fa fa-star @if($book->rating>=4) checked @endif"></span>
                                        <span class="fa fa-star @if($book->rating>=5) checked @endif"></span></p>
                                    </div> 
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No books found</p>
                            @endif
                         
                             
                              
                          </div>

                </div>

   
            </div>

        </div>
                    
    </div>
    <script>
        let books = {!! json_encode($books) !!};
          
        let suggestions = [];
        for(var i=0; i<books.length; i++)
        {
            suggestions[i] = 
                    books[i].title
                    ;
        }
         
 
        const searchWrapper = document.querySelector(".search-input");
        const inputBox = searchWrapper.querySelector("input");
        const suggBox = searchWrapper.querySelector(".autocom-box");
        const icon = searchWrapper.querySelector(".icon");
        let linkTag = searchWrapper.querySelector("a");
        let webLink;
        // if user press any key and release
        inputBox.onkeyup = (e)=>{
             let userData = e.target.value; //user enetered data
            let emptyArray = [];
            if(userData){
                icon.onclick = ()=>{
                    var form = document.getElementById("search_form");
             
                    form.submit()
                }
                emptyArray = suggestions.filter((data)=>{
                    //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
                    console.log(data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase()));
                    return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
                });
                emptyArray = emptyArray.map((data)=>{
                    // passing return data inside li tag
                    return data = `<li>${data}</li>`;
                });
                searchWrapper.classList.add("active"); //show autocomplete box
                showSuggestions(emptyArray);
                let allList = suggBox.querySelectorAll("li");
               
                for (let i = 0; i < allList.length; i++) {
                    //adding onclick attribute in all li tag
                    allList[i].setAttribute("onclick", "select(this)");
                }
            }else{
                searchWrapper.classList.remove("active"); //hide autocomplete box
            }
        }
        function select(element){
            let selectData = element.textContent;
            inputBox.value = selectData;
            icon.onclick = ()=>{
                var form = document.getElementById("search_form");
             
             form.submit()
            }
            searchWrapper.classList.remove("active");
        }
        function showSuggestions(list){
            let listData;
            if(!list.length){
                userValue = inputBox.value;
                listData = `<li>${userValue}</li>`;
            }else{
            listData = list.join('');
            }
            suggBox.innerHTML = listData;
        }
        
    </script>
@endsection  
