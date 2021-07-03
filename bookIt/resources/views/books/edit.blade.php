
@extends('layouts.app')
    @section('content') 
    
        <div class="container-fluid">
            <div class="row">
                @include('notes.layouts.sidebar')
                <style>
                          ::placeholder{
                            font-weight: 600;
                            font-size: 16px;
                            line-height: 20px;
                          }
                    #select   {
                        font-family: fontAwesome;
                        
                    }
  
                    </style>
                <div class="col">
                    <div class="container py-3">
                        <div class="d-flex flex-row">
                            <p style="font-weight:700; font-size:30px;">

                                Edit Book

                            </p>  
                            <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                                <img src="images/about_img.svg" alt="" style="max-width:100%;
                                max-height:100%; ">
                            </div>
                        </div>


                        <hr style="border-top: 1px solid #00000023;">
                        <form action="{{route('books.update', $book->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <input type="text" class="form-control" name="title" placeholder="Title" style="border-radius:10px; height:50px;"  autocomplete="off" value="{{ $book->title}}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <input type="text" class="form-control" name="author" placeholder="Author" style="border-radius:10px; height:50px;"  autocomplete="off" value="{{ $book->author}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="num_page" placeholder="Number of pages" style="border-radius:10px; height:50px;" autocomplete="off" min="1" value="{{ $book->num_page}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <select class="custom-select"  name="category"   style="border-radius:10px; height:50px; ">
                                                <option  disabled="disabled" >Select a category</option>
                                                <option @if ($book->category==="Arts & Music")
                                                    selected
                                                @endif>Arts & Music</option>
                                                <option @if($book->category==="Biographies")
                                                    selected
                                                @endif>Biographies</option>
                                                <option @if ($book->category==="Business")
                                                    selected
                                                @endif>Business</option>
                                                <option @if ($book->category==="Comics")
                                                    selected
                                                @endif>Comics</option>
                                                <option @if ($book->category==="Computers & Tech")
                                                    selected
                                                @endif>Computers & Tech</option>
                                                <option @if ($book->category==="Cooking")
                                                    selected
                                                @endif>Cooking</option>
                                                <option @if ($book->category==="Entertainment")
                                                    selected
                                                @endif>Entertainment</option>
                                                <option @if ($book->category==="History")
                                                    selected
                                                @endif>History</option>
                                                <option @if ($book->category==="Arts & Music")
                                                    selected
                                                @endif>Horror</option>
                                                <option @if ($book->category==="Kids")
                                                    selected
                                                @endif>Kids</option>
                                                <option @if ($book->category==="Mysteries")
                                                    selected
                                                @endif>Mysteries</option>
                                                <option @if ($book->category==="Romance")
                                                    selected
                                                @endif>Romance</option>
                                                <option @if ($book->category==="Sci-Fi & Fantasy")
                                                    selected
                                                @endif>Sci-Fi & Fantasy</option>
                                                <option @if ($book->category==="Science")
                                                    selected
                                                @endif>Science</option>
                                                <option @if ($book->category==="Sports")
                                                    selected
                                                @endif>Sports</option>
                                                <option @if ($book->category==="True Crime")
                                                    selected
                                                @endif>True Crime</option>
                                                <option @if ($book->category==="Others")
                                                    selected
                                                @endif>Others</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select id="select" class="custom-select"  name="rating"   style="border-radius:10px; height:50px; ">
                                                <option selected="true" disabled="disabled" >Rating</option>
                                                @for ($i = 1; $i < 6; $i++)
                                                <option @if ($book->rating === $i)
                                                    selected
                                                @endif  value={{$i}} style="color: #F0C808;">
                                                 @if ($i>=1)
                                                 &#xf005;
                                                 @endif &nbsp;
                                                 @if ($i>=2)
                                                 &#xf005;
                                                 @endif &nbsp;
                                                 @if ($i>=3)
                                                 &#xf005;
                                                 @endif &nbsp;
                                                 @if ($i>=4)
                                                 &#xf005;
                                                 @endif &nbsp;
                                                 @if ($i>=5)
                                                 &#xf005;
                                                 @endif
                                         
                                                 @endfor
                                        
                                            </select>
                                        
                                         </div>
                                   </div>
                                  </div>  
                                  <div class="row">
                                        <div class="col">
                                            <textarea rows="8" class=" py-4 form-control" name="description" placeholder="Description..." style=" 
                                            border:none;
                                            background: #e9f4ff;
                                            border-radius: 12px;
                                            outline:none;
                                            padding:15px; 
                                            resize: none;">{{$book->description}}</textarea>
                                          </div>
                                    </div>
                                        <div class="row mt-3">
                                          <div class="col">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="cover"  >
                                                <label class="custom-file-label" for="customFile">Choose image</label>

                                              </div>
                                          </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="button" class="btn " style="background-color: #D4E5F9; font-weight:700;"> <a href=" {{route('books')}}" style="text-decoration: none; color:#000;">Cancel</a> </button>
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
    @endsection  

  