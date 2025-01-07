<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/customers', [DashboardController::class, 'customers'])->name('customers');
    Route::get('/support', [DashboardController::class, 'support'])->name('support');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::post('settings/update', [SettingsController::class, 'update'])->name('settings.update');
});
