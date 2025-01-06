<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Dashboard Route
Route::get('/home', [UserController::class, 'loadAllUsers'])->name('home');

// User Routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Admin Users Route
Route::get('/admin-users', [UserController::class, 'adminIndex'])->name('admin_users.index');

// Books Route
Route::get('/books', [UserController::class, 'booksIndex'])->name('books.index');

// Profile Routes
Route::get('/profiles', [ProfileController::class, 'getProfiles'])->name('profiles.index');
Route::post('/profiles', [ProfileController::class, 'storeProfiles'])->name('profiles.store');

// Authenticated Routes Group
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard');
});

// Posts (if needed, implement this in PostController)
Route::get('/post', [UserController::class, 'loadAllPost'])->name('post.index');
Route::post('/add-post', [UserController::class, 'storePost'])->name('post.store');

// Catch-All Route for RESTful Resource (if needed for UserController)
Route::resource('users', UserController::class)->except(['index', 'create', 'store']);


//admin routes
Route::get('/admin-users', [UserController::class, 'adminIndex'])->name('admin_users.index');
Route::get('/admin-users/{id}/edit', [UserController::class, 'editAdmin'])->name('admin_users.edit');
Route::put('/admin-users/{id}', [UserController::class, 'updateAdmin'])->name('admin_users.update');
Route::delete('/admin-users/{id}', [UserController::class, 'destroyAdmin'])->name('admin_users.destroy');

