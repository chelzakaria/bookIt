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
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StripeController;
use App\Models\Membership;
use Stripe\StripeClient;
 
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
Route::post('/user/{id}/delete', [App\Http\Controllers\Auth\RegisterController::class, 'destroy'])->name('user.delete');



Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'store']);

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store']);
Route::get('/profile/picture/{id}',[ProfileController::class, 'deletePicture'])->where('id', '[0-9]+')->name('profile.picture.destroy');


 


Route::get('/password/change',[App\Http\Controllers\ChangePasswordController::class, 'index'] )->name('password.change');
Route::post('/password/change',[App\Http\Controllers\ChangePasswordController::class, 'store']);

 //notes
Route::get('/notes', [App\Http\Controllers\NoteController::class, 'index'])->name('notes');
Route::post('/notes', [App\Http\Controllers\NoteController::class, 'store']);
// Route::get('/notes/create',[App\Http\Controllers\NoteController::class, 'create'])->name('createnote'); 

Route::get('/notes/{id}',[App\Http\Controllers\NoteController::class, 'show'])->where('id', '[0-9]+'); 

Route::delete('/notes/{id}',[NoteController::class, 'destroy'])->where('id', '[0-9]+')->name('notes.destroy');
// Route::get('/notes/{id}/edit',[NoteController::class, 'edit']);
Route::post('/notes/{id}',[NoteController::class, 'update'])->where('id', '[0-9]+')->name('notes.update');
Route::post('/notes/filter', [NoteController::class, 'search'])->name('notes.search');

//notes images
Route::get('/images/{id}',[NoteController::class, 'deleteImage'])->where('id', '[0-9]+')->name('images.destroy');


//books
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');

// Route::get('/books/create', function () {
//     return view('books.create');
// })->name('createbook'); 

 
Route::post('/books', [App\Http\Controllers\BookController::class, 'store']);
Route::get('/books/{id}',[App\Http\Controllers\BookController::class, 'show'])->where('id', '[0-9]+');
// Route::get('/books/{id}/edit',[BookController::class, 'edit']);
Route::post('/books/{id}',[BookController::class, 'update'])->where('id', '[0-9]+')->name('books.update');
Route::delete('/books/{id}',[BookController::class, 'destroy'])->where('id', '[0-9]+')->name('books.destroy');

Route::post('/book/read/{id}', [BookController::class, 'read'])->name('book.read'); 
Route::post('/books/search', [BookController::class, 'search'])->name('books.search');


//setting
Route::get('/setting', [SettingController::class, 'index'])->name('setting'); 
Route::post('/setting/{id}',[SettingController::class, 'update'])->name('setting.update');



//tasks

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::post('/tasks', [TaskController::class, 'store']);

// Route::get('/tasks/create/{status}', function ($status) {
//      $books = Book::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
//     return view('tasks.create', ['books' =>  $books, 'status' => $status]);
// })->name('tasks.create'); 
// Route::get('/tasks/{id}/edit',[TaskController::class, 'edit']);
Route::post('/tasks/update/{id}',[TaskController::class, 'update'])->name('tasks.update');
//Route::delete('/tasks/{id}',[TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{id}',[TaskController::class, 'destroy'])->name('tasks.destroy');
 
//drag task
Route::get('/tasks/drag/{id}',[TaskController::class, 'updatedrag']);
Route::get('/tasks/drag2/{id}',[TaskController::class, 'updatedrag2']);
Route::get('/tasks/drag3/{id}',[TaskController::class, 'updatedrag3']);
// forgot password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//counter time
Route::post('/read/{id}', [ReadingController::class, 'store'])->name('book.start'); 

//dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//notification
Route::post('/tasks/{id}', [NotificationController::class, 'store'])->name('notification.show');


//contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.post');

//paypal
// Route::get('/paypal', function(){
//     return view('paypal');
// } );
Route::post('/pay', [PaymentController::class, 'store'])->name('pay');

//payment
// Route::get('/payment', function(){
//     return view('payment');
// });
Route::post('/payment/get',[PaymentController::class, 'index'])->name('payment');
Route::get('/upgrade', function(){
    if(Membership::where('user_id', Auth::user()->id)->first()->account_type!=="free" && Membership::where('user_id', Auth::user()->id)->first()->end_date!==null){
         return abort(403, 'Unauthorized action.');
    }
    return view('upgrade');
})->name('upgrade');
Route::post('/downgrade',[PaymentController::class, 'downgrade'])->name('downgrade');











