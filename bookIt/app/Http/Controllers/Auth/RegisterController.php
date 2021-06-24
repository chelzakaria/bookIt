<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class  RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'fName' => 'required|max:255',
            'lName' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:App\Models\User,email',
            'password' => 'required|confirmed',
            'birthDate' => 'required|date',
            

        ]);

       
            $fileNameToStore = 'no_image.png';
        

        User::create([
            'firstName' => $request->fName,
            'lastName' => $request->lName,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthDate' => $request->birthDate,
            'profile_image' => $fileNameToStore,
        ]);
        
        auth()->user();
        Auth::attempt($request->only('email', 'password'));
        Setting::create([
            'user_id' => Auth::user()->id,
             
            ]);
        return redirect()->route('notes');

    }
}
