<!-- resources/views/cases/case1.blade.php -->

@extends('layouts.app')
@include('header')
@section('content')
  <div class="container mx-auto py-8">
    <h2 class="text-3xl font-semibold text-center mb-6">Кейс №1: Super Game Case</h2>

    <div class="flex justify-center mb-8">
      <img src="{{ asset('storage/cases/case1.jpg') }}" alt="Super Game Case" class="w-full max-w-md rounded-lg shadow-lg">
    </div>

    <div class="text-lg text-gray-800">
      <p class="mb-4"><strong>Описание:</strong> Этот кейс содержит эксклюзивные бонусы для игры, которые дадут вам преимущество в игре.</p>
      <p class="mb-4"><strong>Цена:</strong> 2999₽</p>
      <p class="mb-4"><strong>Особенности:</strong> Лимитированная серия, эксклюзивный контент, скидки на другие игры.</p>
    </div>

    <div class="mt-6 text-center">
      <a href="{{ route('case.buy', ['caseId' => 1]) }}" class="px-6 py-3 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">
        Купить кейс
      </a>
    </div>
  </div>
  <footer id="footer" class="bg-gray-800 text-white py-8">
    @include('footer')
</footer>
@endsection
