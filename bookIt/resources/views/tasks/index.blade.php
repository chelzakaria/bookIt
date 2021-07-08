@extends('layouts.app')
@section('content') 
<style>
.card.draggable {
    margin-bottom: 1rem;
    cursor: grab;
}
.btn:focus,.btn:active {
   outline: none !important;
   box-shadow: none;
}

.droppable {
    background-color: #CAE3F9;
    min-height: 120px;
    margin-bottom: 1rem;
}

    </style>
    <div class="container-fluid">
        <script>
        const drag = (event) => {
  event.dataTransfer.setData("text/plain", event.target.id);
}

const allowDrop = (ev) => {
  ev.preventDefault();
  if (hasClass(ev.target,"dropzone")) {
    addClass(ev.target,"droppable");
  }
}

const clearDrop = (ev) => {
    removeClass(ev.target,"droppable");
}

const drop = (event) => {
  event.preventDefault();
  const data = event.dataTransfer.getData("text/plain");
  const element = document.querySelector(`#${data}`);
  var x=document.getElementById(data)
 
  try {
    // remove the spacer content from dropzone
    event.target.removeChild(event.target.firstChild);
    // add the draggable content
    event.target.appendChild(element);
    // remove the dropzone parent
    unwrap(event.target);
  } catch (error) {
    console.warn("can't move the item to the same place")
  }
  updateDropzones();
}

const updateDropzones = () => {

    var dz = $('<div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>');
    $('.dropzone').remove();
    dz.insertAfter('.card.draggable');
    $(".items:not(:has(.card.draggable))").append(dz);
    
};

function hasClass(target, className) {
    return new RegExp('(\\s|^)' + className + '(\\s|$)').test(target.className);
}

function addClass(ele,cls) {
  if (!hasClass(ele,cls)) ele.className += " "+cls;
}

function removeClass(ele,cls) {
  if (hasClass(ele,cls)) {
    var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
    ele.className=ele.className.replace(reg,' ');
  }
}

function unwrap(node) {
    node.replaceWith(...node.childNodes);
    
    var i=0
    var i1=0
    document.getElementById('e').childNodes.forEach(element => {
      if(document.getElementById('e').childNodes[i].className=="card draggable shadow-sm")
    i1++
    i++
    });

    var j=0,j1=0
    document.getElementById('f').childNodes.forEach(element => {
      if(document.getElementById('f').childNodes[j].className=="card draggable shadow-sm")  
        j1++;
        j++
    });
    var h=0,h1=0
    document.getElementById('g').childNodes.forEach(element => {
      if(document.getElementById('g').childNodes[h].className=="card draggable shadow-sm")  
        h1++;
        h++
    });
    document.getElementById('span1').innerText=i1-1
    document.getElementById('span2').innerText=j1-1
    document.getElementById('span3').innerText=h1-1
    document.getElementById("tst").click();
    document.getElementById("tst2").click();
    document.getElementById("tst3").click();
  
}

            </script>
            
        <div class="row">
            @include('notes.layouts.sidebar')
            <div class="col">
                <div class="container py-3">
                    <div class="d-flex flex-row">
                        <p style="font-weight:700; font-size:30px;">
                            Tasks  
                        </p>  
                        @include('layouts.notification')

          
            
                               
                         
                            </div>
                         
                          
                        
                    </div>
                    @if(session('warning'))
                    <div class="col text-center w-75 mx-auto mb-3">
                          <div class="jumbotron py-2 mb-2 bg-warning    mx-auto">
                                {{ session('warning') }}
                          </div>
                    </div>
                @endif
                    <hr style="border-top: 1px solid #00000023;">
                    
                        <div class="row">
<!--debut-->

