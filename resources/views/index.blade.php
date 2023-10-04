<x-guest-layout>
    {{-- Header --}}
    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

    {{-- Content --}}
    <div class="bg-white rounded-xl min-h-full p-4">
        {{-- Job --}}
        @isset($job)
            @foreach ($job as $job)
                <button class="h-2/5 mb-4 p-4 w-full grid content-center border-b-2 hover:bg-slate-200"
                    onClick="myFunction({{ $job->idJobInfo }})"">
                    <div class="flex gap-6">
                        <div class="w-16 h-16 grid content-center">
                            @if (@isset($job->Poser->User->image))
                                <img src="{{ asset('profile/' . $job->Poser->idUser . '.jpg') }}" alt=""
                                    class="w-full auto rounded-full img-poser">
                            @else
                                <img src="{{ url('../images/ProfileUserIcon.jpg') }}" alt=""
                                    class="w-full auto rounded-full img-poser">
                            @endif
                        </div>
                        <div class="grid justify-items-start">
                            <p class="text-left font-semibold text-xl no-underline hover:underline">{{ $job->nameJob }}</p>
                            <span>
                                <a href=""
                                    class="text-left text-lg no-underline hover:underline">{{ $job->Poser->userOfficeName }}</a>
                                {{ $job->Poser->userOfficeAddress }}
                            </span>
                        </div>
                    </div>
                </button>
            @endforeach
        @endisset
    </div>

</x-guest-laout>
