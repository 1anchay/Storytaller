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
<section class="relative bg-gradient-to-b from-gray-900 to-gray-800 py-24 md:py-32 overflow-hidden">
    <!-- Анимированный фон с векторными элементами -->
    <div class="absolute inset-0 opacity-10">
        <!-- Векторные шестиугольники (стиль Steam) -->
        <div class="absolute top-0 left-0 w-full h-full bg-repeat opacity-30" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj48cGF0aCBkPSJNNTAgMEwxMDAgMjVMOTAgNzVMNTAgMTAwTDEwIDc1TDAgMjVMNTAgMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmY5ZTAwIiBzdHJva2Utd2lkdGg9IjAuNSIvPjwvc3ZnPg=='); transform: rotate(15deg);"></div>
        
        <!-- Векторные круги (стиль Yandex) -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(253,230,138,0.1)_0%,transparent_70%)]"></div>
    </div>

    <!-- Анимированные элементы -->
    <div class="absolute top-1/4 left-10 w-16 h-16 bg-yellow-400 rounded-full filter blur-xl opacity-10 animate-float"></div>
    <div class="absolute top-1/3 right-20 w-24 h-24 bg-yellow-500 rounded-full filter blur-xl opacity-10 animate-float-delay"></div>
    <div class="absolute bottom-1/4 left-1/4 w-20 h-20 bg-yellow-600 rounded-full filter blur-xl opacity-10 animate-float"></div>

    <!-- Основной контент -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
            <!-- Текстовый блок -->
            <div class="text-center lg:text-left max-w-2xl">
                <div class="mb-6 flex justify-center lg:justify-start">
                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-gray-800 border border-yellow-400/30 text-yellow-400 text-sm font-medium">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        Новые кейсы каждый день
                    </span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6 text-white">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">Коллекционные</span>
                    <br>аккаунты Steam
                </h1>
                
                <p class="text-lg md:text-xl text-gray-300 mb-10 leading-relaxed">
                    Уникальные игровые аккаунты с редкими предметами, высоким рейтингом 
                    и эксклюзивным контентом. Открывайте кейсы и получайте ценные призы!
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                    <a href="#cases" class="px-8 py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-bold rounded-lg hover:from-yellow-400 hover:to-yellow-500 transition-all duration-300 shadow-lg hover:shadow-yellow-500/30 flex items-center justify-center transform hover:scale-105">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                        Смотреть кейсы
                    </a>
                    <a href="#" class="px-8 py-4 border-2 border-yellow-400 text-yellow-400 font-bold rounded-lg hover:bg-yellow-400 hover:bg-opacity-10 transition-all duration-300 shadow-lg hover:shadow-yellow-500/20 flex items-center justify-center transform hover:scale-105">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Как это работает?
                    </a>
                </div>
            </div>

            <!-- Векторное изображение (Steam стиль) -->
            <div class="relative w-full lg:w-1/2 max-w-lg mt-10 lg:mt-0">
                <div class="relative">
                    <!-- Основной контейнер -->
                    <div class="relative z-10 w-full h-full">
                        <svg viewBox="0 0 400 400" class="w-full h-auto">
                            <!-- Фон (стиль Steam) -->
                            <rect width="400" height="400" rx="20" fill="#1A1A1A" />
                            
                            <!-- Шевроны (узор) -->
                            <path d="M0,100 L100,0 L200,100 L300,0 L400,100 L400,200 L300,300 L200,200 L100,300 L0,200 Z" fill="none" stroke="#FF9E00" stroke-width="2" opacity="0.3" />
                            
                            <!-- Основное изображение (стилизованный Steam лого) -->
                            <circle cx="200" cy="200" r="80" fill="none" stroke="#FF9E00" stroke-width="8" />
                            <path d="M150,200 A50,50 0 1,1 250,200" fill="none" stroke="#FF9E00" stroke-width="8" />
                            <path d="M170,170 L230,230 M170,230 L230,170" stroke="#FF9E00" stroke-width="8" stroke-linecap="round" />
                            
                            <!-- Эффекты -->
                            <circle cx="200" cy="200" r="60" fill="none" stroke="#FF9E00" stroke-width="2" stroke-dasharray="5,5" opacity="0.5" />
                        </svg>
                    </div>
                    
                    <!-- Анимация свечения -->
                    <div class="absolute inset-0 rounded-2xl bg-yellow-500 opacity-0 group-hover:opacity-10 blur-md transition-opacity duration-300"></div>
                </div>
                
                <!-- Плавающие элементы (игровые предметы) -->
                <div class="absolute -top-10 -left-10 w-20 h-20 animate-float">
                    <svg viewBox="0 0 100 100" class="w-full h-full">
                        <polygon points="50,5 90,30 90,70 50,95 10,70 10,30" fill="#FF9E00" opacity="0.8" />
                    </svg>
                </div>
                <div class="absolute -bottom-5 -right-5 w-16 h-16 animate-float-delay">
                    <svg viewBox="0 0 100 100" class="w-full h-full">
                        <circle cx="50" cy="50" r="40" fill="#FF9E00" opacity="0.6" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Волнообразный разделитель -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="#FF9E00"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="#FF9E00"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="#FF9E00"></path>
        </svg>
    </div>
