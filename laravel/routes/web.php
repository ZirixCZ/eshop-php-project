<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/movie', MovieController::class)->names('movie');
    Route::resource('/category', CategoryController::class)->names('category');
    Route::resource('/products', ProductController::class)->names('product');
    Route::get('/', [CategoryController::class, 'index'])->name('dashboard');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cartItem.destroy');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/reset', [CartController::class, 'resetCart'])->name('cart.resetCart');
});

require __DIR__.'/auth.php';
