<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPage</title>
  
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!--Bootstrap -->
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->

    <style>


        /* พื้นหลังของเว็บ */
        body {
            background-color: #e5f0ff; /* เปลี่ยนสีพื้นหลังของเว็บเป็นสีฟ้าอ่อน */
        }
        /* เมนูทางฝั่งซ้าย */
        .sidebar {
            background-color: #fff; /* เปลี่ยนสีพื้นหลังเมนูเป็นสีขาว */
            color: #4869D9; /* เปลี่ยนสีของตัวอักษรในเมนูเป็นสีฟ้า */
            width: 250px;
            height: 500px;
            padding: 20px;
            border-radius: 10px;
            margin-left: 2cm;
            margin-top: 1cm;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        /* สำหรับลิงก์ในเมนู */
        .sidebar ul li a {
            text-decoration: none;
            color: #4869D9; /* เปลี่ยนสีของตัวอักษรในเมนูเป็นสีฟ้า */
            font-weight: bold;
            display: block; /* ให้ลิงก์เต็มพื้นที่ของพ่อคู่มือ */
            padding: 5px; /* เพิ่ม padding สำหรับพื้นที่สัมผัส */
            transition: background-color 0.3s, color 0.3s; /* เพิ่มการเปลี่ยนสีพื้นหลังและสีตัวอักษรเมื่อโฮเวอร์ */
            border-radius: 10px;
            
        }
        .sidebar ul li a:hover {
            background-color: #4869D9; /* เปลี่ยนสีพื้นหลังเมื่อโฮเวอร์เป็นสีฟ้า */
            color: #fff; /* เปลี่ยนสีตัวอักษรเป็นสีขาว */
        }

        /* สำหรับลิงก์ที่ไม่ได้กด */
        .sidebar ul li a:not(.active) {
            color: #4869D9; /* เปลี่ยนสีของลิงก์ที่ไม่ได้กดเป็นสีฟ้า */
        }

        /* สำหรับเนื้อหาหน้าเว็บ */
        .content {
            padding: 20px;
        }

    </style>
</head>
<body>
 
    <div class="sidebar">
        <!--Bootstrap สำหรับเมนู -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span class="material-symbols-outlined">speed</span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span class="material-symbols-outlined">person</span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span class="material-symbols-outlined">list_alt</span>
                    Post
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span class="material-symbols-outlined">sell</span>
                    Category
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <!-- เนื้อหาหน้าเว็บ -->
        @yield('content')
    </div>

    
</body>
</html>
</x-app-layout>
