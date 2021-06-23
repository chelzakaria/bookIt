@extends('layouts.app')
    @section('content') 
    
        <div class="container-fluid">
            <div class="row">
                @include('notes.layouts.sidebar')
                <style>
                          ::placeholder, label{
                            font-weight: 600;
                            font-size: 16px;
                            line-height: 20px;
                          }
                    </style>
                <div class="col">
                    <div class="container py-3">
                        <div class="d-flex flex-row">
                            <p style="font-weight:700; font-size:30px;">
                                Create new task
                            </p>  
                            <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                                <img src="images/about_img.svg" alt="" style="max-width:100%;
                                max-height:100%; ">
                            </div>
                        </div>
                    
                        <hr style="border-top: 1px solid #00000023;">
                        <form action="{{route('tasks')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="task_name" placeholder="Task name" style="border-radius:10px; height:50px;"  autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <select class="custom-select"  name="status"   style="border-radius:10px; height:50px; ">
                                                <option selected="true" disabled="disabled" >Status</option>
                                                <option>not started</option>
                                                <option>in progress</option>
                                                <option>done</option>
                                             </select>
                                         
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                           <select class="custom-select"  name="importance"   style="border-radius:10px; height:50px; ">
                                               <option selected="true" disabled="disabled" >Priority</option>
                                                <option>high</option>
                                               <option>medium</option>
                                               <option>low</option>
                                                
                                           </select>
                                        
                                         </div>
                                   </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                       <select class="custom-select"  name="book"   style="border-radius:10px; height:50px; ">
                                           <option selected="true" disabled="disabled" >Select a book</option>
                                           @foreach ($books as $book)
                                           <option>{{$book->title}}</option>  
                                         @endforeach
                                           
                                            
                                       </select>
                                    
                                     </div>
                               </div>
                                       
                                  </div>  
                                  <div class="row">

                                        <div class="col">
                                            <textarea rows="6" class=" py-4 form-control" name="description" placeholder="Task description..." style=" 
                                            border:none;
                                            background: #e9f4ff;
                                            border-radius: 12px;
                                            outline:none;
                                            padding:15px; 
                                            resize: none;"  ></textarea>
                                          </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="end_date" placeholder="Due date" onfocus="(this.type='date')" style="border-radius:10px; height:50px;" >
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group my-2 ml-3">

                                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" name="notification" >
                                                <label for="">&nbsp; Alert</label>

                                            </div>
                                        </div>
                                    </div>
                                         
                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="button" class="btn " style="background-color: #D4E5F9; font-weight:700;"> <a href=" {{route('books')}}" style="text-decoration: none; color:#000;">Cancel</a> </button>
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

  