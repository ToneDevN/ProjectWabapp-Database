<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{url('/css/navigation.css')}}">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <livewire:styles />
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen ">
            <header class="bg-white">
                <nav class="flex px-10 py-2 border-b-2">
                    <div class="w-full flex flex-wrap items-center justify-between">
                        <a href="" class="flex-none">
                            <img class="logo" src="{{url('../images/logo.png')}}" alt="" width="150px">
                        </a>
                        <div class="form-search">
                            @livewire('search')
                        </div>
                        <div class="">
                            <x-navigation/>

                        </div>
                    </div>

                </nav>
            </header>
            <!-- Page Content -->
            {{ $slot }}
        </div>
        <livewire:scripts />
    </body>
</html>
