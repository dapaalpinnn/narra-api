<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group([
    base_path('routes/modules/admin.php'),
    base_path('routes/modules/author.php'),
]);
