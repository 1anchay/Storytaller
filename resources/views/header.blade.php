<header class="bg-gray-900 text-white">
  <head>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <!-- Логотип -->
    <div class="flex items-center space-x-4">
      <!-- Логотип (иконка или текст) -->
      <div class="text-3xl font-semibold text-yellow-400">
        ReМайн
      </div>
    </div>

    <!-- Навигационное меню -->
    <nav>
      <ul class="flex space-x-8 text-lg font-sans text-white">
        <li>
          <a href="#" class="px-4 py-2 hover:text-gray-400 transition duration-300 ease-in-out">Главная</a>
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

    <!-- Кнопка смены темы -->
    <div class="flex space-x-4 items-center">
      <button id="theme-toggle" class="text-yellow-400 hover:text-white transition duration-300 ease-in-out">
        <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 3v3m0 12v3m7.07-12.93l-2.12 2.12m-10.14 0l-2.12-2.12m14.14 7.07h3m-18 0h3m14.14-10.14l-2.12-2.12m-10.14 0l-2.12 2.12" />
        </svg>
        <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 12.79a8.97 8.97 0 0 1-6.03 2.73c-3.45 0-6.26-2.61-6.26-5.84 0-3.23 2.81-5.84 6.26-5.84 2.27 0 4.37 1.21 5.48 3.06a9.07 9.07 0 0 1 .71 6.89c.53-.19 1.04-.41 1.52-.68a9.06 9.06 0 0 1 2.28 6.79z" />
        </svg>
      </button>
    </div>
  </div>

  <script>
    // JavaScript для переключения темы
    const themeToggleBtn = document.getElementById('theme-toggle');
    const sunIcon = document.getElementById('sun-icon');
    const moonIcon = document.getElementById('moon-icon');
    const body = document.body;

    themeToggleBtn.addEventListener('click', () => {
      if (body.classList.contains('dark')) {
        body.classList.remove('dark');
        sunIcon.classList.add('hidden');
        moonIcon.classList.remove('hidden');
      } else {
        body.classList.add('dark');
        sunIcon.classList.remove('hidden');
        moonIcon.classList.add('hidden');
      }
    });
  </script>

  <style>
    /* Общие стили страницы */
    body {
      font-family: 'Arial', sans-serif;
      background-color: #121212;
      transition: background-color 0.3s ease-in-out;
    }

    .bg-gray-900 {
      background-color: #1a1a1a;
    }

    .hover\:text-gray-400:hover {
      color: #d1d5db;
    }

    .text-yellow-400 {
      color: #f5e142;
    }

    .text-3xl {
      font-size: 1.875rem;
      font-weight: 600;
    }

    .font-sans {
      font-family: 'Arial', sans-serif;
    }

    .tracking-tight {
      letter-spacing: -0.5px;
    }

    /* Темная тема */
    body.dark {
      background-color: #1a1a1a;
    }

    /* Правильное распределение элементов */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 1.5rem;
    }
  </style>
</header>
