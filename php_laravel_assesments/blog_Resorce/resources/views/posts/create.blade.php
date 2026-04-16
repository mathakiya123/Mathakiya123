@extends('layouts.app')

@section('content')

<h3>Add Post</h3>

<form method="POST" action="{{ route('posts.store') }}">
@csrf

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control">
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>
</div>

<button class="btn btn-success">Save</button>
<a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
</form>

@endsection