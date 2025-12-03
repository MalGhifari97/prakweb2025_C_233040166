<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

// Route untuk memanggil method di PostController
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');