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

    Route::group(["prefix" => "cart"], function() {
        Route::post('/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/remove/{id}', [CartController::class, 'removeProduct'])->name('cart.remove');
        Route::get('/count', [CartController::class, 'getCartCount'])->name('cart.count');
        Route::get('/', [CartController::class, 'cartDetails'])->name('cart.details');
        Route::post('/{rowId}/update', [CartController::class, 'updateProductQty'])->name('cart.update');
    });
});
