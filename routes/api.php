<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {

    Route::get('/articles', [ArticleController::class, 'index']);
    Route::get('/articles/{article}', [ArticleController::class, 'show']);
    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/comments/{comment}', [CommentController::class, 'show']);
    Route::middleware('role:reader')->group(function () {
        Route::post('/comments', [CommentController::class, 'store']);
        Route::put('/comments/{comment}', [CommentController::class, 'update']);
        Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);
    });

    Route::middleware('role:admin')->group(function () {
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('articles', ArticleController::class);
        Route::apiResource('comments', CommentController::class);
    });

    Route::middleware('role:writer')->group(function () {
        Route::apiResource('articles', ArticleController::class)->only(['store', 'update', 'destroy']);
    });

    Route::middleware('role:reader,writer,admin')->group(function () {
        Route::apiResource('articles', ArticleController::class)->only(['index', 'show']);
        Route::apiResource('comments', CommentController::class)->only(['store']);
    });
});
