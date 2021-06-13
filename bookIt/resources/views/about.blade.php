@extends('layouts.app')
@section('content') 
   
@include('layouts.nav')
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-6  col-sm-12 col-10">
                <p style="font-weight:300; font-size:38px; margin-bottom:50px;">
                    About 
                    <img   src="/images/logos/about_logo.svg" style="width:140px; height:auto;" alt="">
                </p> 
                <p style="font-weight:300; font-size:18px; color:#6F6D6D; margin-bottom:30px;">
                    Hi there! Are you lost between lot of <br>
                     note papers and everything is a mess ? <br>
                      Don’t worry we got your back. 
                </p>
                <p style="font-weight:300; font-size:18px; color:#6F6D6D; margin-bottom:30px;">
                    Read, take and arrange your notes <br> 
                    with one click. 
                      
                </p>
                <p style="font-weight:300; font-size:18px; color:#6F6D6D;">
                    We are here to help you to improve <br>
                     your notes, also make reading <br>
                      entertaining.
                </p>    
            </div>
            <div class="col d-none d-md-block">
                <img src="/images/about_img.svg" style="width: 90%; height:auto;" alt="">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12  col-sm-12 col-10 text-center">
                <p style="font-size:38px;">What are you waiting for ?</p>
                <a href=" {{route('register')}} " style="text-decoration: none;">
                    <p style="color:#3E63F6; font-weight:700; font-size:38px;">Let’s get started</p>
                </a>

            </div>
        </div>
    </div>
        @include('layouts.footer')

        @endsection  
