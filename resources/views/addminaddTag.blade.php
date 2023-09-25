@extends('layouts.adminpage')

@section('content')
<div class="container">
    <h1>Add Tag</h1>

    <form action="{{ route('admin.category.storeTag') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="tag">Tag Name:</label>
            <input type="text" name="tag" id="tag" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Add Tag</button>
    </form>
</div>
@endsection
