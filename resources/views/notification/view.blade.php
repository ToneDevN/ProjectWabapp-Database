<x-app-layout>
    <link href="http://127.0.0.1:8000/css/enrollwork.css" rel="stylesheet">
    <div class="container" >
    <style>
        body{
            background-color: #E5F0FF;
        }

    </style>
     <div class="distance_top"></div>
     <iframe src="{{$usere->resume}}" width="550" height="1000"></iframe>

    @foreach ($Response as $ans)
        <br>
        {{$ans->Question->Question}}<br>
        @if ($ans->answer==1)
            Yes<br>
        @else
            No<br>
        @endif


    @endforeach
    @if($usere->notification==1)
            ผ่าน
        @elseif($usere->notification==2)
            ไม่ผ่าน
        @endif

</x-app-layout>
