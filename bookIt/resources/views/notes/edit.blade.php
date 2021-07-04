@extends('layouts.app')
    @section('content') 
    
        <div class="container-fluid">
            <div class="row">
                @include('notes.layouts.sidebar')
                <style>
                          ::placeholder{
                            font-weight: 600;
                            font-size: 16px;
                            line-height: 20px;
                          }
                    </style>
                <div class="col">
                    <div class="container py-3">
                        <div class="d-flex flex-row">
                            <p style="font-weight:700; font-size:30px;">
                                Edit Note
                            </p>  
                            <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                                <img src="images/about_img.svg" alt="" style="max-width:100%;
                                max-height:100%; ">
                            </div>
                        </div>
                    
                        <hr style="border-top: 1px solid #00000023;">
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
                                            {{-- <textarea rows="12" class=" py-4 form-control" name="body" placeholder="Write your notes.." style=" 
                                            border:none;
                                            background: #E4F1FF;
                                            border-radius: 12px;
                                            outline:none;
                                            padding:15px; 
                                            resize: none;"  >{!! $note->body !!}</textarea> --}}
                                            <textarea class="form-control" id="body" placeholder="Enter the Description" name="body">
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
                                            <div class=" mt-5 text-center " style="border-radius:10px; height:110px; width:175px; background:#D4E1F1; border:1px dashed #8A929D;     border-width:2px;  
                                            ">
                                                <label for="customFile"  class="mt-4">
                                                    <img  src={{ URL::asset("../images/icons/upload_image_icon.svg")}} alt="" style="width:35%;
                                                    height:auto; cursor: pointer;">
                                                    <p>Tap to add images</p>
                                                     <input type="file" id="customFile" name="note_images[]" style="position: absolute;z-index:-100; bottom:50px; left:82px;font-weight:500;" multiple>
                                                     </label>
                                            </div>
                                          
                                               
                                         </div>
                                         
                                         
                                  
                                    </div>
                                    @if ($images->count())

                                    <div class="d-flex justify-content-end mt-3">
                                        {!!$images->links()!!}
                                     </div>
                                    @endif
                                         <div class="row mt-3 ml-1"> 
                                            <div class="col">
                                                <button type="button" class="btn " style="background-color: #D4E5F9; font-weight:700;"> <a href=" {{route('notes')}}" style="text-decoration: none; color:#000;">Cancel</a> </button>
                                            </div>
                                            <div class="col">
                                                <button type="submit"  name="create" class="btn  btn-primary float-right" 
                                                style="background-color: #1F1A6B; font-weight:700;" >Edit</button> 
                                            </div>
                                        </div>
                                 </form>
                                 </div>
                              </div>
                      
                        
                             
                    </div>
                   
                
  
       
                </div>
            </div>  
        </div>
        <script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
            <script>
            CKEDITOR.replace( 'body' );
            </script>
    @endsection  

  