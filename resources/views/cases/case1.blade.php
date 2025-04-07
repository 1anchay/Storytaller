@extends('layouts.app')
@include('header')
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@1.0.6/outline/index.js"></script>
  </head>
@section('content')
<div class="min-h-screen flex flex-col">
  <div class="flex-grow container mx-auto py-12">
    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-lg p-8 border border-gray-200">
      <h2 class="text-4xl font-bold text-center text-gray-800 mb-6">Кейс №1: <span class="text-yellow-500">Super Game Case</span></h2>

      {{-- Картинка кейса --}}
      <div class="flex justify-center mb-6">
        <img src="{{ asset('storage/cases/case1.jpg') }}" alt="Super Game Case" class="w-64 h-auto rounded shadow">
      </div>

      {{-- Описание --}}
      <div class="text-gray-700 text-lg mb-6">
        <p class="mb-2"><strong>Описание:</strong> Эксклюзивный кейс с лимитированными внутриигровыми предметами и уникальными бонусами.</p>
        <p class="mb-2"><strong>Цена:</strong> <span class="text-yellow-500 font-semibold">2999₽</span></p>
        <p><strong>Особенности:</strong> Лимитированная серия, эксклюзивный контент, скидки на будущие кейсы.</p>
      </div>

      {{-- Прокрутка и стрелка --}}
      <div class="relative mb-8">
        {{-- Стильная стрелка (Heroicon) --}}
        <div class="absolute left-1/2 transform -translate-x-1/2 -top-6 z-20 text-yellow-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 animate-bounce" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a1 1 0 01-1-1V4.414L5.707 7.707a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L11 4.414V17a1 1 0 01-1 1z" clip-rule="evenodd" />
          </svg>
        </div>

        {{-- Лента со скинами --}}
        <div id="case-roller" class="overflow-hidden w-full relative h-40 border-2 border-yellow-400 rounded-lg bg-gray-900 shadow-inner">
          <div id="roller-track" class="flex transition-transform ease-in-out duration-1000">
            <!-- Скины появятся из JS -->
          </div>
        </div>
      </div>

      {{-- Кнопка купить --}}
      <div class="text-center">
        <button id="buy-btn" class="px-8 py-3 bg-yellow-500 text-gray-900 font-bold rounded hover:bg-yellow-400 transition">
          Открыть кейс
        </button>
      </div>
    </div>
  </div>

  {{-- Модалка дропа --}}
  <div id="drop-modal" class="fixed inset-0 bg-black bg-opacity-60 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-sm text-center shadow-lg animate__animated animate__fadeInDown">
      <h3 class="text-2xl font-bold text-yellow-500 mb-4">🎉 Вы выиграли!</h3>
      <img id="drop-image" src="" alt="Скин" class="mx-auto mb-3 w-40 h-32 object-contain rounded shadow">
      <p id="drop-name" class="text-lg font-semibold text-gray-800 mb-5"></p>
      <button id="close-modal" class="px-5 py-2 bg-yellow-500 text-gray-900 font-semibold rounded hover:bg-yellow-400">
        Забрать
      </button>
    </div>
  </div>

  {{-- Футер прижатый к низу --}}
  <footer class="bg-gray-800 text-white py-6 mt-auto">
    @include('footer')
  </footer>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
  #roller-track img {
    border-radius: 8px;
    background: #2d3748;
  }

  #case-roller::before {
    content: '';
    position: absolute;
    top: 0; bottom: 0;
    left: 50%;
    width: 2px;
    background-color: #facc15;
    transform: translateX(-50%);
    z-index: 10;
  }
</style>
@endpush

@push('scripts')
<script>
  const skins = [
    { name: "AK-47 | Redline", image: "/storage/skins/ak_redline.png" },
    { name: "AWP | Asiimov", image: "/storage/skins/awp_asiimov.png" },
    { name: "M4A4 | Howl", image: "/storage/skins/m4a4_howl.png" },
    { name: "USP-S | Kill Confirmed", image: "/storage/skins/usp_kill.png" },
    { name: "Desert Eagle | Blaze", image: "/storage/skins/deagle_blaze.png" },
    { name: "Glock-18 | Fade", image: "/storage/skins/glock_fade.png" },
    { name: "AK-47 | Gold Arabesque", image: "/storage/skins/ak_gold.png" },
  ];

  let droppedSkin = null;

  function renderSkins() {
    const track = document.getElementById('roller-track');
    track.innerHTML = '';

    for (let i = 0; i < 60; i++) {
      const skin = skins[Math.floor(Math.random() * skins.length)];
      const skinDiv = document.createElement('div');
      skinDiv.className = 'w-32 h-32 flex-shrink-0 flex flex-col items-center justify-center p-2';
      skinDiv.innerHTML = `
        <img src="${skin.image}" class="w-full h-24 object-contain mb-1" />
        <span class="text-xs text-white text-center">${skin.name}</span>
      `;
      track.appendChild(skinDiv);

      if (i === 30) droppedSkin = skin;
    }
  }

  function rollCase() {
    renderSkins();
    const track = document.getElementById('roller-track');
    const itemWidth = 128;
    const offset = 30;
    const overspin = Math.floor(Math.random() * 10 + 5);
    const totalShift = (offset + overspin) * itemWidth;

    track.style.transition = 'transform 5.5s cubic-bezier(0.25, 0.8, 0.25, 1)';
    track.style.transform = `translateX(-${totalShift - 320}px)`;

    setTimeout(() => {
      showModal(droppedSkin);
    }, 5600);
  }

  function showModal(skin) {
    document.getElementById('drop-image').src = skin.image;
    document.getElementById('drop-name').textContent = skin.name;
    document.getElementById('drop-modal').classList.remove('hidden');
    document.getElementById('drop-modal').classList.add('flex');
  }

  function closeModal() {
    document.getElementById('drop-modal').classList.remove('flex');
    document.getElementById('drop-modal').classList.add('hidden');
  }

  document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('buy-btn').addEventListener('click', rollCase);
    document.getElementById('close-modal').addEventListener('click', closeModal);
  });
</script>
@endpush
