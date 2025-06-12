<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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
use App\Http\Middleware\SetLocale;
// FrontVideoAlbumController

Route::middleware([
    SetLocale::class,
])->group(function () {

    Route::get('/', fn() => view('welcome'));

    Route::get('lang/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'ar'])) {
            session(['locale' => $locale]);
            app()->setLocale($locale); // Optional but can help during redirect
        }

        return redirect(url()->previous());
    })->name('change.language');


    Route::get('/', [FrontHomepageController::class, 'index'])->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Admin Routes
    Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/home', [AdminHomepageController::class, 'index'])->name('admin_home');

        // Resource routes for Admin Controllers
        Route::resource('/products', AdminProductsController::class);
        Route::resource('/about', AdminAboutController::class);
        Route::resource('/gallery', AdminGalleryController::class);
        Route::resource('/photo-album', AdminPhotoAlbumController::class);
        Route::resource('/photos', AdminPhotoGalleryController::class);
        Route::resource('/slider', HomepageSliderController::class);
        Route::resource('/banner', AdminBannerController::class);
        Route::get('videos/fetch-details', [AdminVideoGalleryController::class, 'fetchDetails'])->name('video.fetchDetails');
        Route::resource('/video-album', AdminVideoAlbumController::class)->except(['show']);
        Route::resource('/videos', AdminVideoGalleryController::class);
        Route::resource('setting', AdminWebsiteSettingController::class);
        Route::resource('portfolio', AdminPortfolioController::class); // Admin portfolio resource
        Route::resource('clients', AdminClientController::class);
        Route::resource('about-section', AdminAboutSectionController::class);
    });

    // Front Routes
    Route::resource('about', FrontAboutUsController::class);
    Route::resource('products', FrontProductController::class)->only(['index', 'show']);
    Route::resource('contact', FrontContactController::class);
    Route::resource('gallery', FrontGalleryController::class);
    Route::resource('photo', FrontPhotoAlbumController::class)->only(['index', 'show']);
    Route::resource('video', controller: FrontVideoAlbumController::class)->only(['index', 'show']);
    Route::get('/search', [FrontSearchController::class, 'search'])->name('search');
    Route::resource('portfolio', FrontPortfolioController::class);
    Route::resource('clients', FrontClientController::class);
});
// Use Front Visitor Controller (if you have one for tracking)
# Route::get('/increment-visitor-count', [FrontVisitorController::class, 'incrementVisitorCount']);
# Route::get('/get-visitor-count', [FrontVisitorController::class, 'getVisitorCount']);

require __DIR__ . '/auth.php';
