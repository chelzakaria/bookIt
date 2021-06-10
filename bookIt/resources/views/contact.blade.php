@extends('layouts.app')
@section('content') 
   
@include('layouts.nav')
<style>
@media screen and (max-width: 1100px) {
  #im {
   display: none
  }
}
    </style>
    <div class="container">
    <div style="height: 500px;width:800px; margin-left:15%;  background-color: #BDDDF8;border-radius:15px">
       <style>
           ::placeholder{
            font-weight: 600;
             font-size: 16px;
             line-height: 20px;
           }
           input, .form-control{
            font-family: 'Montserrat', sans-serif;
                 font-weight: 700; 
                  border-radius:12px;
                  
                }
           </style>
       <div id="im" style="position: absolute;
        width: 286px;
        height: 500px;
        background: url(/images/contact_image2.svg);
        background-size: 286px ;
        border-radius: 15px 0px 0px 15px;">
        </div>
        <p style="position: absolute; 
        font-style: normal;
        font-weight: 800;
        font-size: 40px;
        line-height: 55px;
        margin-left:27%;
        margin-top:30px;
         
        color: #0B1A67;">
            Contact Us
        </p>
        <form class="column">
    <p class="" style="position: absolute;  margin-left:27%;margin-top:130px">
        <input class=" py-4"  type="text" placeholder="Your Name" style="position: absolute;
        width: 380px;
        height: 43px;
        border:none;
        background: #FFFFFF;
        border-radius: 12px;
        padding:15px;
        outline:none;">
    </p>
    <p style="position: absolute;  margin-left:27%;margin-top:190px">
        <input class=" py-4" type="text" placeholder="Your Email" style="position: absolute;
        width: 380px;
        height: 43px;
        border:none;
        background: #FFFFFF;
        border-radius: 12px; 
        outline:none;
        padding:15px;">
    </p>
    <p style="position: absolute;  margin-left:27%;margin-top:250px">
        <textarea class=" py-4" class="form-control" placeholder="Write your Message.." style="position: absolute;
        width: 380px;
        height: 170px;
        border:none;
        background: #FFFFFF;
        border-radius: 12px;
        outline:none;
        padding:15px; 
        resize: none; "  rows="10"></textarea>
        
    </p>
    <p style="position: absolute;  margin-left:27%;margin-top:430px">
        <input   type="submit" value="Send Message" style="position: absolute;
        width: 380px;
        height: 43px;
        background: #0B1A67;
        color:white;
         
        font-weight: 600;
        font-size: 20px;
        line-height: 20px;
        border:none;
        border-radius: 12px;
        outline:none;
         ">
         
    </p>
        </form>
    </div>
    </div>
        @include('layouts.footer')

        @endsection  
