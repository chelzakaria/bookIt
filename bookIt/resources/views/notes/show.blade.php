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
                 
                    <hr style="border-top: 1px solid #00000023;">
                           <div class="jumbotron bg-success" style="height: 60vh;">
                               {{ $note->body}}
                           </div>
                           <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('createnote')}}" style="text-decoration: none; color:#fff;">Edit note</a> </button>

                           <form action="{{route('notes.destroy',  $note->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn " style="background-color: #af6f6f; font-weight:700;"> delete note  </button>
                       
                            </form>
                           

                </div>

   
            </div>

        </div>
                    
    </div>
@endsection