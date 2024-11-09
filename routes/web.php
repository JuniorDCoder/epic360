<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('welcome');
Route::get('/my-account',[HomeController::class, 'myAccount'])->name('user.account');

Route::group(["prefix" => "shop"], function() {
    Route::get('/', [HomeController::class, 'shop'])->name('shop');
    Route::get('/product/{id}', [HomeController::class, 'productDetails'])->name('shop.item');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeProduct'])->name('cart.remove');
    Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
    Route::get('/cart', [CartController::class, 'cartDetails'])->name('cart.details');
});
