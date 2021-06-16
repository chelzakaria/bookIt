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
                                    </div></div>
                            </div>
                    </form>
                </div>

   
            </div>

        </div>
                    
    </div>
@endsection  
