@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                @if($post->image)
                    <img src="{{ asset($post->image) }}" class="card-img-top object-fit-cover" alt="{{ $post->title }}" style="max-height: 400px; width: 100%;">
                @endif
                <div class="card-body p-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-primary rounded-pill px-3 py-2">Blog Post</span>
                        <div class="text-muted small">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ $post->created_at->format('F d, Y') }}
                        </div>
                    </div>
                    
                    <h1 class="card-title fw-bold text-dark mb-4">{{ $post->title }}</h1>
                    
                    <div class="card-text text-dark" style="font-size: 1.1rem; line-height: 1.7;">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary shadow-sm rounded-pill px-4 py-2">
                    &larr; Back to Blogs
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
