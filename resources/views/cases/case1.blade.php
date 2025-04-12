@extends('layouts.app')
@include('header')
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .floating { animation: float 6s ease-in-out infinite; }
        .glow { filter: drop-shadow(0 0 8px rgba(255, 215, 0, 0.6)); }
        .particle { position: absolute; background: gold; border-radius: 50%; pointer-events: none; }
        .roller-item {
            transition: transform 0.1s ease-out;
        }
        .roller-item.highlighted {
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.7);
        }
        .rarity-common { border-color: #b0c3d9; }
        .rarity-uncommon { border-color: #5e98d9; }
        .rarity-rare { border-color: #4b69ff; }
        .rarity-mythical { border-color: #8847ff; }
        .rarity-legendary { border-color: #d32ce6; }
        .rarity-ancient { border-color: #eb4b4b; }
        .rarity-immortal { border-color: #e4ae39; }
        
        /* New animation for case opening */
        @keyframes caseOpen {
            0% { transform: rotate(0) scale(1); }
            50% { transform: rotate(10deg) scale(1.05); }
            100% { transform: rotate(0) scale(1); }
        }
        .case-opening {
            animation: caseOpen 0.5s ease-in-out;
        }
    </style>
</head>
@section('content')
<div class="min-h-screen flex flex-col bg-gray-900 overflow-hidden relative" id="case-container">
    <!-- Decorative elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <!-- Floating elements -->
        <svg class="absolute top-20 left-10 w-16 h-16 text-yellow-400 opacity-30 floating" style="animation-delay: 0.5s;" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        
        <svg class="absolute bottom-1/4 right-20 w-14 h-14 text-purple-400 opacity-20 floating" style="animation-delay: 1s;" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
        </svg>
    </div>

    <div class="flex-grow container mx-auto py-12 px-4 relative z-10">
        <!-- Case Container -->
        <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-xl overflow-hidden border border-gray-700 relative glow">
            <!-- Case Header -->
            <div class="bg-gradient-to-r from-gray-700 to-gray-800 p-6 border-b border-gray-600 relative">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-2xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Premium Steam Games Case
                        </h2>
                        <p class="text-gray-400">Откройте коллекцию лучших игр</p>
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
                <!-- Case Image with Open Button -->
                <div class="flex justify-center mb-8 relative">
                    <div id="case-image" class="relative w-64 h-64 border-2 border-yellow-500 rounded-lg overflow-hidden shadow-lg case-opening">
                        <img src="{{ asset('storage/cases/game_case.png') }}" alt="Steam Games Case" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                            <button id="open-case-btn" class="px-6 py-3 bg-gradient-to-r from-yellow-600 to-yellow-700 text-white font-medium rounded-lg hover:from-yellow-500 hover:to-yellow-600 transition-all transform hover:scale-105 shadow-lg flex items-center glow">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Открыть кейс
                            </button>
                        </div>
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
                            <div id="roller-track" class="h-full flex items-center">
                                <!-- Items will be inserted by React -->
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
                        Возможные игры
                    </h3>
                    <div id="possible-drops" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <!-- Items will be inserted by React -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Drop Modal -->
    <div id="drop-modal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-2xl overflow-hidden w-full max-w-md border border-yellow-500 relative">
            <div id="confetti-container" class="absolute inset-0 overflow-hidden pointer-events-none"></div>
            
            <div class="bg-gray-700 p-4 border-b border-yellow-500 relative z-10">
                <h3 class="text-xl font-semibold text-white flex items-center">
                    <svg class="w-6 h-6 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    Поздравляем!
                </h3>
            </div>
            
            <div class="p-6 relative z-10">
                <div class="flex justify-center mb-6">
                    <div class="border-2 border-yellow-500 rounded-lg p-4 bg-gray-900 glow" id="won-game-container">
                        <!-- Content will be added by React -->
                    </div>
                </div>
                
                <p id="drop-name" class="text-center text-lg font-medium text-yellow-400 mb-2"></p>
                <p id="drop-price" class="text-center text-gray-300 mb-6"></p>
                
                <div class="flex justify-center">
                    <button id="close-modal" class="px-6 py-3 bg-gradient-to-r from-yellow-600 to-yellow-700 text-white font-medium rounded-lg hover:from-yellow-500 hover:to-yellow-600 transition-colors transform hover:scale-105 shadow-lg flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Добавить в библиотеку
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
<script type="text/babel">
    // Game data with Steam games
    const gameData = [
        { 
            id: 1, 
            name: "Cyberpunk 2077", 
            image: "{{ asset('storage/games/cyberpunk.jpg') }}", 
            rarity: "legendary", 
            price: "3,499₽", 
            value: 3499,
            developer: "CD Projekt Red",
            releaseDate: "2020"
        },
        { 
            id: 2, 
            name: "Elden Ring", 
            image: "{{ asset('storage/games/elden_ring.jpg') }}", 
            rarity: "legendary", 
            price: "3,999₽", 
            value: 3999,
            developer: "FromSoftware",
            releaseDate: "2022"
        },
        { 
            id: 3, 
            name: "Red Dead Redemption 2", 
            image: "{{ asset('storage/games/rdr2.jpg') }}", 
            rarity: "ancient", 
            price: "2,999₽", 
            value: 2999,
            developer: "Rockstar Games",
            releaseDate: "2019"
        },
        { 
            id: 4, 
            name: "The Witcher 3", 
            image: "{{ asset('storage/games/witcher.jpg') }}", 
            rarity: "immortal", 
            price: "1,499₽", 
            value: 1499,
            developer: "CD Projekt Red",
            releaseDate: "2015"
        },
        { 
            id: 5, 
            name: "Stardew Valley", 
            image: "{{ asset('storage/games/stardew.jpg') }}", 
            rarity: "rare", 
            price: "499₽", 
            value: 499,
            developer: "ConcernedApe",
            releaseDate: "2016"
        },
        { 
            id: 6, 
            name: "Hades", 
            image: "{{ asset('storage/games/hades.jpg') }}", 
            rarity: "mythical", 
            price: "999₽", 
            value: 999,
            developer: "Supergiant Games",
            releaseDate: "2020"
        },
        { 
            id: 7, 
            name: "Baldur's Gate 3", 
            image: "{{ asset('storage/games/baldurs_gate.jpg') }}", 
            rarity: "ancient", 
            price: "3,299₽", 
            value: 3299,
            developer: "Larian Studios",
            releaseDate: "2023"
        },
        { 
            id: 8, 
            name: "Hollow Knight", 
            image: "{{ asset('storage/games/hollow_knight.jpg') }}", 
            rarity: "uncommon", 
            price: "599₽", 
            value: 599,
            developer: "Team Cherry",
            releaseDate: "2017"
        }
    ];

    // Configuration
    const config = {
        casePrice: 2999,
        apiEndpoints: {
            checkBalance: '/api/check-balance',
            purchaseCase: '/api/purchase-case',
            openCase: '/api/open-case'
        },
        rarityColors: {
            common: "rarity-common",
            uncommon: "rarity-uncommon",
            rare: "rarity-rare",
            mythical: "rarity-mythical",
            legendary: "rarity-legendary",
            ancient: "rarity-ancient",
            immortal: "rarity-immortal"
        }
    };

    // CaseOpening Component
    function CaseOpening() {
        const [isRolling, setIsRolling] = React.useState(false);
        const [wonGame, setWonGame] = React.useState(null);
        const [balance, setBalance] = React.useState(0);
        const [error, setError] = React.useState(null);
        const rollerRef = React.useRef(null);
        const trackRef = React.useRef(null);
        const caseImageRef = React.useRef(null);
        
        // Initialize component
        React.useEffect(() => {
            // Load user balance (mock)
            setBalance(10000);
        }, []);
        
        // Render possible drops
        const renderPossibleDrops = () => {
            return gameData.map(game => (
                <div key={`possible-${game.id}`} 
                     className={`bg-gray-700 rounded-lg p-3 border ${config.rarityColors[game.rarity]} hover:bg-gray-600 transition-all transform hover:-translate-y-1 shadow-md`}>
                    <div className="h-32 flex items-center justify-center mb-2">
                        <img src={game.image} alt={game.name} className="max-h-full max-w-full object-contain" loading="lazy" />
                    </div>
                    <div className="text-center">
                        <p className="text-sm font-medium text-white truncate">{game.name}</p>
                        <p className="text-gray-400 text-xs mt-1">{game.price}</p>
                        <div className="mt-2 h-1 w-full bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-full"></div>
                    </div>
                </div>
            ));
        };
        
        // Render roller items
        const renderRollerItems = (sequenceLength = 50) => {
            const items = [];
            const dropPosition = Math.floor(sequenceLength / 2);
            
            for (let i = 0; i < sequenceLength; i++) {
                let game;
                if (i === dropPosition && wonGame) {
                    game = wonGame;
                } else {
                    game = gameData[Math.floor(Math.random() * gameData.length)];
                }
                
                items.push(
                    <div key={`roller-${i}`} 
                         className={`flex-shrink-0 w-32 h-full flex items-center justify-center p-2 roller-item ${i === dropPosition ? 'highlighted' : ''}`}>
                        <div className={`w-full h-full flex items-center justify-center bg-gray-900 rounded border ${config.rarityColors[game.rarity]} shadow-md`}>
                            <img src={game.image} alt={game.name} className="max-h-full max-w-full object-contain p-1" loading="lazy" />
                        </div>
                    </div>
                );
            }
            
            return items;
        };
        
        // Render won game
        const renderWonGame = () => {
            if (!wonGame) return null;
            
            return (
                <div className="flex flex-col items-center">
                    <div className="w-48 h-36 mb-4 flex items-center justify-center">
                        <img src={wonGame.image} alt={wonGame.name} className="max-h-full max-w-full object-contain" />
                    </div>
                    <div className="text-center">
                        <p className="text-yellow-400 font-bold">{wonGame.name}</p>
                        <p className="text-gray-300 text-sm">{wonGame.developer}</p>
                        <p className="text-gray-300 text-sm">Релиз: {wonGame.releaseDate}</p>
                    </div>
                </div>
            );
        };
        
        // Open case function
        const openCase = async () => {
            if (isRolling) return;
            
            try {
                setIsRolling(true);
                
                // Add opening animation to case
                const caseImage = document.getElementById('case-image');
                caseImage.classList.add('case-opening');
                
                // Check balance
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
                
                // Purchase case
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
                
                // Open case and get result
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
                const wonGame = gameData.find(game => game.id === openData.game.id);
                setWonGame(wonGame);
                
                // Start roll animation
                startRollAnimation();
                
            } catch (err) {
                console.error('Error:', err);
                setError(err.message || 'Произошла ошибка при открытии кейса');
                setIsRolling(false);
                const caseImage = document.getElementById('case-image');
                caseImage.classList.remove('case-opening');
            }
        };
        
        // Start roll animation
        const startRollAnimation = () => {
            const itemWidth = 128; // px
            const rollerWidth = rollerRef.current.offsetWidth;
            const sequenceLength = 50;
            const dropPosition = Math.floor(sequenceLength / 2);
            
            // Target position (center of the won item)
            const targetPosition = (dropPosition * itemWidth) - (rollerWidth / 2) + (itemWidth / 2);
            
            // Random overspin (extra rotations)
            const overspin = Math.floor(Math.random() * 5 + 3) * sequenceLength * itemWidth;
            const totalDistance = targetPosition + overspin;
            
            // Reset position
            trackRef.current.style.transition = 'none';
            trackRef.current.style.transform = 'translateX(0)';
            void trackRef.current.offsetWidth; // Force reflow
            
            // Start animation
            trackRef.current.style.transition = 'transform 4s cubic-bezier(0.2, 0.8, 0.4, 1)';
            trackRef.current.style.transform = `translateX(-${totalDistance}px)`;
            
            // Show modal after animation
            setTimeout(() => {
                showModal();
                setIsRolling(false);
                const caseImage = document.getElementById('case-image');
                caseImage.classList.remove('case-opening');
            }, 4000);
        };
        
        // Show modal with confetti
        const showModal = () => {
            const modal = document.getElementById('drop-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Set game info
            document.getElementById('drop-name').textContent = wonGame.name;
            document.getElementById('drop-price').textContent = `Стоимость: ${wonGame.price}`;
            document.getElementById('won-game-container').innerHTML = '';
            ReactDOM.render(renderWonGame(), document.getElementById('won-game-container'));
            
            // Create confetti
            createConfetti();
        };
        
        // Create confetti effect
        const createConfetti = () => {
            const container = document.getElementById('confetti-container');
            container.innerHTML = '';
            const colors = ['#FFD700', '#FFA500', '#FF6347', '#87CEEB', '#9370DB'];
            
            for (let i = 0; i < 100; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                // Random parameters
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
                
                // Add animation styles
                const style = document.createElement('style');
                style.textContent = `
                    @keyframes fall {
                        to { transform: translateY(110vh) rotate(${Math.random() * 360}deg); }
                    }
                `;
                document.head.appendChild(style);
                
                container.appendChild(particle);
            }
        };
        
        // Close modal
        const closeModal = () => {
            const modal = document.getElementById('drop-modal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        };
        
        // Close error modal
        const closeErrorModal = () => {
            const modal = document.getElementById('error-modal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            setError(null);
        };
        
        // Set up event listeners
        React.useEffect(() => {
            const buyBtn = document.getElementById('open-case-btn');
            const closeModalBtn = document.getElementById('close-modal');
            const closeErrorBtn = document.getElementById('close-error-modal');
            
            if (buyBtn) buyBtn.addEventListener('click', openCase);
            if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
            if (closeErrorBtn) closeErrorBtn.addEventListener('click', closeErrorModal);
            
            return () => {
                if (buyBtn) buyBtn.removeEventListener('click', openCase);
                if (closeModalBtn) closeModalBtn.removeEventListener('click', closeModal);
                if (closeErrorBtn) closeErrorBtn.removeEventListener('click', closeErrorModal);
            };
        }, []);
        
        // Show error modal if error exists
        React.useEffect(() => {
            if (error) {
                document.getElementById('error-message').textContent = error;
                const modal = document.getElementById('error-modal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        }, [error]);
        
        return (
            <>
                <div id="possible-drops" className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    {renderPossibleDrops()}
                </div>
                
                <div id="roller-track" className="h-full flex items-center" ref={trackRef}>
                    {renderRollerItems()}
                </div>
            </>
        );
    }

    // Initialize roller track
    const rollerTrack = document.getElementById('roller-track');
    if (rollerTrack) {
        ReactDOM.render(
            <CaseOpening />,
            rollerTrack.parentElement
        );
    }

    // Initialize possible drops
    const possibleDrops = document.getElementById('possible-drops');
    if (possibleDrops) {
        ReactDOM.render(
            <CaseOpening />,
            possibleDrops
        );
    }
</script>
@endpush