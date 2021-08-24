<?php

use App\Http\Controllers\BaristaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('coffee', CoffeeController::class);

Route::apiResource('order', OrderController::class);

Route::post('/order/to-go', [OrderController::class, 'storeCoffeeToGo']);

Route::post('/barista', [BaristaController::class, 'store']);
