@extends('layouts.adminpage')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
 <link href="http://127.0.0.1:8000/css/admin.css" rel="stylesheet">
 <style>
    .menu ul li a#user {
    background-color: #4869D9;
    color: #fff;
}
 </style>
 <script>
    function confirmDelete(idUser) {
        if (confirm("Are you sure you want to delete this?")) {
            window.location.href = '/admin/delete?idUser=' + idUser;
        }else{
            event.preventDefault();
            alert("Delete canceled.");
        }
    }
</script>

@section('content')

<div class="container">

<div class="search-bar">
    <form action="{{ route('searchUser') }}" method="GET">
        <input type="text" name="search" placeholder="Search">
    </form>
</div>

<table class="table">
    <h1 id="table">User</h1>
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
           <td>
            <div class="user-info" style="margin-bottom: 20px;">
                <div class="profile-image-container">
                    @if (file_exists(public_path("profile/{$user->idUser}.jpg")))
                    <img src="{{ asset("profile/{$user->idUser}.jpg") }}" alt="No Profile" class="profile-image">
                     @elseif (file_exists(public_path("profile/{$user->idUser}.png")))
                     <img src="{{ asset("profile/{$user->idUser}.png") }}" alt="No Profile" class="profile-image">
                     @else
                     <img src="{{ asset('profile/no-profile.jpg') }}" alt="No Profile" class="profile-image"> {{-- Use a default image --}}
                     @endif
                </div>
            </div>
           </td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>
                <button id="delete" type="button" class="btn btn-danger">
                    <a href="{{ route('delete',$user->idUser)}}" onclick="confirmDelete('{{ $user->idUser }}')">Delete</a>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <table class="table">
        <h1 id="table">Poser</h1>
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posers as $poser)
            <tr>
                <td>
                    <div class="user-info" style="margin-bottom: 20px;">
                        <div class="profile-image-container">
                        @if (file_exists(public_path("profile/{$poser->idUser}.jpg")))
                        <img src="{{ asset("profile/{$poser->idUser}.jpg") }}" alt="No Profile" class="profile-image">
                        @elseif (file_exists(public_path("profile/{$poser->idUser}.png")))
                        <img src="{{ asset("profile/{$poser->idUser}.png") }}" alt="No Profile" class="profile-image">
                        @else
                        <img src="{{ asset('profile/no-profile.jpg') }}" alt="No Profile" class="profile-image"> {{-- Use a default image --}}
                        @endif
                        </div>
                    </div>
                </td>
               <td>{{ $poser->name }}</td>
               <td>{{ $poser->email }}</td>
                <td>
                    <button id="delete" type="button" class="btn btn-danger">
                        <a href="{{ route('delete', $poser->idUser) }}" onclick="confirmDelete('{{ $user->idUser }}')">Delete</a>
                    </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
