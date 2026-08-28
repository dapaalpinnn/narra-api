<?php

use App\Http\Controllers\MemberArticleController;
use Illuminate\Support\Facades\Route;

Route::prefix('member')->middleware('member')->group(function () {
    Route::prefix('articles')->controller(MemberArticleController::class)->group(function () {
        Route::get('', 'index')->name('member.articles.index');
    });
});
