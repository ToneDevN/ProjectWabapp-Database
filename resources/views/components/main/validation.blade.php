<div>
    @if (auth()->user()->type == 'poser')
        
    @else
        <div class="flex content-center">
            @if (!@isset($varification))
                <a href="" class="flex text-ls text-yellow-500 place-self-center">
                    <span class="material-symbols-outlined h-7 place-self-center" style="font-size: 26px">warning</span>
                    <p class="px-3 no-underline hover:underline self-center">You have not varification.</p>
                </a>
            @endif
        </div>

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
