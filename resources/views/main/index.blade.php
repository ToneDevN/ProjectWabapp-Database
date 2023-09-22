@extends('layouts.mainPage')
@section('content')
    {{-- Header --}}
    <x-main.header />
    <div class="bg-white rounded-xl min-h-full p-4">
        {{-- Job --}}
        <x-main.job />
    </div>
@endsection
