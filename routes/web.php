<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin.home');
})->middleware(['auth'])->name('admin.admin');

require __DIR__.'/auth.php';