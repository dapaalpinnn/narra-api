<?php

use App\Http\Controllers\AdminInitController;
use App\Http\Middleware\RouteAdmin;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(RouteAdmin::class)->group(function () {
    Route::get('', AdminInitController::class)->name('admin.init');

    Route::prefix('articles')->group(function () {
        //
    });

    Route::prefix('categories')->group(function () {
        //
    });

    Route::prefix('comments')->group(function () {
        //
    });

    Route::prefix('users')->group(function () {
        //
    });
});
