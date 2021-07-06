@extends('layouts.app')
    @section('content') 

    
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
                 input {
                visibility:hidden !important;
                position: absolute;
            }
            label {
                cursor: pointer;
            }

            .checked_class {
                border: 1.7px solid #474B8E; 
             
            }
                 @media screen and (min-width: 1200px) {
                  .c1{
                        padding-top: 15px;
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
        <div class="container mb-5 mt-5" style=" border-radius:  15px; ">
            <div class="row justify-content-md-center"  >
                <div class="col-4 d-none d-lg-block px-0 h-50" >
                      <img  src="{{ asset('/images/payment_image.svg') }}" alt="" class="img-fluid">                
                </div>
                <div class="col-sm-10 col-md-8 col-lg-6 col-8 c2" style=" padding:0px; background:#BDDDF8; ">
                  
                    <div class="container " >
                        <p class="mt-5 ml-4 mb-5" style="font-weight: 700; color:#1F1A6B; font-size:28px;">Choose your plan</p>
                        
                        <form class="c1 px-4 mt-5 mb-0" action="{{route('payment')}}" method="POST">
                          @csrf
                          <input type='radio' value='free' name="plan" id='free_radio' onchange="check();"   >
                         
                       {{--  --}}
                       <input type='radio' value='monthly' name="plan" id='premium_radio1' onchange="check();" >
                       <label for='premium_radio1' > 
                       <div class="col mr-5 mb-3" style="height: 140px; border-radius: 10px; background: #F0F5FB;" id="premium_div1">
                           
                        <div class="row">
                            <div class="col-4 mt-1 ml-0"  >
                                <img class="pl-0" src="/images/premium_monthly_plan_image.svg" alt="" style="width:140px ; height:130px; ">
                            </div>
                            <div class="col-6 py-2">
                                <p class="mb-0" style="font-weight: 700; font-size: 20px;">Premium</p>
                                <span   style="font-weight: 500; font-size: 10px; color: #9D9D9D; margin-top:0px;">Pay monthly, cancel anytime</span>
                                <p class="mt-1 mb-0" style="font-weight: 600; font-size: 12px; color: #000000;">&bull; Unlimited notes and tasks </p>
                                <p class="mt-1 mb-0" style="font-weight: 600; font-size: 12px; color: #000000;">&bull; Up to 10GB of notes images </p>
                                <p class="mt-1 mb-0" style="font-weight: 600; font-size: 12px; color: #000000;">&bull; Free acces to books </p>
                            </div>
                            <div class="col ">
                                <p class="mb-0" style="font-weight: 700; font-size: 24px;">10<span style="font-weight: 600; font-size:15px ">$  </span>  </p>
                                <p style="position: absolute; top:35px;font-weight: 500; font-size:10px; color:#A1A1A1; ">per month</p>
                                <div style="position: absolute; bottom:10px; right:20px;">
                                    <img src="/images/icons/empty_check_icon.svg" alt="" id="premium_check_img">
                                </div>
                            </div>
                        </div>
                   
                  </div>
                </label>
          
                  {{--  --}}
                  <input type='radio' value='yearly' name="plan" id='premium_radio2' onchange="check();" >
                  <label for='premium_radio2' > 
                  <div class="col mr-5 mb-0" style="height: 140px; border-radius: 10px; background: #F0F5FB;" id="premium_div2">
                           
                    <div class="row">
                        <div class="col-4 mt-1 ml-0"  >
                            <img class="pl-0" src="/images/premium_yearly_plan_image.svg" alt="" style="width:140px ; height:130px; ">
                        </div>
                        <div class="col-6 py-2">
                            <p class="mb-0" style="font-weight: 700; font-size: 20px;">Premium</p>
                            <span   style="font-weight: 500; font-size: 10px; color: #9D9D9D; margin-top:0px;">Pay for a full year and save 20$</span>
                            <p class="mt-1 mb-0" style="font-weight: 600; font-size: 12px; color: #000000;">&bull; Unlimited notes and tasks </p>
                            <p class="mt-1 mb-0" style="font-weight: 600; font-size: 12px; color: #000000;">&bull; Up to 10GB of notes images </p>
                            <p class="mt-1 mb-0" style="font-weight: 600; font-size: 12px; color: #000000;">&bull; Free acces to books </p>
                        </div>
                        <div class="col ">
                            <p class="mb-0" style="font-weight: 700; font-size: 24px;">100<span style="font-weight: 600; font-size:15px ">$</span>  </p>
                            <p style="position: absolute; top:35px;font-weight: 500; font-size:10px; color:#A1A1A1; ">per year</p>
                            <div style="position: absolute; bottom:10px; right:20px;">
                                <img src="/images/icons/empty_check_icon.svg" alt="" id="premium_check_img2">
                            </div>
                        </div>
                    </div>
               
              </div>
            </label>
      
                              <button type="submit" class="btn  btn-lg btn-block btn-primary mt-5"
                              style="background-color:#1F1A6B;font-weight:600;font-size:22px; border-radius:12px;   "
                              >Continue</button>
                          </form>
                    </div>
 
                </div>
            </div>
        </div>
        <script>
         function check(){
          
             if($("#premium_radio1").is(":checked"))
            {
                $('#premium_div1').addClass("checked_class");
                 $("#premium_check_img").attr("src","/images/icons/fill_check_icon.svg");
                $("#premium_check_img2").attr("src","/images/icons/empty_check_icon.svg");

                $('#premium_div2').removeClass("checked_class");
 

            }
            else  if($("#premium_radio2").is(":checked"))
            {
                $('#premium_div2').addClass("checked_class");
                 $("#premium_check_img").attr("src","/images/icons/empty_check_icon.svg");
                $("#premium_check_img2").attr("src","/images/icons/fill_check_icon.svg");

                $('#premium_div1').removeClass("checked_class");
 

            }
           
         } 
        </script>
    @endsection