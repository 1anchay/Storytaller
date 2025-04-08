@extends('layouts.app')

@section('content')
@include('header')

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
    <style>
        .minecraft-block {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="%23ffffff10"><rect width="16" height="16"/></svg>');
            background-size: 16px 16px;
        }
        .pixel-corners {
            clip-path: polygon(
                0% 6px, 6px 6px, 6px 0%, calc(100% - 6px) 0%, 
                100% 6px, 100% calc(100% - 6px), calc(100% - 6px) 100%, 
                6px 100%, 0% calc(100% - 6px)
            );
        }
        .hover-grow {
            transition: transform 0.2s ease;
        }
        .hover-grow:hover {
            transform: translateY(-5px);
        }
        .minecraft-btn {
            position: relative;
            overflow: hidden;
        }
        .minecraft-btn:after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255,255,255,0) 45%,
                rgba(255,255,255,0.8) 50%,
                rgba(255,255,255,0) 55%
            );
            transform: rotate(30deg);
            animation: shine 3s infinite;
        }
        .minecraft-icon {
            filter: drop-shadow(0 0 2px rgba(0,0,0,0.5));
            transition: transform 0.3s ease;
        }
        .minecraft-icon:hover {
            transform: scale(1.1) rotate(5deg);
        }
        @keyframes shine {
            0% { left: -50%; top: -50%; }
            100% { left: 150%; top: 150%; }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }
        .text-shadow-md {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
    </style>
</head>

<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 py-12 px-4 sm:px-6 lg:px-8">
    <!-- Minecraft Hero Section -->
    <div class="max-w-7xl mx-auto mb-16 relative overflow-hidden">
        <div class="bg-gradient-to-r from-green-900 to-emerald-800 rounded-2xl overflow-hidden shadow-2xl minecraft-block relative">
            <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"32\" height=\"32\" fill=\"%23ffffff\"><rect width=\"32\" height=\"32\"/></svg>');"></div>
            
            <div class="flex flex-col md:flex-row relative z-10">
                <div class="p-8 md:p-12 flex-1">
                    <div class="flex items-center mb-4">
                        <img src="https://www.minecraft.net/content/dam/minecraft/touchup-2020/minecraft-logo.svg" 
                             alt="Minecraft" class="h-12 filter drop-shadow-md">
                        <span class="ml-3 bg-yellow-500 text-black px-3 py-1 rounded-full text-sm font-bold pixel-corners">ЛИЦЕНЗИЯ</span>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-4 text-shadow-md">Официальные аккаунты Minecraft</h1>
                    <p class="text-gray-300 mb-6">Полноценный доступ ко всем версиям игры. Гарантия 100% лицензии!</p>
                    
                    <div class="flex flex-wrap gap-4 mb-6">
                        @foreach([
                            ['name' => 'Java Edition', 'price' => '1 499 ₽', 'color' => 'bg-green-900', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                            ['name' => 'Bedrock Edition', 'price' => '999 ₽', 'color' => 'bg-blue-900', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                            ['name' => 'Полный доступ', 'price' => '1 999 ₽', 'color' => 'bg-yellow-800', 'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z']
                        ] as $edition)
                        <div class="{{ $edition['color'] }} bg-opacity-60 p-4 rounded-lg hover-grow border border-gray-700 relative group overflow-hidden">
                            <div class="absolute inset-0 opacity-20 group-hover:opacity-30 transition-opacity flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $edition['icon'] }}" />
                                </svg>
                            </div>
                            <div class="relative z-10">
                                <p class="text-gray-300 text-sm">{{ $edition['name'] }}</p>
                                <p class="text-white font-bold text-xl">{{ $edition['price'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <button class="minecraft-btn mt-2 bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-3 px-6 rounded-lg transition-all flex items-center pixel-corners hover-grow relative overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Купить Minecraft
                    </button>
                </div>
                <div class="hidden md:block flex-1 relative min-h-[400px]">
                    <!-- Векторные иконки Minecraft -->
                    <svg class="absolute top-10 right-10 h-16 w-16 text-green-400 minecraft-icon animate-float" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    
                    <svg class="absolute bottom-20 left-20 h-12 w-12 text-red-400 minecraft-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    
                    <svg class="absolute bottom-10 right-20 h-20 w-20 text-yellow-400 minecraft-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-white mb-8 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
            </svg>
            <span class="text-shadow-sm">Наши продукты</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Premium Minecraft Account -->
            <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all hover-grow border border-gray-700 minecraft-block">
                <div class="bg-gradient-to-r from-green-900 to-emerald-800 h-48 relative flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white opacity-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <div class="absolute bottom-0 left-0 right-0 p-4">
                        <h3 class="text-xl font-bold text-white flex items-center">
                            <img src="https://www.minecraft.net/content/dam/minecraft/touchup-2020/minecraft-logo.svg" class="h-6 mr-2">
                            Премиум аккаунт
                        </h3>
                        <div class="flex mt-2 space-x-2">
                            <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs font-bold pixel-corners">VIP</span>
                            <span class="bg-gray-700 text-white px-2 py-1 rounded text-xs font-bold pixel-corners">FULL ACCESS</span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4 mb-6">
                        @foreach([
                            ['Версия:', 'Java + Bedrock', 'text-green-400'],
                            ['Никнейм:', 'На выбор', 'text-blue-400'],
                            ['Гарантия:', 'Навсегда', 'text-yellow-400'],
                            ['Дополнительно:', 'Скин + Плащ', 'text-purple-400']
                        ] as $item)
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">{{ $item[0] }}</span>
                            <span class="{{ $item[2] }} font-medium">{{ $item[1] }}</span>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-gray-400">Цена:</span>
                        <span class="text-green-400 font-bold text-xl">2 499 ₽</span>
                    </div>
                    
                    <button class="w-full bg-gradient-to-r from-green-600 to-green-800 hover:from-green-500 hover:to-green-700 text-white font-bold py-3 px-4 rounded-lg transition-all pixel-corners">
                        Купить аккаунт
                    </button>
                </div>
            </div>

            <!-- Steam Account Card -->
            <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all hover-grow border border-gray-700">
                <div class="bg-gradient-to-r from-blue-900 to-blue-700 h-48 relative flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white opacity-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <div class="absolute bottom-0 left-0 right-0 p-4">
                        <h3 class="text-xl font-bold text-white flex items-center">
                            <img src="https://cdn.cloudflare.steamstatic.com/store/public/images/v5/logo_steam_footer.png" class="h-6 mr-2">
                            Steam аккаунт
                        </h3>
                        <div class="flex mt-2 space-x-2">
                            <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs font-bold pixel-corners">CS:GO</span>
                            <span class="bg-gray-700 text-white px-2 py-1 rounded text-xs font-bold pixel-corners">15+ ИГР</span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4 mb-6">
                        @foreach([
                            ['Баланс:', '5 000 ₽', 'text-green-400'],
                            ['Уровень Steam:', '50+', 'text-blue-400'],
                            ['Игр в библиотеке:', '15+', 'text-yellow-400'],
                            ['Лет на платформе:', '3+', 'text-purple-400']
                        ] as $item)
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">{{ $item[0] }}</span>
                            <span class="{{ $item[2] }} font-medium">{{ $item[1] }}</span>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-gray-400">Цена:</span>
                        <span class="text-green-400 font-bold text-xl">2 499 ₽</span>
                    </div>
                    
                    <button class="w-full bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-all pixel-corners">
                        Купить аккаунт
                    </button>
                </div>
            </div>

            <!-- Steam Keys Bundle -->
            <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all hover-grow border border-gray-700">
                <div class="bg-gradient-to-r from-purple-900 to-purple-700 h-48 relative flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white opacity-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                    <div class="absolute bottom-0 left-0 right-0 p-4">
                        <h3 class="text-xl font-bold text-white flex items-center">
                            <img src="https://cdn.cloudflare.steamstatic.com/store/public/images/v5/logo_steam_footer.png" class="h-6 mr-2">
                            Набор ключей
                        </h3>
                        <div class="flex mt-2 space-x-2">
                            <span class="bg-purple-500 text-white px-2 py-1 rounded text-xs font-bold pixel-corners">5 ИГР</span>
                            <span class="bg-gray-700 text-white px-2 py-1 rounded text-xs font-bold pixel-corners">ЭКОНОМИЯ 40%</span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="text-white font-medium mb-3">В набор входят:</h4>
                    <ul class="space-y-3 mb-6">
                        @foreach([
                            ['Cyberpunk 2077', '1 499 ₽', 'bg-red-900'],
                            ['Elden Ring', '1 799 ₽', 'bg-gray-900'],
                            ['Red Dead Redemption 2', '1 299 ₽', 'bg-yellow-900'],
                            ['The Witcher 3', '599 ₽', 'bg-blue-900'],
                            ['GTA V', '999 ₽', 'bg-green-900']
                        ] as $game)
                        <li class="flex items-center {{ $game[2] }} bg-opacity-50 px-3 py-2 rounded group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="flex-1">
                                <div class="text-white">{{ $game[0] }}</div>
                            </div>
                            <span class="text-gray-400 line-through text-sm">{{ $game[1] }}</span>
                        </li>
                        @endforeach
                    </ul>
                    
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-gray-400">Итоговая цена:</span>
                        <span class="text-green-400 font-bold text-xl">3 499 ₽</span>
                    </div>
                    
                    <button class="w-full bg-gradient-to-r from-purple-600 to-purple-800 hover:from-purple-500 hover:to-purple-700 text-white font-bold py-3 px-4 rounded-lg transition-all pixel-corners">
                        Купить набор
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Minecraft Accounts Section -->
    <div class="max-w-7xl mx-auto mt-16">
        <h2 class="text-3xl font-bold text-white mb-8 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <span class="text-shadow-sm">Аккаунты Minecraft</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['name' => 'Стандарт', 'price' => '1 299 ₽', 'color' => 'from-green-900 to-green-700', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 
                 'features' => ['Java Edition', 'Смена ника', 'Гарантия 1 год']],
                
                ['name' => 'Премиум', 'price' => '1 999 ₽', 'color' => 'from-yellow-800 to-yellow-600', 'icon' => 'M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4H5z', 
                 'features' => ['Java + Bedrock', 'Скин + Плащ', 'Гарантия навсегда']],
                
                ['name' => 'Старый аккаунт', 'price' => '2 499 ₽', 'color' => 'from-blue-900 to-blue-700', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 
                 'features' => ['Аккаунт 2012-2015', 'Редкий статус', 'Полный доступ']],
                
                ['name' => 'Бизнес', 'price' => '3 999 ₽', 'color' => 'from-purple-900 to-purple-700', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 
                 'features' => ['5 аккаунтов', 'Для серверов', 'Коммерческое использование']]
            ] as $account)
            <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all hover-grow border border-gray-700">
                <div class="bg-gradient-to-r {{ $account['color'] }} h-40 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $account['icon'] }}" />
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2">{{ $account['name'] }}</h3>
                    <ul class="space-y-2 mb-4">
                        @foreach($account['features'] as $feature)
                        <li class="flex items-center text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-6 flex justify-between items-center">
                        <span class="text-green-400 font-bold text-xl">{{ $account['price'] }}</span>
                        <button class="bg-white bg-opacity-10 hover:bg-opacity-20 text-white font-bold py-2 px-4 rounded-lg transition-all">
                            Купить
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Steam Games Section -->
    <div class="max-w-7xl mx-auto mt-16">
        <h2 class="text-3xl font-bold text-white mb-8 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            <span class="text-shadow-sm">Популярные игры Steam</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['name' => 'Counter-Strike 2', 'price' => '999 ₽', 'original' => '1 299 ₽', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => 'bg-orange-900'],
                ['name' => 'Dota 2', 'price' => '799 ₽', 'original' => '1 099 ₽', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'color' => 'bg-red-900'],
                ['name' => 'PUBG', 'price' => '1 199 ₽', 'original' => '1 499 ₽', 'icon' => 'M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4', 'color' => 'bg-yellow-900'],
                ['name' => 'Apex Legends', 'price' => '1 499 ₽', 'original' => '1 799 ₽', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => 'bg-blue-900']
            ] as $game)
            <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all hover-grow border border-gray-700">
                <div class="{{ $game['color'] }} h-40 flex items-center justify-center bg-opacity-70">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $game['icon'] }}" />
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2">{{ $game['name'] }}</h3>
                    <div class="flex items-center mb-4">
                        <span class="text-green-400 font-bold text-xl mr-2">{{ $game['price'] }}</span>
                        <span class="text-gray-400 line-through text-sm">{{ $game['original'] }}</span>
                    </div>
                    <button class="w-full bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-all">
                        Купить ключ
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('footer')

<script>
    // Анимация для иконок
    document.addEventListener('DOMContentLoaded', function() {
        const icons = document.querySelectorAll('.minecraft-icon');
        icons.forEach(icon => {
            icon.style.animationDelay = `${Math.random() * 2}s`;
        });
        
        // Эффект при наведении на карточки
        const cards = document.querySelectorAll('.hover-grow');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                const icon = this.querySelector('svg');
                if(icon) {
                    icon.classList.add('animate-float');
                }
            });
            card.addEventListener('mouseleave', function() {
                const icon = this.querySelector('svg');
                if(icon) {
                    icon.classList.remove('animate-float');
                }
            });
        });
    });
</script>
@endsection