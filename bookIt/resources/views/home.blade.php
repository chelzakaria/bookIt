{{-- @extends('layouts.app')
    @section('content') --}}
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body{
               font-family: 'Montserrat', sans-serif;
               min-width: 100vh;
            }
        </style>
    </head>
    <body>
        @include('layouts.nav')
       
        <div class="container mb-5">
            <div class="row">
                <div class="col mt-5">
                    <div class=" d-inline mt-5 mb-3" style="">
                       <p class="mb-4" style="color: #1F1A6B; font-weight:800; font-size:50px; line-height: normal;">Don’t worry. <br>
                        We are here for
                        every solution.</p>  
                        <p class="mb-4" style="color: #6F6D6D; font-weight:300; font-size:20px; line-height: 1.6;">
                            begin now controlling your ideas and <br> thoughts. We help you efficiently <br> manage your notes.
                        </p>
                        <button type="button" class="btn btn-primary btn-lg" style="background-color: #1F1A6B; font-weight:700; ">Get Started </button>
                        
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
        <div style="background: #000; width:100%;" class="pt-4 p-3">
            <div class="container ">
                <div class="row">
                   <div class="col ">
                    <nav class="nav flex-column " style="font-weight: 300;">
                        <span class="nav-link text-white " style="font-weight: 600;" href="#">Company</span>
                        <a class="nav-link text-white" href="#">Home</a>
                        <a class="nav-link text-white" href="#">About</a>
                        <a class="nav-link text-white" href="#">Pricing</a>
                        <a class="nav-link text-white" href="#">Contact</a>
                       
                      </nav>
                   </div>
                   <div class="col ">
                    <nav class="nav flex-column " style="font-weight: 300;">
                        <span class="nav-link text-white " style="font-weight: 600;" href="#">Join Us</span>
                        <a class="nav-link text-white" href="#">Sign In</a>
                        <a class="nav-link text-white" href="#">Sign Up</a>
                   
                       
                      </nav>
                   </div>
                   <div class="col ">
                    <nav class="nav flex-column " style="font-weight: 300;">
                        <span class="nav-link text-white " style="font-weight: 600;" href="#">Follow Us</span>
                        <a class="nav-link text-white" href="#">Instagram</a>
                        <a class="nav-link text-white" href="#">Facebook</a>
                        <a class="nav-link text-white" href="#">Twitter</a>
                        <a class="nav-link text-white" href="#">Discord</a>
                       
                      </nav>
                   </div>
                   <div class="col ">
                    <nav class="nav flex-column " style="font-weight: 300;">
                        <a href="#" class="mx-auto mt-5 mb-3" > <img src="/images/logos/logo_bottom.svg" alt="" style=" width:100px; height:auto;"></a>
                        <span class="    text-white">&copy; 2021 Bookit. All rights reserved.</span>
                       
                      </nav>
                   </div>
                
                    
                </div>
                 
        </div>
 
       
    </body>
    </html>
     

    {{-- @endsection --}}
 