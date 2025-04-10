@extends('layouts.app')
@include('header')
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .floating { animation: float 6s ease-in-out infinite; }
        .glow { filter: drop-shadow(0 0 8px rgba(255, 215, 0, 0.6)); }
        .particle { position: absolute; background: gold; border-radius: 50%; pointer-events: none; }
    </style>
</head>
@section('content')
<div class="min-h-screen flex flex-col bg-gray-900 overflow-hidden relative">
    <!-- Decorative elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <!-- Floating coins -->
        <svg class="absolute top-20 left-10 w-16 h-16 text-yellow-400 opacity-30 floating" style="animation-delay: 0.5s;" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        
        <!-- Floating diamonds -->
        <svg class="absolute bottom-1/4 right-20 w-14 h-14 text-purple-400 opacity-20 floating" style="animation-delay: 1s;" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
        </svg>
        
        <!-- Corner decorations -->
        <svg class="absolute top-0 left-0 w-32 h-32 text-blue-500 opacity-10" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,0 L100,0 L100,20 C60,20 60,60 20,60 L20,100 L0,100 Z" fill="currentColor"/>
        </svg>
        <svg class="absolute bottom-0 right-0 w-32 h-32 text-red-500 opacity-10 transform rotate-180" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,0 L100,0 L100,20 C60,20 60,60 20,60 L20,100 L0,100 Z" fill="currentColor"/>
        </svg>
    </div>

    <div class="flex-grow container mx-auto py-12 px-4 relative z-10">
        <!-- Case Container -->
        <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-xl overflow-hidden border border-gray-700 relative glow">
            <!-- Glowing border effect -->
            <div class="absolute inset-0 rounded-lg border-2 border-transparent pointer-events-none animate-pulse" style="box-shadow: 0 0 15px rgba(255, 215, 0, 0.4);"></div>
            
            <!-- Case Header -->
            <div class="bg-gradient-to-r from-gray-700 to-gray-800 p-6 border-b border-gray-600 relative">
                <div class="absolute inset-0 bg-opacity-20 bg-yellow-400 rounded-t-lg pointer-events-none"></div>
                <div class="flex flex-col md:flex-row justify-between items-center relative">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-2xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Super Game Case
                        </h2>
                        <p class="text-gray-400">Кейс №1</p>
                    </div>
                    <div class="flex items-center bg-gray-900 px-4 py-2 rounded-lg border border-yellow-500 shadow-lg">
                        <svg class="w-5 h-5 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-semibold text-white">2,999₽</span>
                    </div>
                </div>
            </div>

            <!-- Case Content -->
            <div class="p-6">
                <!-- Case Image -->
                <div class="flex justify-center mb-8 relative">
                    <div class="relative w-64 h-64 border-2 border-yellow-500 rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/cases/case1.jpg') }}" alt="Super Game Case" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                            <button id="buy-btn" class="px-6 py-3 bg-gradient-to-r from-yellow-600 to-yellow-700 text-white font-medium rounded-lg hover:from-yellow-500 hover:to-yellow-600 transition-all transform hover:scale-105 shadow-lg flex items-center glow">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Открыть кейс
                            </button>
                        </div>
                    </div>
                    <!-- Decorative sparks -->
                    <div class="absolute -top-4 -left-4 w-8 h-8 text-yellow-400 opacity-70">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-8 h-8 text-yellow-400 opacity-70">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <!-- Roller Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Открытие кейса
                    </h3>
                    
                    <div class="relative">
                        <!-- Roller Track -->
                        <div id="case-roller" class="relative h-40 rounded-lg bg-gray-900 border-2 border-gray-600 overflow-hidden">
                            <div id="roller-track" class="h-full flex items-center transition-transform duration-[4000ms] ease-out">
                                <!-- Items will be inserted by JS -->
                            </div>
                            
                            <!-- Center indicator -->
                            <div class="absolute inset-y-0 left-1/2 w-2 bg-yellow-400 transform -translate-x-1/2 z-10 shadow-lg"></div>
                            <div class="absolute inset-y-0 left-1/2 w-40 bg-gradient-to-r from-transparent via-yellow-400/20 to-transparent transform -translate-x-1/2 z-5 pointer-events-none"></div>
                        </div>
                    </div>
                </div>

                <!-- Possible Drops Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        Возможные предметы
                    </h3>
                    <div id="possible-drops" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <!-- Items will be inserted by JS -->
                    </div>
                </div>

                <!-- Case Description -->
                <div class="bg-gradient-to-br from-gray-700/50 to-gray-800/50 rounded-lg p-6 border border-gray-600 backdrop-blur-sm">
                    <h3 class="text-xl font-semibold text-white mb-3 flex items-center">
                        <svg class="w-5 h-5 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Описание кейса
                    </h3>
                    <div class="space-y-4 text-gray-300">
                        <p>Эксклюзивный кейс с лимитированными внутриигровыми предметами и уникальными бонусами.</p>
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-yellow-400 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p>Лимитированная серия с эксклюзивным контентом</p>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-yellow-400 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            <p>Гарантированный предмет стоимостью не менее 1,000₽</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Drop Modal -->
    <div id="drop-modal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-2xl overflow-hidden w-full max-w-md border border-yellow-500 relative">
            <!-- Confetti effect container -->
            <div id="confetti-container" class="absolute inset-0 overflow-hidden pointer-events-none"></div>
            
            <div class="bg-gray-700 p-4 border-b border-yellow-500 relative z-10">
                <h3 class="text-xl font-semibold text-white flex items-center">
                    <svg class="w-6 h-6 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    Вы выиграли!
                </h3>
            </div>
            
            <div class="p-6 relative z-10">
                <div class="flex justify-center mb-6">
                    <div class="border-2 border-yellow-500 rounded-lg p-4 bg-gray-900 glow">
                        <img id="drop-image" src="" alt="Выигранный предмет" class="w-48 h-36 object-contain">
                    </div>
                </div>
                
                <p id="drop-name" class="text-center text-lg font-medium text-yellow-400 mb-2"></p>
                <p id="drop-price" class="text-center text-gray-300 mb-6"></p>
                
                <div class="flex justify-center">
                    <button id="close-modal" class="px-6 py-3 bg-gradient-to-r from-yellow-600 to-yellow-700 text-white font-medium rounded-lg hover:from-yellow-500 hover:to-yellow-600 transition-colors transform hover:scale-105 shadow-lg flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Забрать предмет
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="error-modal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
        <div class="bg-gray-800 rounded-xl shadow-2xl overflow-hidden w-full max-w-md border border-red-500">
            <div class="bg-red-700 p-4 border-b border-red-600">
                <h3 class="text-xl font-semibold text-white flex items-center">
                    <svg class="w-6 h-6 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Ошибка
                </h3>
            </div>
            
            <div class="p-6">
                <p id="error-message" class="text-center text-white mb-6"></p>
                
                <div class="flex justify-center">
                    <button id="close-error-modal" class="px-6 py-3 bg-gray-700 text-white font-medium rounded-lg hover:bg-gray-600 transition-colors flex items-center">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-auto border-t border-gray-700 relative z-10">
        @include('footer')
    </footer>
