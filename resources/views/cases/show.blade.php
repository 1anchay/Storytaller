@extends('layouts.app')

@section('content')
    <div class="case-detail bg-gray-800 p-6 rounded-xl shadow-xl max-w-2xl mx-auto">
        <h1 class="text-4xl text-yellow-400 font-bold mb-4">{{ $case->name }}</h1>
        <img src="{{ asset('storage/'.$case->image) }}" alt="{{ $case->name }}" class="w-full h-64 object-cover rounded-lg mb-4">
        <p class="text-gray-300 text-lg mb-4">{{ $case->description }}</p>
        <p class="text-yellow-400 font-bold text-2xl mb-4">Цена: {{ $case->price }}₽</p>
        <a href="#" class="py-2 px-4 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Купить</a>
    </div>
@endsection
