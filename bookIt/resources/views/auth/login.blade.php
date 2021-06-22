@extends('layouts.app')
    @section('content') 

    
        @include('layouts.nav')
        <style>
             
                  @media screen and (min-width: 990px) {
                  .c1{
                      padding-top: 70px;
                  }
                  .c2 {
                      margin-top: 50px;
                  }
              } 

              @media screen and (max-width: 767px) {
            
            .c3{
                  border-radius: 15px;
                   
              }
              
          } 
          @media screen and (min-width: 767px) {
         
              .c3 {
                border-radius: 0px 15px 15px 0px;
              }
              
          }  
               
        </style>
        <div class="container mb-5 mt-3" style=" border-radius:  15px; ">
            <div class="row justify-content-md-center"  >
                <div class="col-4 d-none d-md-block px-0 h-50" >
                      <img  src="images/login_image.svg" alt="" class="img-fluid">                
                </div>
                <div class="col-sm-10 col-md-7 col-lg-6 c3" style=" padding:0px;  background:#BDDDF8; ">
                    <div class="container c1 h-50" >
                        @if (session('status'))
                            <div class="col text-center ">
                                <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                                    {{session('status')}}
                                </div>
                            </div>
                        @endif
                        @error('email')
                            <div class="col text-center ">
                                <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                                {{$message}}
                                </div>
                                
                            </div>
                        @enderror
                        @error('password')
                            <div class="col text-center ">
                                <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                                {{$message}}
                                </div>
                                
                            </div>
                        @enderror
                        <form class="py-4 px-4  c1" action="{{ route('login') }}" method="POST" >
                            @csrf
                            <p style="font-weight: 700; color:#1F1A6B; font-size:35px;">Login</p>
                            <p style="font-weight: 600; color:#6F6D6D; font-size:14px;">Don’t have an account? <a href="{{ route('register') }}" style="color:#3859DD;">Sign Up.</a> </p>
                            <div class="form-group c2">
                                <input type="text" class="form-control py-4 @error('email')
                                border border-danger
                                @enderror"   placeholder="Username or Email" name="email" value="{{old('email')}}">
                              </div>
                              
                              <div class="form-group">
                                <input type="password" class="form-control py-4 @error('password')
                                border border-danger
                                @enderror"   placeholder="Password" name="password">
                              </div>
                             
                               
                              <button type="submit" class="btn  btn-lg btn-block btn-primary"
                              style="background-color:#1F1A6B;font-weight:600;font-size:22px; border-radius:12px;   "
                              >Sign In</button>
                              <p class="text-center mt-2" style="font-weight: 600; color:#6F6D6D; font-size:14px;">   <a href="{{ route('forget-password') }}" style="color:#3859DD;">Forgotten password?</a> </p>
                          </form>
                    </div>
 
                </div>
            </div>
        </div>
    @endsection