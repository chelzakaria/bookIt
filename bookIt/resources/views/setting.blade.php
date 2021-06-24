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
                    <form id="form" method="POST" action="{{route('setting.update', Auth::user()->id)}}">
                        @csrf
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                        <p style="font-weight:700; font-size:18px;">
                                            Customize notes colors
                                        </p> 
                                    <div class="d-flex flex-row">

                                        <div class="p-2 ">
                                        <input type="color" id="ideaColor" value="{{$setting->idea_color}}" title="Choose your color" name="idea">
                                                <p class="mb-5 ml-3 text-secondary">Idea</p>    
                                        </div>

                                        <div class="p-2 ml-3">
                                            <input type="color" id="quoteColor" value="{{$setting->quote_color}}" title="Choose your color" name="quote">
                                                    <p class="mb-5 ml-3 text-secondary">Quote</p>    
                                        </div>

                                        <div class="p-2 ml-3">
                                            <input type="color" id="thoughtColor" value="{{$setting->thought_color}}" title="Choose your color" name="thought">
                                                    <p class="mb-5 ml-1 text-secondary">Thought</p>    
                                        </div>

                                        <div class="p-2 ml-3">
                                            <input type="color" id="uncategorizedColor" value="{{$setting->uncategorized_color}}" title="Choose your color" class="ml-3" name="uncategorized">
                                                    <p class="mb-5  text-secondary">Uncategorized</p>    
                                        </div>

                                    </div>
                                    <p style="font-weight:700; font-size:18px;">
                                        Customize tasks colors
                                    </p> 
                                <div class="d-flex flex-row">

                                    <div class="p-2 ">
                                    <input type="color" id="ideaColor" value="{{$setting->high_color}}" title="Choose your color" name="high">
                                            <p class="mb-5 ml-3 text-secondary">High</p>    
                                    </div>

                                    <div class="p-2 ml-3">
                                        <input type="color" id="quoteColor" value="{{$setting->medium_color}}" title="Choose your color" name="medium">
                                                <p class="mb-5 ml-1 text-secondary">Medium</p>    
                                    </div>

                                    <div class="p-2 ml-3">
                                        <input type="color" id="thoughtColor" value="{{$setting->low_color}}" title="Choose your color" name="low">
                                                <p class="mb-5 ml-3 text-secondary">Low</p>    
                                    </div>
 

                                </div>
                                    <p style="font-weight:700; font-size:18px;">
                                        Appearance
                                    </p> 
                                    
                                    <div class="row mr-5" >
                                        <div class="form-group my-2 ml-3">

                                            {{-- <input id="appe" type="checkbox" data-toggle="toggle" data-on="Light<br>Mode" data-off="Dark<br>Mode" name="appearance" data-width="100" data-onstyle="info"   onchange="check(this)"> --}}
                                            <label class="toggle-switchy" for="example_textless_1" data-size="xl" data-text="false" data-style="rounded">
                                                <input checked type="checkbox" id="example_textless_1" name="appearance">
                                                <span class="toggle">
                                                    <span class="switch"></span>
                                                </span>
                                            </label>
 
                                        </div>
                                    </div>
                                    <p  class="mt-5" style="font-weight:700; font-size:18px;">
                                       Account type
                                    </p>
                                    <button name="upgrade" class="btn  btn-primary"
                                    style="background-color:# ;font-weight:700;  "  >Upgrade</button> 
                                    <button name="upgrade" class="btn  btn-secondary"
                                    style="background-color:# ;font-weight:700;  "  >Downgrade</button>

                                    <p  class="mt-5" style="font-weight:700; font-size:18px;">
                                        Danger zone
                                     </p>
                                     <button name="delete account" class="btn  bg-danger text-white"
                                     style="font-weight:700;  "  >Delete Account</button> 
                                    <p  class="mt-5" style="font-weight:700; font-size:18px;">
                                        
                                     </p>
                                     <button type="submit"  name="save" class="btn btn-primary float-right"
                                     style="background-color:#1F1A6B;font-weight:700;  " >Save</button> 
                                     <button type="button" class="btn " style="background-color: #D4E5F9; font-weight:700;"> <a href=" {{route('notes')}}" style="text-decoration: none; color:#000;">Cancel</a> </button>
                                     
                                </div>
                                    </div>
                            </div>
                    </form>
                </div>

   
            </div>

        </div>
                    
    </div>

    <script>
        // $("#example_textless_1").on('change', function(){
        // if($("#example_textless_1").val()=="on")
        // {
       

        //     $("#example_textless_1").val("dark")
        //     alert($("#example_textless_1").val())
        // }    
        // else if($("#example_textless_1").val()=="light")
        // {
       

        //     $("#example_textless_1").val("dark")
        //     alert($("#example_textless_1").val())
        // }
        // else
        // {
        //     $("#example_textless_1").val("light")

        //     alert($("#example_textless_1").val())


        // }

        // }

        // )
        // function check(e)
        // {
        //     alert(e.value)
        //     if(e.value==="on")
        //     {
        //         e.value="off";
        //     }
        //     else if(e.value==="off")
        //     {
        //         e.value="on";
        //     }
        // }
      </script>
@endsection  
