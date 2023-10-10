<x-app-layout>
    <link rel="stylesheet" href="{{ url('../css/main.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <div class="grid grid-cols-12 gap-6 h-screen  p-4 pt-8">
        <div class="col-start-2 col-span-3 bg-white rounded-xl cards ">
            <x-main.user/>
            <div class="m-4">
                <div>
                    {{-- Category --}}
                    <x-main.category/>
                </div>
                <div class="p-2 mb-4 grid gap-4">
                   {{-- validation --}}
                   <x-main.validation/>
                </div>
                <div>
                    {{-- Favorite --}}
                    <x-main.favorite/>
                </div>
            </div>

        </div>
        <div class="col-start-5 col-span-7 h-screen rounded-xl ">
            @yield('content')
        </div>
    </div>

</x-app-layout>
