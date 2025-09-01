<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/stats/documents', [StatisticsController::class, 'documentStats']);
Route::get('/stats/monthly', [StatisticsController::class, 'monthlyStats']);
