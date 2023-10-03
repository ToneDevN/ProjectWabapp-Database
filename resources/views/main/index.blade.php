@extends('layouts.mainPage')
@section('content')
<script>
    function myFunction($id) {
        window.location.href = 'http://127.0.0.1:8000/detail/' + $id;
    }
</script>
    {{-- Header --}}
    <x-main.header />
    <div class="bg-white rounded-xl min-h-full p-4">
        {{-- Job --}}
        @isset($job)
            @foreach ($job as $job)
                <button class="h-2/5 mb-4 p-4 w-full grid content-center border-b-2 hover:bg-slate-200" onClick="myFunction({{ $job->idJobInfo }})"">
                    <div class="flex gap-6">
                        <div class="w-16 h-16 grid content-center"><img src="{{ asset('profile/' . $job->Poser->idUser . '.jpg') }}" alt=""
                                class="w-full auto rounded-full img-poser"></div>
                        <div class="grid justify-items-start">
                            <p class="text-left font-semibold text-xl no-underline hover:underline">{{$job->nameJob}}</p>
                            <span>
                                <a href="" class="text-left text-lg no-underline hover:underline">{{$job->Poser->userOfficeName}}</a>
                                {{$job->Poser->userOfficeAddress}}
                            </span>
                        </div>
                        <span><a href=""><span
                                    class="material-icons rounded-full hover:bg-slate-600 ">bookmark</span></a></span>
                    </div>
                </button>
        @endforeach
    @endisset
    </div>
@endsection
