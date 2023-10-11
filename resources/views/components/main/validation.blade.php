<div>
    @if (auth()->user()->type == 'poser')
        <div class="w-full h-12 colors-blue flex rounded-md">
            <a href="" class="flex text-ls text-white place-self-center">
                <span class="material-symbols-outlined h-12 place-self-center justify-self-start" style="font-size: 48px">Done</span>
                <p class="px-3 no-underline hover:underline self-center text-xl font-semibold ">Verified</p>
            </a>
        </div>
    @else
        <div>
            @if (!@isset($officeName) or !@isset($officeAddress))
                <a href="" class="flex text-ls text-yellow-500 ">
                    <span class="material-symbols-outlined material-symbols-outlined h-7 place-self-center"
                        style="font-size: 26px">warning</span>
                    <p class="px-3 no-underline hover:underline self-center">You have not set Name & Address office.</p>
                </a>
            @endif


        </div>

    @endif



</div>
