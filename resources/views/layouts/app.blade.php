<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"> <!-- Подключаем стили -->
</head>
<body class="bg-gray-100">
    @yield('content') <!-- Содержимое страницы будет вставляться сюда -->

    <script src="{{ mix('js/app.js') }}"></script> <!-- Подключаем скрипты -->
</body>
</html>
