<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\WebsiteCategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\CommentsController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

// Homepage controller
Route::get('/', [HomeController::class, 'index'])->name('home.main');
Route::prefix('')->name('home.')->group(function () {

    // VIEW 
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

    // INFORMATION
    Route::get('/information', [HomeController::class, 'information'])->name('information');
    Route::get('/information/{slug}', [HomeController::class, 'informationShow'])->name('information.show');

    // ARTICLE ROUTE 
    Route::get('/article', [HomeController::class, 'articles'])->name('article.main');
    Route::get('/article/categories/{slug}', [HomeController::class, 'articlesCategories'])->name('article.category');
    Route::get('/article/{slug}', [HomeController::class, 'articlesShow'])->name('article.show');

    // PRODUCT ROUTE (CHANGE TO PORTOFOLIO)
    Route::get('/portofolio', [HomeController::class, 'portofolios'])->name('portofolios.main');
    Route::get('/portofolio/categories/{slug}', [HomeController::class, 'portofoliosCategories'])->name('portofolios.category');
    Route::get('portofolio/{slug}', [HomeController::class, 'portofolioShow'])->name('portofolios.show');

    Route::get('/user-edit', [HomeController::class, 'userEdit'])->name('user.edit');
    Route::patch('user-edit', [HomeController::class, 'userUpdate'])->name('user.update');
    Route::delete('user-edit', [HomeController::class, 'userDestroy'])->name('user.destroy');

    Route::view('/frequently-asked-question', 'home.faq.main')->name('faq');

    // Feedback section
    Route::get('/feedback', [HomeController::class, 'feedback'])->name('feedback.index');
    Route::post('/feedback/store', [HomeController::class, 'feedbackStore'])->middleware(['throttle:5,1'])->name('feedback.store');

    // Comments section
    Route::middleware(['auth', 'throttle:7,1'])->group(function () {
        Route::post('/article/{slug}/comment', [CommentsController::class, 'store'])->name('comment.store');
        Route::put('/article/{slug}/comment/{id}', [CommentsController::class, 'update'])->name('comment.update');
        Route::delete('/article/{slug}/comment/{id}', [CommentsController::class, 'destroy'])->name('comment.destroy');
    });
});

//Route semua pengguna
Route::middleware(['auth', 'security'])->prefix('admin')->name('admin.')->group(function () {
    //route untuk dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('article', ArticleController::class);
    Route::resource('portofolios', PortofolioController::class);

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
    ->name('register');
