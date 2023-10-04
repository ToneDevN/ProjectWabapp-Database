<div>
    <div class="bg-gradient"></div>
    <div class="flex justify-center">
        <a href="">
            @isset($user->image)
            <img src="{{ asset('profile/' . $user->idUser . '.jpg') }}" alt="" class="rounded-full img-user ">
            @endisset
            @empty($user->image)
                <img src="{{ url('../images/ProfileUserIcon.jpg') }}" alt="" class="rounded-full img-user ">
            @endempty
        </a>
    </div>
    <h1 class="text-4xl md:text-3xl font-semibold flex justify-center m-6">{{ $user->name }}</h1>
</div>
