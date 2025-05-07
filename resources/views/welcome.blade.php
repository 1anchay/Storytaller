<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureShield - Защита конфиденциальной информации веб-сайтов</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f0f13;
            color: #ffffff;
        }
        
        .tech-bg {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(0, 100, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(0, 200, 255, 0.1) 0%, transparent 50%);
        }
        
        .glow-text {
            text-shadow: 0 0 10px rgba(0, 150, 255, 0.7);
        }
        
        .security-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 150, 255, 0.1);
            position: relative;
            overflow: hidden;
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(10px);
        }
        
        .security-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 150, 255, 0.2);
        }
        
        .encryption-animation {
            position: relative;
            height: 300px;
            overflow: hidden;
        }
        
        .data-particle {
            position: absolute;
            width: 8px;
            height: 8px;
            background-color: rgba(0, 200, 255, 0.7);
            border-radius: 50%;
            animation: float 5s infinite ease-in-out;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-20px) translateX(10px); }
        }
        
        .shield-icon {
            filter: drop-shadow(0 0 8px rgba(0, 150, 255, 0.7));
        }
        
        .hacker-attack {
            position: relative;
            width: 100%;
            height: 200px;
            border: 2px dashed rgba(255, 50, 50, 0.5);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .attack-line {
            position: absolute;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 50, 50, 0.8), transparent);
            animation: attack 3s infinite;
        }
        
        @keyframes attack {
            0% { width: 0; left: 0; opacity: 0; }
            50% { width: 100%; left: 0; opacity: 1; }
            100% { width: 0; left: 100%; opacity: 0; }
        }
        
        .protected-line {
            position: absolute;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(0, 200, 255, 0.8), transparent);
            animation: protect 3s infinite;
            transform-origin: left;
        }
        
        @keyframes protect {
            0% { transform: scaleX(0); opacity: 0; }
            50% { transform: scaleX(1); opacity: 1; }
            100% { transform: scaleX(0); opacity: 0; }
        }
    </style>
