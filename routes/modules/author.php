<?php

use App\Http\Controllers\AuthorArticleController;
use App\Http\Middleware\RouteAdmin;
use Illuminate\Support\Facades\Route;

Route::prefix('author')->middleware(RouteAdmin::class)->group(function () {
    Route::prefix('articles')->controller(AuthorArticleController::class)->group(function () {
        Route::get('', 'index')->name('author.articles.index');
    });
});
