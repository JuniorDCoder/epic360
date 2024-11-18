<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;

Route::middleware('guest')->group(function () {
    Route::get('login', [HomeController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('user.login');

    Route::post('register', [AuthController::class, 'register'])
        ->name('user.register');
});

Route::middleware('auth')->group(function(){
    Route::post('logout', [AuthController::class, 'logout'])
        ->name('logout');
});
