<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Membership;
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
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        // if(!Auth::attempt($request->only('email', 'password'))){
        //     return back()->with('status', 'Invalid login details');
        // }

        // return redirect()->route('notes');
        $this->validate($request, [
            'login'    => 'required',
            'password' => 'required',
        ]);
    
        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) 
            ? 'email' 
            : 'username';
    
        $request->merge([
            $login_type => $request->input('login')
        ]);
    
        if (Auth::attempt($request->only($login_type, 'password'))) {
            if(Membership::where('user_id', Auth::user()->id)->first()->account_type=="none")
            {
                return view('payment');
            }
            
            return redirect()->route('dashboard');
        }
    
        return back()->with('status', 'Invalid login details');
        


    }
    public function logout(Request $request){
      
          Auth::logout();
         $request->session()->invalidate();

    $request->session()->regenerateToken();
         
        return redirect()->route('home');
    }
}
