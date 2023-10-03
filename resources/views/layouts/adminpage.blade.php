<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('../css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link href="http://127.0.0.1:8000/css/adminnav.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>
<body>
    <div class="min-h-screen ">
        <header id="nav" class="bg-white">
            <nav class="flex px-10 py-2 border-b-2">
                <div class="w-full flex flex-wrap items-center justify-between">
                    <a href="" class="flex-none">
                        <img class="logo" src="{{ url('../images/logo.png') }}" alt="5" width="150">
                    </a>
                    <div class="http://127.0.0.1:8000/admin">
                        <x-adminnav />
                    </div>
                </div>
            </nav>
        </header>

        <div class="block">

            <div class="distance">
            <div class="menu">

                <!-- เมนูฝั่งซ้าย -->
                <ul>
                    <li>
                        <a href="http://127.0.0.1:8000/admin" class="active" id="dashboard";>
                            <span class="material-symbols-outlined">speed</span>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://127.0.0.1:8000/adminUser" class="active" id="user">
                            <span class="material-symbols-outlined">person</span>
                            <p>Users</p>
                        </a>
                    </li>
                    <li><a href="http://127.0.0.1:8000/admin/post" class="active" id="post">
                            <span class="material-symbols-outlined">list_alt</span>
                            <p>Post</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://127.0.0.1:8000/admin/category" class="active" id="category">
                            <span class="material-symbols-outlined">sell</span>
                            <p>Category</p>

                        </a>
                    </li>
                </ul>
            </div>
        </div>

            <div style="width:65%">
                @yield('content')
            </div>


        </div>
    </div>


</body>

</html>




