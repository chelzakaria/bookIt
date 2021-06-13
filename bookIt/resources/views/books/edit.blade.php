
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
                                Edit Book
                            </p>  
                            <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                                <img src="images/about_img.svg" alt="" style="max-width:100%;
                                max-height:100%; ">
                            </div>
                        </div>
                    
                        <hr style="border-top: 1px solid #00000023;">
                        <form action="{{route('books.update', $book->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$book->title}}" name="title" placeholder="Title" style="border-radius:10px; height:50px;"  autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="author" value="{{$book->author}}" placeholder="Author" style="border-radius:10px; height:50px;"  autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="num_page" value="{{$book->num_page}}" placeholder="Number of pages" style="border-radius:10px; height:50px;" autocomplete="off" min="1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <select class="custom-select"  name="category"   style="border-radius:10px; height:50px; ">
                                                <option selected="true" disabled="disabled" >Select a category</option>
                                                <option>Uncategorized</option>
                                                <option>Comedy</option>
                                                <option>Science</option>
                                                <option>Fiction</option>
                                            </select>
                                         
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                           <select class="custom-select"  name="rating"   style="border-radius:10px; height:50px; ">
                                               <option selected="true" disabled="disabled" >Rating</option>
                                                <option>1</option>
                                               <option>2</option>
                                               <option>3</option>
                                               <option>4</option>
                                               <option>5</option>
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
                                            resize: none;"  >{{$book->description}}</textarea>
                                          </div>
                                    </div>
                                        
                                        <div class="row mt-3">
                                          <div class="col">
                                            <div class="custom-file" >
                                                <input type="file" class="custom-file-input" id="customFile" name="cover" >
                                                <label class="custom-file-label" for="customFile" >Choose cover image</label>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('books')}}" style="text-decoration: none; color:#fff;">Cancel</a> </button>
                                            </div>
                                            <div class="col">
                                                <button type="submit"  name="create" class="btn btn-primary float-right"
                                                style="background-color:#1F1A6B;font-weight:700;" >Add</button> 
                                            </div>
                                        </div>
                                 </form>
                                </div>
                             
                       
                              
                            
                              </div>
                      
                        
                             
                    </div>
                   
                
  
       
                </div>
  
            </div>
                        
        </div>
    @endsection  

  