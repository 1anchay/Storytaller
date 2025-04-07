<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReМайн - Кейсы аккаунтов Steam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Oxanium', sans-serif;
            background-color: #0f0f13;
            color: #ffffff;
        }
        
        .glow-text {
            text-shadow: 0 0 10px rgba(255, 235, 59, 0.7);
        }
        
        .case-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 235, 59, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .case-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,235,59,0.1) 0%, rgba(255,235,59,0) 70%);
            transform: rotate(30deg);
            transition: all 0.5s ease;
            opacity: 0;
        }
        
        .case-card:hover::before {
            opacity: 1;
            animation: shine 1.5s infinite;
        }
        
        @keyframes shine {
            0% { transform: rotate(30deg) translate(-10%, -10%); }
            100% { transform: rotate(30deg) translate(10%, 10%); }
        }
        
        .price-tag {
            position: absolute;
            top: -10px;
            right: -10px;
            background: linear-gradient(135deg, #ffeb3b, #ff9800);
            color: #111;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }
        
        .game-badge {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.7);
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
        }
        
        .section-title {
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #ffeb3b, transparent);
        }
    </style>
</head>
<body class="bg-gray-900">
    @include('header')

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-b from-gray-900 to-gray-800 py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-0 w-full h-full bg-repeat" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48cGF0aCBkPSJNMzAgMTVMMTUgMzBMMzAgNDVMNDUgMzBMMzAgMTVNMzAgMEwwIDMwTDMwIDYwTDYwIDMwTDMwIDBNMzAgNDVMNDUgMzBMNjAgNDVMNDUgNjBMMzAgNDVNMzAgMTVMNDUgMEw2MCAxNUw0NSAzMEwzMCAxNSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2Utd2lkdGg9IjIiLz48L3N2Zz4=');"></div>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 text-yellow-400 glow-text">
                    <span class="inline-block transform hover:scale-105 transition duration-300">Кейсы Steam</span>
                </h1>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto mb-10">
                    Откройте уникальные аккаунты с играми, предметами и статусами. Каждый кейс — это сюрприз!
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="#cases" class="px-8 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-bold rounded-lg hover:from-yellow-400 hover:to-yellow-500 transition duration-300 shadow-lg transform hover:scale-105">
                        Смотреть кейсы
                    </a>
                    <a href="#" class="px-8 py-3 border-2 border-yellow-400 text-yellow-400 font-bold rounded-lg hover:bg-yellow-400 hover:bg-opacity-10 transition duration-300 shadow-lg transform hover:scale-105">
                        Как это работает?
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Cases Section -->
    <section id="cases" class="py-16 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-4xl text-yellow-400 font-bold section-title">
                    Кейсы аккаунтов Steam
                </h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-400">Сортировка:</span>
                    <select class="bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <option>По популярности</option>
                        <option>По цене (дешевые)</option>
                        <option>По цене (дорогие)</option>
                        <option>По новизне</option>
                    </select>
                </div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Кейс 1 -->
                <div class="case-card bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl hover:border-yellow-400">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200/374151/FFFFFF?text=CS:GO+Prime" alt="CS:GO Prime" class="w-full h-48 object-cover rounded-t-xl">
                        <span class="game-badge">
                            <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                            1200+ часов
                        </span>
                        <span class="price-tag">890₽</span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold mb-2 text-white">CS:GO Prime аккаунт</h3>
                        <p class="text-gray-300 text-sm mb-4">Прайм-статус, инвентарь на 1200₽, звание: Legendary Eagle.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-1">
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">FPS</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Шутер</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Prime</span>
                            </div>
                            <a href="{{ route('case1') }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm">
                                Открыть
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Кейс 2 -->
                <div class="case-card bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl hover:border-yellow-400">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200/374151/FFFFFF?text=Dota+2+Immortal" alt="Dota 2 Immortal" class="w-full h-48 object-cover rounded-t-xl">
                        <span class="game-badge">
                            <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                            2000+ игр
                        </span>
                        <span class="price-tag">1 500₽</span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold mb-2 text-white">Dota 2 — Immortal аккаунт</h3>
                        <p class="text-gray-300 text-sm mb-4">Более 2000 игр, редкие скины, рейтинг Divine.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-1">
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">MOBA</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Стратегия</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Immortal</span>
                            </div>
                            <a href="{{ route('case2') }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm">
                                Открыть
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Кейс 3 -->
                <div class="case-card bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl hover:border-yellow-400">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200/374151/FFFFFF?text=Rust+Survivor" alt="Rust Survivor" class="w-full h-48 object-cover rounded-t-xl">
                        <span class="game-badge">
                            <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                            500+ часов
                        </span>
                        <span class="price-tag">1 290₽</span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold mb-2 text-white">Rust — выживший</h3>
                        <p class="text-gray-300 text-sm mb-4">Rust, DayZ, ARK. Более 500 часов. Готов к рейдам!</p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-1">
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Выживание</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">PVP</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Хардкор</span>
                            </div>
                            <a href="{{ route('case.view', ['caseId' => 3]) }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm">
                                Открыть
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Кейс 4 -->
                <div class="case-card bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl hover:border-yellow-400">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200/374151/FFFFFF?text=Indie+Bundle" alt="Indie Bundle" class="w-full h-48 object-cover rounded-t-xl">
                        <span class="game-badge">
                            <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                            20+ игр
                        </span>
                        <span class="price-tag">490₽</span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold mb-2 text-white">Инди-бандл</h3>
                        <p class="text-gray-300 text-sm mb-4">20+ инди-игр: Hollow Knight, Celeste, Stardew Valley и др.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-1">
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Инди</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Бандл</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Коллекция</span>
                            </div>
                            <a href="{{ route('case.view', ['caseId' => 4]) }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm">
                                Открыть
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Кейс 5 -->
                <div class="case-card bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl hover:border-yellow-400">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200/374151/FFFFFF?text=GTA+V+Online" alt="GTA V" class="w-full h-48 object-cover rounded-t-xl">
                        <span class="game-badge">
                            <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                            Online
                        </span>
                        <span class="price-tag">750₽</span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold mb-2 text-white">GTA V + Online</h3>
                        <p class="text-gray-300 text-sm mb-4">Полная версия GTA V, бонусы в GTA Online. Банов нет.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-1">
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Открытый мир</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Экшен</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Мультиплеер</span>
                            </div>
                            <a href="{{ route('case.view', ['caseId' => 5]) }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm">
                                Открыть
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Кейс 6 -->
                <div class="case-card bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl hover:border-yellow-400">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200/374151/FFFFFF?text=PUBG+Full" alt="PUBG" class="w-full h-48 object-cover rounded-t-xl">
                        <span class="game-badge">
                            <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                            K/D 2.3
                        </span>
                        <span class="price-tag">980₽</span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold mb-2 text-white">PUBG — Полная прокачка</h3>
                        <p class="text-gray-300 text-sm mb-4">Полный пропуск, скины, статистика K/D 2.3, 800+ часов.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-1">
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Баттл-рояль</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">FPS</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Прокачка</span>
                            </div>
                            <a href="{{ route('case.view', ['caseId' => 6]) }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm">
                                Открыть
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Кейс 7 -->
                <div class="case-card bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl hover:border-yellow-400">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200/374151/FFFFFF?text=Horror+Pack" alt="Horror Pack" class="w-full h-48 object-cover rounded-t-xl">
                        <span class="game-badge">
                            <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                            4 игры
                        </span>
                        <span class="price-tag">590₽</span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold mb-2 text-white">Хоррор-бандл</h3>
                        <p class="text-gray-300 text-sm mb-4">Dead by Daylight, Phasmophobia, Resident Evil 7, Outlast.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-1">
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Хоррор</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Выживание</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Бандл</span>
                            </div>
                            <a href="{{ route('case.view', ['caseId' => 7]) }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm">
                                Открыть
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Кейс 8 -->
                <div class="case-card bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl hover:border-yellow-400">
                    <div class="relative">
                        <img src="{{ asset('images/case1.png') }}" alt="AAA Library" class="w-full h-48 object-cover rounded-t-xl">
                        <span class="game-badge">
                            <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                            AAA
                        </span>
                        <span class="price-tag">1 990₽</span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold mb-2 text-white">Топ AAA-игры</h3>
                        <p class="text-gray-300 text-sm mb-4">The Witcher 3, Cyberpunk 2077, RDR2, Elden Ring. Идеально для коллекции.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-1">
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">AAA</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Коллекция</span>
                                <span class="bg-gray-700 text-xs px-2 py-1 rounded">Хиты</span>
                            </div>
                            <a href="{{ route('case.view', ['caseId' => 8]) }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm">
                                Открыть
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <button class="px-8 py-3 border-2 border-yellow-400 text-yellow-400 font-bold rounded-lg hover:bg-yellow-400 hover:bg-opacity-10 transition duration-300 shadow-lg transform hover:scale-105">
                    Показать еще
                </button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-800">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl text-center text-yellow-400 font-bold mb-16 section-title">
                Почему выбирают нас?
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="text-center p-6 rounded-xl bg-gray-700 hover:bg-gray-600 transition duration-300">
                    <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Гарантия безопасности</h3>
                    <p class="text-gray-300">Все аккаунты проходят проверку на баны и подлинность. 100% гарантия замены при проблемах.</p>
                </div>
                
                <div class="text-center p-6 rounded-xl bg-gray-700 hover:bg-gray-600 transition duration-300">
                    <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Выгодные цены</h3>
                    <p class="text-gray-300">Цены на 20-30% ниже рыночных. Регулярные акции и скидки для постоянных клиентов.</p>
                </div>
                
                <div class="text-center p-6 rounded-xl bg-gray-700 hover:bg-gray-600 transition duration-300">
                    <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Моментальная доставка</h3>
                    <p class="text-gray-300">Получите данные аккаунта сразу после оплаты. Автоматическая система доставки 24/7.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-900">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl text-center text-yellow-400 font-bold mb-16 section-title">
                Отзывы наших клиентов
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-800 p-6 rounded-xl">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="User" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="text-white font-bold">Алексей В.</h4>
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">"Купил кейс с CS:GO Prime. Все как описано, даже лучше! Прайм действительно есть, скины на месте. Спасибо!"</p>
                </div>
                
                <div class="bg-gray-800 p-6 rounded-xl">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="User" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="text-white font-bold">Дмитрий К.</h4>
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">"Взял инди-бандл за 490₽ - получил кучу классных игр, включая Hollow Knight. Очень доволен, буду брать еще!"</p>
                </div>
                
                <div class="bg-gray-800 p-6 rounded-xl">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="User" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="text-white font-bold">Иван П.</h4>
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">"Потрясающий сервис! Аккаунт с Dota 2 пришел мгновенно, все работает. Поддержка отвечает быстро и по делу."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-800">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl text-center text-yellow-400 font-bold mb-16 section-title">
                Часто задаваемые вопросы
            </h2>
            
            <div class="space-y-4">
                <div class="border-b border-gray-700 pb-4">
                    <button class="flex justify-between items-center w-full text-left text-white font-semibold">
                        <span>Как происходит доставка аккаунта?</span>
                        <svg class="w-5 h-5 text-yellow-400 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="mt-2 text-gray-300">
                        После оплаты вы мгновенно получаете данные аккаунта (логин и пароль) в личном кабинете. Также они дублируются на вашу электронную почту.
                    </div>
                </div>
                
                <div class="border-b border-gray-700 pb-4">
                    <button class="flex justify-between items-center w-full text-left text-white font-semibold">
                        <span>Можно ли изменить данные аккаунта после покупки?</span>
                        <svg class="w-5 h-5 text-yellow-400 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="mt-2 text-gray-300">
                        Да, все купленные аккаунты можно полностью переоформить на себя: изменить почту, пароль, привязать мобильный телефон и т.д.
                    </div>
                </div>
                
                <div class="border-b border-gray-700 pb-4">
                    <button class="flex justify-between items-center w-full text-left text-white font-semibold">
                        <span>Есть ли гарантия на аккаунты?</span>
                        <svg class="w-5 h-5 text-yellow-400 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="mt-2 text-gray-300">
                        Мы предоставляем 14-дневную гарантию на все аккаунты. Если в течение этого времени возникнут проблемы, мы заменим аккаунт или вернем деньги.
                    </div>
                </div>
                
                <div class="border-b border-gray-700 pb-4">
                    <button class="flex justify-between items-center w-full text-left text-white font-semibold">
                        <span>Какие способы оплаты вы принимаете?</span>
                        <svg class="w-5 h-5 text-yellow-400 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="mt-2 text-gray-300">
                        Мы принимаем банковские карты, Qiwi, Яндекс.Деньги, криптовалюту (Bitcoin, Ethereum), а также другие популярные платежные системы.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-gray-900 to-gray-800">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-yellow-400 mb-6 glow-text">Готовы открыть свой первый кейс?</h2>
            <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">Присоединяйтесь к тысячам довольных игроков и получите уникальный аккаунт уже сегодня!</p>
            <a href="#cases" class="px-10 py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-bold rounded-lg hover:from-yellow-400 hover:to-yellow-500 transition duration-300 shadow-lg transform hover:scale-105 inline-block">
                Выбрать кейс
            </a>
        </div>
    </section>

    @include('footer')

    <script>
        // FAQ Accordion
        document.querySelectorAll('#faq button').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                const icon = button.querySelector('svg');
                
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.classList.remove('rotate-180');
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.classList.add('rotate-180');
                }
            });
        });
        
        // Case card animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeIn');
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.case-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>