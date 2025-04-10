<footer class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12 shadow-2xl relative overflow-hidden">
    <!-- Убрал rounded-t-3xl -->
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Логотип и описание -->
            <div class="flex flex-col space-y-6">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-purple-600 rounded-lg flex items-center justify-center shadow-lg transform group-hover:rotate-6 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 tracking-tight group-hover:bg-gradient-to-r group-hover:from-pink-500 group-hover:via-red-500 group-hover:to-yellow-500 transition-all duration-500">
                        Re<span class="text-white">Майн</span>
                    </span>
                </a>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Лучшие кейсы для аккаунтов Steam. Откройте новые возможности с нами и погрузитесь в мир киберпанка!
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-gray-600 flex items-center justify-center transition-all duration-200 shadow-md transform hover:scale-110">
                        <svg class="w-5 h-5 text-cyan-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l-4.463 4.969-4.537-4.969h3c0-4.97 4.03-9 9-9 2.395 0 4.565.942 6.179 2.468l-2.004 2.231c-1.081-1.05-2.553-1.699-4.175-1.699-3.309 0-6 2.691-6 6h3zm10.463-4.969l-4.463 4.969h3c0 3.309-2.691 6-6 6-1.623 0-3.094-.65-4.175-1.699l-2.004 2.231c1.613 1.526 3.784 2.468 6.179 2.468 4.97 0 9-4.03 9-9h3l-4.537-4.969z"/>
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-gray-600 flex items-center justify-center transition-all duration-200 shadow-md transform hover:scale-110">
                        <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-gray-600 flex items-center justify-center transition-all duration-200 shadow-md transform hover:scale-110">
                        <svg class="w-5 h-5 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Быстрые ссылки -->
            <div class="flex flex-col space-y-4">
                <h4 class="text-lg font-semibold text-cyan-400 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    Навигация
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/') }}" class="text-gray-400 hover:text-cyan-400 transition duration-300 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Главная
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/agreement') }}" class="text-gray-400 hover:text-cyan-400 transition duration-300 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Соглашение
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/support') }}" class="text-gray-400 hover:text-cyan-400 transition duration-300 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Поддержка
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Контакты -->
            <div class="flex flex-col space-y-4">
                <h4 class="text-lg font-semibold text-cyan-400 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    Контакты
                </h4>
                <ul class="space-y-3">
                    <li class="text-gray-400 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        support@remain.com
                    </li>
                    <li class="text-gray-400 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        +7 (123) 456-7890
                    </li>
                </ul>
            </div>

            <!-- Социальные сети -->
            <div class="flex flex-col space-y-4">
                <h4 class="text-lg font-semibold text-cyan-400 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                    Социальные сети
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="https://t.me/your_telegram" target="_blank" class="text-gray-400 hover:text-blue-400 transition duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                            </svg>
                            Telegram
                        </a>
                    </li>
                    <li>
                        <a href="https://vk.com/your_vk" target="_blank" class="text-gray-400 hover:text-blue-500 transition duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M15.073 2H8.938C3.332 2 2 3.333 2 8.927v6.136C2 20.667 3.323 22 8.927 22h6.136C20.667 22 22 20.677 22 15.073V8.938C22 3.332 20.677 2 15.073 2zm3.073 14.27h-1.459c-.552 0-.718-.447-1.708-1.437-.864-.834-1.229-.937-1.448-.937-.302 0-.385.083-.385.5v1.312c0 .354-.115.563-1.042.563-1.51 0-3.19-.921-4.375-2.625-1.583-2.396-1.563-2.354-1.563-3.125 0-.334.083-.5.333-.5h1.459c.25 0 .343.146.437.5.698 2.583 2.812 4.854 3.437 4.854.25 0 .25-.146.25-.5v-2.896c-.062-.98-.582-1.062-.582-1.312 0-.146.146-.292.333-.292h2.146c.292 0 .375.146.375.49v3.875c0 .272.104.364.229.364.187 0 .333-.104.646-.417 1.145-1.25 1.792-3.229 1.792-3.229.125-.271.208-.417.437-.417h1.459c.229 0 .312.104.27.438-.229 1.083-2.438 3.708-2.438 3.708-.187.229-.27.334-.021.521.136.125.604.646 1.021 1.042.708.709 1.227 1.312 1.354 1.708.104.396-.084.604-.438.604z"/>
                            </svg>
                            ВКонтакте
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/your_youtube" target="_blank" class="text-gray-400 hover:text-red-500 transition duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                            </svg>
                            YouTube
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Подвал с авторскими правами -->
        <div class="mt-12 pt-6 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm mb-4 md:mb-0">
                © 2025 ReМайн. Все права защищены.
            </p>
            <div class="flex space-x-6">
                <a href="{{ route('politika') }}" class="text-gray-400 hover:text-cyan-400 text-sm transition duration-300">Политика конфиденциальности</a>
                <a href="{{ route('yslovya') }}" class="text-gray-400 hover:text-cyan-400 text-sm transition duration-300">Условия использования</a>
                <a href="{{ route('prava') }}" class="text-gray-400 hover:text-cyan-400 text-sm transition duration-300">Правовая информация</a>
            </div>
        </div>
    </div>

    <!-- Декоративные элементы -->
    <div class="absolute -bottom-20 -right-20 w-64 h-64 rounded-full bg-gradient-to-r from-cyan-500/10 to-purple-500/10 blur-xl"></div>
    <div class="absolute -bottom-40 left-10 w-48 h-48 rounded-full bg-gradient-to-r from-purple-500/10 to-blue-500/10 blur-xl"></div>
