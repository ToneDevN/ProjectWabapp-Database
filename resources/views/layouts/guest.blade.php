<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ url('../css/auth.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
        <a href="">
            <img class="logo" src="{{ url('../images/logo.png') }}" alt="FindJob">
        </a>

    <div class="h-screen flex items-center justify-center ">
        {{ $slot }}
    </div>

</body>

</html>
