<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

//home
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware(['auth', 'verified'])->group(function () {

    //dashoboard home
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //cart
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'list'])->name('cart.list');
        Route::post('/{id}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/increment/{id}', [CartController::class, 'increment'])->name('cart.increment');
        Route::post('/decrement/{id}', [CartController::class, 'decrement'])->name('cart.decrement');
        Route::post('/unset/{id}', [CartController::class, 'unset'])->name('cart.unset');
    });

    //product
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::post('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');

});

//user profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';