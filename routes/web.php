<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PolicyController;

use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminHeroController;
use App\Http\Controllers\Admin\AdminReviewController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('products', [ProductController::class, 'index'])->name('products');

Route::post('lead', [LeadController::class, 'store']);

Route::get('/policy', [PolicyController::class, 'policy'])->name('policy');

// ADMIN
Route::get('/admin', function () {
    return view('admin.home');
})->middleware(['auth'])->name('admin.admin');

// ADMIN SETTINGS
Route::get('admin/settings', [AdminSettingController::class, 'edit'])->name('admin.settings')->middleware('auth');
Route::get('_admin/settings', [AdminSettingController::class, 'edit_data'])->middleware('auth');
Route::put('_admin/settings', [AdminSettingController::class, 'update'])->middleware('auth');

// ADMIN HERO
Route::get('admin/hero', [AdminHeroController::class, 'edit'])->name('admin.hero')->middleware('auth');
Route::get('_admin/hero', [AdminHeroController::class, 'edit_data'])->middleware('auth');
Route::put('_admin/hero', [AdminHeroController::class, 'update'])->middleware('auth');

// ADMIN REVIEWS
Route::get('admin/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews')->middleware('auth');
Route::get('admin/reviews/create', [AdminReviewController::class, 'create'])->name('admin.reviews.create')->middleware('auth');
Route::get('admin/reviews/{id}/edit', [AdminReviewController::class, 'edit'])->name('admin.reviews.edit')->middleware('auth');
Route::get('_admin/review/{id}', [AdminReviewController::class, 'review'])->middleware('auth');
Route::post('_admin/reviews', [AdminReviewController::class, 'store'])->middleware('auth');
Route::put('_admin/review/{id}', [AdminReviewController::class, 'update'])->middleware('auth');

// ADMIN UPLOADS
Route::post('_admin/file','App\Http\Controllers\Admin\UploadController@upload')->middleware('auth');

// AUTH
require __DIR__.'/auth.php';