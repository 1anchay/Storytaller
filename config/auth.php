<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        
        'api' => [
            'driver' => 'sanctum',
            'provider' => 'users',
            'hash' => false,
        ],
        
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
            'verified' => false,
        ],
        
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class, // Если у вас отдельная модель для админов
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        
        'admins' => [
            'provider' => 'admins',
            'table' => 'admin_password_resets',
            'expire' => 30,
            'throttle' => 120,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => 10800, // 3 часа
    
    /*
    |--------------------------------------------------------------------------
    | Custom Configuration for Your User Model
    |--------------------------------------------------------------------------
    */
    'features' => [
        'uuid_login' => env('ALLOW_UUID_LOGIN', false),
        'balance_check' => env('ENABLE_BALANCE_CHECK', true),
        'inactive_threshold' => env('INACTIVE_THRESHOLD_DAYS', 30),
        \Laravel\Fortify\Features::registration(),
    ],
];