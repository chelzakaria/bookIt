@extends('layouts.app')
@section('content') 

    <div class="container-fluid">
        <script>
            function allowDrop(ev) {
              ev.preventDefault();
            }
            
            function drag(ev) {
              
              ev.dataTransfer.setData("text", ev.target.id);
            }
            
            function drop(ev) {
                
              ev.preventDefault();
              var data = ev.dataTransfer.getData("text");
              ev.target.appendChild(document.getElementById(data));
              console.log(document.getElementById(data))
            }
            </script>
        <div class="row">
            @include('notes.layouts.sidebar')
            <div class="col">
                <div class="container py-3">
                    <div class="d-flex flex-row">
                        <p style="font-weight:700; font-size:30px;">
                            Task List
                        </p>  
                        <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                            <img src="images/about_img.svg" alt="" style="max-width:100%;
                            max-height:100%; ">
                        </div>
                    </div>
                        
                    </div>
                    <hr style="border-top: 1px solid #00000023;">
                    
                        <div class="row">

                                <div class="col-md-4">
                                    <div class="col-md-12">
                                      
                                     <div class="card mb-5 d-flex flex-column " ondrop="drop(event)" ondragover="allowDrop(event)" style="width: 18rem; height:29rem;border-radius:10px;background-color:rgb(217, 222, 224) ">
                                         
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="col-md-12">
                                      
                                     <div class="card mb-5 d-flex flex-column" ondrop="drop(event)" ondragover="allowDrop(event)" style="width: 18rem; height:29rem;border-radius:10px;background-color:rgb(217, 222, 224) ">
                                      
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="col-md-12">
                                      
                                     <div class="card mb-5 d-flex flex-column" ondrop="drop(event)" ondragover="allowDrop(event)" style="width: 18rem; height:29rem;border-radius:10px;background-color:rgb(217, 222, 224) ">
                                        <!-- div 1 --> 
                                        
                                        <div class="card mb-5 p-2 ml-3 mt-3 "   draggable="true"  ondragstart="drag(event)" id="drag1" style="width: 16rem; height:9rem;border-radius:10px;background-color:rgb(114, 189, 15) ">
                                        <div class="card-body pb-0">
                                           <span class="card-text " style="font-weight: 400;font-size:15px; 
                                             height:4.2rem;     overflow: hidden;
                                                display: -webkit-box;
                                                -webkit-line-clamp: 3;
                                                -webkit-box-orient: vertical;   
                                             ">
                                             hihpipi</span>  
                                              
                                            <p class="text-muted float-right mb-0 mt-4" style="font-weight: 300;font-size:13px;">jj</p>
                                            <p class="mb-0 mt-4 " style="font-weight: 700;font-size:12px;color:#353535">
                                            </p>
                                         </div>
                                        </div>
                                        
                                        <!-- -->
                                          <!-- div 2 --> 
                                          <div class="card mb-5 p-2 ml-3 mt-3" name="n" draggable="true"  ondragstart="drag(event)" id="drag2" style="width: 16rem; height:9rem;border-radius:10px;background-color:rgb(174, 15, 189) ">
                                            <div class="card-body pb-0">
                                               <span class="card-text " style="font-weight: 400;font-size:15px; 
                                                 height:4.2rem;     overflow: hidden;
                                                    display: -webkit-box;
                                                    -webkit-line-clamp: 3;
                                                    -webkit-box-orient: vertical;   
                                                 ">
                                                 this is a task</span>  
                                                  
                                                <p class="text-muted float-right mb-0 mt-4" style="font-weight: 300;font-size:13px;">jj</p>
                                                <p class="mb-0 mt-4 " style="font-weight: 700;font-size:12px;color:#353535">
                                                </p>
                                             </div>
                                            </div>
                                            <!-- -->
                                       </div>
                                    </div>
                                 </div>
                           </div>

                </div>

   
            </div>

        </div>
                    
    </div>
@endsection  
