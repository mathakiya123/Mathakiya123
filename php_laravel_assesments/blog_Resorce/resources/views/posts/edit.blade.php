@extends('layouts.app')

@section('content')

<h3>Edit Post</h3>

<form method="POST" action="{{ route('posts.update', $post->id) }}">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" value="{{ $post->title }}" class="form-control">
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ $post->description }}</textarea>
</div>

<div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
        @endforeach
    </select>
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
</form>

@endsection 