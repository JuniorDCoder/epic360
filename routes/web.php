<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home'])->name('welcome');
Route::get('/my-account',[HomeController::class, 'myAccount'])->name('user.account');

Route::group(["prefix" => "shop"], function() {
    Route::get('/', [HomeController::class, 'shop'])->name('shop');
    Route::get('/product/{id}', [HomeController::class, 'productDetails'])->name('shop.item');

    Route::group(["prefix" => "cart"], function() {
        Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
        Route::post('/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/remove/{id}', [CartController::class, 'removeProduct'])->name('cart.remove');
        Route::get('/count', [CartController::class, 'getCartCount'])->name('cart.count');
        Route::get('/', [CartController::class, 'cartDetails'])->name('cart.details');
        Route::post('/{rowId}/update', [CartController::class, 'updateProductQty'])->name('cart.update');
    });
});

Route::group(['prefix' => 'checkout'], function (){
    Route::get('/pay',[PaymentController::class, 'createCheckoutSession'] )->name('checkout-pay');
    Route::get('/success', [PaymentController::class, 'successfulPayment'])->name('checkout-success');
    Route::get('/cancel', [PaymentController::class, 'cancelPayment'])->name('checkout-cancel');
})->middleware('auth');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
