<div>
    <div class="p-5 m-2 bg-blue h-max rounded-lg flex flex-wrap">
        <h1 class="text-2xl font-semibold text-white mb-5">Saved Job</h1>
        @isset($favorites)
            @foreach ($favorites as $favorite)
            <form method="GET" action="{{ route('user.detail', ['id' => $favorite->idJobInfo ]) }}" class="w-full">
                @csrf
                <button class="bg-slate-200 rounded-lg mb-4 p-4 w-full  grid content-center hover:bg-slate-300">
                    <div class="flex gap-4">
                        <div class="w-max h-max grid content-center">
                            @if (@isset($favorite->Poser->User->image))
                                <img src="{{ asset('profile/' . $job->Poser->idUser . '.jpg') }}" alt=""
                                    class="w-full auto rounded-full img-poser">
                            @else
                                <img src="{{ url('../images/ProfileUserIcon.jpg') }}" alt=""
                                    class="w-full auto rounded-full img-poser">
                            @endif
                        </div>
                        <div class="grid justify-items-start">
                            <p class="text-left font-semibold md:text-sm no-underline hover:underline">
                                {{ $favorite->JobInfo->nameJob }}
                            </p>
                            <span class=""><a href=""
                                    class="text-left text-sm md:text-xs no-underline hover:underline">
                                    {{ $favorite->JobInfo->Poser->userOfficeAddress }}
                                </a></span>
                        </div>
                    </div>
                </button>
            </form>
            @endforeach
        @endisset

    </div>
</div>
