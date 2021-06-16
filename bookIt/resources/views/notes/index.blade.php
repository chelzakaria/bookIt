  @extends('layouts.app')
    @section('content') 
    
        <div class="container-fluid">
            <div class="row">
                @include('notes.layouts.sidebar')
                <div class="col">
                    <div class="container py-3">
                        <div class="d-flex flex-row">
                            <p style="font-weight:700; font-size:30px;">
                                Notes
                            </p>  
                            <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                                <img src="images/about_img.svg" alt="" style="max-width:100%;
                                max-height:100%; ">
                            </div>
                        </div>
                        <form action="{{route('notes.search')}}" method="POST" role="search" >

                        <div class="d-flex flex-row">
                                @csrf
                                 <div class="form-group d-inline mt-0">
                                    <select class="custom-select mb-0 mr-5"  name="word">
                                        <option selected="true" disabled="disabled" >Filter notes</option>
                                        <option>Quote</option>
                                        <option>Idea</option>
                                        <option>Thought</option>
                                        <option>Uncategorized</option>
                                    </select>
                                </div>
                                <button class="btn" type="submit" style="position: relative; bottom:10px"> <span class="iconify" data-inline="false" data-icon="codicon:filter-filled" style="color: #000; font-size: 30px;"></span></button>
                            </form>
                            
                            <div class="ml-auto mr-0">
                                <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('createnote')}}" style="text-decoration: none; color:#fff;">Create new note</a> </button>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid #00000023;">
                        
                            <div class="row">
 
                                @if ($notes->count())
                                    @foreach ($notes as $note)
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <a href="/notes/{{$note->id}}" style="text-decoration: none;color:black;"> 
                                         <div class="card mb-5 " style="width: 18rem; height:9rem;border-radius:10px;background:
                                         @switch($note->type)
                                            @case("Quote")
                                                #B8BFFA;
                                                @break

                                            @case("Idea")
                                            #F6B9B9;
                                                @break
                                                @case("Thought")
                                                #16e56957;
                                                @break
                                            @default
                                               #FEFAAF;
                                        @endswitch
                                         ">
                                             <div class="card-body pb-0">
                                               {{-- <h5 class="card-title" style="font-weight: 800;"><a href="/notes/{{$note->id}}">title</a></h5> --}}
                                               <span class="card-text " style="font-weight: 400;font-size:15px; 
                                                 height:4.2rem;     overflow: hidden;
                                                    display: -webkit-box;
                                                    -webkit-line-clamp: 3;
                                                    -webkit-box-orient: vertical;   
                                                 ">
                                                 {!! html_entity_decode($note->body) !!}</span>  
                                                  
                                                <p class="text-muted float-right mb-0 mt-4" style="font-weight: 300;font-size:13px;">{{ $note->created_at }}</p>
                                             </div>
                                           </div>
                                        </a>
                                        </div>
                                     </div>
                                    @endforeach
                                @else
                                    <p>No notes found</p>
                                @endif
                               </div>

                    </div>
  
       
                </div>
  
            </div>
                        
        </div>
    @endsection  
 