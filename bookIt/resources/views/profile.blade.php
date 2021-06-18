@extends('layouts.app')
    @section('content') 
    <div class="container-fluid">
            <div class="row">
                @include('notes.layouts.sidebar')
              <style>
                  label {
                    color: #6F6D6D;
                    font-weight: 600;
                    font-size:13px;
                  }
              </style>
                <div class="col">
                    <div class="container py-3 ">
                        <div class="d-flex flex-row mb-0">
                            <p style="font-weight:700; font-size:30px;">
                                Profile
                            </p>  
                        </div>
                       
                        <hr style="border-top: 1px solid #00000023;" class="mt-0">
                         
                        @if(session('success'))
                            <div class="col text-center w-50 mx-auto mb-3">
                                  <div class="jumbotron py-2 mb-2 bg-success text-white   mx-auto">
                                        {{ session('success') }}
                                  </div>
                            </div>
                        @endif
                        @if(session('error'))
                        <div class="col text-center w-50 mx-auto mb-3">
                              <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                                    {{ session('error') }}
                              </div>
                        </div>
                    @endif
                        <div class="container px-5 mr-auto">
                            <form method="POST" action="{{ route('profile') }}">
                              @csrf
                                <div class="d-flex flex-row mb-0">
                                    <div class="mb-3"   style="width: 75px; height:75px; border-radius:50%; ">
                                        <img src="images/about_img.svg" alt="" style="max-width:100%;
                                        max-height:100%; ">
                                    </div>
                                    <div class="mt-5" style="margin-left:-12px;">
                                      
                                      <label for="customFile" ><img src="images/icons/edit_profile_image_icon.svg" alt="" style="max-width:100%;
                                        max-height:100%;cursor: pointer;"> <input type="file" id="customFile" name="profile_image" style="display:none"> </label>
                                        {{-- <button type="button" class="btn"> <a href="{{route('profile')}}"  ><img src="images/icons/edit_profile_image_icon.svg" alt="" style="max-width:100%;
                                            max-height:100%;"></a> </button> --}}
                                    </div>
                                </div>
                                
                                 <div class="form-row w-75">
                                    <div class="form-group col-md-6">
                                      <label for="fname">First Name</label>
                                      <input type="text" class="form-control @error('fName')
                                      border border-danger
                                      @enderror" id="fname"  value="{{ Auth::user()->firstName}}" name="fName">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="lname">Last Name</label>
                                      <input type="text" class="form-control @error('lName')
                                      border border-danger
                                      @enderror" value="{{ Auth::user()->lastName}}" id="lname" name="lName">
                                    </div>
                                  </div>
                                <div class="form-group w-75">
                                  <label for="email">Email </label>
                                  <input type="email" class="form-control @error('email')
                                  border border-danger
                                  @enderror" id="email" aria-describedby="emailHelp" value="{{ Auth::user()->email}}" name="email">
                                  
                                </div>
                                <div class="form-group w-75">
                                    <label for="username">Username </label>
                                    <input type="text" class="form-control @error('username')
                                    border border-danger
                                    @enderror" id="username"  value="{{ Auth::user()->username}}" name="username">
                                  </div>
                                <div class="form-group   ">
                                  <label for="exampleInputPassword1">Password</label>
                                  <br>
                                  <input type="password" class="form-control d-inline  w-75" id="exampleInputPassword1" value="*********" disabled>
                                  <button type="button" class="btn"> <a href=" {{route('password.change')}}" style="text-decoration: none; color:#000;"><img src="/images/icons/edit_password_icon.svg" alt=""></a> </button>
                                  
                                   
                                </div>
                               
                                <div class="row mt-4" style="z-index:100;">
                                    <div class="col">
                                        <button type="submit" name="create" class="btn btn-primary"
                                        style="background-color:#1F1A6B;font-weight:700; " >Save</button>

                                        <button type="button" class="btn ml-5" style="background-color: #D4E5F9; font-weight:700;"> <a href=" {{route('profile')}}" style="text-decoration: none; color:#000;">Cancel</a> </button>
                                    </div>
                                </div>                              
                            </form>
                              
                        </div>

                    </div>
                </div>
            </div>
            
    @endsection