<div class="container-fluid pt-3">
    <div class="row flex-row flex-sm-nowrap py-3">
        
        <div class="col-sm-6 col-md-4 col-xl-3 ml-5" >
            <div class="card bg-light" style="width: 270px; min-height:70vh">
                <div class="card-body"  style="background-color: #E3F0FF" >
                    <h6 class="d-inline mb-2" style="font-weight:700; font-size:20px;">To do  </h6>

                    <span class="float-right text-center" id="span1" style="font-weight:600; display: inline-block;width: 25px; background:#BDDDF8; border-radius:3px; font-size:17px;">{{$count1}}</span>

                    <form id="formdrag">
                    <div class="items " id="e" >
                        <!--task1-->
                        <div class="card draggable shadow-sm" style="visibility: hidden"></div>
                        <div class="dropzone rounded " ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp;</div> 
                            @foreach ($tasks as $task)
                            @if ($task->status === "not started")
                                
                             
                        <div class="card draggable shadow-sm" style="border-radius: 10px;background-color: @switch($task->task_importance)
                        @case('high')
                            {{$setting->high_color}}
                            @break
                        @case('medium')
                            {{$setting->medium_color}}
                            @break
                        @case('low')
                            {{$setting->low_color}}
                            @break
                                          @endswitch 
                          ;" id="cd<?php echo $task->id?>" draggable="true" ondragstart="drag(event)">
                          <div class="dropdown position-absolute" style="top:-3px; right:-2px">
                            <a class="btn  " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none">
                                <img src="/images/icons/dots_horizontal_icon.svg" alt="" style="height: auto;width:;">                                            </a>
                          
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a   data-toggle="modal" data-target="#editTask{{$task->id}}" class="btn dropdown-item" >Edit</a>
                              <a data-toggle="modal" data-target="#exampleModal{{$task->id}}" class="btn dropdown-item" href="#"> <span>Delete</span>  </a>
                               
                            </div>
                            <div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this note?</h5>
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
                                                     
                                                    <a class="btn btn-danger " href="{{route('tasks.destroy', $task->id)}}" style="; font-weight: 700;"> <span>Delete</span>  </a>
                                                     
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                            <div class="card-body p-2">
                                <div class="card-title" >
                                    <a href="" style="text-decoration: none; color:#000;"><p style="font-weight:700; font-size:15px;">{{$task->task_name}}</p></a>
                                                                </div>
                                <p>
                                    {{$task->task_description}}
                                </p>


                               
                                <span class="badge 
                                @if((strtotime($task->end_date) - time() ) < 300)
                                badge-danger
                                @elseif((strtotime($task->end_date) - time() ) < 86400) 
                                badge-warning
                                @else
                                badge-success
                                @endif
                                py-1 px-2 mt-1">
                                    {{-- {{\Carbon\Carbon::parse($task->end_date)->rawFormat('d M')}} --}}
                                    {{\Carbon\Carbon::parse($task->end_date)->diffForHumans()}}
                                </span>
                            </div>
                        </div>
                        
                        <!---->
                        
                        
                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                        @endif
                        @endforeach
                         
                <a data-toggle="modal" data-target="#addTaskNotStarted"
           
                style="text-decoration:none; color:#000;"><div class="text-center position-absolute mb-2 py-1"  style="background:#BDDDF8; bottom:0px;width:85%;border-radius:5px;"><span class="iconify" data-inline="false" data-icon="bi:plus-lg" style="font-size: 20px;"></span>
                </div></a>
                        
                </div>
                <button type="submit" id="tst" style="visibility: hidden"></button>
                    </form>
                </div>
            </div>
             {{-- add tsk not started modal --}}
             <div class="modal fade" id="addTaskNotStarted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700; font-size:25px;">Add task
                            </h5>
                         
                        </div>
                        <div class="modal-body">
                            <div class="row mt-0">
                                @error('type')
                                <div class="col text-center ">
                                       
                                       <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
    
                                       {{$message}}
                                        </div>
    
                                        
                                </div>
                                @enderror
                                @error('body')
                                <div class="col text-center ">
                                    <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                                    {{$message}}
                                     </div>
                                    
                             </div>
                             @enderror
                            </div>
                             
                            <form action="{{route('tasks')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="task_name" placeholder="Task name" style="border-radius:10px; height:50px;"  autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <select class="custom-select"  name="status"   style="border-radius:10px; height:50px; ">
                                                    <option  disabled="disabled" >Status</option>
                                                    <option  
                                                        selected
                                                    >not started</option>
                                                    <option  >in progress</option>
                                                    <option  >done</option>
                                                 </select>
                                             
                                              </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               <select class="custom-select"  name="importance"   style="border-radius:10px; height:50px; ">
                                                   <option selected="true" disabled="disabled" >Priority</option>
                                                    <option>high</option>
                                                   <option>medium</option>
                                                   <option>low</option>
                                                    
                                               </select>
                                            
                                             </div>
                                       </div>
                                       <div class="col-md-4">
                                        <div class="form-group">
                                           <select class="custom-select"  name="book"   style="border-radius:10px; height:50px; ">
                                               <option selected="true" disabled="disabled" >Select a book</option>
                                               @foreach ($books as $book)
                                               <option>{{$book->title}}</option>  
                                             @endforeach
                                               
                                                
                                           </select>
                                        
                                         </div>
                                   </div>
                                           
                                      </div>  
                                      <div class="row">
    
                                            <div class="col">
                                                <textarea rows="6" class=" py-4 form-control" name="description" placeholder="Task description..." style=" 
                                                border:none;
                                                background: #e9f4ff;
                                                border-radius: 10px;
                                                outline:none;
                                                padding:15px; 
                                                resize: none;"  ></textarea>
                                              </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="end_date" placeholder="Due date" onfocus="(this.type='datetime-local')" style="border-radius:10px; height:50px;" >
                                                </div>
                                            </div>
                                            <div class="col-2">
                                         
    
                                                  <div class="form-group mt-2">
                                                    <label class="custom-checkbox">
                                                 
                                                        <input id="chekcbox-inputnt" type="hidden" name="notification" value="true">
                                                        <span class="custom-checkbox-text"><img id="checkbox-imgnt" style="cursor: pointer" src="/images/icons/alert_on_icon.svg" alt="" onclick="click2('nt')"> &nbsp;  Alert</span>
                                                      </label>
                                                  </div>
                                            </div>
                                            <div class="col-4">
                                                <select id="selectTiment" class="custom-select"  name="reminder_time"   style="border-radius:10px; height:50px; " >
                                                    <option selected="true" disabled="disabled" >Set due date reminder</option>
                                                
                                                    <option value="300">5 Minutes before</option>  
                                                    <option value="600">10 Minutes before</option>  
                                                    <option value="900">15 Minutes before</option>  
                                                    <option value="3600">1 Hour before</option> 
                                                    <option value="7200">2 Hours before</option>  
                                                    <option value="86400">1 Day before</option>
                                                    <option value="172800">2 Days before</option>
    
    
                                                </select>
                                            </div>
                                        </div>
                                             
                               
                                     
                    </div>
                    <div class="modal-footer">
                     
                        <div class="col">
                            <button type="button" class="btn float-left" data-dismiss="modal" style="background-color: #D4E5F9; font-weight:700;"> <a   style="text-decoration: none; color:#000;">Cancel</a> </button>
                        </div>
                        <div class="col">
                            <button type="submit"  name="create" class="btn btn-primary float-right"
                            style="background-color:#1F1A6B;font-weight:700;  " >Create</button> 
                        </div>
              </form>
             </div>
                </div>
            </div>
             </div>
            {{-- end of add task in progress modal --}}
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 ml-5">
            <div class="card bg-light"  style="width: 270px; min-height:70vh">
                <div class="card-body" style="background-color: #E3F0FF">
                    <h6 class="d-inline" style="font-weight:700; font-size:20px;">In progress  </h6>

                    <span class="float-right text-center" id="span2" style="font-weight:600; display: inline-block;width: 25px; background:#BDDDF8; border-radius:3px; font-size:17px;">{{$count2}}</span>

                    <form id="formdrag2">
                    <div class="items " id="f">
 
                        <div class="card draggable shadow-sm" style="visibility: hidden"></div>
                        <div class="dropzone rounded " ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp;</div> 
                        @foreach ($tasks as $task)
                        @if ($task->status === "in progress")
                            
                        <div class="card draggable shadow-sm" style="border-radius: 10px;background-color:@switch($task->task_importance)
                            @case('high')
                            {{$setting->high_color}}
                                @break
                            @case('medium')
                                {{$setting->medium_color}}
                                @break
                            @case('low')
                                {{$setting->low_color}}
                                @break
                                              @endswitch
                        ;" id="cd<?php echo $task->id?>" draggable="true" ondragstart="drag(event)">
                              <div class="dropdown position-absolute" style="top:-3px; right:-2px">
                                <a class="btn  " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none">
                                    <img src="/images/icons/dots_horizontal_icon.svg" alt="" style="height: auto;width:;">                                            </a>
                              
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a   data-toggle="modal" data-target="#editTask{{$task->id}}" class="btn dropdown-item">Edit</a>
                                        <a data-toggle="modal" data-target="#exampleModal{{$task->id}}" class="btn dropdown-item" href="#"> <span>Delete</span>  </a>
                                         
                                      </div>
                                <div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this note?</h5>
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
                                                         
                                                        <a class="btn btn-danger " href="{{route('tasks.destroy', $task->id)}}" style="; font-weight: 700;"> <span>Delete</span>  </a>
                                                         
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            <div class="card-body p-2">
                                <div class="card-title">
                                  
                                    <a href="" style="text-decoration: none; color:#000;"><p style="font-weight:700; font-size:15px;">{{$task->task_name}}</p></a>                                </div>
                                <p>
                                    {{$task->task_description}} 
                                </p>
                                <span class="badge 
                                @if((strtotime($task->end_date) - time() ) < 300)
                                badge-danger
                                @elseif((strtotime($task->end_date) - time() ) < 86400) 
                                badge-warning
                                @else
                                badge-success
                                @endif
                                py-1 px-2 mt-1">
                                    {{-- {{\Carbon\Carbon::parse($task->end_date)->rawFormat('d M')}} --}}
                                    {{\Carbon\Carbon::parse($task->end_date)->diffForHumans()}}
                                </span>
                             </div>
                        </div>
                        
                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)">  &nbsp; </div>
                        @endif
                        @endforeach

                        <a data-toggle="modal" data-target="#addTaskInProgress" 
                         style="text-decoration:none; color:#000;"><div class="text-center position-absolute mb-2 py-1"  style="background:#BDDDF8; bottom:0px;width:85%;border-radius:5px;"><span class="iconify" data-inline="false" data-icon="bi:plus-lg" style="font-size: 20px;"></span>
                        </div></a>
                    </div>
                    <button type="submit" id="tst2" style="visibility: hidden"></button>
                    </form>
                </div>
            </div>
                 {{-- Add task in progress modal --}}
                 <div class="modal fade" id="addTaskInProgress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700; font-size:25px;">Add task
                                </h5>
                             
                            </div>
                            <div class="modal-body">
                                <div class="row mt-0">
                                    @error('type')
                                    <div class="col text-center ">
                                           
                                           <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
        
                                           {{$message}}
                                            </div>
        
                                            
                                    </div>
                                    @enderror
                                    @error('body')
                                    <div class="col text-center ">
                                        <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                                        {{$message}}
                                         </div>
                                        
                                 </div>
                                 @enderror
                                </div>
                                 
                                <form action="{{route('tasks')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="task_name" placeholder="Task name" style="border-radius:10px; height:50px;"  autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                         
                                            <div class="col-md-4">
                                                 <div class="form-group">
                                                    <select class="custom-select"  name="status"   style="border-radius:10px; height:50px; ">
                                                        <option  disabled="disabled" >Status</option>
                                                        <option  
                                                            
                                                        >not started</option>
                                                        <option selected >in progress</option>
                                                        <option  >done</option>
                                                     </select>
                                                 
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                   <select class="custom-select"  name="importance"   style="border-radius:10px; height:50px; ">
                                                       <option selected="true" disabled="disabled" >Priority</option>
                                                        <option>high</option>
                                                       <option>medium</option>
                                                       <option>low</option>
                                                        
                                                   </select>
                                                
                                                 </div>
                                           </div>
                                           <div class="col-md-4">
                                            <div class="form-group">
                                               <select class="custom-select"  name="book"   style="border-radius:10px; height:50px; ">
                                                   <option selected="true" disabled="disabled" >Select a book</option>
                                                   @foreach ($books as $book)
                                                   <option>{{$book->title}}</option>  
                                                 @endforeach
                                                   
                                                    
                                               </select>
                                            
                                             </div>
                                       </div>
                                               
                                          </div>  
                                          <div class="row">
        
                                                <div class="col">
                                                    <textarea rows="6" class=" py-4 form-control" name="description" placeholder="Task description..." style=" 
                                                    border:none;
                                                    background: #e9f4ff;
                                                    border-radius: 10px;
                                                    outline:none;
                                                    padding:15px; 
                                                    resize: none;"  ></textarea>
                                                  </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="end_date" placeholder="Due date" onfocus="(this.type='datetime-local')" style="border-radius:10px; height:50px;" >
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                             
        
                                                      <div class="form-group mt-2">
                                                        <label class="custom-checkbox">
                                                     
                                                            <input id="chekcbox-inputip" type="hidden" name="notification" value="true">
                                                            <span class="custom-checkbox-text"><img id="checkbox-imgip" style="cursor: pointer" src="/images/icons/alert_on_icon.svg" alt="" onclick="click2('ip')"> &nbsp;  Alert</span>
                                                          </label>
                                                      </div>
                                                </div>
                                                <div class="col-4">
                                                    <select id="selectTimeip" class="custom-select"  name="reminder_time"   style="border-radius:10px; height:50px; " >
                                                        <option selected="true" disabled="disabled" >Set due date reminder</option>
                                                    
                                                        <option value="300">5 Minutes before</option>  
                                                        <option value="600">10 Minutes before</option>  
                                                        <option value="900">15 Minutes before</option>  
                                                        <option value="3600">1 Hour before</option> 
                                                        <option value="7200">2 Hours before</option>  
                                                        <option value="86400">1 Day before</option>
                                                        <option value="172800">2 Days before</option>
        
        
                                                    </select>
                                                </div>
                                            </div>
                                                 
                                   
                                         
                        </div>
                        <div class="modal-footer">
                         
                            <div class="col">
                                <button type="button" class="btn float-left" data-dismiss="modal" style="background-color: #D4E5F9; font-weight:700;"> <a   style="text-decoration: none; color:#000;">Cancel</a> </button>
                            </div>
                            <div class="col">
                                <button type="submit"  name="create" class="btn btn-primary float-right"
                                style="background-color:#1F1A6B;font-weight:700;  " >Create</button> 
                            </div>
                  </form>
                 </div>
                    </div>
                </div>
                 </div>
                {{-- end of add task  modal --}}
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 ml-5 ">
            <div class="card bg-light "  style="width: 270px;min-height:70vh">
                <div class="card-body" style="background-color: #E3F0FF; ">
                    <h6 class="d-inline" style="font-weight:700; font-size:20px;">Completed  </h6>

                    <span class="float-right text-center" id="span3" style="font-weight:600; display: inline-block;width: 25px; background:#BDDDF8; border-radius:3px; font-size:17px;">{{$count3}}</span>

                    <form id="formdrag3">
                    <div class="items " id="g">
                        
                        <div class="card draggable shadow-sm" style="visibility: hidden"></div>
                        <div class="dropzone rounded " ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp;</div> 
                        @foreach ($tasks as $task)
                        @if ($task->status === "done")
                        <div class="card draggable shadow-sm" style="border-radius: 10px;background-color:@switch($task->task_importance)
                            @case('high')
                                {{$setting->high_color}}
                                @break
                            @case('medium')
                                {{$setting->medium_color}}
                                @break
                            @case('low')
                                {{$setting->low_color}}
                                @break
                                              @endswitch;"
                         id="cd<?php echo $task->id?>" draggable="true" ondragstart="drag(event)">
                         <div class="dropdown position-absolute" style="top:-3px; right:-2px">
                            <a class="btn  " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none">
                                <img src="/images/icons/dots_horizontal_icon.svg" alt="" style="height: auto;width:;">                                            </a>
                          
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a   data-toggle="modal" data-target="#editTask{{$task->id}}" class="btn dropdown-item">Edit</a>
                                    <a data-toggle="modal" data-target="#exampleModal{{$task->id}}" class="btn dropdown-item" href="#"> <span>Delete</span>  </a>
                                     
                                  </div>
                            <div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this note? {{$task->task_name}}</h5>
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
                                                     
                                                    <a class="btn btn-danger " href="{{route('tasks.destroy', $task->id)}}" style="; font-weight: 700;"> <span>Delete</span>  </a>
                                                     
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                            <div class="card-body p-2">
                                <div class="card-title">
                                   
                                    <a href="" style="text-decoration: none; color:#000;"><p style="font-weight:700; font-size:15px;">{{$task->task_name}}</p></a>
                                </div>
                                <p>

                                    {{$task->task_description}}

                                </p>
                                <span class="badge 
                                @if((strtotime($task->end_date) - time() ) < 300)
                                badge-danger
                                @elseif((strtotime($task->end_date) - time() ) < 86400) 
                                badge-warning
                                @else
                                badge-success
                                @endif
                                py-1 px-2 mt-1">
                                    {{-- {{\Carbon\Carbon::parse($task->end_date)->rawFormat('d M')}} --}}
                                    {{\Carbon\Carbon::parse($task->end_date)->diffForHumans()}}
                                </span>
                            </div>
                        </div>
                        
                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                        @endif
                        @endforeach

                        <a data-toggle="modal" data-target="#addTaskDone"  style="text-decoration:none; color:#000;"><div class="text-center position-absolute mb-2 py-1"  style="background:#BDDDF8; bottom:0px;width:85%;border-radius:5px;"><span class="iconify" data-inline="false" data-icon="bi:plus-lg" style="font-size: 20px;"></span>
                        </div></a>
                        
                    </div>
                    <button type="submit" id="tst3" style="visibility: hidden"></button>
                    </form>
                </div>
            </div>
             {{-- Add task in progress modal --}}
             <div class="modal fade" id="addTaskDone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700; font-size:25px;">Add task
                            </h5>
                         
                        </div>
                        <div class="modal-body">
                            <div class="row mt-0">
                                @error('type')
                                <div class="col text-center ">
                                       
                                       <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
    
                                       {{$message}}
                                        </div>
    
                                        
                                </div>
                                @enderror
                                @error('body')
                                <div class="col text-center ">
                                    <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                                    {{$message}}
                                     </div>
                                    
                             </div>
                             @enderror
                            </div>
                             
                            <form action="{{route('tasks')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="task_name" placeholder="Task name" style="border-radius:10px; height:50px;"  autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <select class="custom-select"  name="status"   style="border-radius:10px; height:50px; ">
                                                    <option  disabled="disabled" >Status</option>
                                                    <option  >not started</option>
                                                    <option  >in progress</option>
                                                    <option  selected >done</option>
                                                 </select>
                                             
                                              </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               <select class="custom-select"  name="importance"   style="border-radius:10px; height:50px; ">
                                                   <option selected="true" disabled="disabled" >Priority</option>
                                                    <option>high</option>
                                                   <option>medium</option>
                                                   <option>low</option>
                                                    
                                               </select>
                                            
                                             </div>
                                       </div>
                                       <div class="col-md-4">
                                        <div class="form-group">
                                           <select class="custom-select"  name="book"   style="border-radius:10px; height:50px; ">
                                               <option selected="true" disabled="disabled" >Select a book</option>
                                               @foreach ($books as $book)
                                               <option>{{$book->title}}</option>  
                                             @endforeach
                                               
                                                
                                           </select>
                                        
                                         </div>
                                   </div>
                                           
                                      </div>  
                                      <div class="row">
    
                                            <div class="col">
                                                <textarea rows="6" class=" py-4 form-control" name="description" placeholder="Task description..." style=" 
                                                border:none;
                                                background: #e9f4ff;
                                                border-radius: 10px;
                                                outline:none;
                                                padding:15px; 
                                                resize: none;"  ></textarea>
                                              </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="end_date" placeholder="Due date" onfocus="(this.type='datetime-local')" style="border-radius:10px; height:50px;" >
                                                </div>
                                            </div>
                                            <div class="col-2">
                                         
    
                                                  <div class="form-group mt-2">
                                                    <label class="custom-checkbox">
                                                 
                                                        <input id="chekcbox-inputdn" type="hidden" name="notification" value="true">
                                                        <span class="custom-checkbox-text"><img id="checkbox-imgdn" style="cursor: pointer" src="/images/icons/alert_on_icon.svg" alt="" onclick="click2('dn')"> &nbsp;  Alert</span>
                                                      </label>
                                                  </div>
                                            </div>
                                            <div class="col-4">
                                                <select id="selectTimedn" class="custom-select"  name="reminder_time"   style="border-radius:10px; height:50px; " >
                                                    <option selected="true" disabled="disabled" >Set due date reminder</option>
                                                
                                                    <option value="300">5 Minutes before</option>  
                                                    <option value="600">10 Minutes before</option>  
                                                    <option value="900">15 Minutes before</option>  
                                                    <option value="3600">1 Hour before</option> 
                                                    <option value="7200">2 Hours before</option>  
                                                    <option value="86400">1 Day before</option>
                                                    <option value="172800">2 Days before</option>
    
    
                                                </select>
                                            </div>
                                        </div>
                                             
                               
                                     
                    </div>
                    <div class="modal-footer">
                     
                        <div class="col">
                            <button type="button" class="btn float-left" data-dismiss="modal" style="background-color: #D4E5F9; font-weight:700;"> <a   style="text-decoration: none; color:#000;">Cancel</a> </button>
                        </div>
                        <div class="col">
                            <button type="submit"  name="create" class="btn btn-primary float-right"
                            style="background-color:#1F1A6B;font-weight:700;  " >Create</button> 
                        </div>
              </form>
             </div>
                </div>
            </div>
             </div>
            {{-- end of add task done modal --}}
        </div>
    </div>


