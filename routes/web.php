<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ReactController,
    CaseController,
    ProfileController,
    BalanceController,
    AdminController,
    ChatController
};
use App\Http\Controllers\Auth\{
    AuthenticatedSessionController,
    RegisteredUserController,
    ForgotPasswordController,
    ResetPasswordController,
    VerificationController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Здесь вы можете зарегистрировать веб-маршруты для вашего приложения.
|
*/

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Статические страницы
Route::get('/store', function () {
    return view('store');
})->name('store');

Route::get('/politika', function () {
    return view('politika');
})->name('politika');

Route::get('/prava', function () {
    return view('prava');
})->name('prava');

Route::get('/yslovya', function () {
    return view('yslovya');
})->name('yslovya');

// Кейсы (доступны всем)
Route::prefix('cases')->group(function () {
    Route::get('/case1', function() { return view('cases.case1'); })->name('case1');
    Route::get('/case2', function() { return view('cases.case2'); })->name('case2');
    Route::get('/case3', function() { return view('cases.case3'); })->name('case3');
    Route::get('/case4', function() { return view('cases.case4'); })->name('case4');
    Route::get('/case5', function() { return view('cases.case5'); })->name('case5');
    Route::get('/case6', function() { return view('cases.case6'); })->name('case6');
    Route::get('/case7', function() { return view('cases.case7'); })->name('case7');
    Route::get('/case8', function() { return view('cases.case8'); })->name('case8');
});

// Гостевые маршруты (для неавторизованных)
Route::middleware('guest')->group(function () {
    // Аутентификация
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
    // Регистрация
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    
    // Сброс пароля
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Маршруты подтверждения email
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [VerificationController::class, 'show'])
        ->name('verification.notice');
        
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');
        
    Route::post('/email/resend', [VerificationController::class, 'resend'])
        ->name('verification.send');
});

// Защищенные маршруты (требуют авторизации)
Route::middleware(['auth', 'verified'])->group(function () {
    // Профиль пользователя
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/transactions', [ProfileController::class, 'transactionHistory'])->name('profile.transactions');
    });

    // Баланс и платежи
    Route::prefix('balance')->group(function () {
        Route::get('/', [BalanceController::class, 'showForm'])->name('balance.form');
        Route::post('/process', [BalanceController::class, 'processPayment'])->name('balance.process');
        Route::get('/topup', [BalanceController::class, 'showTopUpForm'])->name('balance.topup');
        Route::post('/topup/process', [BalanceController::class, 'processTopUp'])->name('balance.process.topup');
        Route::get('/gateway/{transaction}', [BalanceController::class, 'paymentGateway'])
            ->name('payment.gateway');
    });

    // Кейсы (функционал)
    Route::prefix('cases')->group(function () {
        Route::get('/', [CaseController::class, 'index'])->name('cases.index');
        Route::get('/create', [CaseController::class, 'create'])->name('cases.create');
        Route::post('/', [CaseController::class, 'store'])->name('cases.store');
        Route::get('/{case}', [CaseController::class, 'show'])->name('cases.show');
        Route::get('/buy/{case}', [CaseController::class, 'buy'])->name('cases.buy');
        Route::post('/check-balance', [CaseController::class, 'checkBalance'])->name('cases.check-balance');
        Route::post('/purchase-case', [CaseController::class, 'purchaseCase'])->name('cases.purchase');
    });

    // Чат
    Route::prefix('chat')->group(function () {
        Route::post('/send', [ChatController::class, 'sendMessage'])->name('chat.send');
        Route::get('/messages', [ChatController::class, 'getMessages'])->name('chat.messages');
    });

    // Dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('profile.edit');
    })->name('dashboard');
});

// Админка (требует прав администратора)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/chat', [ChatController::class, 'getAdminMessages'])->name('admin.chat');
    Route::post('/chat/send', [ChatController::class, 'sendAdminMessage'])->name('admin.chat.send');
});

// React маршруты
Route::get('/react', [ReactController::class, 'index'])->name('react');

// Выход из системы
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');