<?php

use App\Http\Controllers\AuthorArticleController;
use Illuminate\Support\Facades\Route;

Route::prefix('author')->middleware('author')->group(function () {
    Route::prefix('articles')->controller(AuthorArticleController::class)->group(function () {
        Route::get('', 'index')->name('author.articles.index');
    });
});