</div>
<!--fin-->
 
                           </div>

                </div>

   
            </div>
{{-- edit task --}}
@foreach ($tasks as $task)
    

<div class="modal fade" id="editTask{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$task->id}}" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$task->id}}" style="font-weight:700; font-size:25px;">Edit task
                </h5>
             
            </div>
            <div class="modal-body">
                <div class="row mt-0">
                    @error('type')
                    <div class="col text-center ">
                           
                           <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">

                           {{$message}}
                            </div>

                            
                    </div>
                    @enderror
                    @error('body')
                    <div class="col text-center ">
                        <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                        {{$message}}
                         </div>
                        
                 </div>
                 @enderror
                </div>
                 
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
                                <div class="col-2">
                                    <div class="form-group my-2 ml-3">

                                       
                                        <label class="custom-checkbox{{$task->id}}">
                                    
                                            <input id="chekcbox-input{{$task->id}}" type="hidden" name="notification" @if($task->notification=="on") value="true" @else value="false" @endif>
                                            <span class="custom-checkbox-text"><img id="checkbox-img{{$task->id}}" style="cursor: pointer; z-index:11111;"  @if($task->notification=="on")
                                                src="/images/icons/alert_on_icon.svg"
                                                @else
                                                src="/images/icons/alert_off_icon.svg"
                                                @endif
                                                 alt="" onclick="click2({{$task->id}});"> &nbsp;  Alert</span>
                                          </label>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <select id="selectTime{{$task->id}}" class="custom-select"  name="reminder_time"   style="border-radius:10px; height:50px; "  @if($task->notification=="off") disabled @endif >
                                        <option @if ($task->reminder_time ===0)
                                            selected
                                        @endif disabled="disabled" >Set due date reminder</option>
                                    
                                        <option value="300" @if ($task->reminder_time ===300)
                                            selected
                                        @endif>5 Minutes before</option>  
                                        <option value="600" @if ($task->reminder_time ===600)
                                            selected
                                        @endif>10 Minutes before</option>  
                                        <option value="900" @if ($task->reminder_time ===900)
                                            selected
                                        @endif>15 Minutes before</option>  
                                        <option value="3600" @if ($task->reminder_time ===3600)
                                            selected
                                        @endif>1 Hour before</option> 
                                        <option value="7200" @if ($task->reminder_time ===7200)
                                            selected
                                        @endif>2 Hours before</option>  
                                        <option value="86400" @if ($task->reminder_time ===86400)
                                            selected
                                        @endif>1 Day before</option>
                                        <option value="172800" @if ($task->reminder_time ===172800)
                                            selected
                                        @endif>2 Days before</option>


                                    </select>
                                </div>
                            </div>
                                 
                     
                       
        <div class="modal-footer">
         
            <div class="col">
                <button type="button" class="btn float-left" data-dismiss="modal" style="background-color: #D4E5F9; font-weight:700;"> <a   style="text-decoration: none; color:#000;">Cancel</a> </button>
            </div>
            <div class="col">
                <button type="submit"  name="create" class="btn btn-primary float-right"
                style="background-color:#1F1A6B;font-weight:700;  " >Edit</button> 
            </div>
  </form>
 </div>
    </div>