</head>
<body class="bg-gray-900">
    <!-- Header -->
    @include('header')

    <!-- Hero Section -->
    <section class="tech-bg py-20 md:py-32 relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-0 w-full h-full bg-repeat opacity-30" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj48cGF0aCBkPSJNNTAgMEwxMDAgMjVMOTAgNzVMNTAgMTAwTDEwIDc1TDAgMjVMNTAgMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMDA5NWZmIiBzdHJva2Utd2lkdGg9IjAuNSIvPjwvc3ZnPg==');"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                <div class="text-center lg:text-left max-w-2xl">
                    <div class="mb-6 flex justify-center lg:justify-start">
                        <span class="inline-flex items-center px-4 py-2 rounded-full bg-gray-800 border border-blue-400/30 text-blue-400 text-sm font-medium">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                            Защита данных уровня Enterprise
                        </span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6 text-white">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Защита</span>
                        <br>конфиденциальных данных
                    </h1>
                    
                    <p class="text-lg md:text-xl text-gray-300 mb-10 leading-relaxed">
                        Комплексная система защиты веб-сайтов от утечек информации, хакерских атак 
                        и несанкционированного доступа. Обеспечиваем безопасность данных ваших клиентов.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                        <a href="#demo" class="px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold rounded-lg hover:from-blue-400 hover:to-blue-500 transition-all duration-300 shadow-lg hover:shadow-blue-500/30 flex items-center justify-center transform hover:scale-105">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Демонстрация защиты
                        </a>
                        <a href="#features" class="px-8 py-4 border-2 border-blue-400 text-blue-400 font-bold rounded-lg hover:bg-blue-400 hover:bg-opacity-10 transition-all duration-300 shadow-lg hover:shadow-blue-500/20 flex items-center justify-center transform hover:scale-105">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            Возможности системы
                        </a>
                    </div>
                </div>

                <!-- Encryption Animation -->
                <div class="relative w-full lg:w-1/2 max-w-lg mt-10 lg:mt-0">
                    <div class="encryption-animation bg-gray-800/50 border-2 border-blue-400/20 rounded-xl p-6">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-32 h-32 text-blue-400 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        
                        <!-- Data particles -->
                        <div id="particles"></div>
                        
                        <!-- Encrypted data -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center p-6">
                                <div class="text-xs font-mono text-blue-300 mb-2">Исходные данные:</div>
                                <div class="text-sm font-mono text-white mb-4">Логин: user123 | Пароль: ********</div>
                                
                                <svg class="w-8 h-8 mx-auto text-blue-400 my-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                
                                <div class="text-xs font-mono text-blue-300 mb-2">Зашифрованные данные:</div>
                                <div class="text-sm font-mono text-gray-400">a5f8d3e0c1b7...9f2e4d6c8a0b</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Security Features -->
    <section id="features" class="py-20 bg-gray-800/50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl text-center font-bold mb-16">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Ключевые возможности</span>
                <br>нашей системы защиты
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="security-card p-8 rounded-xl">
                    <div class="w-14 h-14 bg-blue-500/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Шифрование данных</h3>
                    <p class="text-gray-400">Использование алгоритмов AES-256 и RSA для защиты конфиденциальной информации как при хранении, так и при передаче.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="security-card p-8 rounded-xl">
                    <div class="w-14 h-14 bg-blue-500/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Защита от атак</h3>
                    <p class="text-gray-400">Система предотвращает SQL-инъекции, XSS, CSRF, DDoS и другие виды кибератак с помощью интеллектуального анализа трафика.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="security-card p-8 rounded-xl">
                    <div class="w-14 h-14 bg-blue-500/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Двухфакторная аутентификация</h3>
                    <p class="text-gray-400">Поддержка SMS, email, TOTP и аппаратных ключей безопасности для доступа к административной панели.</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="security-card p-8 rounded-xl">
                    <div class="w-14 h-14 bg-blue-500/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Мониторинг активности</h3>
                    <p class="text-gray-400">Журналирование всех действий пользователей с возможностью алертов при подозрительной активности.</p>
                </div>
                
                <!-- Feature 5 -->
                <div class="security-card p-8 rounded-xl">
                    <div class="w-14 h-14 bg-blue-500/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Ролевая модель доступа</h3>
                    <p class="text-gray-400">Гибкая система прав пользователей с минимальными привилегиями для каждого сотрудника.</p>
                </div>
                
                <!-- Feature 6 -->
                <div class="security-card p-8 rounded-xl">
                    <div class="w-14 h-14 bg-blue-500/10 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Аудит безопасности</h3>
                    <p class="text-gray-400">Регулярное автоматическое тестирование системы на уязвимости с генерацией отчетов и рекомендаций.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Protection Demo -->
    <section id="demo" class="py-20 bg-gray-900">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl text-center font-bold mb-16">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Интерактивная демонстрация</span>
                <br>работы системы защиты
            </h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-white mb-6">Как мы защищаем ваш сайт от атак</h3>
                    <p class="text-gray-400 mb-8">Наша система в реальном времени анализирует входящий трафик и блокирует потенциально опасные запросы. Попробуйте сами:</p>
                    
                    <div class="hacker-attack mb-8">
                        <!-- Attack lines -->
                        <div class="attack-line" style="top: 20%; animation-delay: 0.5s;"></div>
                        <div class="attack-line" style="top: 40%; animation-delay: 1.5s;"></div>
                        <div class="attack-line" style="top: 60%; animation-delay: 2.5s;"></div>
                        <div class="attack-line" style="top: 80%; animation-delay: 3.5s;"></div>
                        
                        <!-- Protection lines -->
                        <div class="protected-line" style="top: 30%; width: 80%; left: 10%; animation-delay: 0s;"></div>
                        <div class="protected-line" style="top: 50%; width: 90%; left: 5%; animation-delay: 1s;"></div>
                        <div class="protected-line" style="top: 70%; width: 70%; left: 15%; animation-delay: 2s;"></div>
                        
                        <!-- Center text -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center p-6">
                                <div class="text-blue-400 font-bold text-lg mb-2">АКТИВНАЯ ЗАЩИТА</div>
                                <div class="text-xs text-gray-400">Обнаружено и заблокировано: <span class="text-red-400">4 атаки</span></div>
                            </div>
                        </div>
                    </div>
                    
                    <button id="simulate-attack" class="w-full px-6 py-3 bg-red-500/10 border border-red-500 text-red-400 rounded-lg hover:bg-red-500/20 transition flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                        Симулировать хакерскую атаку
                    </button>
                </div>
                
                <div>
                    <div class="bg-gray-800/50 border-2 border-blue-400/20 rounded-xl p-8">
                        <h4 class="text-xl font-bold text-white mb-4">Журнал событий безопасности</h4>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-8 h-8 rounded-full bg-blue-500/10 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-white">Обнаружена SQL-инъекция</p>
                                    <p class="text-xs text-gray-400">IP: 185.143.223.67 | Время: 14:23:45</p>
                                    <p class="text-xs text-blue-400 mt-1">Запрос заблокирован, IP добавлен в черный список</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-8 h-8 rounded-full bg-blue-500/10 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-white">Попытка XSS-атаки</p>
                                    <p class="text-xs text-gray-400">IP: 91.234.190.12 | Время: 14:21:33</p>
                                    <p class="text-xs text-blue-400 mt-1">Скрипт нейтрализован, пользователь перенаправлен</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-8 h-8 rounded-full bg-blue-500/10 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-white">Подозрительная активность</p>
                                    <p class="text-xs text-gray-400">IP: 203.113.145.89 | Время: 14:18:07</p>
                                    <p class="text-xs text-blue-400 mt-1">Множественные запросы, включена CAPTCHA</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-8 h-8 rounded-full bg-blue-500/10 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-white">Проверка обновлений</p>
                                    <p class="text-xs text-gray-400">Система | Время: 14:15:00</p>
                                    <p class="text-xs text-blue-400 mt-1">Все компоненты защиты актуальны</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Encryption Process -->
    <section id="protection" class="py-20 bg-gray-800/50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl text-center font-bold mb-16">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Процесс шифрования</span>
                <br>конфиденциальных данных
            </h2>
            
            <div class="bg-gray-900 rounded-xl p-8 md:p-12 border border-gray-800">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div class="text-center">
                        <div class="w-20 h-20 bg-blue-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-2xl font-bold text-blue-400">1</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Сбор данных</h3>
                        <p class="text-gray-400">Система идентифицирует конфиденциальные данные (логины, пароли, платежные реквизиты) на всех этапах работы с сайтом.</p>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="text-center">
                        <div class="w-20 h-20 bg-blue-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-2xl font-bold text-blue-400">2</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Шифрование</h3>
                        <p class="text-gray-400">Данные шифруются с использованием гибридной системы (AES для данных, RSA для ключей) перед сохранением или передачей.</p>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="text-center">
                    <div class="w-20 h-20 bg-blue-500/10 rounded-full flex items-center justify-center mx-auto mb-6"> <span class="text-2xl font-bold text-blue-400">3</span> </div> <h3 class="text-xl font-bold text-white mb-3">Хранение</h3> <p class="text-gray-400">Зашифрованные данные распределяются в защищенном хранилище с контролем целостности и регулярным ротацией ключей.</p> </div> </div><!-- Encryption Visualization --><div class="mt-16 bg-gray-800/50 rounded-lg p-6 border border-gray-700"> <div class="flex flex-col md:flex-row items-center justify-between gap-8"> <div class="w-full md:w-1/3"> <div class="bg-gray-900 p-4 rounded-lg border border-gray-700"> <div class="text-xs font-mono text-blue-300 mb-2">Исходные данные:</div> <div class="text-sm font-mono text-white p-3 bg-gray-800 rounded">user=admin&pass=Secret123!</div> </div> </div>
                    <div class="flex-shrink-0 text-blue-400">
        <svg class="w-10 h-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
        </svg>
    </div>

    <div class="w-full md:w-1/3">
        <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
            <div class="text-xs font-mono text-blue-300 mb-2">Зашифрованные данные:</div>
            <div class="text-sm font-mono text-gray-400 p-3 bg-gray-800 rounded">a5f8d3e0c1b7...9f2e4d6c8a0b</div>
        </div>
    </div>
