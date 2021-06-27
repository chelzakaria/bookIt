@extends('layouts.app')
    @section('content') 
    
        <div class="container-fluid">
            <div class="row">
                @include('notes.layouts.sidebar')
                <style>
                          ::placeholder, label{
                            font-weight: 600;
                            font-size: 16px;
                            line-height: 20px;
                          }
                    </style>
                <div class="col">
                    <div class="container py-3">
                        <div class="d-flex flex-row">
                            <p style="font-weight:700; font-size:30px;">
                                Edit task
                            </p>  
                            <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                                <img src="images/about_img.svg" alt="" style="max-width:100%;
                                max-height:100%; ">
                            </div>
                        </div>
                    
                        <hr style="border-top: 1px solid #00000023;">
                        <form action="{{route('tasks.update', $task->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="task_name" placeholder="Task name" style="border-radius:10px; height:50px;"  autocomplete="off" value="{{$task->task_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <select class="custom-select"  name="status"   style="border-radius:10px; height:50px; ">
                                                <option selected="true" disabled="disabled" >Status</option>
                                                <option @if ($task->status == "not started")
                                                    selected
                                                @endif>not started</option>
                                                <option @if ($task->status == "in progress")
                                                    selected
                                                @endif>in progress</option>
                                                <option @if ($task->status == "done")
                                                    selected
                                                @endif>done</option>
                                             </select>
                                         
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                           <select class="custom-select"  name="importance"   style="border-radius:10px; height:50px; ">
                                               <option selected="true" disabled="disabled" >Priority</option>
                                                <option @if ($task->task_importance == "high")
                                                    selected
                                                @endif >high</option>
                                               <option @if ($task->task_importance == "medium")
                                                selected
                                            @endif>medium</option>
                                               <option @if ($task->task_importance == "low")
                                                selected
                                            @endif>low</option>
                                                
                                           </select>
                                        
                                         </div>
                                   </div>
                                   
                                       
                                  </div>  
                                  <div class="row">

                                        <div class="col">
                                            <textarea rows="6" class=" py-4 form-control" name="description" placeholder="Task description..." style=" 
                                            border:none;
                                            background: #e9f4ff;
                                            border-radius: 12px;
                                            outline:none;
                                            padding:15px; 
                                            resize: none;"  >{{ $task->task_description }}</textarea>
                                          </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <input type="datetime-local" class="form-control" name="end_date" placeholder="Due date"  style="border-radius:10px; height:50px;" value="{{ date('Y-m-d\TH:i', strtotime($task->end_date)) }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group my-2 ml-3">

                                               
                                                <label class="custom-checkbox">
                                                    {{-- <input id="false" type="hidden" name="notification" value="False" />
                                                    <input class="custom-checkbox-input"  id="true" name="notification" value="True" type="checkbox"> --}}
                                                    <input id="chekcbox-input" type="hidden" name="notification" @if($task->notification=="on") value="true" @else value="false" @endif>
                                                    <span class="custom-checkbox-text"><img id="checkbox-img" style="cursor: pointer"  src="@if($task->notification=="on")
                                                        /images/icons/alert_on_icon.svg
                                                        @else
                                                        /images/icons/alert_off_icon.svg
                                                        @endif" alt=""> &nbsp;  Alert</span>
                                                  </label>

                                            </div>
                                        </div>
                                    </div>
                                         
                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="button" class="btn " style="background-color: #D4E5F9; font-weight:700;"> <a href=" {{route('tasks')}}" style="text-decoration: none; color:#000;">Cancel</a> </button>
                                            </div>
                                            <div class="col">
                                                <button type="submit"  name="create" class="btn btn-primary float-right"
                                                style="background-color:#1F1A6B;font-weight:700;" >Edit</button> 
                                            </div>
                                        </div>
                                 </form>
                                </div>
                             
                       
                              
                            
                              </div>
                      
                        
                             
                    </div>
                   
                
  
       
                </div>
  
            </div>
                        
        </div>
        <script>
            $(document).ready(function() {
              $("#checkbox-img").click(function() {
                  if ($("#chekcbox-input").val()=="true") {
                      $("#checkbox-img").attr("src","/images/icons/alert_off_icon.svg");
                     
                     $("#chekcbox-input").val('false')
                  } else {
                      $("#checkbox-img").attr("src","/images/icons/alert_on_icon.svg");
                      $("#chekcbox-input").val('true')
                  }
              });
          });
      </script>
    @endsection  

  