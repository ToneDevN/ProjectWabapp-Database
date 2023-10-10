@extends('layouts.adminpage')
<link href="http://127.0.0.1:8000/css/admin.css" rel="stylesheet">
<link rel="stylesheet" href="{{ url('../css/main.css') }}">
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

@section('content')
<style>
    .menu ul li a#post {
    background-color: #4869D9;
    color: #fff;
}
.bt-save:hover{
    background-color: #e30b0b;
}
button#e{
    color: #fff;
    background-color: #4869D9
}

</style>
<script>
    function myFunction($id) {
        window.location.href = 'http://localhost:8000/deletepost/' + $id
    }
    function myFunction1() {
        window.location.href = 'http://127.0.0.1:8000/admin/post'
    }
</script>
<div class="container" style="width: 1000px">
    <h1 class="text-4xl font-semibold my-4">{{ $job->nameJob }}</h1>
    <div class="p-4">
        <div class="flex my-5">
            <div class="w-16 h-16 grid content-center border border-gray-200 rounded-md p-1">
                @if (@isset($job->Poser->User->image))
                    <img src="{{ asset('profile/' . $job->Poser->idUser . '.jpg') }}" alt=""
                        class="w-full auto rounded-full img-job">
                @else
                    <img src="{{ url('../images/ProfileUserIcon.jpg') }}" alt=""
                        class="w-full auto rounded-full img-job">
                @endif
            </div>
            <div class="flex self-center mx-4 font-medium text-lg ">
                <a href="" class="text-left underline underline-offset-1 mr-2">{{ $job->Poser->userOfficeName }}
                </a>
                <p>{{ $job->Poser->userOfficeAddress }}</p>
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

            </div>
            <button class="flex border border-gray-300 rounded-md w-full p-4 my-6">
                <div class="w-12 h-12 grid content-center ">
                    @if (@isset($job->Poser->User->image))
                        <img src="{{ asset('profile/' . $job->Poser->idUser . '.jpg') }}" alt=""
                            class="w-full auto rounded-full img-job">
                    @else
                        <img src="{{ url('../images/ProfileUserIcon.jpg') }}" alt=""
                            class="w-full auto rounded-full img-job">
                    @endif
                </div>
                <div class="flex self-center mx-4">
                    <p class="text-left text-xl  mr-2 font-semibold">{{ $job->Poser->userOfficeName }}</p>
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
        <button onclick="myFunction({{$job->idJobInfo}})"
            class="border rounded-md h-12 w-full text-lg font-semibold bt-save hover:text-white"
            >
            delete
        </button>

        <button onclick="myFunction1()" class="border rounded-md h-12 w-full text-lg font-semibold hover:text-white" id="e">ย้อนกลับ</button>
    </form>
</div>

