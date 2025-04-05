@extends('layouts.app')

@section('content')
  <div class="container mx-auto py-8">
    <h2 class="text-3xl font-semibold text-center mb-6">{{ $gameCase->name }}</h2>
    
    <div class="flex justify-center">
      <!-- Используем правильный путь к изображению -->
      <img src="{{ asset('storage/cases/' . $gameCase->image) }}" alt="{{ $gameCase->name }}" class="w-full max-w-md rounded-lg shadow-lg">
    </div>

    <div class="mt-8 text-lg text-gray-800">
      <p class="mb-4"><strong>Описание:</strong> {{ $gameCase->description }}</p>
      <p class="mb-4"><strong>Цена:</strong> {{ $gameCase->price }}₽</p>
      <p class="mb-4"><strong>Особенности:</strong> {{ $gameCase->features ?? 'Не указаны' }}</p>  <!-- Если features нет, будет выведено 'Не указаны' -->
    </div>

    <!-- Кнопка для покупки или других действий -->
    <div class="mt-6 text-center">
      <a href="{{ route('case.buy', ['caseId' => $gameCase->id]) }}" class="px-6 py-3 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">
        Купить кейс
      </a>
    </div>
  </div>
@endsection
