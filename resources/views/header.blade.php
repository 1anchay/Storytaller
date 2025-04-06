<header class="bg-gray-900 text-white py-6">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
  </head>
  <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
    <!-- Логотип и название с ссылкой на главную страницу -->
    <div class="flex items-center space-x-4">
      <a href="{{ route('home') }}" class="text-3xl font-semibold text-cyan-400 hover:text-pink-500 transition duration-300 ease-in-out">
        ReМайн
      </a>
    </div>

    <!-- Навигационное меню -->
    <nav>
      <ul class="flex space-x-8 text-lg font-sans text-white">
        <li>
          <a href="{{ route('home') }}" class="px-4 py-2 hover:text-gray-400 hover:text-cyan-500 transition duration-300 ease-in-out">Главная</a>
        </li>
        <li>
          <a href="#" class="px-4 py-2 hover:text-gray-400 hover:text-cyan-500 transition duration-300 ease-in-out">О нас</a>
        </li>
        <li>
          <a href="#" class="px-4 py-2 hover:text-gray-400 hover:text-cyan-500 transition duration-300 ease-in-out">Услуги</a>
        </li>
        <li>
          <a href="#" class="px-4 py-2 hover:text-gray-400 hover:text-cyan-500 transition duration-300 ease-in-out">Контакты</a>
        </li>
      </ul>
    </nav>

    <!-- Кнопки входа/регистрации/выхода -->
    <div class="flex space-x-6 items-center">
      @if (Auth::check())
        <!-- Отображение имени пользователя и фото профиля -->
        <div class="flex items-center space-x-4">
          <a href="{{ route('profile.edit') }}">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="User Photo" class="w-14 h-14 rounded-full border-4 border-cyan-400 shadow-lg transform transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
          </a>
          <span class="text-white text-lg">{{ Auth::user()->name }}</span>
        </div>
        <!-- Кнопка выхода -->
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @csrf
          <button type="submit" class="px-6 py-3 text-white bg-gradient-to-r from-red-500 via-pink-500 to-purple-600 hover:scale-105 transform rounded-xl shadow-xl transition duration-300 ease-in-out">
            Выход
          </button>
        </form>
      @else
        <!-- Кнопки входа и регистрации -->
        <a href="{{ route('login') }}" class="px-6 py-3 text-white bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-600 hover:scale-105 transform rounded-xl shadow-xl transition duration-300 ease-in-out">Войти</a>
        <a href="{{ route('register') }}" class="px-6 py-3 text-white bg-gradient-to-r from-green-500 via-blue-500 to-purple-600 hover:scale-105 transform rounded-xl shadow-xl transition duration-300 ease-in-out">Зарегистрироваться</a>
      @endif

      <!-- Кнопка смены темы -->
      <button id="theme-toggle" class="relative w-14 h-14 rounded-full bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-600 flex items-center justify-center transition duration-300 ease-in-out hover:bg-gradient-to-r hover:from-yellow-500 hover:via-pink-500 hover:to-red-600 shadow-lg transform hover:scale-110">
        <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-400 absolute transition-opacity duration-300 ease-in-out" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 3v3m0 12v3m7.07-12.93l-2.12 2.12m-10.14 0l-2.12-2.12m14.14 7.07h3m-18 0h3m14.14-10.14l-2.12-2.12m-10.14 0l-2.12 2.12" />
        </svg>

        <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-200 absolute opacity-0 transition-opacity duration-300 ease-in-out" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 12.79a8.97 8.97 0 0 1-6.03 2.73c-3.45 0-6.26-2.61-6.26-5.84 0-3.23 2.81-5.84 6.26-5.84 2.27 0 4.37 1.21 5.48 3.06a9.07 9.07 0 0 1 .71 6.89c.53-.19 1.04-.41 1.52-.68a9.06 9.06 0 0 1 2.28 6.79z" />
        </svg>
      </button>
    </div>
  </div>

  <script>
    const themeToggleBtn = document.getElementById('theme-toggle');
    const sunIcon = document.getElementById('sun-icon');
    const moonIcon = document.getElementById('moon-icon');
    const body = document.body;

    themeToggleBtn.addEventListener('click', () => {
      if (body.classList.contains('dark')) {
        body.classList.remove('dark');
        sunIcon.classList.remove('opacity-0');
        moonIcon.classList.add('opacity-0');
      } else {
        body.classList.add('dark');
        sunIcon.classList.add('opacity-0');
        moonIcon.classList.remove('opacity-0');
      }
    });
  </script>

  <style>
    #theme-toggle {
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
    }

    #theme-toggle:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    }

    #theme-toggle svg {
      transition: opacity 0.3s ease-in-out;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #121212;
      transition: background-color 0.3s ease-in-out;
    }

    .bg-gray-900 {
      background-color: #2a2a2a;
    }

    .text-cyan-400 {
      color: #00ffff;
    }

    .text-pink-500 {
      color: #ff00ff;
    }

    .text-3xl {
      font-size: 1.875rem;
      font-weight: 600;
    }

    .font-sans {
      font-family: 'Arial', sans-serif;
    }

    body.dark {
      background-color: #1a1a1a;
    }

    /* Анимация для кнопок */
    .transform:hover {
      transform: scale(1.1);
    }
  </style>
</header>