</div>

<div class="mt-8 flex justify-center">
    <button id="live-encrypt" class="px-6 py-3 bg-blue-500/10 border border-blue-500 text-blue-400 rounded-lg hover:bg-blue-500/20 transition flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
        </svg>
        Зашифровать свои данные
    </button>
</div>
</div> </div> </section><!-- Testimonials --><section class="py-20 bg-gray-900"> <div class="max-w-7xl mx-auto px-6"> <h2 class="text-3xl text-center font-bold mb-16"> <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Отзывы клиентов</span> <br>о нашей системе защиты </h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Testimonial 1 -->
    <div class="security-card p-8 rounded-xl">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold">AK</div>
            <div class="ml-4">
                <h4 class="font-bold text-white">Алексей К.</h4>
                <p class="text-sm text-gray-400">FinTech компания</p>
            </div>
        </div>
        <p class="text-gray-300">"После внедрения системы SecureShield мы прошли аудит безопасности без единого замечания. За последний год не было ни одной утечки данных."</p>
        <div class="mt-4 flex text-yellow-400">
            ★★★★★
        </div>
    </div>

    <!-- Testimonial 2 -->
    <div class="security-card p-8 rounded-xl">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold">МС</div>
            <div class="ml-4">
                <h4 class="font-bold text-white">Марина С.</h4>
                <p class="text-sm text-gray-400">Онлайн-ритейл</p>
            </div>
        </div>
        <p class="text-gray-300">"Система ежедневно блокирует сотни атак. Особенно впечатлила защита от брутфорса - количество попыток взлома сократилось на 95%."</p>
        <div class="mt-4 flex text-yellow-400">
            ★★★★★
        </div>
    </div>

    <!-- Testimonial 3 -->
    <div class="security-card p-8 rounded-xl">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold">ДИ</div>
            <div class="ml-4">
                <h4 class="font-bold text-white">Дмитрий И.</h4>
                <p class="text-sm text-gray-400">Медицинский портал</p>
            </div>
        </div>
        <p class="text-gray-300">"Благодаря гранулярному управлению доступом мы смогли обеспечить HIPAA-совместимость и работать с медицинскими данными пациентов."</p>
        <div class="mt-4 flex text-yellow-400">
            ★★★★★
        </div>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Testimonial 1 -->
    <div class="security-card p-8 rounded-xl">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold">AK</div>
            <div class="ml-4">
                <h4 class="font-bold text-white">Алексей К.</h4>
                <p class="text-sm text-gray-400">FinTech компания</p>
            </div>
        </div>
        <p class="text-gray-300">"После внедрения системы SecureShield мы прошли аудит безопасности без единого замечания. За последний год не было ни одной утечки данных."</p>
        <div class="mt-4 flex text-yellow-400">
            ★★★★★
        </div>
    </div>

    <!-- Testimonial 2 -->
    <div class="security-card p-8 rounded-xl">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold">МС</div>
            <div class="ml-4">
                <h4 class="font-bold text-white">Марина С.</h4>
                <p class="text-sm text-gray-400">Онлайн-ритейл</p>
            </div>
        </div>
        <p class="text-gray-300">"Система ежедневно блокирует сотни атак. Особенно впечатлила защита от брутфорса - количество попыток взлома сократилось на 95%."</p>
        <div class="mt-4 flex text-yellow-400">
            ★★★★★
        </div>
    </div>

    <!-- Testimonial 3 -->
    <div class="security-card p-8 rounded-xl">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold">ДИ</div>
            <div class="ml-4">
                <h4 class="font-bold text-white">Дмитрий И.</h4>
                <p class="text-sm text-gray-400">Медицинский портал</p>
            </div>
        </div>
        <p class="text-gray-300">"Благодаря гранулярному управлению доступом мы смогли обеспечить HIPAA-совместимость и работать с медицинскими данными пациентов."</p>
        <div class="mt-4 flex text-yellow-400">
            ★★★★★
        </div>
    </div>
