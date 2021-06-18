<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

      return view('password.change');
    }

    public function store(Request $request)
    {
        $request->validate([
          'oldPassword' => 'required',
          'password' => 'required|string|confirmed',
          'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->oldPassword, $user->password)) {
             
            return back()->with('error', 'Current password does not match!');
        }
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);

        return redirect('profile')->with('success', 'password has been changed successfully');

     }
}
