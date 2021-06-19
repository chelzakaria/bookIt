@extends('layouts.app')
@section('content') 
<style>
.card.draggable {
    margin-bottom: 1rem;
    cursor: grab;
}

.droppable {
    background-color: var(--success);
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
            <div class="card bg-light" style="width: 270px">
                <div class="card-body" style="background-color: #E3F0FF" >
                    <h6 style="font-weight:700; font-size:20px;">To do</h6>
                    <div class="items " >
                        <!--task1-->
                        <div class="card draggable shadow-sm " style="border-radius: 20px" id="cd1" draggable="true" ondragstart="drag(event)">
                            <div class="card-body p-2 " >
                                <div class="card-title">
                                 
                                    <p style="font-weight:700; font-size:15px;">Task1</p>
                                </div>
                                <p>
                                  description
                                </p>
                                <button class="btn btn-primary btn-sm">View</button>
                            </div>
                        </div>
                        <!--task2-->
                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                        <div class="card draggable shadow-sm" style="border-radius: 20px" id="cd2" draggable="true" ondragstart="drag(event)">
                            <div class="card-body p-2">
                                <div class="card-title">
                                
                                    <p style="font-weight:700; font-size:15px;">Task2</p>
                                </div>
                                <p>
                                    this is a description
                                </p>
                                <button class="btn btn-primary btn-sm">View</button>
                            </div>
                        </div>
                        <!---->
                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 ml-5">
            <div class="card bg-light"  style="width: 270px">
                <div class="card-body" style="background-color: #E3F0FF">
                    <h6 style="font-weight:700; font-size:20px;">In progress</h6>
                    <div class="items ">
                        <div class="card draggable shadow-sm" style="border-radius: 20px" id="cd9" draggable="true" ondragstart="drag(event)">
                            <div class="card-body p-2">
                                <div class="card-title">
                                  
                                    <p style="font-weight:700; font-size:15px;">Task3</p>
                                </div>
                                <p>
                                    This is a description 
                                </p>
                                <button class="btn btn-primary btn-sm">View</button>
                            </div>
                        </div>
                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 ml-5 ">
            <div class="card bg-light "  style="width: 270px;">
                <div class="card-body" style="background-color: #E3F0FF; ">
                    <h6 style="font-weight:700; font-size:20px;">Completed</h6>
                    <div class="items " >
                        <div class="card draggable shadow-sm" style="border-radius: 20px" id="cd11" draggable="true" ondragstart="drag(event)">
                            <div class="card-body p-2">
                                <div class="card-title">
                                   
                                    <p style="font-weight:700; font-size:15px;">Task4</p>
                                </div>
                                <p>
                                    This is a description
                                </p>
                                <button class="btn btn-primary btn-sm">View</button>
                            </div>
                        </div>
                        

                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
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
