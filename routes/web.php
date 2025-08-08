<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\WebsiteCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Home\HomeController;

// Homepage controller
Route::get('/', [HomeController::class, 'index'])->name('home.main');
Route::prefix('')->name('home.')->group(function () {
    
    // VIEW 
    Route::view('/profile', 'home.profile.main')->name('profile');
    Route::view('/contact', 'home.contact.main')->name('contact');

    // INFORMATION
    Route::get('/information/{slug}', [HomeController::class, 'informationShow'])->name('information');

    // ARTICLE ROUTE 
    Route::get('/article', [HomeController::class, 'articles'])->name('article');
    Route::get('/article/{slug}', [HomeController::class, 'articlesShow'])->name('article');
    Route::get('/article/categories/{id}', [HomeController::class, 'articlesCategories'])->name('article');

    // PRODUCT/PRICE ROUTE
    Route::get('/price', [HomeController::class, 'products'])->name('product');
    Route::get('/price/{slug}', [HomeController::class, 'productsShow'])->name('product');
    Route::get('/price/categories/{id}', [HomeController::class, 'productsCategories'])->name('product');
});

//Route semua pengguna
Route::middleware(['auth'])->name('admin.')->group(function () {
    //route untuk dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin/article', ArticleController::class);
    Route::resource('admin/products', ProductController::class);

    // Profile section
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route hanya untuk admin
Route::middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    // Semua rute di dalam grup ini akan memerlukan otentikasi dan peran 'admin'
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/webCategories', WebsiteCategoryController::class);
    Route::resource('admin/information', InformationController::class);
});