</div>
</div> </section><!-- CTA Section --><section id="contact" class="py-20 bg-gradient-to-br from-blue-900/50 to-blue-800/50 relative overflow-hidden"> <!-- Animated background elements --> <div class="absolute inset-0 opacity-10"> <div class="absolute top-0 left-0 w-full h-full bg-repeat opacity-30" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj48cGF0aCBkPSJNNTAgMEwxMDAgMjVMOTAgNzVMNTAgMTAwTDEwIDc1TDAgMjVMNTAgMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMDA5NWZmIiBzdHJva2Utd2lkdGg9IjAuNSIvPjwvc3ZnPg==');"></div> </div><div class="max-w-4xl mx-auto px-6 text-center relative z-10"> <h2 class="text-4xl font-bold text-white mb-6"> Готовы защитить свой сайт? </h2> <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto"> Оставьте заявку и наши специалисты проведут бесплатный аудит безопасности вашего проекта </p>
<form class="max-w-lg mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <input type="text" placeholder="Ваше имя" class="px-6 py-4 bg-gray-900/50 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        <input type="email" placeholder="Email" class="px-6 py-4 bg-gray-900/50 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
    <div class="mb-4">
        <input type="text" placeholder="URL вашего сайта" class="w-full px-6 py-4 bg-gray-900/50 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
    <div class="mb-6">
        <textarea placeholder="Сообщение (описание вашего проекта)" class="w-full px-6 py-4 bg-gray-900/50 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent h-32"></textarea>
    </div>
    <button type="submit" class="w-full px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold rounded-lg hover:from-blue-400 hover:to-blue-500 transition-all duration-300 shadow-lg hover:shadow-blue-500/30 flex items-center justify-center transform hover:scale-[1.02]">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
        </svg>
        Отправить заявку
    </button>
