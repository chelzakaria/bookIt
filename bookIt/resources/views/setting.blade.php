@extends('layouts.app')
@section('content') 

    <div class="container-fluid">
        <div class="row">
            @include('notes.layouts.sidebar')
            <div class="col">
                <style>
input[type="color"] {
	-webkit-appearance: none;
	border: none;
	width: 70px;
    -moz-outline-radius: 20px;
	height: 32px;
}
input[type="color"]::-webkit-color-swatch-wrapper {
	padding: 0;
}
input[type="color"]::-webkit-color-swatch {
	border: none;
}
                </style>
                <div class="container py-3 ">
                    <div class="d-flex flex-row">
                        <p style="font-weight:500; font-size:30px;">
                            Setting
                        </p>  
                    </div>
                    <hr style="border-top: 1px solid #00000023;margin-top:5px;">
                    <form>
                        @csrf
                            <div class="row">
                                <div class="col-md-4 mt-5">
                                    <div class="form-group ">
                                        <p style="font-weight:700; font-size:20px;">
                                            Customize colors
                                        </p> 
                                    <div class="d-flex flex-row">

                                        <div class="p-2 ">
                                        <input type="color" id="ideaColor" value="#db4b4b" title="Choose your color">
                                                <p class="mb-5 ml-3 text-secondary">Idea</p>    
                                        </div>

                                        <div class="p-2 ml-3">
                                            <input type="color" id="quoteColor" value="#a48eb4" title="Choose your color">
                                                    <p class="mb-5 ml-3 text-secondary">Quote</p>    
                                        </div>

                                        <div class="p-2 ml-3">
                                            <input type="color" id="thoughtColor" value="#21e06d" title="Choose your color">
                                                    <p class="mb-5 ml-1 text-secondary">Thought</p>    
                                        </div>

                                        <div class="p-2 ml-3">
                                            <input type="color" id="uncategorizedColor" value="#f8f128" title="Choose your color">
                                                    <p class="mb-5  text-secondary">Uncategorized</p>    
                                        </div>

                                    </div>
                                    <p style="font-weight:700; font-size:20px;">
                                        Apparance
                                    </p> 
                                    
                                    <div class="row mr-5" >
                                        <div class="col-12 text-center">
                                        <span class="mr-3 position-relative" style="color: #6F6D6D; font-weight:300;font-size:18px;line-height: 1.6; top:12%;">
                                            Dark
                                        </span>
                                          <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                          </label> 
                                          <span class="ml-3 position-relative" style="color: #6F6D6D; font-weight:300;font-size:18px;line-height: 1.6; top:12%;">
                                            Light
                                        </span>
                                        </div>
                                    </div>
                                    <p  class="mt-5" style="font-weight:700; font-size:20px;">
                                       Account type
                                    </p>
                                    <button name="upgrade" class="btn  btn-lg btn-primary"
                                    style="background-color:#1548d5;font-weight:600;font-size:18px; border-radius:12px; width:150px;" >Upgrade</button> 
                                    {{-- <button name="downgrade" class="btn  btn-lg btn-primary ml-4"
                                    style="background-color:#948bc5;font-weight:600;font-size:18px; border-radius:12px; width:150px;" >Downgrade</button>  --}}

                                    <p  class="mt-5" style="font-weight:700; font-size:20px;">
                                        Danger zone
                                     </p>
                                     <button name="delete account" class="btn  btn-lg  bg-danger text-white"
                                    style=" font-weight:600;font-size:18px; border-radius:12px; width:200px;" >Delete Account</button> 
                                    <p  class="mt-5" style="font-weight:700; font-size:20px;">
                                        
                                     </p>
                                     <button type="submit"  name="save" class="btn btn-primary float-right"
                                     style="background-color:#1F1A6B;font-weight:700;  " >Create</button> 
                                     <button type="button" class="btn " style="background-color: #D4E5F9; font-weight:700;"> <a href=" {{route('notes')}}" style="text-decoration: none; color:#000;">Cancel</a> </button>
                                     
                                </div>
                                    </div>
                            </div>
                    </form>
                </div>

   
            </div>

        </div>
                    
    </div>
@endsection  
