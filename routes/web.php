<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\PostController;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

Route::get('/home', function () {
    return view('home');
});
Route::get('/profiles', function () {
    return view('profiles');
});
Route::get('/users', function () {
    return view('users');
});
Route::get('/add-user', function () {
    return view('add-user');
});

Route::get('/post', function () {
    return view('post');
});
Route::get('/add-post', function () {
    return view('add-post');
});
// Route::get('/loginpage', function () {
//     return view('page/login_page');
// });


Route::post('/users', [UserController::class, 'storeUsers']);
 Route::get('/users', [UserController::class, 'getUsers']);
 Route::post('/users', [UserController::class, 'storeUser'])->name('AddUser');
 Route::post('/profiles', [ProfileController::class, 'storeProfiles']);
 Route::get('/profiles', [ProfileController::class, 'getProfiles']);

Route::get('/dashboard', [DashboardController::class, 'getdashboard']);
Route::post('/add-post', [UserController::class, 'storePost'])->name('add-post');

Route::post('/users', [UserController::class, 'storeUser'])->name('AddUser');



Route::get('/post',[UserController::class,'loadAllPost'])->name('post');
Route::get('/home',[UserController::class,'loadAllUsers'])->name('home');



Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/admin-users', [UserController::class, 'adminIndex'])->name('admin_users.index');
Route::get('/books', [UserController::class, 'booksIndex'])->name('books.index');


Route::group(['middleware'=>'auth'], function(){





});

