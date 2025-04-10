@extends('layouts.app')

@section('content')
@include('header')

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .game-pattern {
            background-image: url('https://cdn.cloudflare.steamstatic.com/store/home/store_home_share.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .card-glass {
            background: rgba(26, 32, 44, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .hover-glow {
            transition: box-shadow 0.3s ease;
        }
        .hover-glow:hover {
            box-shadow: 0 0 15px rgba(66, 153, 225, 0.6);
        }
    </style>
</head>

<div class="min-h-screen bg-gray-900 py-12 px-4 sm:px-6 lg:px-8 game-pattern">
    <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Боковая панель с игровыми изображениями -->
        <div class="lg:col-span-1 space-y-6 hidden lg:block">
            <div class="rounded-lg overflow-hidden hover-glow">
                <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/730/header.jpg" 
                     alt="Counter-Strike 2" 
                     class="w-full h-auto object-cover"
                     onerror="this.src='https://via.placeholder.com/300x150?text=Game+Image'">
                <div class="bg-black bg-opacity-70 p-3">
                    <h3 class="text-white font-semibold">Counter-Strike 2</h3>
                </div>
            </div>
            
            <div class="rounded-lg overflow-hidden hover-glow">
                <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/570/header.jpg" 
                     alt="Dota 2" 
                     class="w-full h-auto object-cover"
                     onerror="this.src='https://via.placeholder.com/300x150?text=Game+Image'">
                <div class="bg-black bg-opacity-70 p-3">
                    <h3 class="text-white font-semibold">Dota 2</h3>
                </div>
            </div>
            
            <div class="rounded-lg overflow-hidden hover-glow">
                <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/578080/header.jpg" 
                     alt="PUBG" 
                     class="w-full h-auto object-cover"
                     onerror="this.src='https://via.placeholder.com/300x150?text=Game+Image'">
                <div class="bg-black bg-opacity-70 p-3">
                    <h3 class="text-white font-semibold">PUBG</h3>
                </div>
            </div>
            
            <div class="rounded-lg overflow-hidden hover-glow">
                <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1172470/header.jpg" 
                     alt="Apex Legends" 
                     class="w-full h-auto object-cover"
                     onerror="this.src='https://via.placeholder.com/300x150?text=Game+Image'">
                <div class="bg-black bg-opacity-70 p-3">
                    <h3 class="text-white font-semibold">Apex Legends</h3>
                </div>
            </div>
        </div>

        <!-- Основное содержание -->
        <div class="lg:col-span-3">
            <!-- Заголовок в стиле Steam -->
            <div class="steam-gradient rounded-xl overflow-hidden shadow-2xl mb-8 hover-glow">
                <div class="p-8 text-center text-white">
                    <div class="flex items-center justify-center mb-4">
                        <svg class="h-12 w-12 mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.979 0C5.678 0 .492 5.19.492 11.472c0 6.281 5.186 11.472 11.487 11.472 6.282 0 11.487-5.19 11.487-11.472C23.466 5.19 18.26 0 11.98 0zm0 5.75c3.238 0 5.872 2.62 5.872 5.85 0 3.23-2.634 5.85-5.872 5.85-3.239 0-5.873-2.62-5.873-5.85 0-3.23 2.634-5.85 5.873-5.85zm-5.05 7.418h-.084v.084c0 .878.71 1.588 1.588 1.588.878 0 1.589-.71 1.589-1.588v-.084h-3.093zm8.863 0h-3.093v.084c0 .878.71 1.588 1.588 1.588.879 0 1.589-.71 1.589-1.588v-.084h-.084z" fill="currentColor"/>
                        </svg>
                        <h1 class="text-4xl font-bold">Политика конфиденциальности</h1>
                    </div>
                    <p class="text-gray-300">Последнее обновление: {{ date('d.m.Y') }}</p>
                </div>
            </div>

            <!-- Контент политики -->
            <div class="card-glass rounded-xl overflow-hidden shadow-xl p-8 hover-glow">
                <div class="prose prose-invert max-w-none">
                    <!-- Разделы политики остаются без изменений -->
                    <h2 class="text-2xl font-bold text-blue-400 mb-4 flex items-center">
                        <svg class="h-6 w-6 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" fill="currentColor"/>
                        </svg>
                        1. Сбор информации
                    </h2>
                    <p class="mb-6">
                        Мы собираем только необходимую информацию для обработки ваших заказов и улучшения нашего сервиса. 
                        Это может включать:
                    </p>
                    <ul class="mb-6 list-disc pl-5 space-y-2">
                        <li>Контактные данные (имя, email)</li>
                        <li>Информацию о покупках (игры, аккаунты)</li>
                        <li>Технические данные (IP-адрес, тип устройства)</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-green-400 mb-4 flex items-center">
                        <svg class="h-6 w-6 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11V11.99z" fill="currentColor"/>
                        </svg>
                        2. Использование данных
                    </h2>
                    <p class="mb-6">
                        Ваши данные используются исключительно для:
                    </p>
                    <ul class="mb-6 list-disc pl-5 space-y-2">
                        <li>Обработки и выполнения ваших заказов</li>
                        <li>Обеспечения технической поддержки</li>
                        <li>Улучшения качества наших услуг</li>
                        <li>Предотвращения мошеннических действий</li>
                    </ul>

                    <!-- Остальные разделы аналогично... -->

                    <div class="bg-gray-800 rounded-lg p-6 mt-8 border-l-4 border-blue-500">
                        <h3 class="text-xl font-bold text-white mb-2 flex items-center">
                            <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z" fill="currentColor"/>
                            </svg>
                            Контакты
                        </h3>
                        <p>
                            По всем вопросам, связанным с политикой конфиденциальности, обращайтесь по email:
                            <a href="mailto:privacy@game-store.ru" class="text-blue-400 hover:underline font-medium">privacy@game-store.ru</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')