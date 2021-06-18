@extends('layouts.app')
    @section('content') 
    <div class="container-fluid">
            <div class="row">
                @include('notes.layouts.sidebar')
              <style>
                  label {
                    color: #6F6D6D;
                    font-weight: 600;
                    font-size:13px;
                  }
              </style>
                <div class="col">
                    <div class="container py-3 ">
                        <div class="d-flex flex-row mb-0">
                            <p style="font-weight:700; font-size:30px;">
                                Edit password
                            </p>  
                             
                        </div>
                        <hr style="border-top: 1px solid #00000023;" class="mt-0">
                        <div class="container px-5 mr-auto py-5">
                            
                            
                            @if(session('error'))
                            <div class="col text-center w-50 mr-auto mb-3">
                                    <div class="jumbotron py-2 mb-2 bg-danger text-white   mx-auto">
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.change') }}">
                                @csrf
                                <div class="form-group w-75">
                                  <label for="oldPass">Old password </label>
                                  <input type="password" class="form-control @error('oldPassword')
                                  border border-danger
                                  @enderror" id="oldPass"  name="oldPassword">
                                </div>
                                <div class="form-group w-75">
                                    <label for="newPass">New password </label>
                                    <input type="password" class="form-control @error('password')
                                    border border-danger
                                    @enderror" id="newPass"  name="password">
                                  </div>
                                  <div class="form-group w-75">
                                    <label for="newPassRep">Repeat new password </label>
                                    <input type="password" class="form-control @error('password_confirmation')
                                    border border-danger
                                    @enderror" id="newPassRep"  name="password_confirmation">
                                  </div>
                               
                                <div class="row mt-4">
                                    <div class="col">
                                        <button type="submit" name="create" class="btn btn-primary"
                                        style="background-color:#1F1A6B;font-weight:700;" >Change password</button>

                                        <button type="button" class="btn ml-5" style="background-color: #D4E5F9; font-weight:700;"> <a href=" {{route('profile')}}" style="text-decoration: none; color:#000;">Cancel</a> </button>
                                    </div>
                                </div>                              
                            </form>
                              
                        </div>

                    </div>
                </div>
            </div>
            
    @endsection