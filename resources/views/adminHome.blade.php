@extends('layouts.adminpage')
<link href="http://127.0.0.1:8000/css/admin.css" rel="stylesheet">
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
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    }
    #container{
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    div#home h3,div#home p{
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center
    }
    #icon {
    font-size: 5em;
    margin-left: 20px;
}
</style>
<div class="container">
<div id='container' >
<a href="http://127.0.0.1:8000/adminUser">
    <div id='home'>
        <span id="icon"  class="material-symbols-outlined">person</span><br>
        <h3>{{$countuser}}</h3>
        User
    </div>
</a>
<a href="http://127.0.0.1:8000/admin/post">
    <div id='home'>
        <span id="icon"  class="material-symbols-outlined">list_alt</span><br>
        <h3>{{$countpost}}</h3>
        Posts
    </div>
</a>
<a href="http://127.0.0.1:8000/admin/category">
    <div id='home'>
        <span id="icon" class="material-symbols-outlined">sell</span><br>
        <h3>{{$counttag}}</h3>
        Category
    </div>
</a>

</div>
</div>

@endsection
