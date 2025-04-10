<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaseController;

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/check-balance', [CaseController::class, 'checkBalance']);
    Route::post('/purchase-case', [CaseController::class, 'purchaseCase']);
    Route::post('/open-case', [CaseController::class, 'openCase']);
});