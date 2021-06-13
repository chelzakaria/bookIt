@extends('layouts.app')
@section('content') 
    <div class="container-fluid">
        <div class="row">
            @include('notes.layouts.sidebar')
            <div class="col">
                <div class="container py-3">
                    <div class="d-flex flex-row">
                        <p style="font-weight:700; font-size:30px;">
                            Books
                        </p>  
                        <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                            <img src="images/about_img.svg" alt="" style="max-width:100%;
                            max-height:100%; ">
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        
                        <div>
                            <button type="button" class="btn " style="background-color: #1F1A6B; font-weight:700;"> <a href=" {{route('books')}}" style="text-decoration: none; color:#fff;">Back</a> </button>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #00000023;">
                

                    <div class="jumbotron  pt-4 pb-2" >
                        <div class="row" style="min-height: 55%">
                        <div class="col-6 col-md-5 col-lg-3" >
                            <div style="height:250px;width:auto">
                                <img class="card-img-top" style="border-radius:10px; width:100%;height:100%" src="/storage/cover_images/{{$book->cover}}" >
                            </div>

                        </div>
                        <div class="col">
                            <p class="font-weight-bold mb-0" style="font-size: 22px;"> {{$book->title}} </p>
                            <p style="font-size:15px;"> By <span style="color: #81ABEA; " > {{$book->author}} </span> </p>
                            <p class="mt-0"><span class="fa fa-star @if($book->rating>=1) checked @endif"></span>
                                <span class="fa fa-star @if($book->rating>=2) checked @endif "></span>
                                <span class="fa fa-star @if($book->rating>=3) checked @endif "></span>
                                <span class="fa fa-star @if($book->rating>=4) checked @endif"></span>
                                <span class="fa fa-star @if($book->rating>=5) checked @endif"></span></p>
                                <hr style="border-top: 1px solid #00000023;" class="mb-2 mt-4">
                                <div>
                                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorem aperiam accusantium explicabo. Consequuntur nihil nulla mollitia fugiat ratione vitae sit ipsum aperiam eligendi perferendis, excepturi quidem quae ducimus aut, maxime, molestiae aliquam.
                                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorem aperiam accusantium explicabo. Consequuntur nihil nulla mollitia fugiat ratione vitae sit ipsum aperiam eligendi perferendis, excepturi quidem quae ducimus aut, maxime, molestiae aliquam.periam accusantium explicabo. Consequuntur nihil nulla mollitia fugiat ratione vitae sit  
                                   vitae sit ipsum aperiam eligendi perferendis, excepturi quidem quae ducimus aut, maxime, molestiae aliquam.
                                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorem aperiam accusantium explicabo. Consequuntur nihil nulla mollitia fugiat ratione vitae sit ipsum aperiam eligendi perferendis, excepturi quidem  
                                   
                                </div>

                        </div>
                         </div>
                         <div class="row mt-5">
                            <div class="col-3 d-none d-lg-inline"></div>
                            <div class="col">
                                <hr style="border-top: 1px solid #00000023;" class="mb-3 mt-4">
                                <div class="row text-center">
                                    <div class="col">
                                        <p class="mb-2" style="font-weight: 400; font-size:16px;">Pages</p>
                                        <span class="iconify mt-0" data-inline="false" data-icon="fluent:document-one-page-20-filled" style="font-size: 40px;"></span>
                                        <p class="mt-2 mb-0" style="font-weight: 700; font-size:14px;"> <span> {{$book->num_page}} </span> Pages.</p>
                                    </div>
                                    <div class="col">
                                        <p class="mb-2" style="font-weight: 400; font-size:16px;">Publication date</p>
                                        <span class="iconify" data-inline="false" data-icon="clarity:date-solid" style="font-size: 40px;"></span>

                                        <p class="mt-2 mb-0" style="font-weight: 700; font-size:14px;">   
                                         
                                    <?php  echo date('d/m/Y', strtotime($book->created_at)); ?>
                                    </p>
                                    </div>
                                    <div class="col">
                                        <p class="mb-2" style="font-weight: 400; font-size:16px;">Category</p>
                                        <span class="iconify" data-inline="false" data-icon="bx:bxs-category" style="font-size: 40px;"></span>

                                        <p class="mt-2 mb-0" style="font-weight: 700; font-size:14px;">   category  </p>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <div class="row mt-2">
                            <div class="col mb-0">
                                <hr style="border-top: 1px solid #00000023;" class="mb-2 mt-4">
                                <button type="button" class="btn d-inline"> <a href="/books/{{$book->id}}/edit"  style="text-decoration: none; color:#fff;"><img src="/images/icons/edit_icon.svg" alt="" style="width: 80%; height:auto;"></a> </button>

                                <form class="d-inline" action="{{route('books.destroy',  $book->id)}}" method="post">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn"> <img src="/images/icons/delete_icon.svg" alt="" style="width: 80%; height:auto;">  </button>
                            
                                 </form>

                            </div>
                            </div>
                       </div>


 
                           

                </div>

   
            </div>

        </div>
                    
    </div>
@endsection