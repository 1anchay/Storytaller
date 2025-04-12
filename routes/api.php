<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Защищенные маршруты (требуют аутентификации через Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    // Проверка баланса
   // routes/api.php
Route::post('/check-balance', [BalanceController::class, 'checkBalance'])
->withoutMiddleware(['auth:sanctum']);
    // Покупка кейса
    Route::post('/purchase-case', [BalanceController::class, 'purchaseCase']);
    
    // Открытие кейса
    Route::post('/open-case', [BalanceController::class, 'openCase']);
    
    // Получение текущего баланса (GET пример)
    Route::get('/current-balance', [BalanceController::class, 'getCurrentBalance']);
});