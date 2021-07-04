@extends('layouts.app')
    @section('content') 
   
        @include('layouts.nav')
            <div class="container mb-5" >
                {{-- first section (image + text) --}}
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <p style="color: #1F1A6B; font-weight:800; font-size:50px; line-height: normal;">Pricing</p>
                        <p style="color: #6F6D6D; font-weight:300; font-size:20px; line-height: 1.6;">Build your own monthly pricing.</p>
                        <img class="mt-4" src="/images/pricing_image.svg" style="width: 40%; height:auto;" alt="">
                    </div>
                </div>
                {{-- second section (switch ) --}}

                <div class="row mb-5">
                    <div class="col-12 text-center">
                    <span class="mr-3 position-relative" style="color: #6F6D6D; font-weight:300;font-size:18px;line-height: 1.6; top:12%;">
                        Monthly
                    </span>
                      <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                      </label> 
                      <span class="ml-3 position-relative" style="color: #6F6D6D; font-weight:300;font-size:18px;line-height: 1.6; top:12%;">
                        Yearly
                    </span>
                    </div>
                </div>
                <div class="row mx-4" style="font-size:25px;">
                    <div class="col-4 text-center py-5" style="font-weight: 700; background:#EAEAEA;">
                        Overview
                    </div>
                    <div class="col-4 text-center py-5" style="font-weight: 700;background:#F0F5FB; ">
                        Free<br>
                        0$
                    </div>
                    <div class="col-4 text-center py-5" style="font-weight: 700; background:#94A9E5; color:#FFF;">
                        Premium<br>
                        <p id="p">50$</p>
                    </div>
                </div>
                <div class="row mx-4" style="font-size:20px;">
                    <div class="col-4  py-4 pl-4" style="font-weight: 500; background:#d0d8f3ad;">
                        Overview
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#C9DFF9;">
                        <img src="images/icons/true_icon_blue.svg" style="width:12%; height:auto;" alt="">
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#C5D3FB;">
                        <img src="images/icons/true_icon_white.svg" style="width:12%; height:auto;" alt="">
                    </div>
                </div>
                <div class="row mx-4" style="font-size:20px;">
                    <div class="col-4  py-4 pl-4" style="font-weight: 500; background:#EAEAEA;" >
                        Overview
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#F0F5FB;">
                        <img src="images/icons/true_icon_blue.svg" style="width:12%; height:auto;" alt="">
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#94A9E5;">
                        <img src="images/icons/true_icon_white.svg" style="width:12%; height:auto;" alt="">
                    </div>
                </div>
                <div class="row mx-4" style="font-size:20px;">
                    <div class="col-4  py-4 pl-4" style="font-weight: 500; background:#d0d8f3ad;">
                        Overview
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#C9DFF9;">
                        <img src="images/icons/true_icon_blue.svg" style="width:12%; height:auto;" alt="">
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#C5D3FB;">
                        <img src="images/icons/true_icon_white.svg" style="width:12%; height:auto;" alt="">
                    </div>
                </div>
                <div class="row mx-4" style="font-size:20px;">
                    <div class="col-4  py-4 pl-4" style="font-weight: 500; background:#EAEAEA;" >
                        Overview
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#F0F5FB;">
                        <img src="images/icons/true_icon_blue.svg" style="width:12%; height:auto;" alt="">
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#94A9E5;">
                        <img src="images/icons/true_icon_white.svg" style="width:12%; height:auto;" alt="">
                    </div>
                </div>
                <div class="row mx-4" style="font-size:20px;">
                    <div class="col-4  py-4 pl-4" style="font-weight: 500; background:#d0d8f3ad;">
                        Overview
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#C9DFF9;">
                        <img src="images/icons/true_icon_blue.svg" style="width:12%; height:auto;" alt="">
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#C5D3FB;">
                        <img src="images/icons/true_icon_white.svg" style="width:12%; height:auto;" alt="">
                    </div>
                </div>
                <div class="row mx-4" style="font-size:20px;">
                    <div class="col-4  py-4 pl-4" style="font-weight: 500; background:#EAEAEA;" >
                        Overview
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#F0F5FB;">
                        <img src="images/icons/true_icon_blue.svg" style="width:12%; height:auto;" alt="">
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#94A9E5;">
                        <img src="images/icons/true_icon_white.svg" style="width:12%; height:auto;" alt="">
                    </div>
                </div>
                <div class="row mx-4" style="font-size:20px;">
                    <div class="col-4  py-4 pl-4" style="font-weight: 500; background:#d0d8f3ad;">
                        Overview
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#C9DFF9;">
                        <img src="images/icons/true_icon_blue.svg" style="width:12%; height:auto;" alt="">
                    </div>
                    <div class="col-4  py-4 text-center" style="font-weight: 500; background:#C5D3FB;">
                        <img src="images/icons/true_icon_white.svg" style="width:12%; height:auto;" alt="">
                    </div>
                </div>
                <div class="row mx-4" style="font-size:25px;">
                    <div class="col-4 text-center py-5" style="font-weight: 700; background:#EAEAEA;">
                        
                    </div>
                    <div class="col-4 text-center py-5" style="font-weight: 700;background:#F0F5FB; ">
                        <button type="button"  class="btn btn-lg mt-3 mb-1" style="background-color: #94A9E5; font-weight:700; color:#fff;font-size:22px;"><a href=" {{route('register')}} " style="text-decoration: none; color:#fff;">Get Started</a> </button>
                    </div>
                    <div class="col-4 text-center py-5" style="font-weight: 700; background:#94A9E5; color:#FFF;">
                        <button type="button"  class="btn btn-lg mt-3 mb-1" style="background-color: #F0F5FB; font-weight:700; color:#000;font-size:22px;"><a href=" {{route('register')}} " style="text-decoration: none; color:#000;">Get Started</a></button>
                    </div>
                </div>
            </div>

            
        @include('layouts.footer')
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
    @endsection  