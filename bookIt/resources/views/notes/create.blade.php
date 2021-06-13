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
                                Create Note
                            </p>  
                            <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                                <img src="images/about_img.svg" alt="" style="max-width:100%;
                                max-height:100%; ">
                            </div>
                        </div>
                    
                        <hr style="border-top: 1px solid #00000023;">
                        <form action="{{route('notes')}}" method="post">
                            @csrf
                            <div class="row">
                                 
                                 <div class="col-md-4">
                                         <div class="form-group">
                                            <select class="custom-select"  name="type"   style="border-radius:10px; height:50px; ">
                                                <option selected="true" disabled="disabled" >Select a category</option>
                                                <option >Uncategorized</option>
                                                <option>Quote</option>
                                                <option>Idea</option>
                                                <option>Thought</option>
                                            </select>
                                         
                                          </div>
                                       </div>
                                       
                                  </div>  
                                  <div class="row">

                                        <div class="col">
                                            <textarea rows="12" class=" py-4 form-control" name="body" placeholder="Write your notes.." style=" 
                                            border:none;
                                            background: #E4F1FF;
                                            border-radius: 12px;
                                            outline:none;
                                            padding:15px; 
                                            resize: none;"  ></textarea>
                                          </div>
                                    </div>
                                         <div class="row mt-3">
                                            <div class="col">
                                                <button type="submit"  name="create" class="btn  btn-lg btn-primary float-right"
                                                style="background-color:#1F1A6B;font-weight:600;font-size:22px; border-radius:12px;" >Create</button> 
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

  