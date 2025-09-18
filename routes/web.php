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
use App\Http\Controllers\Home\WhistlistController;

use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

// Homepage controller
Route::get('/', [HomeController::class, 'index'])->name('home.main');
Route::prefix('')->name('home.')->group(function () {

    // VIEW 
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    // WHISTLIST ROUTE
    // Route::get('/whistlist', [HomeController::class, 'whistlist'])->name('whistlist');
    Route::prefix('whistlist')->name('whistlist.')->group(function () {
        Route::post('/add/{product:slug}', [WhistlistController::class, 'addToWhistlist'])->name('add')->middleware('auth');
        Route::get('/', [WhistlistController::class, 'showWhistlist'])->name('show');
        Route::delete('/remove/{slug}', [WhistlistController::class, 'removeWhistlist'])->name('remove');
    });

    Route::get('/invoice', [HomeController::class, 'invoice'])->name('invoice');

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
Route::middleware(['auth', 'security'])->prefix('admin')->name('admin.')->group(function () {
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
Route::middleware(['auth', 'role:admin', 'security'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('webCategories', WebsiteCategoryController::class);
    Route::resource('information', InformationController::class);
});

// login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['check'])
    ->name('login');

// register
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['check'])
    ->name('register');
