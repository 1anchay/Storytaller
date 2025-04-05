<footer class="bg-gray-900 text-white py-8 mt-12">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">
      <!-- Логотип -->
      <div class="flex flex-col items-start">
        <a href="{{ route('home') }}" class="text-2xl font-semibold text-yellow-400 mb-4">ReМайн</a>
        <p class="text-gray-400 text-sm">Мы предоставляем кейсы для аккаунтов Steam, которые откроют перед вами новые возможности и улучшат ваш игровой опыт.</p>
      </div>

      <!-- Быстрые ссылки -->
      <div class="flex flex-col space-y-2">
        <h4 class="text-lg font-semibold text-yellow-400 mb-4">Навигация</h4>
        <ul class="space-y-2">
          <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-yellow-400 transition duration-300">Главная</a></li>
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">О нас</a></li>
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">Кейсы Steam</a></li>
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">Контакты</a></li>
        </ul>
      </div>

      <!-- Социальные сети -->
      <div class="flex flex-col space-y-2">
        <h4 class="text-lg font-semibold text-yellow-400 mb-4">Следите за нами</h4>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">Facebook</a></li>
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">Twitter</a></li>
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">Instagram</a></li>
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">LinkedIn</a></li>
        </ul>
      </div>

      <!-- Поддержка -->
      <div class="flex flex-col space-y-2">
        <h4 class="text-lg font-semibold text-yellow-400 mb-4">Поддержка</h4>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">FAQ</a></li>
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">Обратная связь</a></li>
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">Политика конфиденциальности</a></li>
          <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">Условия использования</a></li>
        </ul>
      </div>
    </div>

    <!-- Подвал с авторскими правами -->
    <div class="mt-12 border-t border-gray-700 pt-6">
      <div class="flex items-center justify-between">
        <p class="text-gray-400 text-sm">© 2025 ReМайн. Все права защищены.</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">Политика конфиденциальности</a>
          <a href="#" class="text-gray-400 hover:text-yellow-400 transition duration-300">Условия использования</a>
        </div>
      </div>
    </div>
  </div>
</footer>

<style>
  /* Стиль футера */
  footer {
    background-color: #1a1a1a;
  }

  footer h4 {
    color: #f5e142;
  }

  footer ul li a {
    color: #d1d1d1;
  }

  footer ul li a:hover {
    color: #f5e142;
    transform: scale(1.05); /* Добавим небольшой эффект увеличения на ховере */
  }

  footer .border-t {
    border-top: 1px solid #333;
  }

  footer .text-sm {
    font-size: 0.875rem;
  }

  footer .text-gray-400 {
    color: #cfcfcf;
  }

  footer .text-yellow-400 {
    color: #f5e142;
  }

  footer .text-gray-700 {
    color: #4a4a4a;
  }
</style>
