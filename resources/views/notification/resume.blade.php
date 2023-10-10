<x-app-layout>
    <link rel="stylesheet" href="{{ url('../css/main.css') }}">
    <link href="http://127.0.0.1:8000/css/enrollwork.css" rel="stylesheet">
    <div class="container" >
    <style>
        body{
            background-color: #E5F0FF;
        }

.bt-save:hover{
    background-color: #e30b0b;
}
    </style>
     <div class="distance_top"></div>
     <iframe src="{{$usere->resume}}" width="550" height="1000"></iframe>

    @foreach ($ans as $ans)
    @if($usere->idUser==$ans->idUser && $usere->idJobInfo==$ans->idJobInfo)
        {{$ans->Questions->Question}}<br>
        @if ($ans->answer==1)
            Yes<br>
        @else
            No<br>
        @endif
    @endif
    @endforeach
    @if($usere->notification==0)
    <div class="flex gap-4 w-full my-6">
        <form  action="{{ route('fix.noti')}}" method='post'>
            @csrf
            <input type="hidden" name="noti" value=1>
            <input type="hidden" name="user" value='{{$usere->idUser}}'>
            <input type="hidden" name="job" value='{{$usere->idJobInfo}}'>
            <button type="submit" name="idjob"
                class="colors-blue rounded-md h-12 w-full text-white text-lg font-semibold" >
                Accept
            </button>
        </form>
        <form  action="{{ route('fix.noti') }}" method='post'>
            @csrf
            <input type="hidden" name="noti" value=2>
            <input type="hidden" name="user" value='{{$usere->idUser}}'>
            <input type="hidden" name="job" value='{{$usere->idJobInfo}}'>
            <button name="saveFavorite" type="submit"
                class="border rounded-md h-12 w-full text-lg font-semibold bt-save hover:text-white"
                >
                Cancel
            </button>
        </form>
    @endif
    </div>
 </x-app-layout>
