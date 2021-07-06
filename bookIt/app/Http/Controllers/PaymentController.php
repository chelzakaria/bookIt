<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        $this->validate($request,[
            'plan' => 'required',
            
    
        ]);

        if($request->plan == "free"){
            $membership = Membership::where('user_id', Auth::user()->id)->first();
            $membership->account_type = "free";
            $membership->save();
            return redirect('dashboard');
        }
          
            $type = $request->plan;
             return view('paypal')->with('type', $type);
        
        
    }

    public function store(Request $request)
    {
    
        $this->validate($request,[
            'plan' => 'required',
            'time_period' => 'required'
        ]);
        $membership = Membership::where('user_id', Auth::user()->id)->first();
        $membership->account_type = "premium";
        if($request->time_period == 365)
        {
            $membership->end_date = now()->addYear();
        }
        else if($request->time_period == 30)
        {
            $membership->end_date = now()->addMonth();
        }
        $membership->save();
        return redirect('dashboard');
    }

    public function downgrade()
    {
        $membership = Membership::where('user_id', Auth::user()->id)->first();
        if($membership->account_type==="free"){
            return abort(403, 'Unauthorized action.');
       }
     $membership->account_type = "free";
     $membership->save();
       return redirect('setting')->with('success', 'Your account will be free after '. $membership->end_date->format('Y/m/d')    );

    }

   
}
