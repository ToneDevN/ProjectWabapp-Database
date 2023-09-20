@extends('layouts.adminpage')

@section('content')
<style>
    .menu ul li a#dashboard {
    background-color: #4869D9;
    color: #fff;
}
    div#home{background-color: #4869D9;
    color: #fff;
    width: 10em;
    height: 10em;
    padding: 20px;
    border-radius: 10px;
    margin-left: 40px;
    margin-right: 40px;
    margin-top: 20px;
    }
    #container{
        display: flex;
        flex-direction: row;
    }
    div#home h3,div#home p{
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center
    }
</style>
<div id='container'>
<a href="http://127.0.0.1:8000/admin/user"><div id='home'><img class="logo" src="{{ url('../images/windows_xp_background.jpg') }}"><h3>{{$countuser}}</h3><p>User</p></div></a>
<a href="http://127.0.0.1:8000/admin/post"><div id='home'><img class="logo" src="{{ url('../images/windows_xp_background.jpg') }}"><h3>{{$countpost}}</h3><p>Poser</p></div></a>
<a><div id='home'><img class="logo" src="{{ url('../images/windows_xp_background.jpg') }}"><h3>{{$countinfo}}</h3><p>Posts</p></div></a>
</div>
@endsection
