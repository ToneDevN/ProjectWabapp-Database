<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Font+Name&display=swap">
    <link href="http://127.0.0.1:8000/css/admin.css" rel="stylesheet">


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
    .form-control-input{
        border-radius: 10px;
background: #dbdbdb;
border: 0px;
    }

    </style>


<div class="container">

<h1 class="mb-1">Category</h1>
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

<div class="content1">
    <form action="{{ route('admin.category.storeTag') }}" method="POST">
        @csrf
        <div class="d-flex align-items-start">
            <div class="form-group mb-2" style="flex: 1;">
                <input type="text" name="tag" id="tag" class="form-control-input" style="width: 99%;" required placeholder="Add category">
            </div>
            <button type="submit" class="btn btn-success-input" style="background-color: #4869D9; color: white;">Add Tag</button>
        </div>
    </form>
</div>






@endsection
