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
                                    <div class="col-md-12">
                                     <div class="card" style="border-radius:30px; border:0;">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control py-4 py-4"  style="border-radius:10px; background: #E4F1FF;" placeholder="Title">
                                          </div>
                                       </div>
                                    </div>
                                 </div>  

                                 <div class="col-md-4">
                                    <div class="col-md-12">
                                     <div class="card" style="width: 18rem;border-radius:10px; border:0;">
                                        <div class="form-group">
                                            <select class="form-control py-4 py-4"  name="type" placeholder="Password" style="border-radius:10px; background: #E4F1FF;">
                                                <option>Commedy</option>
                                                <option>Action</option>
                                            </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>  --}}

                                 {{-- <div class="col-md-4">
                                    <div class="col-md-12">
                                     <div class="card" style="width: 18rem;border-radius:10px; border:0;">
                                        <div class="form-group">
                                            <select class="form-control py-4 py-4" title="jj" name="book" placeholder="Password" style="border-radius:10px; background: #E4F1FF;">
                                                <option>Commedy</option>
                                                <option>Action</option>
                                            </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div> --}}
                                    {{-- <div class="col-md-6" style="width: 600px">
                                        <div class="col-md-6">
                                     <div class="card" style="width: 18rem;border-radius:10px; border:0;margin-top:10px;">
                                        <div >
                                            
                                            <textarea id="F" class=" py-4 form-control" name="body" placeholder="Write your notes.." style="position: absolute;
                                            width: 990px;
                                            height: 300px;
                                            border:none;
                                            background: #E4F1FF;
                                            border-radius: 12px;
                                            outline:none;
                                            padding:15px; 
                                            resize: none; "  ></textarea>
                                          </div>
                                       </div>
                                        
                                    </div>
                                 </div>
                            <div style="margin-top: 350px;margin-left:34%"><button type="submit"  name="create" class="btn  btn-lg btn-block btn-primary"
                                style="background-color:#1F1A6B;font-weight:600;font-size:22px; border-radius:12px;   "
                                onclick="javascript:;" >Create</button></div>
                              </div>
                        </form>
                        
                             
                    </div>
  
       
                </div>
  
            </div>
                        
        </div>
    @endsection  

  