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
                           <button type="button" class="btn btn-primary" style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('notes')}}" style="text-decoration: none; color:#fff;">Back</a> </button>
                       </div>
                   </div>
                 
                    <hr style="border-top: 1px solid #00000023;">
                           <div class="jumbotron  pt-4 pb-2" >
                            <div class="row" style="min-height: 95%">
                            <div class="col">
                                {!! html_entity_decode($note->body) !!}

                            </div>
                             </div>
                             @if ($images->count())

                    <hr style="border-top: 1px solid #00000023;">

                             <div class="row pr-3">
                                    
                                @foreach ($images as $image)
                                <div class="col-2">
                                    <div class=" mt-3 text-center " style="border-radius:10px; height:150px; width:150px;  
                                    ">
                                    <a  data-toggle="modal" data-target="#showImage{{$image->id}}">
                                    <img src="/storage/notes_images/{{$image->image}}" style="height:150px; width:150px;border-radius:2px; " alt="">
                                </a>
                                     </div>
                                 </div>
                           
                               
                                 
                                 
                                 
                                 
                                 
                            
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
                            <div class="d-flex justify-content-end mt-3">
                                {!!$images->links()!!}
                             </div>
                            </div>
                            @endif
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