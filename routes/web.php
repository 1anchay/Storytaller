<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\ReactController;

Route::get('/', [ReactController::class, 'index']);
