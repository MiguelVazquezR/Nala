<?php

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
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('landing.home');

Route::get('/productos', function () {
    return Inertia::render('Products');
})->name('landing.products');

//Products routes---------------------------------------------------------------------------
//------------------------------------------------------------------------------------------
Route::resource('products', ProductController::class)->middleware('auth');