</div>
 </div>
    </div>
 @endforeach
{{-- end of edit task --}}
        </div>
 <script>
     //for form1
    $('#formdrag').on('submit',function(e){
    e.preventDefault();
    var t=new Array()
    var i=0,j=0
    document.getElementById('e').childNodes.forEach(element => {
      if(document.getElementById('e').childNodes[i].className=="card draggable shadow-sm")  
        t.push(document.getElementById('e').childNodes[i].id)
        i++
    });
    t.shift()
    var str=t.join()
    e.preventDefault();
    $.ajax({
        type:"get",
        url:"/tasks/drag/"+str,
        data: $('#formdrag').serialize(),
        success: function(response){   
        console.log(response)
        },
        error: function(error){
            console.log(error)
        }
    });
});
//for form 2
$('#formdrag2').on('submit',function(e){
    e.preventDefault();
    var t=new Array()
    var i=0,j=0
    document.getElementById('f').childNodes.forEach(element => {
      if(document.getElementById('f').childNodes[i].className=="card draggable shadow-sm")  
        t.push(document.getElementById('f').childNodes[i].id)
        i++
    });
    t.shift()
    var str=t.join()
    e.preventDefault();
    $.ajax({
        type:"get",
        url:"/tasks/drag2/"+str,
        data: $('#formdrag2').serialize(),
        success: function(response){   
        console.log(response)
        },
        error: function(error){
            console.log(error)
        }
    });
});
//for form3
$('#formdrag3').on('submit',function(e){
    e.preventDefault();
    var t=new Array()
    var i=0,j=0
    document.getElementById('g').childNodes.forEach(element => {
      if(document.getElementById('g').childNodes[i].className=="card draggable shadow-sm")  
        t.push(document.getElementById('g').childNodes[i].id)
        i++
    });
    t.shift()
    var str=t.join()
    e.preventDefault();
    $.ajax({
        type:"get",
        url:"/tasks/drag3/"+str,
        data: $('#formdrag3').serialize(),
        success: function(response){   
        console.log(response)
        },
        error: function(error){
            console.log(error)
        }
    });
});

