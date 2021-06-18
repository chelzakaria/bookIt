<div class="col-md-3 col-lg-2 col-sm-2 col-2 py-4 pl-4 pr-0" style="min-height: 100vh;background:#1F1A6B; ">
   <style>
       .hv:hover{
        transform: scale(1.3);
        margin-left: 40px;
  
       }
       </style>
    <img   class="d-none d-md-inline mb-4"  src="/images/logos/logo_bottom.svg" alt="" style="width:75%; height:auto;">
        <div class="mb-4 mt-4 hv " >
            <a style="font-weight: 400; color:#fff; font-size:14px; text-decoration:none;" href="#"><img class="mr-3" src="/images/icons/dashboard_icon.svg" alt="" style="height:auto; width:26px;" > <span class="d-none d-md-inline">Dashboard</span></a>
        </div>
        <div class="mb-4 hv ">
            <a   style="font-weight: 400; color:#fff; font-size:14px; text-decoration:none;" href=" {{route('profile')}} "><img class="mr-3 " src="/images/icons/profile_icon.svg" alt="" style="height:auto; width:26px;"  > <span class="d-none d-md-inline">Profile</span></a>
        </div>
        <div class="mb-4 hv">
            <a   style="font-weight: 400; color:#fff; font-size:14px; text-decoration:none;" href="{{route('notes')}}"><img class="mr-3 " src="/images/icons/notes_icon.svg" alt="" style="height:auto; width:24px;"  > <span class="d-none d-md-inline">Notes</span></a>
        </div>
        <div class="mb-4 hv">
            <a   style="font-weight: 400; color:#fff; font-size:14px; text-decoration:none;" href="{{route('books')}}"><img class="mr-3 " src="/images/icons/books_icon.svg" alt="" style="height:auto; width:24px;"  > <span class="d-none d-md-inline">Books</span></a>
        </div>
        <div class="mb-4 hv">
            <a   style="font-weight: 400; color:#fff; font-size:14px; text-decoration:none;" href=""><img class="mr-3 " src="/images/icons/tasks_icon.svg" alt="" style="height:auto; width:25px;" > <span class="d-none d-md-inline">Tasks</span></a>
        </div>
        <div class="mb-4 hv">
            <a   style="font-weight: 400; color:#fff; font-size:14px; text-decoration:none;" href="{{route('setting')}}"><img class="mr-3 " src="/images/icons/setting_icon.svg" alt="" style="height:auto; width:26px;" > <span class="d-none d-md-inline">Setting</span></a>
        </div>
        <div class="fixed-bottom mb-3 ml-4" style="width: 20%">
             <form action="{{ route('logout') }}" method="POST" >
                @csrf
                <button type="submit" class="btn"  style="font-weight: 400; color:#fff; font-size:14px; text-decoration:none;" >
                     <img class="mr-2 " src="/images/icons/logout_icon.svg" alt="" style="height:auto; width:30px;" > <span class="d-none d-md-inline">Log out</span> 
                </button>
            </form>
        </div>
</div>