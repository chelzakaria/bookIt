@extends('layouts.app')
@section('content') 
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
                 
                    <hr style="border-top: 1px solid #00000023;">
                    <div class="card text-center" style="width: 18rem;">
                        <img class="card-img-top " src="/storage/cover_images/{{$book->cover}}" alt="Card image cap"  >

                        <div class="card-body">
                          <h5 class="card-title">{{$book->title}}</h5>
                          <p class="card-text">Description</p>
                         </div>
                        <div class="card-footer text-muted">
                            {{$book->author}}
                                               </div>
                      </div>
                           <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;"> <a {{--href="/books/{{$book->id}}/edit" --}} style="text-decoration: none; color:#fff;">Edit book</a> </button>

                           {{-- <form action="{{route('book.destroy',  $book->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn " style="background-color: #af6f6f; font-weight:700;"> delete book  </button>
                       
                            </form> --}}
                           

                </div>

   
            </div>

        </div>
                    
    </div>
@endsection