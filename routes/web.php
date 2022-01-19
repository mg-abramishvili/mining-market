<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PolicyController;

use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminHeroController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminAdvantageController;
use App\Http\Controllers\Admin\AdminSchemeController;

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

// ADMIN ABOUT
Route::get('admin/about', [AdminAboutController::class, 'edit'])->name('admin.about')->middleware('auth');
Route::get('_admin/about', [AdminAboutController::class, 'edit_data'])->middleware('auth');
Route::put('_admin/about', [AdminAboutController::class, 'update'])->middleware('auth');

// ADMIN REVIEWS
Route::get('admin/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews')->middleware('auth');
Route::get('admin/reviews/create', [AdminReviewController::class, 'create'])->name('admin.reviews.create')->middleware('auth');
Route::get('admin/reviews/{id}/edit', [AdminReviewController::class, 'edit'])->name('admin.reviews.edit')->middleware('auth');
Route::get('_admin/review/{id}', [AdminReviewController::class, 'review'])->middleware('auth');
Route::post('_admin/reviews', [AdminReviewController::class, 'store'])->middleware('auth');
Route::put('_admin/review/{id}', [AdminReviewController::class, 'update'])->middleware('auth');

// ADMIN ADVANTAGES
Route::get('admin/advantages', [AdminAdvantageController::class, 'index'])->name('admin.advantages')->middleware('auth');
Route::get('admin/advantages/{id}/edit', [AdminAdvantageController::class, 'edit'])->name('admin.advantages.edit')->middleware('auth');
Route::get('_admin/advantage/{id}', [AdminAdvantageController::class, 'advantage'])->middleware('auth');
Route::put('_admin/advantage/{id}', [AdminAdvantageController::class, 'update'])->middleware('auth');

// ADMIN SCHEMES
Route::get('admin/schemes', [AdminSchemeController::class, 'index'])->name('admin.schemes')->middleware('auth');
Route::get('admin/schemes/{id}/edit', [AdminSchemeController::class, 'edit'])->name('admin.schemes.edit')->middleware('auth');
Route::get('_admin/scheme/{id}', [AdminSchemeController::class, 'scheme'])->middleware('auth');
Route::put('_admin/scheme/{id}', [AdminSchemeController::class, 'update'])->middleware('auth');

// ADMIN LEADS
Route::get('admin/leads', [AdminLeadController::class, 'index'])->name('admin.leads')->middleware('auth');
Route::get('admin/leads/{id}', [AdminLeadController::class, 'show'])->name('admin.leads.show')->middleware('auth');

// ADMIN UPLOADS
Route::post('_admin/file','App\Http\Controllers\Admin\UploadController@upload')->middleware('auth');

// AUTH
require __DIR__.'/auth.php';