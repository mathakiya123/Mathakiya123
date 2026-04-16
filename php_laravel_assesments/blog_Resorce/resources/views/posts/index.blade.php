@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Posts</h3>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Add Post</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th width="200">Action</th>
    </tr>

    @foreach($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->category->name ?? 'No Category' }}</td>
        <td>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection