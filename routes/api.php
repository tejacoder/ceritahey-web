<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('api.key')->group(function () {
    Route::apiResource('products', ProductController::class);
});