</form>
</div> </section><!-- Footer -->
@include('footer')
<!-- Scripts -->
<script> // Create data particles document.addEventListener('DOMContentLoaded', function() { const container = document.getElementById('particles'); for (let i = 0; i < 30; i++) { const particle = document.createElement('div'); particle.className = 'data-particle'; particle.style.left = `${Math.random() * 100}%`; particle.style.top = `${Math.random() * 100}%`; particle.style.animationDelay = `${Math.random() * 5}s`; particle.style.opacity = Math.random() * 0.5 + 0.1; particle.style.width = `${Math.random() * 6 + 4}px`; particle.style.height = particle.style.width; container.appendChild(particle); } // Simulate attack button document.getElementById('simulate-attack').addEventListener('click', function() { const attackContainer = document.querySelector('.hacker-attack'); // Create new attack lines for (let i = 0; i < 3; i++) { const attackLine = document.createElement('div'); attackLine.className = 'attack-line'; attackLine.style.top = `${Math.random() * 80 + 10}%`; attackLine.style.animationDelay = '0s'; attackContainer.appendChild(attackLine); // Remove after animation setTimeout(() => { attackLine.remove(); }, 3000); } // Create protection lines for (let i = 0; i < 2; i++) { const protectLine = document.createElement('div'); protectLine.className = 'protected-line'; protectLine.style.top = `${Math.random() * 80 + 10}%`; protectLine.style.width = `${Math.random() * 30 + 70}%`; protectLine.style.left = `${Math.random() * 15}%`; protectLine.style.animationDelay = '0s'; attackContainer.appendChild(protectLine); // Remove after animation setTimeout(() => { protectLine.remove(); }, 3000); } }); // Live encryption demo document.getElementById('live-encrypt').addEventListener('click', function() { const input = prompt('Введите текст для шифрования:'); if (input) { // Simple "encryption" for demo purposes const encrypted = btoa(input).split('').reverse().join('').substring(0, 24) + '...'; alert(`Результат шифрования:\n\n${encrypted}`); } }); }); </script></body> </html>