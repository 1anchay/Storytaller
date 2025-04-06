<!-- resources/views/footer.blade.php -->

<footer class="bg-gradient-to-r from-gray-900 via-purple-900 to-blue-900 text-white py-16 mt-12 rounded-t-3xl shadow-xl relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- Логотип и описание -->
            <div class="flex flex-col items-start space-y-6">
                <a href="{{ url('/') }}" class="text-5xl font-bold text-yellow-400 hover:text-pink-400 transition-all duration-300 tracking-wide">ReМайн</a>
                <p class="text-gray-300 text-lg font-light mb-4">Лучшие кейсы для аккаунтов Steam. Откройте новые возможности с нами и погрузитесь в мир киберпанка!</p>
            </div>

            <!-- Быстрые ссылки -->
            <div class="flex flex-col space-y-4">
                <h4 class="text-lg font-semibold text-yellow-400 mb-4">Навигация</h4>
                <ul class="space-y-3">
                    <li><a href="{{ url('/') }}" class="text-gray-400 hover:text-yellow-400 transition duration-300 hover:scale-105 transform">Главная</a></li>
                    <li><a href="{{ url('/agreement') }}" class="text-gray-400 hover:text-yellow-400 transition duration-300 hover:scale-105 transform">Соглашение</a></li>
                    <li><a href="{{ url('/support') }}" class="text-gray-400 hover:text-yellow-400 transition duration-300 hover:scale-105 transform">Поддержка</a></li>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

                </ul>
            </div>

           <!-- Социальные сети с иконками -->
<div class="flex flex-col space-y-4">
    <h4 class="text-lg font-semibold text-yellow-400 mb-4">Следите за нами</h4>
    <ul class="space-y-3">
        <li class="flex items-center space-x-2">
            <!-- Telegram Icon -->
            <i class="fab fa-telegram-plane text-2xl text-gray-400 hover:text-yellow-400 transition duration-300"></i>
            <a href="https://t.me/your_telegram" target="_blank" class="text-gray-400 hover:text-yellow-400 transition duration-300">Telegram</a>
        </li>
        <li class="flex items-center space-x-2">
            <!-- VK Icon -->
            <i class="fab fa-vk text-2xl text-gray-400 hover:text-yellow-400 transition duration-300"></i>
            <a href="https://vk.com/your_vk" target="_blank" class="text-gray-400 hover:text-yellow-400 transition duration-300">Группа VK</a>
        </li>
        <li class="flex items-center space-x-2">
            <!-- YouTube Icon -->
            <i class="fab fa-youtube text-2xl text-gray-400 hover:text-yellow-400 transition duration-300"></i>
            <a href="https://www.youtube.com/your_youtube" target="_blank" class="text-gray-400 hover:text-yellow-400 transition duration-300">YouTube</a>
        </li>
    </ul>
</div>


        <!-- Подвал с авторскими правами -->
        <div class="mt-12 border-t border-gray-700 pt-6">
            <div class="flex items-center justify-between">
                <p class="text-gray-400 text-sm">© 2025 ReМайн. Все права защищены.</p>
            </div>
        </div>
    </div>

   <!-- Анимация человечка с видео -->
<div class="absolute bottom-4 left-0 right-0 z-20">
    <div class="animate-run">
        <video autoplay loop muted class="w-16 h-16 rounded-full shadow-xl">
            <source src="https://your-website.com/character-walking.mp4" type="video/mp4" />
            Ваш браузер не поддерживает видео.
        </video>
    </div>
</div>

</footer>

<style>
@keyframes run {
  0% {
    left: -50px; /* Начальная позиция */
  }
  50% {
    left: 50%; /* Промежуточная позиция (по центру) */
    transform: translateX(-50%);
  }
  100% {
    left: 100%; /* Конечная позиция */
  }
}

.animate-run {
  position: absolute;
  animation: run 5s linear infinite;
}


.animate-run {
    position: absolute;
    animation: run 5s linear infinite;
}
</style>



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

  footer {
    border-top-left-radius: 2rem;
    border-top-right-radius: 2rem;
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