</section>

<style>
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    .animate-float-delay {
        animation: float 6s ease-in-out 1s infinite;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
</style>

    <!-- Cases Section -->
<section id="cases" class="py-16 relative bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12">
            <div class="mb-6 md:mb-0">
                <h2 class="text-3xl sm:text-4xl font-bold text-yellow-400 flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Кейсы аккаунтов Steam
                </h2>
                <p class="text-gray-400 mt-2">Эксклюзивные коллекции игровых аккаунтов</p>
            </div>
            
            <div class="flex items-center space-x-4 bg-gray-800 px-4 py-2 rounded-lg border border-gray-700">
                <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"></path>
                </svg>
                <span class="text-gray-300">Сортировка:</span>
                <select class="bg-gray-800 text-white rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-yellow-500 border border-gray-700">
                    <option>По популярности</option>
                    <option>По цене (дешевые)</option>
                    <option>По цене (дорогие)</option>
                    <option>По новизне</option>
                </select>
            </div>
        </div>
        
        <!-- Cases Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Кейс 1 - CS:GO Prime -->
            <div class="group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-yellow-400 transform hover:-translate-y-1">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="CS:GO Prime" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <span class="absolute top-3 left-3 bg-gray-900/80 text-yellow-400 text-xs font-medium px-2 py-1 rounded-full flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        1200+ часов
                    </span>
                    <span class="absolute top-3 right-3 bg-yellow-500 text-gray-900 font-bold px-3 py-1 rounded-full text-sm">890₽</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold mb-2 text-white">CS:GO Prime аккаунт</h3>
                    <p class="text-gray-300 text-sm mb-4">Прайм-статус, инвентарь на 1200₽, звание: Legendary Eagle.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-wrap gap-1">
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">FPS</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Шутер</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Prime</span>
                        </div>
                        <a href="{{ route('case1') }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm flex items-center">
                            Открыть
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Кейс 2 - Dota 2 -->
            <div class="group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-yellow-400 transform hover:-translate-y-1">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1638432216621-9a377a1a928a?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Dota 2 Immortal" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <span class="absolute top-3 left-3 bg-gray-900/80 text-yellow-400 text-xs font-medium px-2 py-1 rounded-full flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        2000+ игр
                    </span>
                    <span class="absolute top-3 right-3 bg-yellow-500 text-gray-900 font-bold px-3 py-1 rounded-full text-sm">1 500₽</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold mb-2 text-white">Dota 2 — Immortal</h3>
                    <p class="text-gray-300 text-sm mb-4">Более 2000 игр, редкие скины, рейтинг Divine.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-wrap gap-1">
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">MOBA</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Стратегия</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Immortal</span>
                        </div>
                        <a href="{{ route('case2') }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm flex items-center">
                            Открыть
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Кейс 3 - Rust -->
            <div class="group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-yellow-400 transform hover:-translate-y-1">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1560253023-3ec5d502959f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Rust Survivor" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <span class="absolute top-3 left-3 bg-gray-900/80 text-yellow-400 text-xs font-medium px-2 py-1 rounded-full flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        500+ часов
                    </span>
                    <span class="absolute top-3 right-3 bg-yellow-500 text-gray-900 font-bold px-3 py-1 rounded-full text-sm">1 290₽</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold mb-2 text-white">Rust — выживший</h3>
                    <p class="text-gray-300 text-sm mb-4">Rust, DayZ, ARK. Более 500 часов. Готов к рейдам!</p>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-wrap gap-1">
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Выживание</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">PVP</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Хардкор</span>
                        </div>
                        <a href="{{ route('case3') }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm flex items-center">
                            Открыть
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Кейс 4 - Indie Bundle -->
            <div class="group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-yellow-400 transform hover:-translate-y-1">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1551103782-8ab07afd45c1?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Indie Bundle" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <span class="absolute top-3 left-3 bg-gray-900/80 text-yellow-400 text-xs font-medium px-2 py-1 rounded-full flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        20+ игр
                    </span>
                    <span class="absolute top-3 right-3 bg-yellow-500 text-gray-900 font-bold px-3 py-1 rounded-full text-sm">490₽</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold mb-2 text-white">Инди-бандл</h3>
                    <p class="text-gray-300 text-sm mb-4">20+ инди-игр: Hollow Knight, Celeste, Stardew Valley и др.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-wrap gap-1">
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Инди</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Бандл</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Коллекция</span>
                        </div>
                        <a href="{{ route('case4') }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm flex items-center">
                            Открыть
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Кейс 5 - GTA V -->
            <div class="group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-yellow-400 transform hover:-translate-y-1">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1542729776-e5f2d1f584c0?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="GTA V" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <span class="absolute top-3 left-3 bg-gray-900/80 text-yellow-400 text-xs font-medium px-2 py-1 rounded-full flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        Online
                    </span>
                    <span class="absolute top-3 right-3 bg-yellow-500 text-gray-900 font-bold px-3 py-1 rounded-full text-sm">750₽</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold mb-2 text-white">GTA V + Online</h3>
                    <p class="text-gray-300 text-sm mb-4">Полная версия GTA V, бонусы в GTA Online. Банов нет.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-wrap gap-1">
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Открытый мир</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Экшен</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Мультиплеер</span>
                        </div>
                        <a href="{{ route('case5') }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm flex items-center">
                            Открыть
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Кейс 6 - PUBG -->
            <div class="group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-yellow-400 transform hover:-translate-y-1">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="PUBG" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <span class="absolute top-3 left-3 bg-gray-900/80 text-yellow-400 text-xs font-medium px-2 py-1 rounded-full flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        K/D 2.3
                    </span>
                    <span class="absolute top-3 right-3 bg-yellow-500 text-gray-900 font-bold px-3 py-1 rounded-full text-sm">980₽</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold mb-2 text-white">PUBG — Полная прокачка</h3>
                    <p class="text-gray-300 text-sm mb-4">Полный пропуск, скины, статистика K/D 2.3, 800+ часов.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-wrap gap-1">
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Баттл-рояль</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">FPS</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Прокачка</span>
                        </div>
                        <a href="{{ route('case6') }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm flex items-center">
                            Открыть
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Кейс 7 - Horror Pack -->
            <div class="group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-yellow-400 transform hover:-translate-y-1">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1542281286-9e0a16bb7366?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Horror Pack" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <span class="absolute top-3 left-3 bg-gray-900/80 text-yellow-400 text-xs font-medium px-2 py-1 rounded-full flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        4 игры
                    </span>
                    <span class="absolute top-3 right-3 bg-yellow-500 text-gray-900 font-bold px-3 py-1 rounded-full text-sm">590₽</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold mb-2 text-white">Хоррор-бандл</h3>
                    <p class="text-gray-300 text-sm mb-4">Dead by Daylight, Phasmophobia, Resident Evil 7, Outlast.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-wrap gap-1">
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Хоррор</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Выживание</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Бандл</span>
                        </div>
                        <a href="{{ route('case7') }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm flex items-center">
                            Открыть
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Кейс 8 - AAA Library -->
            <div class="group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-yellow-400 transform hover:-translate-y-1">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="AAA Library" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <span class="absolute top-3 left-3 bg-gray-900/80 text-yellow-400 text-xs font-medium px-2 py-1 rounded-full flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        AAA
                    </span>
                    <span class="absolute top-3 right-3 bg-yellow-500 text-gray-900 font-bold px-3 py-1 rounded-full text-sm">1 990₽</span>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold mb-2 text-white">Топ AAA-игры</h3>
                    <p class="text-gray-300 text-sm mb-4">The Witcher 3, Cyberpunk 2077, RDR2, Elden Ring. Идеально для коллекции.</p>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-wrap gap-1">
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">AAA</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Коллекция</span>
                            <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded">Хиты</span>
                        </div>
                        <a href="{{ route('case8') }}" class="px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-semibold rounded-md hover:from-yellow-400 hover:to-yellow-500 transition duration-300 text-sm flex items-center">
                            Открыть
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Show More Button -->
        <div class="mt-12 text-center">
            <button class="px-8 py-3 border-2 border-yellow-400 text-yellow-400 font-bold rounded-lg hover:bg-yellow-400 hover:bg-opacity-10 transition duration-300 shadow-lg transform hover:scale-105 flex items-center mx-auto">
                Показать еще
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>
    </div>
</section>

    <!-- Decorative Vector Section -->
<section class="relative py-20 bg-gradient-to-b from-gray-900 to-gray-800 overflow-hidden">
    <!-- Анимированные фоновые элементы -->
    <div class="absolute inset-0 opacity-10">
        <!-- Векторные шестиугольники (стиль Steam) -->
        <div class="absolute top-0 left-0 w-full h-full bg-repeat opacity-20" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj48cGF0aCBkPSJNNTAgMEwxMDAgMjVMOTAgNzVMNTAgMTAwTDEwIDc1TDAgMjVMNTAgMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmY5ZTAwIiBzdHJva2Utd2lkdGg9IjAuNSIvPjwvc3ZnPg=='); transform: rotate(15deg);"></div>
        
        <!-- Векторные круги (стиль Yandex) -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(253,230,138,0.1)_0%,transparent_70%)]"></div>
    </div>

    <!-- Плавающие векторные элементы -->
    <div class="absolute top-1/4 left-1/4 w-32 h-32 opacity-20 animate-float">
        <svg viewBox="0 0 200 200" class="w-full h-full">
            <path d="M100 0L200 50L150 150L50 200L0 100L100 0Z" fill="#FF9E00" />
        </svg>
    </div>
    
    <div class="absolute bottom-1/3 right-1/4 w-24 h-24 opacity-15 animate-float-delay">
        <svg viewBox="0 0 200 200" class="w-full h-full">
            <circle cx="100" cy="100" r="80" fill="#FF9E00" />
        </svg>
    </div>
    
    <div class="absolute top-1/3 right-20 w-28 h-28 opacity-10 animate-float">
        <svg viewBox="0 0 200 200" class="w-full h-full">
            <rect x="25" y="25" width="150" height="150" rx="20" fill="#FF9E00" />
        </svg>
    </div>

    <!-- Основной контент -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-8 text-white">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">Премиум качество</span>
            <br>в каждом кейсе
        </h2>
        
        <!-- Векторная композиция -->
        <div class="relative mx-auto w-full max-w-2xl h-64 md:h-80 mt-12">
            <!-- Основной векторный элемент -->
            <svg viewBox="0 0 500 300" class="w-full h-full">
                <!-- Фон -->
                <rect width="500" height="300" rx="20" fill="#1E1E1E" />
                
                <!-- Стилизованный кейс -->
                <rect x="150" y="50" width="200" height="200" rx="15" fill="#2D2D2D" stroke="#FF9E00" stroke-width="3" />
                <path d="M150 80L350 80" stroke="#FF9E00" stroke-width="2" stroke-dasharray="5,3" />
                <circle cx="250" cy="150" r="50" fill="none" stroke="#FF9E00" stroke-width="3" stroke-dasharray="3,3" />
                
                <!-- Иконки игр -->
                <svg x="180" y="120" width="40" height="40" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" fill="none" stroke="#FF9E00" stroke-width="2" />
                </svg>
                
                <svg x="240" y="120" width="40" height="40" viewBox="0 0 24 24">
                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 110-16 8 8 0 010 16z" fill="none" stroke="#FF9E00" stroke-width="2" />
                    <path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01" fill="none" stroke="#FF9E00" stroke-width="2" stroke-linecap="round" />
                </svg>
                
                <svg x="300" y="120" width="40" height="40" viewBox="0 0 24 24">
                    <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z" fill="none" stroke="#FF9E00" stroke-width="2" />
                </svg>
            </svg>
            
            <!-- Анимация свечения -->
            <div class="absolute inset-0 rounded-2xl bg-yellow-500 opacity-0 group-hover:opacity-10 blur-md transition-opacity duration-300"></div>
        </div>
        
        <!-- Кнопка CTA -->
        <div class="mt-16">
            <a href="#cases" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-bold rounded-lg hover:from-yellow-400 hover:to-yellow-500 transition-all duration-300 shadow-lg hover:shadow-yellow-500/30 transform hover:scale-105">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                </svg>
                Посмотреть все кейсы
            </a>
        </div>
    </div>

    <!-- Волнообразный разделитель -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="#FF9E00"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="#FF9E00"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="#FF9E00"></path>
        </svg>
    </div>
