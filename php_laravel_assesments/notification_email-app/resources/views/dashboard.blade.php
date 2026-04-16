@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white pb-0 border-0">
                    <h4 class="mb-0 text-primary">Dashboard</h4>
                </div>

                <div class="card-body">
                    <h5 class="mb-4">Welcome back, {{ Auth::user()->name }}!</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-primary text-white text-center p-4 rounded-3 border-0 shadow-sm">
                                <h3>{{ $totalPosts ?? 0 }}</h3>
                                <p class="mb-0">Total Posts Published</p>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <a href="{{ route('posts.create') }}" class="btn btn-outline-primary btn-lg w-100">
                                + Create New Blog Post
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
