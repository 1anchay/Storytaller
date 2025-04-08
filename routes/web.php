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
Route::get('/cases/create', [CaseController::class, 'create'])->name('cases.create'); // Страница создания кейса
Route::post('/cases', [CaseController::class, 'store'])->name('cases.store'); // Сохранение нового кейса
Route::get('/cases', [CaseController::class, 'index']); // Список всех кейсов
Route::get('/case/{caseId}', [CaseController::class, 'view'])->name('case.view'); // Просмотр кейса по ID

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
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Редирект после успешной аутентификации (опционально)
Route::get('dashboard', function () {
    return redirect()->intended('/profile'); // Редирект после входа в систему
})->middleware(['auth'])->name('dashboard');

// Пример страницы кейса
Route::get('/case1', function() {
    return view('cases.case1');
})->name('case1');

Route::get('/case2', function() {
    return view('cases.case2');
})->name('case2');
Route::get('/case3', function() {
    return view('cases.case3');
})->name('case3');
Route::get('/case4', function() {
    return view('cases.case4');
})->name('case4');
Route::get('/case5', function() {
    return view('cases.case5');
})->name('case5');
Route::get('/case6', function() {
    return view('cases.case6');
})->name('case6');
Route::get('/case7', function() {
    return view('cases.case7');
})->name('case7');
Route::get('/case8', function() {
    return view('cases.case8');
})->name('case8');

// Страница для покупки кейса
Route::get('/buy-case/{caseId}', [CaseController::class, 'buy'])->name('case.buy');

// Роуты чата
// Роут для отправки сообщения от пользователя
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');

// Роут для получения сообщений для пользователя (с помощью AJAX)
Route::get('/chat/messages', [ChatController::class, 'getMessages'])->name('chat.getMessages');

// Роут для чата администратора (показ всех сообщений)
Route::get('/admin/chat', [ChatController::class, 'getAdminMessages'])->name('admin.chat');

// Роут для отправки сообщений администратором
Route::post('/admin/chat/send', [ChatController::class, 'sendAdminMessage'])->name('admin.chat.send');

use App\Http\Controllers\AdminController;

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    // Добавьте другие админские страницы
});
use Illuminate\Auth\Notifications\VerifyEmail;

use App\Http\Controllers\Auth\VerificationController;

// Подтверждение почты
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.send');
use App\Http\Controllers\BalanceController; // Измените эту строку
Route::middleware(['auth'])->group(function () {
    Route::get('/balance/topup', [BalanceController::class, 'showTopUpForm'])->name('balance.topup');
    Route::post('/balance/topup', [BalanceController::class, 'processTopUp'])->name('balance.process');
});
Route::middleware(['auth'])->group(function () {
    // Основные маршруты баланса
    Route::get('/balance', [BalanceController::class, 'showForm'])->name('balance.form');
    Route::post('/balance/process', [BalanceController::class, 'processPayment'])->name('balance.process');
    
    // Альтернативные маршруты (если нужны)
    Route::get('/balance/topup', [BalanceController::class, 'showTopUpForm'])->name('balance.topup');
    Route::post('/balance/topup/process', [BalanceController::class, 'processTopUp'])->name('balance.process.topup');
    
    // Платежный шлюз (GET)
    Route::get('/payment/gateway/{transaction}', [BalanceController::class, 'paymentGateway'])
        ->name('payment.gateway');
});