@extends('layouts.app')

@section('content')

<h3>Add Category</h3>

<form method="POST" action="{{ route('categories.store') }}">
@csrf

<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter category name">
</div>

<button class="btn btn-success">Save</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>

</form>

@endsection