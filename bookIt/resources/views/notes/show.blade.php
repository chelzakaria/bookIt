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
                        
                       <div>
                           <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('notes')}}" style="text-decoration: none; color:#fff;">Back</a> </button>
                       </div>
                   </div>
                 
                    <hr style="border-top: 1px solid #00000023;">
                           <div class="jumbotron  pt-4 pb-2" >
                            <div class="row" style="min-height: 95%">
                            <div class="col">
                                {!! html_entity_decode($note->body) !!}

                            </div>
                             </div>
                             <div class="row mt-2">
                                <div class="col mb-0">
                                    <hr style="border-top: 1px solid #00000023;" class="mb-2 mt-4">
                                    <button type="button" class="btn d-inline"> <a href="/notes/{{$note->id}}/edit" style="text-decoration: none; color:#fff;"><img src="/images/icons/edit_icon.svg" alt="" style="width: 80%; height:auto;"></a> </button>

                                    <form class="d-inline" action="{{route('notes.destroy',  $note->id)}}" method="post">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn"> <img src="/images/icons/delete_icon.svg" alt="" style="width: 80%; height:auto;">  </button>
                                
                                     </form>
    
                                </div>
                                 </div>
                           </div>
                         
                           

                </div>

   
            </div>

        </div>
                    
    </div>
@endsection