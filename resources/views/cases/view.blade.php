@extends('layouts.app')

@section('content')
  <div class="container mx-auto py-8">
    <h2 class="text-3xl font-semibold text-center mb-6">{{ $case->title }}</h2>
    
    <div class="flex justify-center">
      <img src="{{ $case->image_url }}" alt="{{ $case->title }}" class="w-full max-w-md rounded-lg shadow-lg">
    </div>

    <div class="mt-8 text-lg text-gray-800">
      <p class="mb-4"><strong>Описание:</strong> {{ $case->description }}</p>
      <p class="mb-4"><strong>Цена:</strong> {{ $case->price }}₽</p>
      <p class="mb-4"><strong>Особенности:</strong> {{ $case->features }}</p>
    </div>

    <!-- Кнопка для покупки или других действий -->
    <div class="mt-6 text-center">
      <a href="{{ route('case.buy', ['caseId' => $case->id]) }}" class="px-6 py-3 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">
        Купить кейс
      </a>
    </div>
  </div>
@endsection
