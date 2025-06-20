<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminHomepageController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminVideoGalleryController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminWebsiteSettingController;
use App\Http\Controllers\Admin\HomepageSliderController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminAboutSectionController;
use App\Http\Controllers\Admin\AdminPhotoAlbumController;
use App\Http\Controllers\Admin\AdminPhotoGalleryController;
use App\Http\Controllers\Admin\AdminVideoAlbumController;

use App\Http\Controllers\Front\FrontHomepageController;
use App\Http\Controllers\Front\FrontAboutUsController;
use App\Http\Controllers\Front\FrontProductController;
use App\Http\Controllers\Front\FrontContactController;
use App\Http\Controllers\Front\FrontGalleryController;
use App\Http\Controllers\Front\FrontPhotoAlbumController;
use App\Http\Controllers\Front\FrontVideoAlbumController;
use App\Http\Controllers\Front\FrontSearchController;
use App\Http\Controllers\Front\FrontPortfolioController;
use App\Http\Controllers\Front\FrontClientController;
use App\Http\Controllers\Front\FrontVisitorController;

use App\Http\Middleware\SetLocale;
use App\Http\Middleware\TrackUniqueVisitor;

Route::middleware([
    SetLocale::class,
    TrackUniqueVisitor::class, // ✅ Added here to track unique visitors
])->group(function () {

    // Home Page
    Route::get('/', [FrontHomepageController::class, 'index'])->name('home');

    // Language Switching
    Route::get('lang/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'ar'])) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
        }
        return redirect(url()->previous());
    })->name('change.language');

    // Frontend Routes
    Route::resource('about', FrontAboutUsController::class);
    Route::resource('products', FrontProductController::class)->only(['index', 'show']);
    Route::resource('contact', FrontContactController::class);
    Route::resource('gallery', FrontGalleryController::class);
    Route::resource('photo', FrontPhotoAlbumController::class)->only(['index', 'show']);
    Route::resource('video', FrontVideoAlbumController::class)->only(['index', 'show']);
    Route::resource('portfolio', FrontPortfolioController::class);
    Route::resource('clients', FrontClientController::class);

    // Search
    Route::get('/search', [FrontSearchController::class, 'search'])->name('search');
    Route::get('/search_results', [FrontSearchController::class, 'searchResults'])->name('search.results');

    // Visitor Counter API Routes
    Route::get('/increment-visitor-count', [FrontVisitorController::class, 'incrementVisitorCount']);
    Route::get('/get-visitor-count', [FrontVisitorController::class, 'getVisitorCount']);
});

// Authenticated User Dashboard and Profile
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [AdminHomepageController::class, 'index'])->name('admin_home');

    Route::resource('/products', AdminProductsController::class);
    Route::resource('/about', AdminAboutController::class);
    Route::resource('/gallery', AdminGalleryController::class);
    Route::resource('/photo-album', AdminPhotoAlbumController::class);
    Route::resource('/photos', AdminPhotoGalleryController::class);
    Route::resource('/slider', HomepageSliderController::class);
    Route::resource('/banner', AdminBannerController::class);
    Route::resource('/video-album', AdminVideoAlbumController::class)->except(['show']);
    Route::resource('/videos', AdminVideoGalleryController::class);
    Route::get('videos/fetch-details', [AdminVideoGalleryController::class, 'fetchDetails'])->name('video.fetchDetails');
    Route::resource('setting', AdminWebsiteSettingController::class);
    Route::resource('portfolio', AdminPortfolioController::class);
    Route::resource('clients', AdminClientController::class);
    Route::resource('about-section', AdminAboutSectionController::class);
});

// Auth routes (login/register/etc.)
require __DIR__ . '/auth.php';
