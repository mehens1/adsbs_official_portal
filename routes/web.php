<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


Route::get('/', [AuthController::class, "login"])->name('home');
Route::post('/login', [AuthController::class, "loginAuth"])->name('login');


Route::prefix('portal')->group(function() {
    Route::get('/', [DashboardController::class, "dashboard"])->name('dashboard');
    Route::get('/tables', [DashboardController::class, "tables"])->name('tables');

    Route::prefix('profile')->group(function() {
        Route::get('/', [DashboardController::class, "profile"])->name('profile');
    });
});