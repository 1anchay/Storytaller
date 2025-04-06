<header class="bg-gray-900 text-white">
  <head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
  </head>
  @include('header') 

<!-- Секция кейсов -->
<section class="bg-white py-16">

  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-4xl text-yellow-400 font-bold mb-12 text-center tracking-wide">Кейсы аккаунтов Steam</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">

      <!-- Кейс 1 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=CS:GO+Prime" alt="CS:GO Prime" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">CS:GO Prime аккаунт</h3>
        <p class="text-gray-300 text-sm mb-2">Прайм-статус, инвентарь на 1200₽, звание: Legendary Eagle.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 890₽</p>
        <a href="{{ route('case1') }}" class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс </a>
      </div>

      <!-- Кейс 2 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=Dota+2+Immortal" alt="Dota 2 Immortal" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">Dota 2 — Immortal аккаунт</h3>
        <p class="text-gray-300 text-sm mb-2">Более 2000 игр, редкие скины, рейтинг Divine.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 1 500₽</p>
        <a href="{{ route('case2') }}" class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс </a>
      </div>

      <!-- Кейс 3 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=Rust+Survivor" alt="Rust Survivor" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">Rust — выживший</h3>
        <p class="text-gray-300 text-sm mb-2">Rust, DayZ, ARK. Более 500 часов. Готов к рейдам!</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 1 290₽</p>
        <a href="{{ route('case.view', ['caseId' => 3]) }}" class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</a>
      </div>

      <!-- Кейс 4 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=Indie+Bundle" alt="Indie Bundle" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">Инди-бандл</h3>
        <p class="text-gray-300 text-sm mb-2">20+ инди-игр: Hollow Knight, Celeste, Stardew Valley и др.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 490₽</p>
        <a href="{{ route('case.view', ['caseId' => 4]) }}" class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</a>
      </div>

      <!-- Кейс 5 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=GTA+V+Online" alt="GTA V" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">GTA V + Online</h3>
        <p class="text-gray-300 text-sm mb-2">Полная версия GTA V, бонусы в GTA Online. Банов нет.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 750₽</p>
        <a href="{{ route('case.view', ['caseId' => 5]) }}" class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</a>
      </div>

      <!-- Кейс 6 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=PUBG+Full" alt="PUBG" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">PUBG — Полная прокачка</h3>
        <p class="text-gray-300 text-sm mb-2">Полный пропуск, скины, статистика K/D 2.3, 800+ часов.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 980₽</p>
        <a href="{{ route('case.view', ['caseId' => 6]) }}" class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</a>
      </div>

      <!-- Кейс 7 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=Horror+Pack" alt="Horror Pack" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">Хоррор-бандл</h3>
        <p class="text-gray-300 text-sm mb-2">Dead by Daylight, Phasmophobia, Resident Evil 7, Outlast.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 590₽</p>
        <a href="{{ route('case.view', ['caseId' => 7]) }}" class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</a>
      </div>

    <!-- Кейс 8 -->
<div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
  <img src="{{ asset('images/case1.png') }}" alt="AAA Library" class="w-full h-44 object-cover rounded-lg mb-4">
  <h3 class="text-xl text-white font-semibold mb-2">Топ AAA-игры</h3>
  <p class="text-gray-300 text-sm mb-2">The Witcher 3, Cyberpunk 2077, RDR2, Elden Ring. Идеально для коллекции.</p>
  <p class="text-yellow-400 font-bold mb-4">Цена: 1 990₽</p>
  <a href="{{ route('case.view', ['caseId' => 8]) }}" class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</a>
</div>
</section>

<!-- Футер -->
<footer>
    @include('footer')
</footer>

<script>
  const modal = document.getElementById('caseModal');
  const closeModal = document.getElementById('closeModal');
  const buttons = document.querySelectorAll('.case-card button');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      modal.classList.remove('hidden');
    });
  });

  closeModal.addEventListener('click', () => {
    modal.classList.add('hidden');
  });
</script>

<script>
  const modal = document.getElementById('caseModal');
  const closeModal = document.getElementById('closeModal');
  const buttons = document.querySelectorAll('.case-card button');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      modal.classList.remove('hidden');
    });
  });

  closeModal.addEventListener('click', () => {
    modal.classList.add('hidden');
  });
</script>

<style>
  #theme-toggle {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  }

  #theme-toggle:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
  }
 </style>