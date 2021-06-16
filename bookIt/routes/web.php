<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BookController;
 

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

Route::get('/profile', function(){
    return view('profile');
})->name('profile');

Route::get('/password/change', function(){
    return view('password.change');
})->name('password.chnage');


 
Route::get('/notes', [App\Http\Controllers\NoteController::class, 'index'])->name('notes');
Route::post('/notes', [App\Http\Controllers\NoteController::class, 'store']);
Route::get('/notes/create', function () {
    return view('notes.create');
})->name('createnote'); 

Route::get('/notes/{id}', function ($id) {
    $note = DB::table('notes')->find($id);
    return view('notes.show',[
        'note' => $note
    ]);
});  
Route::delete('/notes/{id}',[NoteController::class, 'destroy'])->name('notes.destroy');
Route::get('/notes/{id}/edit',[NoteController::class, 'edit']);
Route::post('/notes/{id}',[NoteController::class, 'update'])->name('notes.update');
Route::post('/search', [NoteController::class, 'search'])->name('notes.search');

//books
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');

Route::get('/books/create', function () {
    return view('books.create');
})->name('createbook'); 

 
Route::post('/books', [App\Http\Controllers\BookController::class, 'store']);
Route::get('/books/{id}',[App\Http\Controllers\BookController::class, 'show']);
Route::get('/books/{id}/edit',[BookController::class, 'edit']);
Route::post('/books/{id}',[BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}',[BookController::class, 'destroy'])->name('books.destroy');

//setting
Route::get('/setting', function () {
    return view('setting');
})->name('setting'); 