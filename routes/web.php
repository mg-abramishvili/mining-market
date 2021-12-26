<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/policy', function () {
    return view('policy');
})->name('policy');

// ADMIN
Route::get('/admin', function () {
    return view('admin.home');
})->middleware(['auth'])->name('admin.admin');

// AUTH
require __DIR__.'/auth.php';