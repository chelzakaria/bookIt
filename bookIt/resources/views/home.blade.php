<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!-- Styles -->
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <style>
             body{
                font-family: 'Montserrat', sans-serif;
             }
         </style>
     
       
    </head>
    <body>
 
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5" style="font-family: 'Montserrat', sans-serif; font-weight:500; color:black;">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><img src="/images/logos/logo_top.svg" style=" width:90px; height:auto;" alt=""></a>
                    </li>
                   
                </ul>
                <ul class="nav navbar-nav mx-auto ">
                    <li class="nav-item text-dark"><a class="nav-link border-bottom border-primary  " href="#">Home</a></li>
                    <li class="nav-item  "><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item  "><a class="nav-link" href="#">Pricing</a></li>

                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sign Up</a>
                    </li>
                   
                </ul>
            </div>
        </nav>
        <div class="container">
            <img src="/images/notes_home_page.svg" class="float-right mt-4" alt="..." style="width:42%; height:auto;">
            <div class=" d-inline float-left mt-5" style="width: 40%">
               <p class="mb-4" style="color: #1F1A6B; font-weight:800; font-size:50px; line-height: normal;">Don’t worry. <br>
                We are here for
                every solution.</p>  
                <p class="mb-4" style="color: #6F6D6D; font-weight:300; font-size:20px; line-height: 1.6;">
                    begin now controlling your ideas and <br> thoughts. We help you efficiently <br> manage your notes.
                </p>
                <button type="button" class="btn btn-primary btn-lg" style="background-color: #1F1A6B; font-weight:700; ">Get Started </button>
            </div>
        </div>
      

    </body>
</html>
