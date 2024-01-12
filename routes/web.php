<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


// Landing routes -------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------
Route::get('/', [LandingController::class, 'home'])->name('landing.home');
Route::get('/productos', [LandingController::class, 'products'])->name('landing.products');
Route::get('/producto/{product}', [LandingController::class, 'show'])->name('landing.products.show');


//Products routes---------------------------------------------------------------------------
//------------------------------------------------------------------------------------------
Route::resource('products', ProductController::class)->middleware('auth');
Route::post('products/update-with-media/{product}', [ProductController::class, 'updateWithMedia'])->name('products.update-with-media');


//Banners routes---------------------------------------------------------------------------
//------------------------------------------------------------------------------------------
Route::resource('banners', BannerController::class)->middleware('auth');
Route::post('banners/update-with-media/{banner}', [BannerController::class, 'updateWithMedia'])->name('banners.update-with-media');


//Galery routes---------------------------------------------------------------------------
//------------------------------------------------------------------------------------------
Route::resource('galeries', GaleryController::class)->middleware('auth');
Route::post('galeries/update-with-media/{galery}', [GaleryController::class, 'updateWithMedia'])->name('galeries.update-with-media');


//Categories routes---------------------------------------------------------------------------
//------------------------------------------------------------------------------------------
Route::resource('categories', CategoryController::class)->middleware('auth');

