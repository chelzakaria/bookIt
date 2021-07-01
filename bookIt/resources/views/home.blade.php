@extends('layouts.app')
@section('content') 

  
@include('layouts.nav')
  
    <div class="container mb-5">
        @if(session('message'))
        <div class="col text-center   mr-auto mb-3">
                <div class="jumbotron py-2 mb-2 bg-success text-white   mx-auto">
                    {{ session('message') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col mt-5">
                <div class=" d-inline mt-5 mb-3" style="">
                   <p class="mb-4" style="color: #1F1A6B; font-weight:800; font-size:50px; line-height: normal;">Don’t worry. <br>
                    We are here for
                    every solution.</p>  
                    <p class="mb-4" style="color: #6F6D6D; font-weight:300; font-size:20px; line-height: 1.6;">
                        begin now controlling your ideas and <br> thoughts. We help you efficiently <br> manage your notes.
                    </p>
                    <button type="button" class="btn btn-primary btn-lg" style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('register')}} " style="text-decoration: none; color:#fff;">Get Started</a> </button>
                    
                </div>
            </div>
                    <div class="col">
                        <img src="/images/notes_home_page.svg" class=" mt-4  " alt="..." style="width:90%; height:auto;">
                    </div>
            
        </div>
       
    </div>
    <div style="background: #BDDDF8; width:100%;" class="pt-4 pl-5 mb-5">
        <div class="container ">
                <div class="row mb-3 justify-content-md-center">
                    <div class="col col-4">
                        <img src="/images/icons/note_icon.svg" alt="">
                    </div>
                    <div class="col col-4">
                        <img src="/images/icons/image_icon.svg" alt="">
                        
                    </div>
                    <div class="col  col-3">
                        <img src="/images/icons/task_icon.svg" alt="">

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col col-4">
                        <p style="color: #6F6D6D; font-weight:300; font-size:15px; line-height: 1.6;">
                            Take notes of every page <br> of your book.
                        </p>
                    </div>
                    <div class="col col-4">
                        <p style="color: #6F6D6D; font-weight:300; font-size:15px; line-height: 1.6;">
                            Take notes of every page <br> of your book.
                        </p>
                    </div>
                    <div class="col col-3  ">
                        <p style="color: #6F6D6D; font-weight:300; font-size:15px; line-height: 1.6;">
                            Take notes of every page <br> of your book.
                        </p>
                    </div>
                </div>
            
        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col">
                <img src="/images/tasks_home_page.svg" class=" mt-4  " alt="..." style="width:90%; height:auto;">
                    </div>
            <div class="col mt-5">
            <div class=" d-inline mt-5 mb-3" style="">
                   <p class="mb-4" style="color: #1F1A6B; font-weight:800; font-size:50px; line-height: normal;">Save more time <br>
                    by using our <br>
                    website.</p>  
                    <p class="mb-4" style="color: #6F6D6D; font-weight:300; font-size:20px; line-height: 1.6;">
                        Take your notes or write down your <br> thoughts about your book while <br> reading it. You can even set your goals <br> of reading or completing your books as <br> soon as possible!
                    </p>
                    
                    
            </div>
            </div>
       
            
        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col">
                <p class="mb-4" style="color: #1F1A6B; font-weight:800; font-size:50px; line-height: normal;"><span style="color: #000; font-weight:400;" >Start now <br>
                    your </span> free plan.</p>  
            </div>
        </div>
        <div class="row">
            <div class="col-4 mt-5">
                    
                    <div class="card" style="width: 250px;background-color:#F0F5FB;">
                         
                        <div class="card-body"  >
                          <span class="card-title" style="font-weight: 700; font-size:30px;">Free</span>
                          <span class="card-title float-right" style="font-weight: 600; font-size:25px;">0$</span>

                          <div class="card-text"><p style="font-weight: 500;">Plan includes :</p>
                        <p style="font-weight:300;">Up to 50 notes</p>
                        <p style="font-weight:300;">Files size limited to 1GB</p>
                        <p style="font-weight:300;">Add up to 100 books</p>
                        <p>&nbsp;</p>
                        </div>
                         <div class="text-center">
                            <button type="button"   class="btn btn-lg mt-3 mb-1" style="background-color: #94A9E5; font-weight:700; color:#FFF;"><a href=" {{route('register')}} " style="text-decoration: none; color:#fff;">Get Started</a> </button>  </div>                          
                        <a href=" {{route('pricing')}} "><p class="mb-0" style="font-weight:600;color:#000; font-size:10px; text-align:center;">View all the features</p></a>
                        </div>

                
                    </div>
        
            </div> <div class="col-4 mt-5">
                    
                <div class="card" style="width: 250px;background-color:#94aae5a1;">
                     
                    <div class="card-body"  >
                        <span class="card-title" style="font-weight: 700; font-size:30px;">Free</span>
                        <span class="card-title float-right" style="font-weight: 600; font-size:25px;">0$</span>

                        <div class="card-text"><p style="font-weight: 500;">All of free plus :</p>
                        <p style="font-weight:300;">Unlimited notes</p>
                        <p style="font-weight:300;">Free books </p>
                        <p style="font-weight:300;">Up to 100GB of files </p>
                        <p style="font-weight:300;">Unlimited books acces</p>
                    
                        </div>
                        <div class="text-center"  >
                            
                            <button type="button"  class="btn btn-lg mt-3 mb-1" style="background-color: #F0F5FB; font-weight:700; color:#000;"><a href=" {{route('register')}} " style="text-decoration: none; color:#000;">Get Started</a> </button>  </div>  
                            
                            
                            <a href=" {{route('pricing')}} "><p class="mb-0" style="font-weight:600;color:#000; font-size:10px; text-align:center;">View all the features</p></a>
                    </div>

            
                </div>
    
            </div>
        </div>
       
    </div>
    <div class="container " style="position: relative; bottom:400px; margin-bottom:-350px; z-index:-10;">
            <div class="row">
                <div class="col-6" >
                    
                </div>
                <div class="col-6 ">
                    <img src="/images/payment_home_page.svg" class=" mt-4  " alt="..." style="width:90%; height:auto;">
                </div>
                
            </div>
       
    </div>
    @include('layouts.footer')

 @endsection
 
 
