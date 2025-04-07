@extends('layouts.app')
@include('header')
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
</head>
@section('content')
<div class="min-h-screen flex flex-col bg-gray-900">
  <div class="flex-grow container mx-auto py-12 px-4">
    <!-- Case Container -->
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-xl overflow-hidden border border-gray-700">
      <!-- Case Header -->
      <div class="bg-gray-700 p-6 border-b border-gray-600">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <div class="mb-4 md:mb-0">
            <h2 class="text-2xl font-bold text-white flex items-center">
              <svg class="w-6 h-6 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
              </svg>
              Super Game Case
            </h2>
            <p class="text-gray-400">Кейс №1</p>
          </div>
          <div class="flex items-center bg-gray-900 px-4 py-2 rounded-lg border border-gray-600">
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
        <div class="flex justify-center mb-8">
          <div class="relative w-64 h-64 border-2 border-gray-600 rounded-lg overflow-hidden shadow-lg">
            <img src="{{ asset('storage/cases/case1.jpg') }}" alt="Super Game Case" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
              <button id="buy-btn" class="px-6 py-3 bg-gradient-to-r from-yellow-600 to-yellow-700 text-white font-medium rounded-lg hover:from-yellow-500 hover:to-yellow-600 transition-colors shadow flex items-center">
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
            <div id="case-roller" class="relative h-40 rounded-lg bg-gray-900 border border-gray-700 overflow-hidden">
              <div id="roller-track" class="h-full flex items-center transition-transform duration-[4000ms] ease-out">
                <!-- Items will be inserted by JS -->
              </div>
              
              <!-- Center indicator -->
              <div class="absolute inset-y-0 left-1/2 w-1 bg-yellow-400 transform -translate-x-1/2 z-10"></div>
              <div class="absolute inset-y-0 left-1/2 w-32 bg-gradient-to-r from-transparent via-yellow-400/10 to-transparent transform -translate-x-1/2 z-5 pointer-events-none"></div>
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
        <div class="bg-gray-700/50 rounded-lg p-6 border border-gray-600">
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
    <div class="bg-gray-800 rounded-xl shadow-2xl overflow-hidden w-full max-w-md border border-gray-700">
      <div class="bg-gray-700 p-4 border-b border-gray-600">
        <h3 class="text-xl font-semibold text-white flex items-center">
          <svg class="w-6 h-6 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
          </svg>
          Вы выиграли!
        </h3>
      </div>
      
      <div class="p-6">
        <div class="flex justify-center mb-6">
          <div class="border border-gray-700 rounded-lg p-4 bg-gray-900">
            <img id="drop-image" src="" alt="Выигранный предмет" class="w-48 h-36 object-contain">
          </div>
        </div>
        
        <p id="drop-name" class="text-center text-lg font-medium text-yellow-400 mb-6"></p>
        
        <div class="flex justify-center">
          <button id="close-modal" class="px-6 py-3 bg-gradient-to-r from-yellow-600 to-yellow-700 text-white font-medium rounded-lg hover:from-yellow-500 hover:to-yellow-600 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Забрать предмет
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6 mt-auto border-t border-gray-700">
    @include('footer')
  </footer>
</div>
@endsection

