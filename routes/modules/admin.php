<?php

use App\Http\Controllers\AdminInitController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('superadmin')->group(function () {
    Route::get('', AdminInitController::class)->name('admin.init');

    Route::prefix('articles')->controller(AdminInitController::class)->group(function () {
        Route::get('', 'index')->name('admin.articles.index');
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
