@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
        @foreach ($cases as $case)
            <div class="case-card bg-gray-800 p-5 rounded-xl shadow-2xl hover:scale-105 transform transition duration-300">
                <img src="{{ asset('storage/'.$case->image) }}" alt="{{ $case->name }}" class="w-full h-44 object-cover rounded-lg mb-4">
                <h3 class="text-xl text-white font-semibold mb-2">{{ $case->name }}</h3>
                <p class="text-gray-300 text-sm mb-2">{{ $case->description }}</p>
                <p class="text-yellow-400 font-bold mb-4">Цена: {{ $case->price }}₽</p>
                <a href="{{ url('/cases/'.$case->id) }}" class="w-full py-2 bg-yellow-500 text-gray-900 font-semibold rounded-md hover:bg-yellow-400">Открыть кейс</a>
            </div>
        @endforeach
    </div>
@endsection
