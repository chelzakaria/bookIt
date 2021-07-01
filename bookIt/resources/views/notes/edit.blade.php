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
                        <form action="{{route('notes.update', $note->id)}}" method="post">
                            @csrf
                            <div class="row">
                                 
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
                                         </div>
                                       

                                        @endforeach
                                         
                                         
                                         
                                         
                                         
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        {!!$images->links()!!}
                                     </div>
                                    @endif
                                         <div class="row mt-3"> 
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

  