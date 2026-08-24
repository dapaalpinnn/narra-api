<?php

use Illuminate\Support\Facades\Route;

Route::prefix('author')->middleware('auth:sanctum')->group(function () {
    //
});
