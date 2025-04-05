<header class="bg-gray-900 text-white">
  <head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
  </head>

  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <!-- Логотип и название с ссылкой на главную страницу -->
    <div class="flex items-center space-x-4">
      <a href="{{ route('home') }}" class="text-3xl font-semibold text-yellow-400">
        ReМайн
      </a>
    </div>
  <!-- Навигационное меню -->
  <nav>
      <ul class="flex space-x-8 text-lg font-sans text-white">
        <li>
          <a href="{{ route('home') }}" class="px-4 py-2 hover:text-gray-400 transition duration-300 ease-in-out">Главная</a>
        </li>
        <li>
          <a href="#" class="px-4 py-2 hover:text-gray-400 transition duration-300 ease-in-out">О нас</a>
        </li>
        <li>
          <a href="#" class="px-4 py-2 hover:text-gray-400 transition duration-300 ease-in-out">Услуги</a>
        </li>
        <li>
          <a href="#" class="px-4 py-2 hover:text-gray-400 transition duration-300 ease-in-out">Контакты</a>
        </li>
      </ul>
    </nav>

    <!-- Кнопки входа/регистрации/выхода -->
    <div class="flex space-x-4 items-center">
      @if (Auth::check())
        <div class="flex items-center space-x-4">
          <a href="{{ route('profile.edit') }}">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="User Photo" class="w-12 h-12 rounded-full border-4 border-yellow-500 cursor-pointer">
          </a>
          <span class="text-white">{{ Auth::user()->name }}</span>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @csrf
          <button type="submit" class="px-4 py-2 text-white bg-red-500 hover:bg-red-700 rounded">Выход</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-700 rounded">Войти</a>
        <a href="{{ route('register') }}" class="px-4 py-2 text-white bg-green-500 hover:bg-green-700 rounded">Зарегистрироваться</a>
      @endif

      <button id="theme-toggle" class="relative w-12 h-12 rounded-full bg-gray-700 flex items-center justify-center transition duration-300 ease-in-out hover:bg-yellow-400">
        <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400 absolute transition-opacity duration-300 ease-in-out" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 3v3m0 12v3m7.07-12.93l-2.12 2.12m-10.14 0l-2.12-2.12m14.14 7.07h3m-18 0h3m14.14-10.14l-2.12-2.12m-10.14 0l-2.12 2.12" />
        </svg>

        <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-200 absolute opacity-0 transition-opacity duration-300 ease-in-out" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 12.79a8.97 8.97 0 0 1-6.03 2.73c-3.45 0-6.26-2.61-6.26-5.84 0-3.23 2.81-5.84 6.26-5.84 2.27 0 4.37 1.21 5.48 3.06a9.07 9.07 0 0 1 .71 6.89c.53-.19 1.04-.41 1.52-.68a9.06 9.06 0 0 1 2.28 6.79z" />
        </svg>

        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 opacity-20"></div>
      </button>
    </div>
  </div>
</header>

<!-- Секция кейсов -->
<section class="bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500 py-16">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-4xl text-yellow-400 font-bold mb-12 text-center tracking-wide">Кейсы аккаунтов Steam</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">

      <!-- Кейс 1 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=CS:GO+Prime" alt="CS:GO Prime" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">CS:GO Prime аккаунт</h3>
        <p class="text-gray-300 text-sm mb-2">Прайм-статус, инвентарь на 1200₽, звание: Legendary Eagle.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 890₽</p>
        <button class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</button>
      </div>

      <!-- Кейс 2 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=Dota+2+Immortal" alt="Dota 2 Immortal" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">Dota 2 — Immortal аккаунт</h3>
        <p class="text-gray-300 text-sm mb-2">Более 2000 игр, редкие скины, рейтинг Divine.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 1 500₽</p>
        <button class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</button>
      </div>

      <!-- Кейс 3 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=Rust+Survivor" alt="Rust Survivor" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">Rust — выживший</h3>
        <p class="text-gray-300 text-sm mb-2">Rust, DayZ, ARK. Более 500 часов. Готов к рейдам!</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 1 290₽</p>
        <button class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</button>
      </div>

      <!-- Кейс 4 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=Indie+Bundle" alt="Indie Bundle" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">Инди-бандл</h3>
        <p class="text-gray-300 text-sm mb-2">20+ инди-игр: Hollow Knight, Celeste, Stardew Valley и др.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 490₽</p>
        <button class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</button>
      </div>

      <!-- Кейс 5 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=GTA+V+Online" alt="GTA V" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">GTA V + Online</h3>
        <p class="text-gray-300 text-sm mb-2">Полная версия GTA V, бонусы в GTA Online. Банов нет.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 750₽</p>
        <button class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</button>
      </div>

      <!-- Кейс 6 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=PUBG+Full" alt="PUBG" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">PUBG — Полная прокачка</h3>
        <p class="text-gray-300 text-sm mb-2">Полный пропуск, скины, статистика K/D 2.3, 800+ часов.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 980₽</p>
        <button class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</button>
      </div>

      <!-- Кейс 7 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
        <img src="https://via.placeholder.com/300x200?text=Horror+Pack" alt="Horror Pack" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">Хоррор-бандл</h3>
        <p class="text-gray-300 text-sm mb-2">Dead by Daylight, Phasmophobia, Resident Evil 7, Outlast.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 590₽</p>
        <button class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</button>
      </div>

      <!-- Кейс 8 -->
      <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
      <img src="{{ asset('images/case1.png') }}" alt="AAA Library" class="w-full h-44 object-cover rounded-lg mb-4">
        <h3 class="text-xl text-white font-semibold mb-2">Топ AAA-игры</h3>
        <p class="text-gray-300 text-sm mb-2">The Witcher 3, Cyberpunk 2077, RDR2, Elden Ring. Идеально для коллекции.</p>
        <p class="text-yellow-400 font-bold mb-4">Цена: 1 990₽</p>
        <button class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</button>
      </div>

    </div>
  </div>
</section>


<!-- Модальное окно -->
<div id="caseModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
  <div class="bg-white p-6 rounded-lg w-96">
    <h3 class="text-2xl font-semibold mb-4">Содержимое кейса</h3>
    <p class="text-gray-700 mb-4">Здесь будет информация о содержимом кейса.</p>
    <button id="closeModal" class="px-4 py-2 bg-red-500 text-white rounded-lg">Закрыть</button>
  </div>
</div>

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

  /* Стили для кейсов */
  .case-card img {
    transition: transform 0.3s ease-in-out;
  }

  .case-card:hover img {
    transform: scale(1.05);
  }

  /* Модальное окно */
  #caseModal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 999;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
  }

  #caseModal .bg-white {
    max-width: 500px;
    width: 100%;
  }

  /* Для темной темы */
  body.dark {
    background-color: #121212;
    color: white;
  }

  body.dark .bg-gray-900 {
    background-color: #1a1a1a;
  }

  body.dark .text-yellow-400 {
    color: #f5e142;
  }

  body.dark .case-card {
    background-color: #2c2c2c;
  }
</style>
@include('footer') <!-- Вставляем хедер -->