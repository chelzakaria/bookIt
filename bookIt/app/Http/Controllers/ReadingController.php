<?php
use App\Models\TimeRead;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TimeRead;
use Illuminate\Http\Request;
class ReadingController extends Controller
{
   public function store(){
   DB::table('time_reads')->insert([
    'created_at' => time(),
    'user_id' =>1,
    'book_id' =>1
 
]);
}
}