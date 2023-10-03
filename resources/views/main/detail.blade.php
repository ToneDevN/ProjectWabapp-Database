@extends('layouts.mainPage')
@section('content')
    <div class="bg-white rounded-xl min-h-full p-4 px-12">
        @isset($job)
            <h1 class="text-4xl font-semibold my-4">{{ $job->nameJob }}</h1>


            <div class="p-4">
                <div class="flex my-4">
                    <div class="w-16 h-16 grid content-center border border-gray-200 rounded-md p-2"><img
                            src="{{ url('../images/google.png') }}" alt="" class="w-full auto"></div>
                    <div class="flex self-center mx-4 font-medium text-lg ">
                        <a href="" class="text-left underline underline-offset-1 mr-2">{{ $job->Poser->userOfficeName}}
                        </a>
                        <p>{{ $job->Poser->userOfficeAddress}}</p>
                    </div>
                </div>
                <div class="m-4">
                    <div class="flex my-4">
                        <span class="material-symbols-outlined" style="font-size: 2.5em">
                            business_center
                        </span>
                        <p class="self-center font-medium text-lg ml-6">{{ $job->workType }}</p>
                    </div>
                    <div class="flex my-4">
                        <span class="material-symbols-outlined" style="font-size: 2.5em">
                            location_city
                        </span>
                        <p class="self-center font-medium text-lg ml-6">{{ $job->jobType }}</p>
                    </div>
                    <div class="flex gap-4 w-full my-6">
                        <button class="colors-blue rounded-md h-12 w-1/2 text-white text-lg font-semibold">
                            Apply
                        </button>
                        <button
                            class="border borders-blue rounded-md h-12 w-1/2 text-lg font-semibold bt-save hover:text-white">
                            Save
                        </button>
                    </div>
                    <button class="flex border border-gray-300 rounded-md w-full p-4 my-6">
                        <div class="w-12 h-12 grid content-center"><img src="{{ url('../images/google.png') }}" alt=""
                                class="w-full auto"></div>
                        <div class="flex self-center mx-4">
                            <p class="text-left text-xl  mr-2 font-semibold">Google</p>
                        </div>
                    </button>
                    <div>
                        <h1 class="text-xl font-semibold">About the job</h1>
                        <div class="bg-gray-100 rounded-md p-4">
                            <p>{{ $job->discription }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endisset
@endsection
