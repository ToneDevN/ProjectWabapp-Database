<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
  
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <style>
        body {
            background-color: #e5f0ff;
        }
        .block{
            display: flex;
            gap: 20px;
        }
        .menu {
            background-color: #fff; 
            color: #4869D9; 
            width: 250px;
            height: 300px; 
            padding: 20px;
            border-radius: 10px;
            margin-left: 50px;
            margin-top: 20px;
        }
        .menu ul {
            list-style-type: none;
            padding: 0;
        }
        .menu ul li {
            margin-bottom: 10px;
        }
        
        .menu ul li a {
            
            text-decoration: none;
            color: #4869D9; 
            font-weight: bold;
            display: block; 
            padding: 5px;
            transition: background-color 0.3s, color 0.3s; 
            border-radius: 10px;
        }
        .menu ul li a:hover {
            background-color: #4869D9; 
            color: #fff; 
        }

       
        .menu ul li a:not(.active) {
            color: #4869D9; 
        }
        .menu ul li a .material-symbols-outlined {
    margin-right: 10px; /* ระยะห่างระหว่างไอคอนและข้อความ */
}
 
        .content {
            display: inline;
            width: 1000px;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid #fff;
            border-radius: 10px;
            background-color: #fff;
        }

    </style>
</head>
<body>
<div class="block">
    <div class="menu">
        <!-- เมนูฝั่งซ้าย -->
        <ul>
            <li>
                <a href="#" class="active">
                    <span class="material-symbols-outlined">speed</span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="active">
                    <span class="material-symbols-outlined">person</span>
                    Users
                </a>
            </li>
            <li><a href="#" class="active">
                <span class="material-symbols-outlined">list_alt</span>
                Post
                </a>
            </li>
            <li><a href="#" class="active">
                <span class="material-symbols-outlined">sell</span>
                Category
                </a>
            </li>
        </ul>
    </div>
   
    <div class="content">
        Wellcome To Hell
        @yield('content')
    </div>

</div>

</body>
</html>
</x-app-layout>