@extends('layouts.app')

@section('content')
@include('header')
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
  </head>
<div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-gray-800 rounded-xl shadow-lg overflow-hidden md:max-w-2xl transform transition-all hover:shadow-2xl">
        <div class="p-8">
            <!-- Заголовок и баланс -->
            <div class="flex flex-col space-y-4 mb-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-3xl font-bold text-white">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-amber-500">
                            Пополнение баланса
                        </span>
                    </h2>
                    <div class="flex items-center bg-gray-700 px-3 py-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 text-lg font-semibold text-amber-400">
                            {{ number_format(auth()->user()->balance, 2) }} ₽
                        </span>
                    </div>
                </div>
                <div class="border-b border-gray-700 opacity-50"></div>
            </div>

            <form action="{{ route('balance.process') }}" method="POST">
                @csrf
                
                <!-- Поле для суммы -->
                <div class="mb-8">
                    <label for="amount" class="block text-sm font-medium text-gray-400 mb-3">
                        Сумма пополнения
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm"> ₽ </span>
                        </div>
                        <input type="number" id="amount" name="amount" min="10" step="10" value="100"
                               class="block w-full pl-10 pr-12 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-amber-500 focus:border-amber-500 placeholder-gray-400"
                               placeholder="0.00">
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <span class="text-gray-400 px-3">RUB</span>
                        </div>
                    </div>
                    <div class="mt-2 flex justify-between text-xs text-gray-500">
                        <span>Минимум: 10 ₽</span>
                        <span>Шаг: 10 ₽</span>
                    </div>
                </div>

                <!-- Методы оплаты -->
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-400 mb-3">
                        Способ оплаты
                    </label>
                    
                    <div class="space-y-3">
                        <!-- СБП -->
                        <div class="group">
                            <input id="sbp" name="payment_method" type="radio" value="sbp" class="hidden peer" checked>
                            <label for="sbp" class="flex items-center p-4 bg-gray-700/50 border border-gray-700 rounded-lg cursor-pointer peer-checked:border-amber-500 peer-checked:bg-gray-700 group-hover:bg-gray-700 transition-all">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-blue-600 rounded-lg">
                                    <img src="https://qr.nspk.ru/proxyapp/logo.png" alt="СБП" class="h-5">
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-white font-medium">Система быстрых платежей</h3>
                                    <p class="text-xs text-gray-400">Мгновенное зачисление</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-auto h-5 w-5 text-transparent peer-checked:text-amber-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>

                        <!-- Банковская карта -->
                        <div class="group">
                            <input id="card" name="payment_method" type="radio" value="card" class="hidden peer">
                            <label for="card" class="flex items-center p-4 bg-gray-700/50 border border-gray-700 rounded-lg cursor-pointer peer-checked:border-amber-500 peer-checked:bg-gray-700 group-hover:bg-gray-700 transition-all">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-purple-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-white font-medium">Банковская карта</h3>
                                    <p class="text-xs text-gray-400">Visa, Mastercard, Мир</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-auto h-5 w-5 text-transparent peer-checked:text-amber-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>

                        <!-- Криптовалюта (пример) -->
                        <div class="group">
                            <input id="crypto" name="payment_method" type="radio" value="crypto" class="hidden peer">
                            <label for="crypto" class="flex items-center p-4 bg-gray-700/50 border border-gray-700 rounded-lg cursor-pointer peer-checked:border-amber-500 peer-checked:bg-gray-700 group-hover:bg-gray-700 transition-all">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-yellow-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-white font-medium">Криптовалюта</h3>
                                    <p class="text-xs text-gray-400">Bitcoin, Ethereum, USDT</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-auto h-5 w-5 text-transparent peer-checked:text-amber-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Кнопка оплаты -->
                <button type="submit" class="w-full group relative flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 shadow-lg shadow-amber-500/20 hover:shadow-amber-500/30 transition-all">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-200 group-hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Перейти к оплате
                    <span class="absolute right-0 inset-y-0 flex items-center pr-3 text-amber-200 group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>

@include('footer')
@endsection