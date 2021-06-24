<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('setting');
    }

    public function store(Request $request){
       
        dd($request->appearance);
    }
}
