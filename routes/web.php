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
    Route::get('/article', [HomeController::class, 'articles'])->name('article.main');
    Route::get('/article/categories/{id}', [HomeController::class, 'articlesCategories'])->name('article.category');
    Route::get('/article/{slug}', [HomeController::class, 'articlesShow'])->name('article.show');

    // PRODUCT/PRICE ROUTE
    Route::get('/price', [HomeController::class, 'products'])->name('product.main');
    Route::get('/price/categories/{id}', [HomeController::class, 'productsCategories'])->name('product.category');
    Route::get('/price/{slug}', [HomeController::class, 'productsShow'])->name('product.show');
});

//Route semua pengguna
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    //route untuk dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('article', ArticleController::class);
    Route::resource('products', ProductController::class);

    // Profile section
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('webCategories', WebsiteCategoryController::class);
    Route::resource('information', InformationController::class);
});
