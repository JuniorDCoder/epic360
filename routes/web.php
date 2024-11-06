<?php

use App\Http\Controllers\HomeController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('welcome');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::group(["prefix" => "shop"], function() {
    Route::get('/product/{id}', [HomeController::class, 'productDetails'])->name('shop.item');
});
