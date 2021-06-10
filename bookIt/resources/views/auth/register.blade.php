@extends('layouts.app')
    @section('content') 

    
        @include('layouts.nav')
        <style>
             ::placeholder{
             font-weight: 600;
             font-size: 16px;
             line-height: 20px;
              
              
                }
                .form-control   {
                 font-family: 'Montserrat', sans-serif;
                 font-weight: 700; 
                  border-radius:12px;
                    
                 }
                 @media screen and (min-width: 1200px) {
                  .c1{
                      padding-top: 80px;
                       
                  }
                
                  
              } 
              @media screen and (max-width: 1200px) {
              
                  .c1{
                      padding: 20px 5px;
                       
                  }
                  
              } 
              @media screen and (max-width: 990px) {
            
                .c2{
                      border-radius: 15px;
                       
                  }
                  
              } 
              @media screen and (min-width: 990px) {
             
                  .c2 {
                    border-radius: 0px 15px 15px 0px;
                  }
                  
              } 
        </style>
        <div class="container mb-5 mt-3" style=" border-radius:  15px; ">
            <div class="row justify-content-md-center"  >
                <div class="col-4 d-none d-lg-block px-0 h-50" >
                      <img  src="images/register_image.svg" alt="" class="img-fluid">                
                </div>
                <div class="col-sm-10 col-md-8 col-lg-6 col-8 c2" style=" padding:0px; background:#BDDDF8; ">
                    <div class="container " >
                        
                        <form class="c1 px-4  mb-3">
                            <p class="mb-0" style="font-weight: 700; color:#1F1A6B; font-size:35px;">Get Started</p>
                            <p  class="mt-0" style="font-weight: 600; color:#6F6D6D; font-size:14px;">Already have an account ?  <a href="{{ route('login') }}" style="color:#3859DD;  ">Sign In.</a> </p>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                   
                                  <input type="text" class="form-control py-4"  placeholder="First name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control py-4"  placeholder="Last name">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control py-4"   placeholder="Username">
                              </div>
                              <div class="form-group">
                                <input type="email" class="form-control py-4"   placeholder="Email">
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                   
                                  <input type="password" class="form-control py-4 py-4"   placeholder="Password">
                                </div>
                                <div class="form-group col-md-6">
                                  <input type="password" class="form-control py-4"   placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control py-4"   placeholder="Email">
                            </div>
                            
                              <button type="submit" class="btn  btn-lg btn-block btn-primary"
                              style="background-color:#1F1A6B;font-weight:600;font-size:22px; border-radius:12px;   "
                              >Sign Up</button>
                          </form>
                    </div>
 
                </div>
            </div>
        </div>
    @endsection