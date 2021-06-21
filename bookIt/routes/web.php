<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LogoutController;
use App\Models\Book;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ProfileController;
use App\Models\Task;
use App\Http\Controllers\TaskController;

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

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'store']);

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store']);

 


Route::get('/password/change',[App\Http\Controllers\ChangePasswordController::class, 'index'] )->name('password.change');
Route::post('/password/change',[App\Http\Controllers\ChangePasswordController::class, 'store']);

 
Route::get('/notes', [App\Http\Controllers\NoteController::class, 'index'])->name('notes');
Route::post('/notes', [App\Http\Controllers\NoteController::class, 'store']);
Route::get('/notes/create', function () {
    $books = Book::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();

    return view('notes.create',[
        'books' => $books
    ]);
})->name('createnote'); 

Route::get('/notes/{id}',[App\Http\Controllers\NoteController::class, 'show']); 

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

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/tasks/create', function () {
    return view('tasks.create');
})->name('createtask'); 
 

 