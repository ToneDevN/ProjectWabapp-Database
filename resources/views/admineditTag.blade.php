<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Font+Name&display=swap">

</head>
@extends('layouts.adminpage')

@section('content')
<div class="container">
    <h1 class="mb-5 display-4">Edit Tag</h1>

    <form action="{{ route('admin.category.updateTag', $tag->idTag) }}" method="POST">

        @csrf

        <div class="form-group mb-4">
            <label for="tag" class="mb-2">Tag Name:</label>
            <input type="text" name="tag" id="tag" class="form-control" value="{{ $tag->tag }}" required>
        </div>

        <div class="form-group mb-5">
            <button type="submit" class="btn btn-primary" style="background-color: #4869D9; color: white;">Update Tag</button>
        </div>
    </form>
</div>




@endsection
