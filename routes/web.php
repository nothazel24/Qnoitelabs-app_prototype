<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\WebsiteCategoryController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('welcome');
});

//Route semua pengguna
Route::middleware(['auth'])->name('admin.')->group(function () {
    //route untuk dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin/article', ArticleController::class);
    Route::resource('admin/products', ProductController::class);
});

// Route hanya untuk admin
Route::middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    // Semua rute di dalam grup ini akan memerlukan otentikasi dan peran 'admin'
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/webCategories', WebsiteCategoryController::class);
    Route::resource('admin/information', InformationController::class);
});