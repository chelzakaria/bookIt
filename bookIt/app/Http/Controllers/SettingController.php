<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SettingController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $Setting = Setting::where('user_id', Auth::user()->id)->first();  

        return view('setting')->with('setting', $Setting);
    }

    public function update(Request $request, $id){
       
        $user = User::find($id);
        if(auth()->user()->id !== $user->id)
        {
            return abort(403, 'Unauthorized action.');
        } 

        $this->validate($request, [
            'idea' => 'required',
            'thought' => 'required',
            'quote' => 'required',
            'low' => 'required',
            'high' => 'required',
            'medium' => 'required',
            'uncategorized' => 'required',

        ]);

 
        $Setting = Setting::where('user_id', $id)->first();  
        $Setting->idea_color = $request->input('idea');
        $Setting->quote_color = $request->input('quote');
        $Setting->thought_color = $request->input('thought');
        $Setting->uncategorized_color = $request->input('uncategorized');
        $Setting->medium_color = $request->input('medium');
        $Setting->high_color = $request->input('high');
        $Setting->low_color = $request->input('low');

     

        $Setting->save();

        return redirect('notes');
    }

    
}
