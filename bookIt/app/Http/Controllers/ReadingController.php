<?php
namespace App\Http\Controllers;


use App\Models\TimeRead;
 use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 use Illuminate\Http\Request;

class ReadingController extends Controller
{
   public function store($id)
   {
     
     TimeRead::create([
        'user_id' => Auth::user()->id,
         'book_id' =>$id,
         'reading_time' => 0
        ]);

    }
}