@push('scripts')
<script>
  const skins = [
    { name: "AK-47 | Redline", image: "/storage/skins/ak_redline.png", rarity: "rare", price: "1,500₽" },
    { name: "AWP | Asiimov", image: "/storage/skins/awp_asiimov.png", rarity: "epic", price: "3,200₽" },
    { name: "M4A4 | Howl", image: "/storage/skins/m4a4_howl.png", rarity: "legendary", price: "5,800₽" },
    { name: "USP-S | Kill Confirmed", image: "/storage/skins/usp_kill.png", rarity: "rare", price: "1,200₽" },
    { name: "Desert Eagle | Blaze", image: "/storage/skins/deagle_blaze.png", rarity: "epic", price: "2,700₽" },
    { name: "Glock-18 | Fade", image: "/storage/skins/glock_fade.png", rarity: "rare", price: "900₽" },
    { name: "AK-47 | Gold Arabesque", image: "/storage/skins/ak_gold.png", rarity: "legendary", price: "7,500₽" },
  ];

  const rarityColors = {
    rare: "border-blue-500",
    epic: "border-purple-500",
    legendary: "border-yellow-500"
  };

  let isRolling = false;
  let droppedSkin = null;

  // Initialize possible drops
  function initPossibleDrops() {
    const container = document.getElementById('possible-drops');
    container.innerHTML = '';
    
    skins.forEach(skin => {
      const skinElement = document.createElement('div');
      skinElement.className = `bg-gray-700 rounded-lg p-3 border ${rarityColors[skin.rarity]} hover:bg-gray-600 transition-colors`;
      skinElement.innerHTML = `
        <div class="h-32 flex items-center justify-center mb-2">
          <img src="${skin.image}" alt="${skin.name}" class="max-h-full max-w-full object-contain">
        </div>
        <div class="text-center">
          <p class="text-sm font-medium text-white truncate">${skin.name}</p>
          <p class="text-gray-400 text-xs">${skin.price}</p>
        </div>
      `;
      container.appendChild(skinElement);
    });
  }

  // Render roller items
  function renderRollerItems() {
    const track = document.getElementById('roller-track');
    track.innerHTML = '';
    
    // Create a long sequence with the dropped item in the middle
    const sequenceLength = 50;
    const dropPosition = Math.floor(sequenceLength / 2);
    
    for (let i = 0; i < sequenceLength; i++) {
      let skin;
      if (i === dropPosition) {
        // This will be our dropped skin
        skin = skins[Math.floor(Math.random() * skins.length)];
        droppedSkin = skin;
      } else {
        // Random skin from the pool
        skin = skins[Math.floor(Math.random() * skins.length)];
      }
      
      const item = document.createElement('div');
      item.className = `flex-shrink-0 w-32 h-full flex items-center justify-center p-2`;
      item.innerHTML = `
        <div class="w-full h-full flex items-center justify-center bg-gray-900 rounded border ${rarityColors[skin.rarity]}">
          <img src="${skin.image}" alt="${skin.name}" class="max-h-full max-w-full object-contain p-1">
        </div>
      `;
      track.appendChild(item);
    }
    
    // Set the width of the track to accommodate all items
    track.style.width = `${sequenceLength * 8}rem`; // 8rem per item (128px)
  }

  // Roll the case
  function rollCase() {
    if (isRolling) return;
    isRolling = true;
    
    renderRollerItems();
    const track = document.getElementById('roller-track');
    const roller = document.getElementById('case-roller');
    
    // Calculate positions
    const itemWidth = 128; // px
    const rollerWidth = roller.offsetWidth;
    const sequenceLength = track.children.length;
    const dropPosition = Math.floor(sequenceLength / 2);
    
    // Calculate the position where the dropped item will be centered
    const targetPosition = (dropPosition * itemWidth) - (rollerWidth / 2) + (itemWidth / 2);
    
    // Add some random overspin (3-7 full spins)
    const overspin = Math.floor(Math.random() * 5 + 3) * sequenceLength * itemWidth;
    const totalDistance = targetPosition + overspin;
    
    // Reset position
    track.style.transition = 'none';
    track.style.transform = 'translateX(0)';
    void track.offsetWidth; // Trigger reflow
    
    // Start rolling animation
    track.style.transition = 'transform 4s cubic-bezier(0.2, 0.8, 0.4, 1)';
    track.style.transform = `translateX(-${totalDistance}px)`;
    
    // Show modal after animation completes
    setTimeout(() => {
      showModal(droppedSkin);
      isRolling = false;
    }, 4000);
  }

  // Show modal with dropped item
  function showModal(skin) {
    const modal = document.getElementById('drop-modal');
    const image = document.getElementById('drop-image');
    const name = document.getElementById('drop-name');
    
    image.src = skin.image;
    name.textContent = skin.name;
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  // Close modal
  function closeModal() {
    const modal = document.getElementById('drop-modal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
  }

  // Initialize
  document.addEventListener('DOMContentLoaded', () => {
    initPossibleDrops();
    renderRollerItems();
    
    document.getElementById('buy-btn').addEventListener('click', rollCase);
    document.getElementById('close-modal').addEventListener('click', closeModal);
  });
</script>
@endpush