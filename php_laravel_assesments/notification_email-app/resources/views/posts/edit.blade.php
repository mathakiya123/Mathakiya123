@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0 text-center">
                    <h3 class="text-primary fw-bold">Edit Blog Post</h3>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">Blog Title</label>
                            <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label fw-bold">Blog Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" required>{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4 align-items-center">
                            @if($post->image)
                                <div class="col-md-4 text-center">
                                    <p class="mb-2 fw-semibold text-muted small">Current Cover Image</p>
                                    <img src="{{ asset($post->image) }}" alt="Current Image" class="img-thumbnail rounded shadow-sm">
                                </div>
                            @endif
                            <div class="col-md-{{ $post->image ? '8' : '12' }}">
                                <label class="form-label fw-bold">Upload New Image (Optional)</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" accept="image/jpeg, image/png, image/jpg, image/svg, image/gif">
                                <div class="form-text text-muted">File format: JPG, PNG, max size 2MB.</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning text-dark fw-bold btn-lg shadow-sm">Update Blog</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