//role-form
// $('#role-form').on('submit',function(e){
//     e.preventDefault();
  
     
//     $.ajax({
//         type:"post",
//         url:"/tasks/1",
//         data: $('#role-form').serialize(),
//         success: function(response){   
//         console.log(response)
//         },
//         error: function(error){
//             console.log(error)
//         }
//     });
// });
$(document).ready(function() {
                $("#checkbox-img").click(function() {
                    if ($("#chekcbox-input").val()=="true") {
                        console.log('off');
                        $("#checkbox-img").attr("src","/images/icons/alert_off_icon.svg");
                       $('#selectTime').prop( "disabled", true );
                       $("#chekcbox-input").val('false')
                    } else {
                        console.log('on');

                        $("#checkbox-img").attr("src","/images/icons/alert_on_icon.svg");
                        $("#chekcbox-input").val('true');
                       $('#selectTime').prop( "disabled", false );

                    }
                });
                
            });       
           function click2(id) {
                     
                    let img = "#checkbox-img"+id;
                    let sel = '#selectTime'+id;
                    let input = "#chekcbox-input"+id;
                    console.log($(input));
                    if ($(input).val()=="true") {
                        $(img).attr("src","/images/icons/alert_off_icon.svg");
                       $(sel).prop( "disabled", true );
                       $(input).val('false')
                    } else {
                     
                        $(img).attr("src","/images/icons/alert_on_icon.svg");
                        $(input).val('true');
                       $(sel).prop( "disabled", false );

                    }
                } 
               
 </script>       
                  
    
@endsection  
