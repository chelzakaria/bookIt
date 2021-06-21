@extends('layouts.app')
@section('content') 
<style>
.card.draggable {
    margin-bottom: 1rem;
    cursor: grab;
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
    var h=0,h1
    document.getElementById('g').childNodes.forEach(element => {
      if(document.getElementById('g').childNodes[h].className=="card draggable shadow-sm")  
        h1++;
        h++
    });
    document.getElementById('span1').innerText=i1-1
    document.getElementById('span2').innerText=j1-1
    document.getElementById('span3').innerText=h1-1
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
<!--debut-->

<div class="container-fluid pt-3">
    <div class="row flex-row flex-sm-nowrap py-3">
        
        <div class="col-sm-6 col-md-4 col-xl-3 ml-5" >
            <div class="card bg-light" style="width: 270px; min-height:70vh">
                <div class="card-body"  style="background-color: #E3F0FF" >
                    <h6 class="d-inline" style="font-weight:700; font-size:20px;">To do  </h6>
                    <span class="float-right text-center" id="span1" style="font-weight:600; display: inline-block;width: 25px; background:#BDDDF8; border-radius:3px; font-size:17px;">1</span>
                    <div class="items " id="e" >
                        <!--task1-->
                        
                        <div class="card draggable shadow-sm" style="visibility: hidden"></div>
                        <div class="dropzone rounded " ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp;</div> 
                            @foreach ($tasks as $task)
                            @if ($task->status === "not started")
                                
                             
                        <div class="card draggable shadow-sm" style="border-radius: 10px;background-color: @switch($task->task_importance)
                        @case('high')
                            #EBB2B6
                            @break
                        @case('medium')
                            #FAF8C7
                            @break
                        @case('low')
                            #AFF0CF
                            @break
                                          @endswitch 
                          ;" id="cd<?php echo $task->id?>" draggable="true" ondragstart="drag(event)">
                            <div class="card-body p-2">
                                <div class="card-title" >
                                    <p style="font-weight:700; font-size:15px;">{{$task->task_name}}</p>
                                </div>
                                <p>
                                    {{$task->task_description}}
                                </p>
                                {{-- <button class="btn btn-primary btn-sm">View</button> --}}
                            </div>
                        </div>
                        
                        <!---->
                        
                        
                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                        @endif
                        @endforeach
                       
                <a href="{{route('createtask')}}" style="text-decoration:none; color:#000;"><div class="text-center position-absolute mb-2 py-1"  style="background:#BDDDF8; bottom:0px;width:85%;border-radius:5px;"><span class="iconify" data-inline="false" data-icon="bi:plus-lg" style="font-size: 20px;"></span>
                </div></a>
                        
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 ml-5">
            <div class="card bg-light"  style="width: 270px">
                <div class="card-body" style="background-color: #E3F0FF">
                    <h6 class="d-inline" style="font-weight:700; font-size:20px;">In progress  </h6>
                    <span class="float-right text-center" id="span2" style="font-weight:600; display: inline-block;width: 25px; background:#BDDDF8; border-radius:3px; font-size:17px;">1</span>
                    <div class="items " id="f">
 
                        <div class="card draggable shadow-sm" style="visibility: hidden"></div>
                        <div class="dropzone rounded " ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp;</div> 
                        @foreach ($tasks as $task)
                        @if ($task->status === "in progress")
                            
                        <div class="card draggable shadow-sm" style="border-radius: 10px;background-color:@switch($task->task_importance)
                            @case('high')
                                #EBB2B6
                                @break
                            @case('medium')
                                #FAF8C7
                                @break
                            @case('low')
                                #AFF0CF
                                @break
                                              @endswitch
                        ;" id="cd<?php echo $task->id?>" draggable="true" ondragstart="drag(event)">
                            <div class="card-body p-2">
                                <div class="card-title">
                                  
                                    <p style="font-weight:700; font-size:15px;">{{$task->task_name}}</p>
                                </div>
                                <p>
                                    {{$task->task_description}} 
                                </p>
                                {{-- <button class="btn btn-primary btn-sm">View</button> --}}
                            </div>
                        </div>
                        
                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)">  &nbsp; </div>
                        @endif
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 ml-5 ">
            <div class="card bg-light "  style="width: 270px;">
                <div class="card-body" style="background-color: #E3F0FF; ">
                    <h6 class="d-inline" style="font-weight:700; font-size:20px;">Completed  </h6>
                    <span class="float-right text-center" id="span3" style="font-weight:600; display: inline-block;width: 25px; background:#BDDDF8; border-radius:3px; font-size:17px;">1</span>
                    <div class="items " id="g">
                        
                        <div class="card draggable shadow-sm" style="visibility: hidden"></div>
                        <div class="dropzone rounded " ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp;</div> 
                        @foreach ($tasks as $task)
                        @if ($task->status === "done")
                        <div class="card draggable shadow-sm" style="border-radius: 10px;background-color:@switch($task->task_importance)
                            @case('high')
                                #EBB2B6
                                @break
                            @case('medium')
                                #FAF8C7
                                @break
                            @case('low')
                                #AFF0CF
                                @break
                                              @endswitch;"
                         id="cd<?php echo $task->id?>" draggable="true" ondragstart="drag(event)">
                          
                            <div class="card-body p-2">
                                <div class="card-title">
                                   
                                    <p style="font-weight:700; font-size:15px;">{{$task->task_name}}</p>
                                </div>
                                <p>
                                    This is a description
                                </p>
                                {{-- <button class="btn btn-primary btn-sm">{{$task->task_description}}</button> --}}
                            </div>
                        </div>
                        
                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                        @endif
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--fin-->  
 
                           </div>

                </div>

   
            </div>

        </div>
                  
    
@endsection  
