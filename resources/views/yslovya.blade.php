@extends('layouts.app')

@section('content')
@include('header')

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .game-background {
            background: 
                linear-gradient(rgba(10, 10, 10, 0.85), rgba(5, 5, 5, 0.9)),
                url('https://cdn.cloudflare.steamstatic.com/store/home/store_home_share.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .minecraft-card {
            background: rgba(30, 30, 30, 0.9);
            border: 2px solid #4a4a4a;
            border-radius: 4px;
            box-shadow: 4px 4px 0 rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(5px);
        }
        .game-icon {
            filter: drop-shadow(0 0 4px rgba(0, 0, 0, 0.5));
            transition: all 0.3s ease;
        }
        .game-icon:hover {
            transform: scale(1.1);
            filter: drop-shadow(0 0 8px rgba(255, 255, 255, 0.3));
        }
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
    </style>
</head>

<div class="min-h-screen game-background py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Векторные изображения игр -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- CS:GO -->
        <svg class="absolute top-1/4 left-10 w-24 h-24 text-gray-600 opacity-20 game-icon floating" style="animation-delay: 0.5s;" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
            <path fill="currentColor" d="M12 5c-3.87 0-7 3.13-7 7s3.13 7 7 7 7-3.13 7-7-3.13-7-7-7zm3 8h-2v2h-2v-2H9v-2h2V9h2v2h2v2z"/>
        </svg>
        
        <!-- Dota 2 -->
        <svg class="absolute top-1/3 right-20 w-28 h-28 text-red-600 opacity-20 game-icon floating" style="animation-delay: 1s;" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
            <path fill="currentColor" d="M12 6l-5 5 5 5 5-5-5-5z"/>
        </svg>
        
        <!-- Minecraft -->
        <svg class="absolute bottom-1/4 left-20 w-32 h-32 text-green-600 opacity-20 game-icon floating" style="animation-delay: 1.5s;" viewBox="0 0 24 24">
            <rect fill="currentColor" x="2" y="2" width="20" height="20" rx="2"/>
            <rect fill="currentColor" x="6" y="6" width="4" height="4"/>
            <rect fill="currentColor" x="14" y="6" width="4" height="4"/>
            <rect fill="currentColor" x="6" y="14" width="4" height="4"/>
            <rect fill="currentColor" x="14" y="14" width="4" height="4"/>
        </svg>
        
        <!-- Fortnite -->
        <svg class="absolute bottom-1/3 right-16 w-24 h-24 text-purple-600 opacity-20 game-icon floating" style="animation-delay: 2s;" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
            <path fill="currentColor" d="M12 6l-6 6 6 6 6-6-6-6z"/>
        </svg>
    </div>

    <div class="max-w-4xl mx-auto relative z-10">
        <!-- Заголовок -->
        <div class="minecraft-card mb-8">
            <div class="bg-gradient-to-r from-green-700 to-green-900 p-4 flex items-center justify-center">
                <img src="https://www.minecraft.net/content/dam/minecraft/touchup-2020/minecraft-logo.svg" 
                     alt="Minecraft" 
                     class="h-10 mr-4"
                     onerror="this.src='https://via.placeholder.com/150x40?text=Minecraft+Logo'">
                <h1 class="text-3xl font-bold text-white">Условия использования</h1>
            </div>
            <div class="p-6 text-gray-300">
                <p class="mb-4">Последнее обновление: {{ date('d.m.Y') }}</p>
                <p>Пожалуйста, внимательно ознакомьтесь с условиями перед использованием наших услуг.</p>
            </div>
        </div>

        <!-- Основное содержание -->
        <div class="space-y-6">
            <!-- Раздел 1 -->
            <div class="minecraft-card">
                <div class="flex items-center bg-gradient-to-r from-blue-800 to-blue-900 p-4">
                    <svg class="h-8 w-8 mr-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <h2 class="text-2xl font-bold text-white">1. Общие положения</h2>
                </div>
                <div class="p-6">
                    <ul class="list-disc pl-5 space-y-3 text-gray-300">
                        <li>Используя наш сервис, вы соглашаетесь с этими условиями</li>
                        <li>Услуги предоставляются "как есть" без явных или подразумеваемых гарантий</li>
                        <li>Мы оставляем право изменять условия без предварительного уведомления</li>
                    </ul>
                </div>
            </div>

            <!-- Раздел 2 -->
            <div class="minecraft-card">
                <div class="flex items-center bg-gradient-to-r from-yellow-700 to-yellow-900 p-4">
                    <svg class="h-8 w-8 mr-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/>
                    </svg>
                    <h2 class="text-2xl font-bold text-white">2. Учетные записи</h2>
                </div>
                <div class="p-6">
                    <ul class="list-disc pl-5 space-y-3 text-gray-300">
                        <li>Вы несете ответственность за безопасность своего аккаунта</li>
                        <li>Запрещается передавать учетные данные третьим лицам</li>
                        <li>Мы не несем ответственности за несанкционированный доступ</li>
                    </ul>
                </div>
            </div>

            <!-- Раздел 3 -->
            <div class="minecraft-card">
                <div class="flex items-center bg-gradient-to-r from-red-800 to-red-900 p-4">
                    <svg class="h-8 w-8 mr-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <h2 class="text-2xl font-bold text-white">3. Ограничения</h2>
                </div>
                <div class="p-6">
                    <ul class="list-disc pl-5 space-y-3 text-gray-300">
                        <li>Запрещается использовать сервис для незаконной деятельности</li>
                        <li>Не допускается создание фейковых аккаунтов</li>
                        <li>Запрещен автоматизированный сбор данных без разрешения</li>
                    </ul>
                </div>
            </div>

            <!-- Раздел 4 -->
            <div class="minecraft-card">
                <div class="flex items-center bg-gradient-to-r from-purple-800 to-purple-900 p-4">
                    <svg class="h-8 w-8 mr-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <h2 class="text-2xl font-bold text-white">4. Интеллектуальная собственность</h2>
                </div>
                <div class="p-6">
                    <ul class="list-disc pl-5 space-y-3 text-gray-300">
                        <li>Все права на игровой контент принадлежат их правообладателям</li>
                        <li>Наш сервис лишь предоставляет доступ к цифровым товарам</li>
                        <li>Запрещено распространять купленный контент без разрешения</li>
                    </ul>
                </div>
            </div>

            <!-- Кнопка принятия -->
            <div class="minecraft-card p-6 text-center">
                <p class="mb-4 text-gray-300">Продолжая использовать сервис, вы подтверждаете согласие с условиями</p>
                <button class="bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-400 hover:to-yellow-500 text-black font-bold px-6 py-3 rounded-md transition-all">
                    Я принимаю условия использования
                </button>
            </div>
        </div>
    </div>
</div>

@include('footer')