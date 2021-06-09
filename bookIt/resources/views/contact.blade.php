@extends('layouts.app')
@section('content') 
   
@include('layouts.nav')
    <div class="container mb-5">
    <div style="height: 500px; width:800px; margin-left:15%;background-color:#ACD6E3;border-radius:15px">
       <style>
           ::placeholder{
            font-family: arial;
        font-style: normal;
font-weight: bold;
font-size: 17px;
line-height: 20px;
padding: 15px;
           }
           </style>
       <div style="position: absolute;
        width: 286px;
        height: 500px;
        background: url(/images/contact.jpeg);
        border-radius: 15px;">
        </div>
        <p style="position: absolute; 
        font-style: normal;
        font-weight: bold;
        font-size: 40px;
        line-height: 55px;
        margin-left:27%;
        margin-top:30px;
        font-family: arial;
        color: #0B1A67;">
            Contact Us
        </p>
    <p style="position: absolute;  margin-left:27%;margin-top:130px">
        <input type="text" placeholder="Your Name" style="position: absolute;
        width: 380px;
        height: 43px;
        border:none;
        background: #FFFFFF;
        border-radius: 12px;">
    </p>
    <p style="position: absolute;  margin-left:27%;margin-top:190px">
        <input type="text" placeholder="Your Email" style="position: absolute;
        width: 380px;
        height: 43px;
        border:none;
        background: #FFFFFF;
        border-radius: 12px;">
    </p>
    <p style="position: absolute;  margin-left:27%;margin-top:250px">
        <input type="text" placeholder="Your Email" style="position: absolute;
        width: 380px;
        height: 170px;
        border:none;
        background: #FFFFFF;
        border-radius: 12px;">
    </p>
    <p style="position: absolute;  margin-left:27%;margin-top:430px">
        <input type="submit" value="Send Message" style="position: absolute;
        width: 380px;
        height: 43px;
        background: #0B1A67;
        color:white;
        font-family: arial;
        font-style: normal;
font-weight: bold;
font-size: 20px;
line-height: 20px;
        border-radius: 12px;">
    </p>
    </div>
    </div>
        @include('layouts.footer')

        @endsection  
