<x-app-layout>
    <link href="http://127.0.0.1:8000/css/enrollwork.css" rel="stylesheet">

        <style>
            body {
                background-color: #E5F0FF;
            }
        </style>
        <script>
            function myFunction($user,$job) {
                window.location.href = 'http://127.0.0.1:8000/noti/' + $user+"/"+$job;
            }
        </script>

        <div class="container m-4" style="margin-top: 1em">

        @foreach ($res as $res)
            <button class="h-2/5 mb-4 p-4 w-full grid content-center border-b-2 hover:bg-slate-200" onClick="myFunction({{ $res->idUser }},{{$res->idJobInfo}})">
            <div class="flex gap-6">
                <div class="w-16 h-16 grid content-center"><img src="{{ asset('profile/' . $res->idUser . '.jpg') }}" alt="You didn't Set Proflie"
                    ></div>
                <div class="grid justify-items-start">
                    <p class="text-left font-semibold text-xl no-underline hover:underline">
                        you sent the resume to <strong>{{ $res->Jobinfo->nameJob }}</strong></p>
            </button>
        @endforeach</div>

</x-app-layout>
