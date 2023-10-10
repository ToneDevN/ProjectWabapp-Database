@extends('layouts.adminpage')
<link href="http://127.0.0.1:8000/css/admin.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
 <link href="http://127.0.0.1:8000/css/admin.css" rel="stylesheet">
@section('content')
<style>
    .menu ul li a#post {
    background-color: #4869D9;
    color: #fff;
}
</style>
<script>
    function myFunction($id) {
        window.location.href = 'http://localhost:8000/adminde/' + $id;
    }
</script>
<div class="container">
    <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Job Title</th>
                <th scope="col">Username</th>
                <th scope="col">DateTime</th>
              </tr>
            </thead>
        <tbody>
            @foreach ($job as $job)
            <tr>
                <td><button onclick="myFunction({{ $job->idJobInfo}})" >{{ $job->nameJob}}</button></td>
                <td><button onclick="myFunction({{ $job->idJobInfo}})" >{{$job->Poser->Users->name}}</button></td>
                <td><button onclick="myFunction({{ $job->idJobInfo}})" >{{$job->created_at->format('Y-m-d H:i')}}</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
