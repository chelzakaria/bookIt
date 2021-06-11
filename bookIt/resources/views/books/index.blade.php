@extends('layouts.app')
@section('content') 
    <div class="container-fluid">
        <div class="row">
            @include('notes.layouts.sidebar')
            <div class="col">
                <div class="container py-3">
                    <div class="d-flex flex-row">
                        <p style="font-weight:700; font-size:30px;">
                            Notes
                        </p>  
                        <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                            <img src="images/about_img.svg" alt="" style="max-width:100%;
                            max-height:100%; ">
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                         <form action="" >
                            <div class="form-group">
                                <input type="email" class="form-control rounded" placeholder="Search notes" style="padding-left: 25px; " >
                            </div>
                         </form>
                        <div class="ml-auto mr-0">
                            <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('createnote')}}" style="text-decoration: none; color:#fff;">Create new note</a> </button>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #00000023;">
                    
                        <div class="row">
                            {{-- @if ($books->count())
                            @foreach ($books as $book)
                            <div class="col-md-3">
                                <div class="col-md-12">
                                    <div class="card">
                                        <img class="card-img-top" src="..." alt=" ">
                                        <div class="card-body pb-0">
                                          <h5 class="card-title"> {{$book->title}} </h5>
                                           <p class="text-muted">{{$book->author}}</p>
                                           <p class="text-center">* * * * *</p>
                                         </div>
                                      </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No books found</p>
                            @endif
                            --}}
                             
                              
                          </div>

                </div>

   
            </div>

        </div>
                    
    </div>
@endsection  
