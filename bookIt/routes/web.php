<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\NoteController;
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/pricing', [App\Http\Controllers\HomeController::class, 'pricing'])->name('pricing');

Route::get('/register', [App\Http\Controllers\auth\RegisterController::class, 'index'])->name('register');

Route::get('/login', [App\Http\Controllers\auth\LoginController::class, 'index'])->name('login');
 
Route::get('/notes', [App\Http\Controllers\NoteController::class, 'index'])->name('notes');
Route::post('/notes', [App\Http\Controllers\NoteController::class, 'store']);
Route::get('/notes/create', function () {
    return view('notes.create');
}); 



//

// Route::get('/notes/create', [App\Http\Controllers\CreatenoteController::class, 'createnote'])->name('createnote');
// Route::post('/notes', [App\Http\Controllers\CreatenoteController::class, 'create'])->name('notes');
