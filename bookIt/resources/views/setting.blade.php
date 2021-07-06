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
                    @if(session('error'))
                    <div class="col text-center   mr-auto mb-3">
                            <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif
                    @if(session('success'))
                    <div class="col text-center   mr-auto mb-3">
                            <div class="jumbotron py-2 mb-2 bg-success     mx-auto">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
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
                                    {{-- <p style="font-weight:700; font-size:18px;">
                                        Appearance
                                    </p> 
                                    
                                    <div class="row mr-5" >
                                        <div class="form-group my-2 ml-3">

                                             <label class="toggle-switchy" for="example_textless_1" data-size="xl" data-text="false" data-style="rounded">
                                                <input checked type="checkbox" id="example_textless_1" name="appearance">
                                                <span class="toggle">
                                                    <span class="switch"></span>
                                                </span>
                                            </label>
 
                                        </div>
                                    </div> --}}
                                    {{-- <p style="font-weight:700; font-size:18px;">
                                        Task alert time
                                    </p> 
                                    
                                    <div class="row mr-5" >
                                        <div class="form-group my-2 ml-3">

                                             <label class="toggle-switchy" for="example_textless_1" data-size="xl" data-text="false" data-style="rounded">
                                                <input checked type="checkbox" id="example_textless_1" name="appearance">
                                                <span class="toggle">
                                                    <span class="switch"></span>
                                                </span>
                                            </label>
 
                                        </div>
                                    </div> --}}
                                    <p  class="mt-0" style="font-weight:700; font-size:18px;">
                                       Account type
                                    </p>
                                 
                                    @if ($account->account_type=="free" && !$account->end_date)
                                    <a name="upgrade" class="btn  btn-primary text-white"
                                    style="background-color:# ;font-weight:700; text-decoration:none; " href="{{route('upgrade')}}"  >Upgrade</a>

                                    @elseif ($account->account_type=="free" && $account->end_date)
                                    <a role="button" aria-disabled="true"  name="upgrade" class="btn  btn-primary text-white disabled"
                                    style="background-color:# ;font-weight:700; text-decoration:none; " href="{{route('upgrade')}}"  >Upgrade</a>

                                    @elseif ($account->account_type=="premium")
                                    <a  data-toggle="modal" data-target="#downgrade" name="upgrade" class="btn  btn-secondary text-white "
                                    style="background-color:# ;font-weight:700; text-decoration:none; "  >Downgrade</a>
                                    @endif
                                     <p data-toggle="modal" data-target="#details" class="text-muted font-weight-bold mt-2" style="font-size:12.5px; cursor: pointer;">view account details.</p>
                                   

                                    <p  class="mt-5" style="font-weight:700; font-size:18px;">
                                        Danger zone
                                     </p>
                                  
                                    <div data-toggle="modal" data-target="#exampleModal" class="btn  bg-danger text-white"
                                    style="font-weight:700;"  >Delete Account</div> 
                                
                                     
                                    <p  class="mt-5" style="font-weight:700; font-size:18px;">
                                        
                                     </p>
                                     <button type="submit"  name="save" class="btn btn-primary float-right"
                                     style="background-color:#1F1A6B;font-weight:700;  " >Save</button> 
                                     <button type="button" class="btn " style="background-color: #D4E5F9; font-weight:700;"> <a href=" {{route('dashboard')}}" style="text-decoration: none; color:#000;">Cancel</a> </button>
                                     
                                </div>
                                    </div>
                            </div>
                    </form>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete your account permanently  ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                
                            <div class="modal-footer">
                                <div class="row mt-3">
                                    <div class="col">
                                        <button type="button" class="btn " data-dismiss="modal" style="background-color: #D4E5F9; font-weight:700;">Cancel</button>
                                    </div>
                                    <div class="col">
                                         
                
                                            <button data-toggle="modal" data-target="#exampleModal2"  name="create" class="btn btn-danger float-right" style="; font-weight: 700;">Delete</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Please enter your current password :</h5>
                                
                            </div>
                            <div class="modal-body">
                                <div class="form-group w-75">
                                    <form class="d-inline" action="{{route('user.delete',  Auth::user()->id)}}" method="post">
                                        @csrf 
                                    <input type="password" class="mt-2 form-control @error('password')
                                    border border-danger
                                    @enderror" id="oldPass"  name="password" placeholder="password">
                                  </div>
                              </div>
                            <div class="modal-footer">
                                <div class="row mt-3">
                                    <div class="col">
                                        <button type="button" class="btn " data-dismiss="modal" style="background-color: #D4E5F9; font-weight:700;">Cancel</button>
                                    </div>
                                    <div class="col">
                                       
                
                                            <button type="submit" name="create" class="btn btn-primary float-right" style="; font-weight: 700;">Confirm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="downgrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to downgrade your account ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                
                            <div class="modal-footer">
                                <div class="row mt-3">
                                    <div class="col">
                                        <button type="button" class="btn " data-dismiss="modal" style="background-color: #D4E5F9; font-weight:700;">Cancel</button>
                                    </div>
                                    <div class="col">
                                         
                                    <form action="{{route('downgrade')}}" method="POST">
                                    @csrf
                                    <button type="submit" data-toggle="modal" data-target="#downgrade"  name="create" class="btn btn-primary float-right" style="; font-weight: 700;">Confirm</button>
                                    </form>
                                          
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  --}}
                <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Account details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row mb-4">
                                    <div class="col" style="font-weight:700;">Username</div>
                                    <div class="col" style="font-weight:500;"> {{Auth::user()->username}}</div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col" style="font-weight:700;">Account type</div>
                                    <div class="col" style="font-weight:500;  "> {{$account->account_type}} 
                                    @if ($account->account_type=="free" && $account->end_date)
                                        <span class="text-muted font-weight-bold" style="font-size: 12.5px;"> (after Membership ends)</span>
                                    @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col" style="font-weight:700;">Membership ends at</div>
                                    <div class="col" style="font-weight:500;"> 
                                    @if ($account->end_date)
                                        {{\Carbon\Carbon::parse($account->end_date)->format('Y/m/d')}}
                                    @else
                                        ----/--/--
                                    @endif
                                    </div>
                                </div>
                              
                            </div>
                
                         
                        </div>
                    </div>
                </div>
                {{--  --}}
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
        // console.log(JSON.stringify({!! json_encode($setting) !!}));
      </script>
@endsection  