</section>

<style>
    .animate-float {
        animation: float 8s ease-in-out infinite;
    }
    .animate-float-delay {
        animation: float 8s ease-in-out 2s infinite;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
</style>

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

    <!-- Interactive CTA Section with Mini-Game -->
<section class="relative py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 overflow-hidden">
    <!-- Анимированные фоновые элементы -->
    <div class="absolute inset-0 opacity-10">
        <!-- Шевронный узор -->
        <div class="absolute inset-0 bg-repeat" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj48cGF0aCBkPSJNNTAgMEwxMDAgNTBMNTAgMTAwTDAgNTBMNTAgMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmY5ZTAwIiBzdHJva2Utb3BhY2l0eT0iMC4xIiBzdHJva2Utd2lkdGg9IjEiLz48L3N2Zz4=');"></div>
    </div>
    
    <!-- Плавающие игровые элементы -->
    <div class="absolute top-1/4 left-1/5 w-12 h-12 bg-yellow-400 rounded-full filter blur-lg opacity-10 animate-float"></div>
    <div class="absolute top-1/3 right-1/4 w-16 h-16 bg-yellow-500 rounded-full filter blur-lg opacity-10 animate-float-delay"></div>
    
    <!-- Основной контент -->
    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-bold text-yellow-400 mb-6">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">Готовы открыть кейс?</span>
        </h2>
        <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
            Сыграйте в мини-игру и получите промокод на скидку 10%!
        </p>
        
        <!-- Мини-игра "Открой сундук" -->
        <div class="bg-gray-800/50 border-2 border-yellow-400/30 rounded-xl p-6 mb-10 max-w-md mx-auto">
            <div class="relative h-40 mb-6 flex justify-center items-center">
                <!-- Сундук (закрытый/открытый) -->
                <div id="chest" class="cursor-pointer transition-all duration-500 transform hover:scale-110">
                    <svg id="closed-chest" class="w-32 h-32 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <svg id="opened-chest" class="w-32 h-32 text-yellow-500 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                </div>
                
                <!-- Светящийся эффект при открытии -->
                <div id="chest-glow" class="absolute inset-0 bg-yellow-400 rounded-full opacity-0 blur-xl transition-opacity duration-300 pointer-events-none"></div>
            </div>
            
            <!-- Промокод (скрыт до открытия) -->
            <div id="promo-code" class="hidden">
                <p class="text-gray-400 mb-2">Ваш промокод:</p>
                <div class="bg-gray-900 border-2 border-dashed border-yellow-400 rounded-lg py-3 px-6 mb-4">
                    <span class="text-2xl font-mono font-bold text-yellow-400">STEAM10</span>
                </div>
                <p class="text-sm text-gray-500">Используйте при оформлении заказа</p>
            </div>
            
            <!-- Инструкция -->
            <p id="game-instruction" class="text-yellow-400/80 animate-pulse">Нажмите на сундук, чтобы открыть</p>
        </div>
        
        <!-- Кнопки действий -->
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#cases" class="px-8 py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-bold rounded-lg hover:from-yellow-400 hover:to-yellow-500 transition-all duration-300 shadow-lg hover:shadow-yellow-500/30 flex items-center justify-center transform hover:scale-105">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                </svg>
                Выбрать кейс
            </a>
            <button id="copy-promo" class="px-8 py-4 border-2 border-yellow-400 text-yellow-400 font-bold rounded-lg hover:bg-yellow-400 hover:bg-opacity-10 transition-all duration-300 shadow-lg hover:shadow-yellow-500/20 flex items-center justify-center transform hover:scale-105 hidden">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                </svg>
                Скопировать промокод
            </button>
        </div>
    </div>
    
    <!-- Конфеетти при открытии сундука -->
    <canvas id="confetti-canvas" class="absolute top-0 left-0 w-full h-full pointer-events-none z-0"></canvas>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chest = document.getElementById('chest');
        const closedChest = document.getElementById('closed-chest');
        const openedChest = document.getElementById('opened-chest');
        const chestGlow = document.getElementById('chest-glow');
        const promoCode = document.getElementById('promo-code');
        const gameInstruction = document.getElementById('game-instruction');
        const copyButton = document.getElementById('copy-promo');
        const canvas = document.getElementById('confetti-canvas');
        
        let confetti = null;
        
        // Инициализация конфеетти
        function initConfetti() {
            confetti = new ConfettiGenerator({
                target: 'confetti-canvas',
                max: 80,
                size: 1.5,
                animate: true,
                props: ['circle', 'square', 'triangle', 'line'],
                colors: [[255, 158, 0], [255, 190, 50], [255, 210, 100], [200, 120, 0]],
                clock: 25,
                rotate: true
            });
            confetti.render();
        }
        
        // Открытие сундука
        chest.addEventListener('click', function() {
            if (openedChest.classList.contains('hidden')) {
                // Анимация открытия
                closedChest.classList.add('hidden');
                openedChest.classList.remove('hidden');
                chestGlow.style.opacity = '0.3';
                
                setTimeout(() => {
                    chestGlow.style.opacity = '0';
                }, 1000);
                
                // Показываем промокод
                promoCode.classList.remove('hidden');
                gameInstruction.classList.add('hidden');
                copyButton.classList.remove('hidden');
                
                // Запускаем конфеетти
                initConfetti();
                setTimeout(() => {
                    confetti.clear();
                }, 3000);
            }
        });
        
        // Копирование промокода
        copyButton.addEventListener('click', function() {
            navigator.clipboard.writeText('STEAM10').then(() => {
                const originalText = copyButton.innerHTML;
                copyButton.innerHTML = `
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Скопировано!
                `;
                
                setTimeout(() => {
                    copyButton.innerHTML = originalText;
                }, 2000);
            });
        });
    });
</script>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    .animate-float-delay {
        animation: float 6s ease-in-out 1s infinite;
    }
</style>

<!-- Подключаем библиотеку конфеетти -->
<script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>

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