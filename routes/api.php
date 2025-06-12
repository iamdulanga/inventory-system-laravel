<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\Needle\MissingNeedleController;
use App\Http\Controllers\Api\Needle\BluntNeedleController;
use App\Http\Controllers\Api\Needle\BrokenNeedleController;
use App\Http\Controllers\Api\Needle\ExtraNeedleController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Products
Route::apiResource('products', ProductController::class);

// Needle records
Route::prefix('needles')->group(function () {
    Route::apiResource('missing', MissingNeedleController::class);
    Route::apiResource('blunt', BluntNeedleController::class);
    Route::apiResource('broken', BrokenNeedleController::class);
    Route::apiResource('extra', ExtraNeedleController::class);
});
