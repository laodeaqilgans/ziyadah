<?php

use App\Http\Controllers\ZiyadahController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rute utama
Route::get('/', function () {
    return view('welcome');
});


// Rute untuk Ziyadah (CRUD)
Route::resource('ziyadah', ZiyadahController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

