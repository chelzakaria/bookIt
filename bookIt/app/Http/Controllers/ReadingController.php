<?php
namespace App\Http\Controllers;

use App\Models\Reading;
  use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 use Illuminate\Http\Request;

class ReadingController extends Controller
{
   public function store($id)
   {
     
     Reading::create([
        'user_id' => Auth::user()->id,
         'book_id' =>$id,
         'reading_time' => 0
        ]);

    }
 
}
