
<div>
<form action="" role="search">
    <input wire:model="search" type="search" class="search input-search" name="search" id="" placeholder="Search">
</form>

@if(sizeof($job)>0)
<div class=" dropdown-search absolute z-10 mt-2 divide-y divide-gray-100 rounded-md shadow-lg "
    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
    <div class="p-4" role="none">
        @foreach ($job as $job)
        <button class="w-full grid content-center border-b-2 mb-2">
            <div class="grid justify-items-start px-2">
                <p class="text-left font-medium text-base no-underline">{{$job->nameJob}}</p>
                <span>
                    <a href="" class="text-left text-sm no-underline">{{$job->Poser->userOfficeName}}</a>
                </span>
            </div>
        </button>
        @endforeach
       
    </div>
</div>
@endif

</div>