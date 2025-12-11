<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// contoh route untuk menampilkan view
// Redirect root (/) to /home so visiting the project root goes to the home page
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

// Public auth routes (login / register)
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Route untuk memanggil method di PostController
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');