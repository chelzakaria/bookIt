@extends('layouts.app')
    @section('content') 
        <div class="container ml-0">
            <div class="row">
                <div class="col-md-3 col-lg-2 col-sm-3 col-xs-3 py-3 px-3" style="height: 100vh;background:#1F1A6B; ">
                    <img  class="mb-5"  src="/images/logos/logo_bottom.svg" alt="" style="width:75%; height:auto;">
                        <div class="mb-4 mt-4" >
                            <a style="font-weight: 400; color:#fff; font-size:16px; text-decoration:none;" href=""><img class="mr-2" src="/images/icons/dashboard_icon.svg" alt=""  > <span class="d-none d-md-inline">Dashboard</span></a>
                        </div>
                        <div class="mb-4">
                            <a   style="font-weight: 400; color:#fff; font-size:16px; text-decoration:none;" href=""><img class="mr-2" src="/images/icons/profile_icon.svg" alt=""  > Profile</a>
                        </div>
                        <div class="mb-4">
                            <a   style="font-weight: 400; color:#fff; font-size:16px; text-decoration:none;" href=""><img class="mr-2" src="/images/icons/notes_icon.svg" alt=""  > Notes</a>
                        </div>
                       
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    @endsection  