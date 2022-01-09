<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\AdminSettingController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/policy', function () {
    return view('policy');
})->name('policy');

// ADMIN
Route::get('/admin', function () {
    return view('admin.home');
})->middleware(['auth'])->name('admin.admin');

// ADMIN SETTINGS
Route::get('admin/settings', [AdminSettingController::class, 'index'])->name('admin.settings')->middleware('auth');
Route::get('_admin/settings', [AdminSettingController::class, 'index_data'])->middleware('auth');
Route::put('_admin/settings', [AdminSettingController::class, 'update'])->middleware('auth');

// AUTH
require __DIR__.'/auth.php';