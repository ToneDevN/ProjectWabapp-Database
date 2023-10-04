<div>
    <h1 class="text-3xl md:text-2xl font-semibold">Category</h1>
    <div class="flex flex-wrap gap-2 p-1 my-4">
        @isset($tag)
            @foreach ($tag as $tag)
                <button class="colors-blue category flex pl-3 text-lg my-1 rounded-lg text-white justify-center">
                    <p class="self-center">{{ $tag->tag->tag }}</p>
                    <a href="" class="mx-2 mt-1"><span
                            class="material-icons hover:text-red-500 hover:scale-110 rounded-full text-xl">close</span></a>
                </button>
            @endforeach
        @endisset


    </div>
</div>
