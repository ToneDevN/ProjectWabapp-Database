<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> @yield('title')</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="{{ url('/css/navigation.css')}}" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="bg-white border-gray-200 dark:bg-gray-900 ">
      <div class="w-full flex flex-wrap items-center justify-between mx-auto py-4">
        <a href="" class="flex-none">
          <img id="logo" src="{{url('../images/logo.png')}}" class="mr-3" width="200" height="400" alt="Findjob Logo" />
        </a>
        <div class="hidden w-full md:block md:w-auto " id="navbar-default">
          <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 ">
            <!-- Home -->
            <li>
              <button class="iconHome-button">
                <i class="material-icons" style="font-size:36px;">home</i><br>
                <p class="menu">Home
                <div class="underline"></div>
                </p>
              </button>
            </li>
            <!-- Notifications -->
            <li style="margin-left: 0px;">
              <button class="iconHome-button">
                <i class="material-icons" style="font-size:36px;">notifications</i><br>
                <p class="menu">Notifications</p>
              </button>
            </li>
            <!-- Profile -->
            <li style="margin-left: 0px;">
              <button class="iconHome-button">

                <img class="rounded-full w-9 h-9" src="{{url('../images/ProfileIcon.jpg')}}" alt="image description" id="ProfileIcon">
                <p class="menu">Me</p>
              </button>
            </li>

          </ul>
        </div>
      </div>
    </nav>

  </header>






  @yield('content')

</body>

</html>