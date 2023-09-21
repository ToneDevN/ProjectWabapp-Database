<x-app-layout>
    <link rel="stylesheet" href="{{ url('../css/main.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <div class="grid grid-cols-12 gap-6 h-full p-4 pt-8">
        <div class="col-start-2 col-span-3 bg-white rounded-xl container cards">
            <div class="bg-gradient"></div>
            <div class="flex justify-center">
                <a href=""><img src="{{ url('../images/ProfileUserIcon.jpg') }}" alt=""
                        class="rounded-full img-user hover:brightness-50"></a>
            </div>
            <h1 class="text-4xl font-semibold flex justify-center m-6">User</h1>
            <div class="m-4">
                <div>
                    <h1 class="text-2xl font-medium">Category</h1>
                    <div class="flex flex-wrap gap-4 p-1">
                        <button class="colors-blue category flex pl-3 text-lg my-4 rounded-lg text-white">category
                            <a href="" class="mx-2 mt-1"><span
                                    class="material-icons hover:text-red-500 hover:scale-110 rounded-full text-xl">close</span></a></button>

                    </div>
                </div>
                <div class="p-1 mb-4 grid gap-4">
                    <a href="" class="flex text-xl text-yellow-500 hover:scale-105"><span
                            class="material-symbols-outlined" style="font-size: 32px">warning</span>
                        <p class="px-3 no-underline hover:underline">You have not varification.</p>
                    </a>
                    <a href="" class="flex text-xl text-yellow-500 hover:scale-105"><span
                            class="material-symbols-outlined" style="font-size: 32px">warning</span>
                        <p class="px-3 no-underline hover:underline">You have not set Name & Address office.</p>
                    </a>
                </div>
                <div class="p-5 m-2 colors-blue h-96 rounded-lg">
                    <h1 class="text-2xl font-semibold text-white mb-8">Saved Job</h1>

                    <button
                        class="bg-slate-200 h-1/3 rounded-lg mb-4 p-4 w-full grid content-center hover:bg-slate-300">
                        <div class="flex gap-4">
                            <div class="w-16 h-16 grid content-center"><img src="{{ url('../images/google.png') }}"
                                    alt="" class="w-full auto"></div>
                            <div class="grid justify-items-start">
                                <p class="text-left font-semibold no-underline hover:underline">Supplier Quality
                                    Engineer, Optics,Google Cloud</p>
                                <span class=""><a href=""
                                        class="text-left text-sm no-underline hover:underline">Google
                                        Thailand</a></span>
                            </div>

                        </div>
                    </button>
                    <button
                        class="bg-slate-200 h-1/3 rounded-lg mb-4 p-4 w-full grid content-center hover:bg-slate-300">
                        <div class="flex gap-4">
                            <div class="w-16 h-16 grid content-center"><img src="{{ url('../images/google.png') }}"
                                    alt="" class="w-full auto"></div>
                            <div class="grid justify-items-start">
                                <p class="text-left font-semibold no-underline hover:underline">Supplier Quality
                                    Engineer, Optics,Google Cloud</p>
                                <span class=""><a href=""
                                        class="text-left text-sm no-underline hover:underline">Google
                                        Thailand</a></span>
                            </div>

                        </div>
                    </button>



                </div>
            </div>

        </div>
        <div class="col-start-5 col-span-7 h-screen rounded-xl ">
            <div class="colors-blue h-24 rounded-xl mb-4 grid content-center">
                <div class="flex justify-center place-items-center">
                    <img src="{{ url('../images/Compose.png') }}" alt="" class="w-16 h-14">
                    <h1 class="text-4xl text-white font-semibold">Post a job</h1>
                </div>
            </div>
            <div class="bg-white rounded-xl min-h-full p-4">

                <button class="h-2/5 mb-4 p-4 w-full grid content-center border-b-2 hover:bg-slate-200">
                    <div class="flex gap-6">
                        <div class="w-16 h-16 grid content-center"><img src="{{ url('../images/google.png') }}"
                                alt="" class="w-full auto"></div>
                        <div class="grid justify-items-start">
                            <p class="text-left font-semibold text-xl no-underline hover:underline">Supplier Quality
                                Engineer, Optics,Google Cloud</p>
                            <span>
                                <a href="" class="text-left text-lg no-underline hover:underline">Google
                                    Thailand</a>
                            </span>
                        </div>
                        <span><a href=""><span
                                class="material-icons rounded-full hover:bg-slate-600 ">bookmark</span></a></span>



                    </div>
                </button>


            </div>
        </div>
    </div>

</x-app-layout>
