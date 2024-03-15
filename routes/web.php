<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;



Route::get('/', [AuthController::class, "login"])->name('home');
Route::get('/forgot-password', [AuthController::class, "forgotPassword"])->name('forgotPassword');

Route::post('/login', [AuthController::class, "loginAuth"])->name('login');
Route::post('/logout', [AuthController::class, "logout"])->name('logout');



Route::group(['middleware' => 'portalAuth'], function () {

    Route::prefix('portal')->group(function() {
        Route::get('/', [DashboardController::class, "dashboard"])->name('dashboard');
        Route::get('/prices', [DashboardController::class, "prices"])->name('prices');
        Route::get('/add-new-price', [DashboardController::class, "addPrice"])->name('addPrice');
        Route::post('/publish-price-watch', [DashboardController::class, "submitNewPriceWatch"])->name('submitNewPriceWatch');
        Route::get('/edit-new-price/{id}/edit', [DashboardController::class, "editPrice"])->name('editPrice');
        Route::put('/edit-new-price/{id}', [DashboardController::class, "updatePriceWatch"])->name('updatePriceWatch');
        Route::delete('/delete-price/{id}', [DashboardController::class, "deletePriceWatch"])->name('deletePriceWatch');
        Route::get('/key-statistics', [DashboardController::class, "keyStatistics"])->name('keyStatistics');
        Route::get('/add-user', [DashboardController::class, "addUser"])->name('addUser');
        Route::post('/add-user', [DashboardController::class, "submitNewUser"])->name('submitNewUser');
        Route::get('/users', [DashboardController::class, "users"])->name('users');
        Route::get('/view-user/{id}', [DashboardController::class, "viewUser"])->name('viewUser');
        Route::delete('/delete-user/{user}', [DashboardController::class, "viewUser"])->name('deleteUser');
        Route::get('/deactivate-user', [DashboardController::class, "deactivateUser"])->name('deactivateUser');
        Route::get('/publications', [DashboardController::class, "publications"])->name('publications');
        Route::get('/addPublication', [DashboardController::class, "addPublication"])->name('addPublication');
        Route::post('/add-publication', [DashboardController::class, "submitNewPublication"])->name('submitNewPublication');
        Route::prefix('profile')->group(function() {
            Route::get('/', [DashboardController::class, "profile"])->name('profile');
            Route::get('/{id}/edit', [DashboardController::class, "editProfile"])->name('editProfile');
            Route::put('/update/{id}', [DashboardController::class, "updateProfile"])->name('updateProfile');
            Route::put('/delete-picture/{id}', [DashboardController::class, "deleteProfilePicture"])->name('deleteProfilePicture');

        });
    });

});

