<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Book it</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
     
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AUsOaNEFkQloBqLBBzeRXaSvIIm-E-zuUG-7HzkwHvL_OctLkmA_2vFDI3B-bCVxMMlBAp8zKuuMWnNy"></script>
 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" media="screen" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		{{-- <link rel="stylesheet" media="screen" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.12.1/css/all.min.css"> --}}
		<link rel="stylesheet" media="screen" href="https://cdn.jsdelivr.net/gh/adamculpepper/toggle-switchy@latest/toggle-switchy.css">
		<link rel="stylesheet" media="screen" href="https://cdn.jsdelivr.net/gh/adamculpepper/toggle-switchy@latest/docs/assets/css/custom.css">
    <script>
      $(document).ready(function(){
        // $("#small").slideToggle();
        $("#large_button").click(function(){
          
          $("#large").hide();
          $("#small").show();

        });
        $("#small_button").click(function(){
          
          $("#small").hide();
          $("#large").show();

        });
      });
      </script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
     .btn:focus {
  box-shadow: none;
}
      .ck-editor__editable_inline {
    min-height: 300px !important;
}
        body{
           font-family: 'Montserrat', sans-serif;
           min-width: 100vh;
        }
         
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #3E63F6;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #3E63F6;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #3E63F6;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
        ::placeholder{
             font-weight: 600;
             font-size: 16px;
             line-height: 20px;
              
              
                }
                .form-control   {
                 font-family: 'Montserrat', sans-serif;
                 font-weight: 700; 
                  border-radius:10px;
                    
                 }

    </style>
     <link rel = "icon" href ="/images/icons/logo_icon.svg" type = "image/x-icon">
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>

    
</head>
<body>
    <div id="app">
            @yield('content')
            
    </div>
   <script>
       document.addEventListener('DOMContentLoaded', function () {
  var checkbox = document.querySelector('input[type="checkbox"]');

  checkbox.addEventListener('change', function () {
    if (checkbox.checked) {
      // do this
      document.getElementById('p').innerHTML="50$"
    } else {
      document.getElementById('p').innerHTML="10$"
    }
  });
});

       </script>
       <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
      
</body>
</html>
