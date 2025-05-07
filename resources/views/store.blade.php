@extends('layouts.app')

@section('content')
@include('header')

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .security-background {
            background: 
                linear-gradient(rgba(10, 10, 30, 0.95), rgba(5, 5, 20, 0.98)),
                url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .security-card {
            background: rgba(20, 20, 40, 0.9);
            border: 1px solid rgba(74, 109, 255, 0.3);
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }
        .security-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 89, 255, 0.2);
            border-color: rgba(74, 109, 255, 0.5);
        }
        .security-icon {
            filter: drop-shadow(0 0 8px rgba(56, 182, 255, 0.5));
            transition: all 0.3s ease;
        }
        .security-icon:hover {
            transform: scale(1.1);
            filter: drop-shadow(0 0 12px rgba(56, 182, 255, 0.8));
        }
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        .gradient-text {
            background: linear-gradient(90deg, #38b6ff, #3a6eff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .download-btn {
            background: linear-gradient(135deg, #3a6eff 0%, #38b6ff 100%);
            box-shadow: 0 4px 15px rgba(56, 182, 255, 0.4);
            transition: all 0.3s ease;
        }
        .download-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(56, 182, 255, 0.6);
        }
    </style>
</head>

<div class="min-h-screen security-background py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Декоративные элементы -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Шифрование -->
        <svg class="absolute top-1/4 left-10 w-24 h-24 text-blue-400 opacity-20 security-icon floating" style="animation-delay: 0.5s;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M12 3c-4.97 0-9 3.185-9 7.115 0 2.557 1.522 4.82 3.889 6.115l-.78 2.77 3.116-1.65c.88.275 1.823.425 2.775.425 4.97 0 9-3.186 9-7.115C21 6.186 16.97 3 12 3z"/>
        </svg>
        
        <!-- Защита -->
        <svg class="absolute top-1/3 right-20 w-28 h-28 text-green-400 opacity-20 security-icon floating" style="animation-delay: 1s;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11V11.99z"/>
        </svg>
        
        <!-- Безопасность -->
        <svg class="absolute bottom-1/4 left-20 w-32 h-32 text-indigo-400 opacity-20 security-icon floating" style="animation-delay: 1.5s;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/>
        </svg>
    </div>

    <div class="max-w-4xl mx-auto relative z-10">
        <!-- Заголовок -->
        <div class="security-card mb-8 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-800 to-indigo-900 p-8 text-center">
                <h1 class="text-4xl font-bold text-white mb-4">Наши услуги защиты</h1>
                <p class="text-xl text-blue-200">Комплексные решения для безопасности вашего бизнеса</p>
            </div>
        </div>

        <!-- Основное содержание -->
        <div class="space-y-8">
            <!-- Раздел 1 -->
            <div class="security-card overflow-hidden">
                <div class="flex items-center bg-gradient-to-r from-blue-700 to-blue-800 p-6">
                    <div class="bg-blue-500/20 p-3 rounded-lg mr-6">
                        <svg class="h-8 w-8 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Аудит безопасности</h2>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Что включаем:</h3>
                            <ul class="space-y-3 text-gray-300">
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 bg-blue-500/10 text-blue-400 rounded-full p-1 mr-3">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    <span>Полное сканирование уязвимостей</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 bg-blue-500/10 text-blue-400 rounded-full p-1 mr-3">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    <span>Тестирование на проникновение</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 bg-blue-500/10 text-blue-400 rounded-full p-1 mr-3">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    <span>Анализ соответствия стандартам</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-4">Результат:</h3>
                            <ul class="space-y-3 text-gray-300">
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 bg-green-500/10 text-green-400 rounded-full p-1 mr-3">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    <span>Детальный отчет об уязвимостях</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 bg-green-500/10 text-green-400 rounded-full p-1 mr-3">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    <span>Рекомендации по устранению</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 bg-green-500/10 text-green-400 rounded-full p-1 mr-3">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    <span>План действий по улучшению</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Раздел 2 -->
            <div class="security-card overflow-hidden">
                <div class="flex items-center bg-gradient-to-r from-purple-700 to-purple-800 p-6">
                    <div class="bg-purple-500/20 p-3 rounded-lg mr-6">
                        <svg class="h-8 w-8 text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Защита веб-приложений</h2>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-purple-900/20 p-6 rounded-lg border border-purple-800/50 text-center">
                            <div class="bg-purple-500/10 p-3 rounded-full inline-block mb-4">
                                <svg class="h-8 w-8 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white mb-2">WAF</h3>
                            <p class="text-gray-400 text-sm">Веб-приложение брандмауэр для фильтрации атак</p>
                        </div>
                        <div class="bg-purple-900/20 p-6 rounded-lg border border-purple-800/50 text-center">
                            <div class="bg-purple-500/10 p-3 rounded-full inline-block mb-4">
                                <svg class="h-8 w-8 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white mb-2">DDoS Protection</h3>
                            <p class="text-gray-400 text-sm">Защита от распределенных атак</p>
                        </div>
                        <div class="bg-purple-900/20 p-6 rounded-lg border border-purple-800/50 text-center">
                            <div class="bg-purple-500/10 p-3 rounded-full inline-block mb-4">
                                <svg class="h-8 w-8 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-white mb-2">API Security</h3>
                            <p class="text-gray-400 text-sm">Защита API-интерфейсов</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Раздел 3 -->
            <div class="security-card overflow-hidden">
                <div class="flex items-center bg-gradient-to-r from-indigo-700 to-indigo-800 p-6">
                    <div class="bg-indigo-500/20 p-3 rounded-lg mr-6">
                        <svg class="h-8 w-8 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Мониторинг и реагирование</h2>
                </div>
                <div class="p-8">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-1/2 mb-6 md:mb-0 md:pr-6">
                            <h3 class="text-xl font-bold text-white mb-4">24/7 Наблюдение</h3>
                            <p class="text-gray-400 mb-4">Наша команда экспертов круглосуточно отслеживает угрозы и оперативно реагирует на инциденты.</p>
                            <ul class="space-y-3 text-gray-300">
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 bg-indigo-500/10 text-indigo-400 rounded-full p-1 mr-3">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    <span>Обнаружение аномалий в реальном времени</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 bg-indigo-500/10 text-indigo-400 rounded-full p-1 mr-3">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    <span>Автоматические уведомления об угрозах</span>
                                </li>
                            </ul>
                        </div>
                        <div class="w-full md:w-1/2">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Мониторинг" class="rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Кнопка скачивания -->
            <div class="text-center mt-12">
                <h3 class="text-2xl font-bold text-white mb-6">Хотите узнать больше о наших услугах?</h3>
                <p class="text-xl text-blue-200 mb-8">Скачайте полный каталог услуг в формате PDF</p>
                <a href="/downloads/services-catalog.pdf" download class="download-btn inline-flex items-center px-8 py-4 rounded-full text-white font-bold text-lg">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Скачать каталог (2.4 MB)
                </a>
                <p class="text-gray-500 mt-4">Последнее обновление: {{ date('d.m.Y') }}</p>
            </div>
        </div>
    </div>
</div>

@include('footer')
@endsection