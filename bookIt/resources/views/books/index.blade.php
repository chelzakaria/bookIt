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
                            Books
                        </p>  
                        <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                            <img src="images/about_img.svg" alt="" style="max-width:100%;
                            max-height:100%; ">
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
