@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Categories</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Add Category</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th width="200">Action</th>
    </tr>

    @foreach($categories as $cat)
    <tr>
        <td>{{ $cat->id }}</td>
        <td>{{ $cat->name }}</td>
        <td>
            <a href="{{ route('categories.edit',$cat->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('categories.destroy',$cat->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection