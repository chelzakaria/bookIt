<?php
use App\Models\TimeRead;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TimeRead;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
   public function store()
   {
    TimeRead::create([
        'user_id' => 2,
         'book_id' =>2,
         'created_at' => time()
        ]);
   }
}
