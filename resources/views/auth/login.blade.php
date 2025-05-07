@extends('layouts.app')

@section('content')
@include('header')
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
</head>
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 py-12 px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="max-w-md mx-auto">
        <!-- Логотип с анимацией -->
        <div class="text-center mb-8">
            <a href="{{ url('/') }}" class="inline-flex items-center space-x-3 group">
                <div class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-purple-600 rounded-lg flex items-center justify-center shadow-lg transform group-hover:rotate-6 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 tracking-tight group-hover:bg-gradient-to-r group-hover:from-pink-500 group-hover:via-red-500 group-hover:to-yellow-500 transition-all duration-500">
                    Secure<span class="text-white">Shield</span>
                </span>
            </a>
        </div>

        <!-- Карточка формы -->
        <div class="bg-gray-800 py-8 px-6 sm:px-10 rounded-xl shadow-2xl border border-gray-700">
            <h2 class="text-2xl font-bold text-center text-yellow-400 mb-8">
                Вход в аккаунт
            </h2>

            <!-- Вывод общих ошибок -->
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-500/10 border border-red-500 text-red-500 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Поле Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="bg-gray-700 text-white placeholder-gray-400 pl-10 pr-4 py-2.5 w-full border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition duration-200"
                               placeholder="your@email.com" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Поле Пароля -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        Пароль
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="bg-gray-700 text-white placeholder-gray-400 pl-10 pr-4 py-2.5 w-full border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition duration-200"
                               placeholder="••••••••">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Запомнить меня и Забыли пароль -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-cyan-500 focus:ring-cyan-500 border-gray-600 rounded bg-gray-700">
                        <label for="remember" class="ml-2 block text-sm text-gray-300">
                            Запомнить меня
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-cyan-400 hover:text-cyan-300 transition duration-200">
                            Забыли пароль?
                        </a>
                    </div>
                </div>

                <!-- Кнопка входа -->
                <div class="pt-2">
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition duration-200 hover:shadow-md">
                        Войти
                    </button>
                </div>
            </form>

            <!-- Разделитель -->
            <div class="mt-6 pt-4">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-600"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-3 bg-gray-800 text-gray-400">
                            Или войдите через
                        </span>
                    </div>
                </div>

                <!-- Социальные кнопки -->
                <div class="mt-4 grid grid-cols-2 gap-3">
                    <a href="#" class="w-full inline-flex justify-center items-center py-2 px-4 border border-gray-600 rounded-lg shadow-sm bg-gray-700 text-sm font-medium text-gray-300 hover:bg-gray-600 transition duration-200">
                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                        </svg>
                        Facebook
                    </a>
                    <a href="#" class="w-full inline-flex justify-center items-center py-2 px-4 border border-gray-600 rounded-lg shadow-sm bg-gray-700 text-sm font-medium text-gray-300 hover:bg-gray-600 transition duration-200">
                        <svg class="w-5 h-5 mr-2 text-blue-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
                        </svg>
                        LinkedIn
                    </a>
                </div>
            </div>

            <!-- Ссылка на регистрацию -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-400">
                    Нет аккаунта? 
                    <a href="{{ route('register') }}" class="font-medium text-cyan-400 hover:text-cyan-300 transition duration-200">
                        Зарегистрируйтесь
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Декоративные элементы -->
<div class="fixed bottom-0 left-0 right-0 h-1/4 bg-gradient-to-t from-gray-900 to-transparent pointer-events-none z-0"></div>
<div class="fixed top-20 left-10 w-32 h-32 rounded-full bg-gradient-to-r from-cyan-500/10 to-purple-500/10 blur-xl opacity-50 z-0"></div>
<div class="fixed bottom-20 right-20 w-40 h-40 rounded-full bg-gradient-to-r from-purple-500/10 to-blue-500/10 blur-xl opacity-50 z-0"></div>
@include('footer')
@endsection