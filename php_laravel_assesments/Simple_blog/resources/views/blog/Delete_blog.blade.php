@extends('layouts.app')

@section('content')

<div class="card">
    <form method="post" class="card-header" Action="/delete/{{$post->id}}">
        @csrf
        @method('DELETE')
        Delete Blog
    </div>

    <div class="card-body">

        <h5>Are you sure you want to delete this blog?</h5>

       

         <button class="btn btn-danger btn-sm">Delete</button>
        <a href="/" class="btn btn-secondary">Cancel</a>

</form>
</div>

@endsection