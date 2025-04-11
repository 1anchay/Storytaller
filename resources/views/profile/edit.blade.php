@extends('layouts.app')

@section('content')
@include('header')
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
    <style>
        .bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.1);
            animation: float 8s infinite ease-in-out;
            z-index: 0;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-50px) rotate(180deg); }
        }
        .content-wrapper {
            position: relative;
            z-index: 1;
        }
        .avatar-container:hover .avatar-overlay {
            opacity: 1;
            transform: scale(1.05);
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 py-12 px-4 sm:px-6 lg:px-8 pb-20 overflow-hidden relative">
    <!-- Анимированные элементы фона -->
    <div class="bubble" style="width: 120px; height: 120px; left: 10%; top: 20%; animation-delay: 0s;"></div>
    <div class="bubble" style="width: 80px; height: 80px; right: 15%; top: 40%; animation-delay: 2s;"></div>
    <div class="bubble" style="width: 60px; height: 60px; left: 30%; bottom: 20%; animation-delay: 4s;"></div>
    
    <div class="max-w-4xl mx-auto content-wrapper">
        <!-- Заголовок с анимацией -->
        <div class="text-center mb-10">
            <div class="inline-block mb-4 animate-float">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-yellow-400 mb-2">Редактирование профиля</h1>
            <p class="text-gray-400">Обновите свои данные и настройки аккаунта</p>
        </div>

        <!-- Основная карточка -->
        <div class="bg-gray-800 rounded-xl shadow-2xl border border-gray-700 overflow-hidden transform transition-all hover:shadow-cyan-500/10">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="p-6 sm:p-10" id="profile-form">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Левая колонка -->
                    <div>
                        <!-- Блок аватара -->
                        <div class="mb-8">
                            <label class="block text-sm font-medium text-gray-300 mb-4">Аватар профиля</label>
                            <div class="flex flex-col items-center">
                                <label for="avatar-upload" class="cursor-pointer avatar-container relative group">
                                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-cyan-400 shadow-lg transition-all duration-300">
                                        <img id="avatar-preview" 
                                             src="{{ $user->profile_photo_url }}" 
                                             alt="User Avatar"
                                             class="w-full h-full object-cover transition duration-300">
                                        <div class="avatar-overlay absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full opacity-0 transition duration-300">
                                            <svg class="w-8 h-8 text-white transform rotate-12 group-hover:rotate-0 transition duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </label>
                                <input type="file" id="avatar-upload" name="profile_photo" class="hidden" accept="image/jpeg,image/png,image/gif">
                                <div class="mt-4 flex space-x-2">
                                    <button type="button" onclick="document.getElementById('avatar-upload').click()" class="px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition duration-300 hover:scale-105 active:scale-95">
                                        Изменить
                                    </button>
                                    <button type="button" id="remove-avatar" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300 hover:scale-105 active:scale-95">
                                        Удалить
                                    </button>
                                </div>
                                <p class="mt-2 text-xs text-gray-400">Макс. размер: 2MB (JPEG, PNG, GIF)</p>
                            </div>
                        </div>

                        <!-- Блок информации -->
                        <div class="bg-gray-700 p-6 rounded-lg hover:shadow-md hover:shadow-cyan-500/10 transition duration-300">
                            <h3 class="text-lg font-semibold text-yellow-400 mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Информация об аккаунте
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between border-b border-gray-600 pb-2">
                                    <span class="text-gray-400">ID пользователя:</span>
                                    <span class="text-white font-mono font-medium">{{ $user->id }}</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-600 pb-2">
                                    <span class="text-gray-400">Имя пользователя:</span>
                                    <span class="text-white font-medium">{{ $user->name }}</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-600 pb-2">
                                    <span class="text-gray-400">Email:</span>
                                    <span class="text-white font-medium">{{ $user->email }}</span>
                                </div>
                                <div class="flex justify-between border-b border-gray-600 pb-2">
                                    <span class="text-gray-400">Дата регистрации:</span>
                                    <span class="text-white font-medium">{{ $user->created_at->format('d.m.Y H:i') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Статус email:</span>
                                    @if($user->hasVerifiedEmail())
                                        <span class="text-green-400 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Подтверждён
                                        </span>
                                    @else
                                        <span class="text-red-400 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Не подтверждён
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Правая колонка -->
                    <div>
                        <!-- Поле имени -->
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Имя пользователя</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required
                                       class="bg-gray-700 text-white placeholder-gray-400 pl-10 pr-4 py-3 w-full border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition duration-300"
                                       placeholder="Ваше имя">
                            </div>
                            @error('name')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Поле email -->
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                                       class="bg-gray-700 text-white placeholder-gray-400 pl-10 pr-4 py-3 w-full border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition duration-300"
                                       placeholder="your@email.com">
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                            
                            @if (!$user->hasVerifiedEmail())
                                <div class="mt-4 bg-gray-700 p-3 rounded-lg border border-gray-600">
                                    <p class="text-red-400 text-sm mb-2">Ваш email не подтверждён</p>
                                    <form method="POST" action="{{ route('verification.send') }}" class="inline">
                                        @csrf
                                        <button type="submit" class="text-cyan-400 hover:text-cyan-300 text-sm underline transition duration-300 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            Отправить письмо с подтверждением
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>

                        <!-- Поле пароля -->
                        <div class="mb-6">
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Новый пароль</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input id="password" name="password" type="password" autocomplete="new-password"
                                       class="bg-gray-700 text-white placeholder-gray-400 pl-10 pr-4 py-3 w-full border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition duration-300"
                                       placeholder="Оставьте пустым, если не хотите менять">
                            </div>
                            <p class="mt-1 text-xs text-gray-400">Минимум 8 символов, включая цифры и спецсимволы</p>
                            @error('password')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Подтверждение пароля -->
                        <div class="mb-8">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Подтвердите пароль</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                                       class="bg-gray-700 text-white placeholder-gray-400 pl-10 pr-4 py-3 w-full border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition duration-300"
                                       placeholder="Подтвердите новый пароль">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Кнопки действий -->
                <div class="mt-10 pt-6 border-t border-gray-700">
                    <div class="flex justify-between">
                        <a href="{{ url()->previous() }}" class="flex items-center px-4 py-2 text-gray-300 hover:text-white transition duration-300 hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Назад
                        </a>
                        <button type="submit" class="flex items-center px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:from-cyan-600 hover:to-blue-700 transition duration-300 shadow-lg hover:scale-105 active:scale-95">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Сохранить изменения
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Модальные окна -->
<div id="verification-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 max-w-sm w-full shadow-2xl">
        <div class="text-center">
            <svg class="mx-auto h-12 w-12 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <h3 class="text-lg font-medium text-white mt-4">Письмо отправлено!</h3>
            <p class="mt-2 text-sm text-gray-300">
                Мы отправили письмо с подтверждением на ваш email. Пожалуйста, проверьте вашу почту.
            </p>
            <div class="mt-6">
                <button id="close-modal" class="px-6 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition duration-300">
                    Понятно
                </button>
            </div>
        </div>
    </div>
</div>

<div id="success-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 max-w-sm w-full shadow-2xl">
        <div class="text-center">
            <svg class="mx-auto h-12 w-12 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <h3 class="text-lg font-medium text-white mt-4">Изменения сохранены!</h3>
            <p class="mt-2 text-sm text-gray-300">
                Ваши данные профиля были успешно обновлены.
            </p>
            <div class="mt-6">
                <button id="close-success-modal" class="px-6 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition duration-300">
                    Понятно
                </button>
            </div>
        </div>
    </div>
</div>

@include('footer')

@section('scripts')
<script>
    // Улучшенная обработка загрузки аватара
    document.getElementById('avatar-upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (!file) return;
        
        // Проверка размера файла
        if (file.size > 2 * 1024 * 1024) {
            alert('Максимальный размер файла - 2MB');
            return;
        }
        
        // Проверка типа файла
        const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!validTypes.includes(file.type)) {
            alert('Допустимые форматы: JPEG, PNG, GIF');
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('avatar-preview');
            preview.src = e.target.result;
            
            // Анимация при загрузке
            preview.style.transform = 'scale(1.1)';
            setTimeout(() => {
                preview.style.transform = 'scale(1)';
            }, 300);
        };
        reader.readAsDataURL(file);
    });

    // Удаление аватара с анимацией
    document.getElementById('remove-avatar').addEventListener('click', function() {
        const preview = document.getElementById('avatar-preview');
        preview.style.transform = 'scale(0.8)';
        setTimeout(() => {
            preview.src = '{{ asset("images/default-avatar.jpg") }}';
            document.getElementById('avatar-upload').value = '';
            preview.style.transform = 'scale(1)';
        }, 300);
    });

    // Обработка отправки формы подтверждения email
    document.querySelectorAll('form[action="{{ route('verification.send') }}"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const button = this.querySelector('button');
            const originalText = button.innerHTML;
            button.disabled = true;
            button.innerHTML = '<span class="animate-pulse">Отправка...</span>';
            
            fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'same-origin'
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById('verification-modal').classList.remove('hidden');
                } else {
                    throw new Error('Ошибка при отправке письма');
                }
            })
            .catch(error => {
                alert(error.message);
            })
            .finally(() => {
                button.disabled = false;
                button.innerHTML = originalText;
            });
        });
    });

    // Обработка отправки формы профиля
    document.getElementById('profile-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Удаляем предыдущие сообщения об ошибках
        document.querySelectorAll('.text-red-400').forEach(el => el.remove());
        
        const form = this;
        const button = document.querySelector('button[type="submit"]');
        const originalText = button.innerHTML;
        button.disabled = true;
        button.innerHTML = '<span class="animate-pulse">Сохранение...</span>';
        
        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            credentials: 'same-origin'
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            return response.json().then(err => { throw err; });
        })
        .then(data => {
            document.getElementById('success-modal').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error:', error);
            if (error.errors) {
                // Отображаем ошибки валидации
                Object.entries(error.errors).forEach(([field, messages]) => {
                    const input = document.querySelector(`[name="${field}"]`);
                    if (input) {
                        const errorElement = document.createElement('p');
                        errorElement.className = 'mt-1 text-sm text-red-400';
                        errorElement.textContent = messages[0];
                        input.parentNode.insertBefore(errorElement, input.nextSibling);
                    }
                });
            } else {
                alert(error.message || 'Произошла ошибка при сохранении изменений');
            }
        })
        .finally(() => {
            button.disabled = false;
            button.innerHTML = originalText;
        });
    });

    // Закрытие модальных окон
    document.getElementById('close-modal')?.addEventListener('click', function() {
        document.getElementById('verification-modal').classList.add('hidden');
    });
    
    document.getElementById('close-success-modal')?.addEventListener('click', function() {
        document.getElementById('success-modal').classList.add('hidden');
        window.location.reload();
    });
</script>
@endsection