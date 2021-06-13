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
                  @media screen and (min-width: 994px) {
                  .c1{
                      padding-top: 20px;
                  }
                  .c2 {
                      margin-top: 10px;
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
                      <img  src="images/contact_image2.svg" alt="" class="img-fluid">                
                </div>
                <div class="col-sm-10 col-md-7 col-lg-6 c3" style=" padding:0px;  background:#BDDDF8; ">
                    <div class="container c1 h-50" >
                        <form class="py-2 px-4  c1">
                            <p style="font-weight: 700; color:#1F1A6B; font-size:35px;">Contact Us</p>
                             <div class="form-group c2">
                                <input type="text" class="form-control py-4"   placeholder="Your Name">
                              </div>
                              
                              <div class="form-group">
                                <input type="email" class="form-control py-4 py-4"   placeholder="Your Email">
                              </div>
                              <div class="form-group  ">
                                <textarea rows="4"  style="resize: none; " class="form-control py-4 "  placeholder="Write your message..."></textarea>
                              </div>
                             
                               
                              <button type="submit" class="btn  btn-lg btn-block btn-primary"
                              style="background-color:#1F1A6B;font-weight:600;font-size:18px; border-radius:12px;   "
                              >Send Message </button>
                             
                          </form>
                    </div>
 
                </div>
            </div>
        </div>
    @endsection