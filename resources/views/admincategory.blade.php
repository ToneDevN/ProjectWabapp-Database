<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Font+Name&display=swap">

</head>
@extends('layouts.adminpage')

@section('content')
<style>
    .menu ul li a#category {
        background-color: #4869D9;
        color: #fff;
    }
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    /* Change button appearance on hover */
.btn-danger:hover {
    background-color: white;
    color: red;
    border: 1px solid red;
}

    </style>

<h1>Category Name</h1>

<table class="table">
    <thead>
        <tr>
            <th>Tag</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tags as $tag)
        <tr>
            <td>{{ $tag->tag }}</td>
            <td>
                <form action="{{ route('admin.category.deleteTag', $tag->idTag) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="background-color: red; color: white;">Delete</button>
                </form>
            </td>
            <td><a href="{{ route('admin.category.editTagForm', $tag->idTag) }}" class="btn btn-warning">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">
    <a href="{{ route('admin.category.addTagForm') }}" class="btn btn-success">Add Tag</a>
</div>

@endsection
