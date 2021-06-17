<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest',['except' => [
            'logout'
        ]]);
    }

    public function index(){
        return view('auth.login');
    }

   

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(!Auth::attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('notes');


    }
    public function logout(Request $request){
      
          Auth::logout();
         $request->session()->invalidate();

    $request->session()->regenerateToken();
         
        return redirect()->route('home');
    }
}
