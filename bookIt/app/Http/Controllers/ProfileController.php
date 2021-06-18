<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('profile');
    }
    public function store(Request $request){
         $this->validate($request, [
            'fName' => 'required|max:255',
            'lName' => 'required|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required'
        ]);
        $count = User::where('email', $request->email)->count();
        if($count && auth()->user()->email!==$request->email){
            return back()->with('error', 'email already exists');
        }
        if(auth()->user()->email===$request->email 
        && auth()->user()->firstName===$request->fName 
        &&auth()->user()->lastName===$request->lName 
        && auth()->user()->username===$request->username){
            return back();
        }

        User::find(auth()->user()->id)->update([
            'firstName'=> $request->fName,
            'firstName'=> $request->fName,
            'email'=> $request->email,
            'username' => $request->username
            ]
        );
        return redirect('profile')->with('success', 'profile has been changed successfully');

    }
}
