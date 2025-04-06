@extends('layouts.app') <!-- Расширяем основной шаблон -->
@include('header') <!-- Вставляем хедер -->

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- Форма редактирования профиля -->
                <form method="POST" action="{{ route('verification.send') }}" id="verification-form">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <!-- Поле для имени пользователя -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                {{ __('Name') }}
                            </label>
                            <input id="name" class="block mt-1 w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus />
                        </div>

                        <!-- Поле для email пользователя -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                {{ __('Email') }}
                            </label>
                            <input id="email" class="block mt-1 w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" type="email" name="email" value="{{ old('email', $user->email) }}" required />
                            
                            <!-- Статус подтверждения email -->
                            <div class="mt-2">
                                @if ($user->hasVerifiedEmail())
                                    <p class="text-green-500 text-sm">Email подтверждён</p>
                                @else
                                    <p class="text-red-500 text-sm">Email не подтверждён</p>
                                    <!-- Кнопка подтверждения -->
                                    <button type="submit" id="send-verification-btn" class="inline-block mt-2 text-blue-500 text-sm hover:underline">
                                        Повторно отправить подтверждение email
                                    </button>
                                @endif
                            </div>
                        </div>

                        <!-- Поле для загрузки аватарки -->
                        <div>
                            <label for="avatar" class="block text-sm font-medium text-gray-700">
                                {{ __('Avatar') }}
                            </label>
                            <div class="flex items-center space-x-4">
                                <!-- Предварительный просмотр аватарки -->
                                <div id="avatar-preview" class="flex justify-center items-center w-20 h-20 rounded-full overflow-hidden bg-gray-200">
                                    <img id="avatar-img" 
                                         src="{{ $user->profile_photo_url }}" 
                                         alt="Avatar Preview" 
                                         class="w-full h-full object-cover">
                                </div>

                                <input type="file" id="avatar" name="profile_photo" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg shadow-sm" onchange="previewImage(event)" />
                            </div>
                        </div>

                        <!-- Личные данные пользователя -->
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold text-gray-700">Личные данные</h3>
                            <div class="mt-4">
                                <p class="text-sm text-gray-600">Имя: <span class="font-medium">{{ $user->name }}</span></p>
                                <p class="text-sm text-gray-600">Email: <span class="font-medium">{{ $user->email }}</span></p>
                                <p class="text-sm text-gray-600">Дата регистрации: <span class="font-medium">{{ $user->created_at->format('d M, Y') }}</span></p>
                            </div>
                        </div>

                        <!-- Кнопка сохранения изменений -->
                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно для уведомления -->
<div id="verification-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <p class="text-lg font-semibold text-gray-800">Сообщение отправлено на вашу почту!</p>
        <button id="close-modal" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Закрыть</button>
    </div>
</div>


@include('footer') <!-- Вставляем футер -->
@endsection

@section('scripts')
<script>
    // Функция для предварительного просмотра изображения
    function previewImage(event) {
        const preview = document.getElementById('avatar-img');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }

    // Отправка формы и показ модального окна
    document.getElementById('verification-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Останавливаем стандартную отправку формы

    const formData = new FormData(this);

    // Отправляем POST запрос для повторной отправки email
    fetch("{{ route('verification.send') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': formData.get('_token')
        },
        body: formData
    }).then(response => {
        if (response.ok) {
            // Показываем модальное окно, если все прошло успешно
            document.getElementById('verification-modal').classList.remove('hidden');
        } else {
            alert("Произошла ошибка, попробуйте позже.");
        }
    }).catch(error => {
        console.error("Error occurred:", error);
        alert("Произошла ошибка, попробуйте позже.");
    });
});


    // Закрытие модального окна
    document.getElementById('close-modal').addEventListener('click', function() {
        document.getElementById('verification-modal').classList.add('hidden');
    });
</script>
@endsection
