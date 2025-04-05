<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LootKases</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-black text-white">
    @include('header') <!-- Вставляем хедер -->

    <div class="px-6 py-16 text-center">
        <h1 class="text-4xl text-white">Welcome to LootKases</h1>
        <p class="text-xl text-gray-400">Your gateway to amazing loot!</p>
    </div>

    <script src="{{ mix('js/app.js') }}" defer></script> <!-- Подключаем скомпилированный JS -->
    <script src="{{ mix('js/header.js') }}" defer></script> <!-- Подключаем кастомный JS для хедера -->
</body>
</html>
