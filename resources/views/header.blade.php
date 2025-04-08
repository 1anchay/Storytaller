<header class="bg-gradient-to-r from-gray-900 to-gray-800 text-white shadow-xl">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex justify-between items-center py-4">
      <!-- Логотип и название -->
      <div class="flex items-center space-x-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
          <div class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-purple-600 rounded-lg flex items-center justify-center shadow-lg transform group-hover:rotate-6 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <span class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 tracking-tight group-hover:bg-gradient-to-r group-hover:from-pink-500 group-hover:via-red-500 group-hover:to-yellow-500 transition-all duration-500">
            Re<span class="text-white">Майн</span>
          </span>
        </a>
      </div>

      <!-- Навигационное меню -->
      <nav class="hidden md:flex items-center space-x-1">
        <a href="{{ route('home') }}" class="px-4 py-2 rounded-md font-medium flex items-center space-x-2 hover:bg-gray-700/50 hover:text-cyan-300 transition-all duration-200 group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400 group-hover:text-cyan-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          <span>Главная</span>
        </a>
        
        <a href="{{ route('store') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700/50 hover:text-blue-300 flex items-center space-x-2">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
  </svg>
  <span>Аккаунты</span>
</a>
        
        <a href="#" class="px-4 py-2 rounded-md font-medium flex items-center space-x-2 hover:bg-gray-700/50 hover:text-purple-300 transition-all duration-200 group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400 group-hover:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
          <span>Услуги</span>
        </a>
        
        <a href="#" class="px-4 py-2 rounded-md font-medium flex items-center space-x-2 hover:bg-gray-700/50 hover:text-green-300 transition-all duration-200 group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400 group-hover:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          <span>Контакты</span>
        </a>
      </nav>

      <!-- Кнопки входа/регистрации/выхода -->
      <div class="flex items-center space-x-4">
        @if (Auth::check())
          <!-- Баланс и пополнение -->
          <div class="hidden md:flex items-center space-x-3 bg-gray-800/50 rounded-lg px-3 py-1.5 border border-gray-700 shadow-sm">
            <div class="flex items-center space-x-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="font-medium text-white">{{ number_format(Auth::user()->balance ?? 0, 2) }} ₽</span>
            </div>
            <a href="{{ route('balance.topup') }}" class="text-xs bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-2 py-1 rounded transition-all duration-200 flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Пополнить
</a>
          </div>

          <!-- Профиль пользователя -->
          <div class="hidden md:flex items-center space-x-3">
            <span class="text-sm font-medium text-gray-300">{{ Auth::user()->name }}</span>
            <a href="{{ route('profile.edit') }}" class="relative group">
              <img src="{{ Auth::user()->profile_photo_url }}" alt="User Photo" class="w-10 h-10 rounded-full border-2 border-cyan-400 shadow-md transition-all duration-300 group-hover:border-purple-500 group-hover:scale-110">
              <span class="absolute -bottom-1 -right-1 bg-purple-600 text-white text-xs px-1.5 py-0.5 rounded-full border border-gray-900 shadow-sm">PRO</span>
            </a>
          </div>
          
          <!-- Кнопка выхода -->
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-red-500 to-pink-600 rounded-md font-medium text-sm flex items-center space-x-2 hover:shadow-lg hover:from-red-600 hover:to-pink-700 transition-all duration-200 transform hover:scale-105 active:scale-95">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
              <span class="hidden md:inline">Выход</span>
            </button>
          </form>
        @else
          <!-- Кнопки входа и регистрации -->
          <a href="{{ route('login') }}" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-md font-medium text-sm flex items-center space-x-2 hover:shadow-lg hover:from-blue-600 hover:to-cyan-700 transition-all duration-200 transform hover:scale-105 active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            <span class="hidden md:inline">Войти</span>
          </a>
          
          <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-600 rounded-md font-medium text-sm flex items-center space-x-2 hover:shadow-lg hover:from-purple-600 hover:to-pink-700 transition-all duration-200 transform hover:scale-105 active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            <span class="hidden md:inline">Регистрация</span>
          </a>
        @endif

        <!-- Кнопка смены темы -->
        <button id="theme-toggle" class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-gray-600 transition-all duration-200 shadow-md transform hover:scale-110 active:scale-95">
          <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
          <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
          </svg>
        </button>

        <!-- Мобильное меню (бургер) -->
        <button id="mobile-menu-button" class="md:hidden w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-gray-600 transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Мобильное меню (скрыто по умолчанию) -->
    <div id="mobile-menu" class="hidden md:hidden pb-4">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        @if (Auth::check())
          <!-- Баланс в мобильном меню -->
          <div class="px-3 py-2 flex justify-between items-center bg-gray-800 rounded-lg mb-2">
            <div class="flex items-center space-x-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="font-medium text-white">Баланс: {{ number_format(Auth::user()->balance ?? 0, 2) }} ₽</span>
            </div>
            <a href="{{ route('balance.topup') }}" class="text-xs bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-2 py-1 rounded transition-all duration-200">
              Пополнить
            </a>
          </div>
        @endif
        
        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700/50 hover:text-cyan-300 flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          <span>Главная</span>
        </a>
        
        <a href="{{ route('store') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700/50 hover:text-blue-300 flex items-center space-x-2">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
  </svg>
  <span>Аккаунты</span>
</a>
        
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700/50 hover:text-purple-300 flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
          <span>Услуги</span>
        </a>
        
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700/50 hover:text-green-300 flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          <span>Контакты</span>
        </a>
      </div>
      
      @if (Auth::check())
        <div class="pt-4 pb-3 border-t border-gray-700">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img src="{{ Auth::user()->profile_photo_url }}" alt="User Photo" class="h-10 w-10 rounded-full border-2 border-cyan-400">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
              <div class="text-sm font-medium text-gray-400">PRO аккаунт</div>
            </div>
          </div>
          <div class="mt-3 px-2 space-y-1">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="block w-full px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700/50 hover:text-red-300 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Выход</span>
              </button>
            </form>
          </div>
        </div>
      @endif
    </div>
  </div>

  <script>
    // Переключение темы
    const themeToggleBtn = document.getElementById('theme-toggle');
    const sunIcon = document.getElementById('sun-icon');
    const moonIcon = document.getElementById('moon-icon');
    const html = document.documentElement;

    // Проверяем сохраненную тему
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      html.classList.add('dark');
      sunIcon.classList.add('hidden');
      moonIcon.classList.remove('hidden');
    } else {
      html.classList.remove('dark');
      sunIcon.classList.remove('hidden');
      moonIcon.classList.add('hidden');
    }

    themeToggleBtn.addEventListener('click', () => {
      html.classList.toggle('dark');
      
      if (html.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
        sunIcon.classList.add('hidden');
        moonIcon.classList.remove('hidden');
      } else {
        localStorage.setItem('theme', 'light');
        sunIcon.classList.remove('hidden');
        moonIcon.classList.add('hidden');
      }
    });

    // Мобильное меню
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
</header>