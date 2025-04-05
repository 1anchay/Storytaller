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

  <!-- Кнопка чата с поддержкой -->
  <div class="fixed bottom-6 right-6">
    <button id="chatButton" class="flex items-center justify-center p-4 bg-yellow-400 text-white rounded-full shadow-lg hover:bg-yellow-500 transition duration-300">
      <span class="text-lg">💬</span> <!-- Эмодзи для чата -->
    </button>
  </div>

  <!-- Модальное окно чата -->
  <div id="chatModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white p-6 rounded-lg w-96 max-w-full">
      <h4 class="text-xl font-semibold text-gray-900 mb-4">Чат с поддержкой</h4>
      <div id="chatBox" class="h-60 overflow-y-scroll mb-4 border border-gray-300 p-4 rounded-lg bg-gray-50">
        <!-- Сообщения будут здесь -->
      </div>
      <input id="chatInput" type="text" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Напишите сообщение..." />
      <button id="sendMessage" class="w-full mt-2 bg-yellow-400 text-white p-2 rounded-md hover:bg-yellow-500 transition duration-300">
        Отправить
      </button>
      <button id="closeChat" class="mt-4 text-gray-600 hover:text-yellow-400">Закрыть</button>
    </div>
  </div>
</footer>

<!-- Стиль для чата -->
<style>
  #chatModal {
    display: none;
  }

  #chatButton {
    position: fixed;
    bottom: 20px;
    right: 20px;
    border-radius: 50%;
    cursor: pointer;
    z-index: 1000; /* Обеспечиваем, чтобы кнопка была поверх всех элементов */
  }

  #chatModal.show {
    display: flex;
  }
</style>

<!-- Скрипт для работы с чатом -->
<script>
  // Открыть чат
  document.getElementById('chatButton').addEventListener('click', function () {
    document.getElementById('chatModal').classList.add('show');
  });

  // Закрыть чат
  document.getElementById('closeChat').addEventListener('click', function () {
    document.getElementById('chatModal').classList.remove('show');
  });

  // Отправить сообщение
  document.getElementById('sendMessage').addEventListener('click', function () {
    const message = document.getElementById('chatInput').value;
    if (message.trim() !== '') {
      fetch("{{ route('chat.send') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message: message })
      })
      .then(response => response.json())
      .then(data => {
        const chatBox = document.getElementById('chatBox');
        const newMessage = document.createElement('p');
        newMessage.textContent = `Вы: ${message}`;
        newMessage.classList.add('text-gray-900', 'mb-2');
        chatBox.appendChild(newMessage);
        document.getElementById('chatInput').value = ''; // Очищаем поле ввода
        chatBox.scrollTop = chatBox.scrollHeight; // Прокрутка вниз
      })
      .catch(error => {
        console.error('Ошибка отправки сообщения:', error);
      });
    }
  });
</script>
