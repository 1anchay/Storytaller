<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ReactController,
    CaseController,
    ProfileController,
    BalanceController,
    AdminController,
    ChatController,
    HomeController
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
*/

// Главная и статические страницы
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/home', 'index')->name('home.alt');
    Route::get('/store', 'store')->name('store');
    Route::get('/politika', 'politika')->name('politika');
    Route::get('/prava', 'prava')->name('prava');
    Route::get('/yslovya', 'yslovya')->name('yslovya');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/audit', 'audit')->name('audit');
});

// Публичные кейсы (оптимизированная версия)
Route::prefix('cases')->name('cases.')->controller(CaseController::class)->group(function () {
    for ($i = 1; $i <= 8; $i++) {
        Route::get("/case{$i}", "showCase{$i}")->name("case{$i}");
    }
});

// Гостевые маршруты
Route::middleware('guest')->group(function () {
    // Аутентификация
    Route::controller(AuthenticatedSessionController::class)->group(function () {
        Route::get('login', 'create')->name('login');
        Route::post('login', 'store');
    });
    
    // Регистрация
    Route::controller(RegisteredUserController::class)->group(function () {
        Route::get('register', 'create')->name('register');
        Route::post('register', 'store');
    });
    
    // Сброс пароля
    Route::controller(ForgotPasswordController::class)->name('password.')->group(function () {
        Route::get('forgot-password', 'showLinkRequestForm')->name('request');
        Route::post('forgot-password', 'sendResetLinkEmail')->name('email');
    });
    
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('reset-password/{token}', 'showResetForm')->name('password.reset');
        Route::post('reset-password', 'reset')->name('password.update');
    });
});


// Авторизованные маршруты
Route::middleware(['auth'])->group(function () {
    // Профиль
    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/update', 'update')->name('update');
        Route::get('/transactions', 'transactionHistory')->name('transactions');
    });

    // Баланс
    Route::controller(BalanceController::class)->prefix('balance')->name('balance.')->group(function () {
        Route::get('/', 'showForm')->name('form');
        Route::post('/process', 'processPayment')->name('process');
        Route::get('/topup', 'showTopUpForm')->name('topup');
        Route::post('/topup/process', 'processTopUp')->name('process.topup');
        Route::get('/gateway/{transaction}', 'paymentGateway')->name('gateway');
    });

    // Кейсы (защищенные)
    Route::controller(CaseController::class)->prefix('cases')->name('cases.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{case}', 'show')->name('show');
        Route::get('/buy/{case}', 'buy')->name('buy');
        Route::post('/check-balance', 'checkBalance')->name('check-balance');
        Route::post('/purchase-case', 'purchaseCase')->name('purchase');
    });

    // Чат
    Route::controller(ChatController::class)->prefix('chat')->name('chat.')->group(function () {
        Route::post('/send', 'sendMessage')->name('send');
        Route::get('/messages', 'getMessages')->name('messages');
    });

    // Dashboard
    Route::get('/dashboard', fn() => redirect()->route('profile.edit'))->name('dashboard');
});

// Админка
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/users', 'users')->name('users');
        Route::get('/transactions', 'transactions')->name('transactions');
        Route::get('/cases', 'cases')->name('cases');
    });
    
    Route::controller(ChatController::class)->prefix('chat')->name('chat.')->group(function () {
        Route::get('/', 'getAdminMessages')->name('index');
        Route::post('/send', 'sendAdminMessage')->name('send');
    });
});

// React
Route::get('/react', [ReactController::class, 'index'])->name('react');

// Выход
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');