</footer>

<!-- Кнопка чата с поддержкой -->
<div class="fixed bottom-6 right-6 z-50">
    <button id="chatButton" class="flex items-center justify-center p-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-full shadow-lg hover:from-cyan-600 hover:to-blue-700 transition duration-300 transform hover:scale-110 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <span class="absolute opacity-0 group-hover:opacity-100 bg-gray-900 text-white text-xs px-2 py-1 rounded-md -top-8 left-1/2 transform -translate-x-1/2 transition-opacity duration-300">Поддержка</span>
    </button>
</div>

<!-- Модальное окно чата -->
<div id="chatModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50 px-4 py-6">
    <div class="bg-gray-800 p-6 rounded-xl w-full max-w-md shadow-2xl border border-gray-700">
        <div class="flex justify-between items-center mb-4">
            <h4 class="text-xl font-semibold text-cyan-400 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                Чат с поддержкой
            </h4>
            <button id="closeChat" class="text-gray-400 hover:text-cyan-400 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <div id="chatBox" class="h-60 overflow-y-auto mb-4 p-4 rounded-lg bg-gray-900/50 border border-gray-700 space-y-3">
            <div class="flex justify-start">
                <div class="max-w-xs bg-gray-700 rounded-xl p-3 text-sm">
                    Здравствуйте! Чем могу помочь?
                </div>
            </div>
        </div>
        
        <div class="flex space-x-2">
            <input id="chatInput" type="text" class="flex-1 p-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white placeholder-gray-400" placeholder="Напишите сообщение..." />
            <button id="sendMessage" class="px-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:from-cyan-600 hover:to-blue-700 transition duration-300 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    // Переключение чата
    document.getElementById('chatButton').addEventListener('click', function() {
        document.getElementById('chatModal').classList.remove('hidden');
    });

    document.getElementById('closeChat').addEventListener('click', function() {
        document.getElementById('chatModal').classList.add('hidden');
    });

    // Отправка сообщения
    document.getElementById('sendMessage').addEventListener('click', sendMessage);
    document.getElementById('chatInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') sendMessage();
    });

    function sendMessage() {
        const message = document.getElementById('chatInput').value.trim();
        if (message) {
            // Добавление сообщения пользователя
            const userMsg = document.createElement('div');
            userMsg.className = 'flex justify-end';
            userMsg.innerHTML = `
                <div class="max-w-xs bg-gradient-to-r from-cyan-600 to-blue-700 rounded-xl p-3 text-sm">
                    ${message}
                </div>
            `;
            document.getElementById('chatBox').appendChild(userMsg);
            
            // Очистка поля ввода
            document.getElementById('chatInput').value = '';
            
            // Прокрутка вниз
            document.getElementById('chatBox').scrollTop = document.getElementById('chatBox').scrollHeight;
            
            // Имитация ответа (можно заменить на реальный запрос)
            setTimeout(() => {
                const botMsg = document.createElement('div');
                botMsg.className = 'flex justify-start';
                botMsg.innerHTML = `
                    <div class="max-w-xs bg-gray-700 rounded-xl p-3 text-sm">
                        Спасибо за ваше сообщение! Наш оператор ответит вам в ближайшее время.
                    </div>
                `;
                document.getElementById('chatBox').appendChild(botMsg);
                document.getElementById('chatBox').scrollTop = document.getElementById('chatBox').scrollHeight;
            }, 1000);
        }
    }
</script>