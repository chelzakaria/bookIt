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
     
       
    </head>
    <body>
 
        <nav class="navbar navbar-expand-lg navbar-light bg-light " style="font-family: 'Montserrat', sans-serif; font-weight:400; color:black;">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><img src="https://images.unsplash.com/photo-1601933973783-43cf8a7d4c5f?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" style="width:50px; height:auto;" alt=""></a>
                    </li>
                   
                </ul>
                <ul class="nav navbar-nav mx-auto ">
                    <li class="nav-item text-dark "><a class="nav-link" href="#">Home</a></li>
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
      

    </body>
</html>
