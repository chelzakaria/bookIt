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
                               
                         
                                    <p>No notes found</p>
                             
                                  
                              </div>

                    </div>
  
       
                </div>
  
            </div>
                        
        </div>
    @endsection