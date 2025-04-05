@extends('layouts.app') <!-- Расширяем основной шаблон -->
@include('header') <!-- Вставляем хедер -->

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <!-- Форма редактирования профиля -->
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                        </div>

                        <!-- Поле для загрузки аватарки -->
                        <div>
                            <label for="avatar" class="block text-sm font-medium text-gray-700">
                                {{ __('Avatar') }}
                            </label>
                            <div class="flex items-center space-x-4">
                                <!-- Предварительный просмотр аватарки -->
                                <div id="avatar-preview">
                                    @if($user->avatar)
                                        <img id="avatar-img" src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar" class="w-20 h-20 rounded-full border-4 border-blue-500">
                                    @else
                                        <img id="preview" src="#" alt="Avatar Preview" class="hidden w-20 h-20 rounded-full border-4 border-blue-500">
                                    @endif
                                </div>
                                
                                <input type="file" id="avatar" name="avatar" class="block mt-1 w-full p-2 border border-gray-300 rounded-lg shadow-sm" onchange="previewImage(event)" />
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

@endsection

@section('scripts')
<script>
    // Функция для предварительного просмотра изображения
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden'); // Показываем изображение
            };

            reader.readAsDataURL(file);
        }
    }

    // Показать аватар пользователя (если он уже есть)
    document.addEventListener("DOMContentLoaded", function() {
        const avatarPreview = document.getElementById('avatar-img');
        const avatarInput = document.getElementById('avatar');
        const preview = document.getElementById('preview');

        // Если аватар уже есть, показываем его
        if (avatarPreview && avatarInput.files.length === 0) {
            avatarPreview.style.display = 'block';
            preview.style.display = 'none';  // Прячем предварительный просмотр
        }
    });
</script>
@endsection
