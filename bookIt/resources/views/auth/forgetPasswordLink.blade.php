
@extends('layouts.app')
    @section('content') 

    
        @include('layouts.nav')
        <style>
             
                  @media screen and (min-width: 990px) {
                  .c1{
                      padding-top: 20px;
                  }
                  .c2 {
                      margin-top: 30px;
                  }
              } 

              @media screen and (max-width: 991px) {
            
            .c3{
                  border-radius: 15px;
                   
              }
              
          } 
          @media screen and (min-width: 991px) {
         
              .c3 {
                border-radius: 0px 15px 15px 0px;
              }
              
          }  
               
        </style>
        <div class="container mb-5 mt-3" style=" border-radius:  15px; ">
            <div class="row justify-content-md-center"  >
                <div class="col-4 d-none d-lg-block px-0 h-50" >
                      <img  src="/images/restore_password.svg" alt="" class="img-fluid">                
                </div>
                <div class="col-sm-10 col-md-7 col-lg-6 c3" style=" padding:0px;  background:#BDDDF8; ">
                    <div class="container c1 h-50" >
                        @if (session('message'))
                            <div class="col text-center ">
                                <div class="jumbotron py-2 mb-2 bg-success text-white   mx-auto">
                                    {{session('message')}}
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
                        
                        <form class="py-3 px-4  c1 " action="{{ route('reset.password.post') }}" method="POST" >
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <p   style="font-weight: 700; color:#1F1A6B; font-size:35px;">Reset Password</p>
                            
                            <div class="form-group c2">
                                <input type="text" class="form-control py-4 @error('email')
                                border border-danger
                                @enderror"   placeholder="Email" name="email" >
                              </div>
                              <div class="form-group c2">
                                <input type="password" class="form-control py-4 @error('password')
                                border border-danger
                                @enderror"   placeholder="Password" name="password" >
                              </div>
                              <div class="form-group c2">
                                <input type="password" class="form-control py-4 @error('password_confirmation')
                                border border-danger
                                @enderror"   placeholder="Repeat password" name="password_confirmation" >
                              </div>
                              
                               
                             
                               
                              <button type="submit" class="btn  btn-lg btn-block btn-primary mb-2"
                              style="background-color:#1F1A6B;font-weight:600;font-size:22px; border-radius:12px;   "
                              >Reset Password</button>
                              
                          </form>
                    </div>
 
                </div>
            </div>
        </div>
    @endsection