</div>
@endsection

@push('scripts')
<script>
    // Конфигурация
    const config = {
        casePrice: 2999,
        apiEndpoints: {
            checkBalance: '/api/check-balance',
            purchaseCase: '/api/purchase-case',
            openCase: '/api/open-case'
        },
        rarityColors: {
            rare: "border-blue-500",
            epic: "border-purple-500",
            legendary: "border-yellow-500"
        },
        skins: [
            { id: 1, name: "AK-47 | Redline", image: "{{ asset('storage/skins/ak_redline.png') }}", rarity: "rare", price: "1,500₽", value: 1500 },
            { id: 2, name: "AWP | Asiimov", image: "{{ asset('storage/skins/awp_asiimov.png') }}", rarity: "epic", price: "3,200₽", value: 3200 },
            { id: 3, name: "M4A4 | Howl", image: "{{ asset('storage/skins/m4a4_howl.png') }}", rarity: "legendary", price: "5,800₽", value: 5800 },
            { id: 4, name: "USP-S | Kill Confirmed", image: "{{ asset('storage/skins/usp_kill.png') }}", rarity: "rare", price: "1,200₽", value: 1200 },
            { id: 5, name: "Desert Eagle | Blaze", image: "{{ asset('storage/skins/deagle_blaze.png') }}", rarity: "epic", price: "2,700₽", value: 2700 },
            { id: 6, name: "Glock-18 | Fade", image: "{{ asset('storage/skins/glock_fade.png') }}", rarity: "rare", price: "900₽", value: 900 },
            { id: 7, name: "AK-47 | Gold Arabesque", image: "{{ asset('storage/skins/ak_gold.png') }}", rarity: "legendary", price: "7,500₽", value: 7500 },
        ]
    };

    // Состояние приложения
    const state = {
        isRolling: false,
        droppedSkin: null
    };

    // DOM элементы
    const elements = {
        buyBtn: document.getElementById('buy-btn'),
        rollerTrack: document.getElementById('roller-track'),
        caseRoller: document.getElementById('case-roller'),
        possibleDrops: document.getElementById('possible-drops'),
        dropModal: document.getElementById('drop-modal'),
        dropImage: document.getElementById('drop-image'),
        dropName: document.getElementById('drop-name'),
        dropPrice: document.getElementById('drop-price'),
        errorModal: document.getElementById('error-modal'),
        errorMessage: document.getElementById('error-message'),
        confettiContainer: document.getElementById('confetti-container')
    };

    // Инициализация страницы
    function initPage() {
        preloadImages();
        initPossibleDrops();
        setupEventListeners();
    }

    // Предзагрузка изображений
    function preloadImages() {
        config.skins.forEach(skin => {
            const img = new Image();
            img.src = skin.image;
        });
    }

    // Инициализация возможных дропов
    function initPossibleDrops() {
        elements.possibleDrops.innerHTML = '';
        
        config.skins.forEach(skin => {
            const skinElement = document.createElement('div');
            skinElement.className = `bg-gray-700 rounded-lg p-3 border ${config.rarityColors[skin.rarity]} hover:bg-gray-600 transition-all transform hover:-translate-y-1 shadow-md`;
            skinElement.innerHTML = `
                <div class="h-32 flex items-center justify-center mb-2">
                    <img src="${skin.image}" alt="${skin.name}" class="max-h-full max-w-full object-contain" loading="lazy">
                </div>
                <div class="text-center">
                    <p class="text-sm font-medium text-white truncate">${skin.name}</p>
                    <p class="text-gray-400 text-xs mt-1">${skin.price}</p>
                    <div class="mt-2 h-1 w-full bg-gradient-to-r ${getRarityGradient(skin.rarity)} rounded-full"></div>
                </div>
            `;
            elements.possibleDrops.appendChild(skinElement);
        });
    }

    // Получение градиента для редкости
    function getRarityGradient(rarity) {
        switch(rarity) {
            case 'rare': return 'from-blue-400 to-blue-600';
            case 'epic': return 'from-purple-400 to-purple-600';
            case 'legendary': return 'from-yellow-400 to-yellow-600';
            default: return 'from-gray-400 to-gray-600';
        }
    }

    // Настройка обработчиков событий
    function setupEventListeners() {
        elements.buyBtn.addEventListener('click', rollCase);
        document.getElementById('close-modal').addEventListener('click', closeModal);
        document.getElementById('close-error-modal').addEventListener('click', closeErrorModal);
    }

    // Открытие кейса
    async function rollCase() {
        if (state.isRolling) return;
        
        try {
            state.isRolling = true;
            elements.buyBtn.disabled = true;
            
            // Проверка баланса
            const checkResponse = await fetch(config.apiEndpoints.checkBalance, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ amount: config.casePrice })
            });
            
            if (!checkResponse.ok) {
                const errorData = await checkResponse.json();
                throw new Error(errorData.message || 'Недостаточно средств на балансе');
            }
            
            // Покупка кейса
            const purchaseResponse = await fetch(config.apiEndpoints.purchaseCase, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ price: config.casePrice })
            });
            
            if (!purchaseResponse.ok) {
                const errorData = await purchaseResponse.json();
                throw new Error(errorData.message || 'Ошибка при покупке кейса');
            }
            
            // Получение выпавшего предмета
            const openResponse = await fetch(config.apiEndpoints.openCase, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            });
            
            if (!openResponse.ok) {
                const errorData = await openResponse.json();
                throw new Error(errorData.message || 'Ошибка при открытии кейса');
            }
            
            const openData = await openResponse.json();
            state.droppedSkin = config.skins.find(skin => skin.id === openData.skin.id);
            
            // Запуск анимации
            startRollAnimation();
            
        } catch (error) {
            console.error('Error:', error);
            showError(error.message || 'Произошла ошибка при открытии кейса');
            state.isRolling = false;
            elements.buyBtn.disabled = false;
        }
    }

    // Анимация прокрутки
    function startRollAnimation() {
        renderRollerItems();
        
        const itemWidth = 128; // px
        const rollerWidth = elements.caseRoller.offsetWidth;
        const sequenceLength = elements.rollerTrack.children.length;
        const dropPosition = Math.floor(sequenceLength / 2);
        
        // Позиция для остановки
        const targetPosition = (dropPosition * itemWidth) - (rollerWidth / 2) + (itemWidth / 2);
        
        // Случайное количество дополнительных прокруток
        const overspin = Math.floor(Math.random() * 5 + 3) * sequenceLength * itemWidth;
        const totalDistance = targetPosition + overspin;
        
        // Сброс позиции
        elements.rollerTrack.style.transition = 'none';
        elements.rollerTrack.style.transform = 'translateX(0)';
        void elements.rollerTrack.offsetWidth;
        
        // Запуск анимации
        elements.rollerTrack.style.transition = 'transform 4s cubic-bezier(0.2, 0.8, 0.4, 1)';
        elements.rollerTrack.style.transform = `translateX(-${totalDistance}px)`;
        
        // Показ модального окна после анимации
        setTimeout(() => {
            showDropModal();
            state.isRolling = false;
            elements.buyBtn.disabled = false;
        }, 4000);
    }

    // Рендер предметов в роллере
    function renderRollerItems() {
        elements.rollerTrack.innerHTML = '';
        const sequenceLength = 50;
        const dropPosition = Math.floor(sequenceLength / 2);
        
        for (let i = 0; i < sequenceLength; i++) {
            let skin;
            if (i === dropPosition) {
                skin = state.droppedSkin;
            } else {
                skin = config.skins[Math.floor(Math.random() * config.skins.length)];
            }
            
            const item = document.createElement('div');
            item.className = `flex-shrink-0 w-32 h-full flex items-center justify-center p-2`;
            item.innerHTML = `
                <div class="w-full h-full flex items-center justify-center bg-gray-900 rounded border ${config.rarityColors[skin.rarity]} shadow-md">
                    <img src="${skin.image}" alt="${skin.name}" class="max-h-full max-w-full object-contain p-1" loading="lazy">
                </div>
            `;
            elements.rollerTrack.appendChild(item);
        }
        
        elements.rollerTrack.style.width = `${sequenceLength * 8}rem`;
    }

    // Показать модальное окно с выигрышем
    function showDropModal() {
        elements.dropImage.src = state.droppedSkin.image;
        elements.dropName.textContent = state.droppedSkin.name;
        elements.dropPrice.textContent = `Стоимость: ${state.droppedSkin.price}`;
        
        elements.dropModal.classList.remove('hidden');
        elements.dropModal.classList.add('flex');
        
        // Запуск эффекта конфетти
        createConfetti();
    }

    // Создать эффект конфетти
    function createConfetti() {
        elements.confettiContainer.innerHTML = '';
        const colors = ['#FFD700', '#FFA500', '#FF6347', '#87CEEB', '#9370DB'];
        
        for (let i = 0; i < 100; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            // Случайные параметры
            const size = Math.random() * 8 + 4;
            const color = colors[Math.floor(Math.random() * colors.length)];
            const posX = Math.random() * 100;
            const delay = Math.random() * 3;
            const duration = Math.random() * 3 + 2;
            
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.backgroundColor = color;
            particle.style.left = `${posX}%`;
            particle.style.top = '-10px';
            particle.style.animation = `fall ${duration}s ease-in ${delay}s forwards`;
            
            // Добавление стилей для анимации падения
            const style = document.createElement('style');
            style.textContent = `
                @keyframes fall {
                    to { transform: translateY(110vh) rotate(${Math.random() * 360}deg); }
                }
            `;
            document.head.appendChild(style);
            
            elements.confettiContainer.appendChild(particle);
        }
    }

    // Показать ошибку
    function showError(message) {
        elements.errorMessage.textContent = message;
        elements.errorModal.classList.remove('hidden');
        elements.errorModal.classList.add('flex');
    }

    // Закрыть модальное окно
    function closeModal() {
        elements.dropModal.classList.remove('flex');
        elements.dropModal.classList.add('hidden');
    }

    // Закрыть окно ошибки
    function closeErrorModal() {
        elements.errorModal.classList.remove('flex');
        elements.errorModal.classList.add('hidden');
    }

    // Инициализация при загрузке страницы
    document.addEventListener('DOMContentLoaded', initPage);
</script>
@endpush