<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReactController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Models\GameCase;

// Главная страница (используем представление 'welcome')
Route::get('/', function () {
    return view('welcome'); // Путь к вашему представлению
})->name('home');

// Роуты для React
Route::get('/react', [ReactController::class, 'index']);

// Роуты для Cases
// Путь для отображения формы создания нового кейса
Route::get('/cases/create', [CaseController::class, 'create'])->name('cases.create');

// Путь для обработки POST-запроса (сохранение нового кейса)
Route::post('/cases', [CaseController::class, 'store'])->name('cases.store');

// Путь для отображения всех кейсов (опционально)
Route::get('/cases', [CaseController::class, 'index']);
// routes/web.php
Route::get('/case/{caseId}', [CaseController::class, 'view'])->name('case.view');

// Роуты аутентификации
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Роуты для восстановления пароля
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Роуты для профиля (доступ только для аутентифицированных пользователей)
Route::middleware(['auth'])->group(function () {
    // Путь для отображения страницы редактирования профиля
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Путь для обновления профиля
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Редирект после успешной аутентификации (опционально)
Route::get('dashboard', function () {
    return redirect()->intended('/profile'); // Редирект после входа в систему
})->middleware(['auth'])->name('dashboard');

Route::get('/case1', function() {
    return view('cases.case1');
})->name('case1');

Route::get('/case2', function() {
    return view('cases.case2');
})->name('case2');

// Определите маршрут для страницы покупки кейса
Route::get('/buy-case/{caseId}', [CaseController::class, 'buy'])->name('case.buy');