@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">Manage Blogs</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary shadow-sm">+ Add New Blog</a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" style="width: 5%">#</th>
                            <th scope="col" style="width: 15%">Image</th>
                            <th scope="col" style="width: 25%">Title</th>
                            <th scope="col" style="width: 25%">content</th>
                            <th scope="col" style="width: 15%">Date Created</th>
                            <th scope="col" style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>
                                @if($post->image)
                                    <img src="{{ asset($post->image) }}" alt="Post Image" class="img-thumbnail" style="max-height: 60px;">
                                @else
                                    <span class="text-muted fst-italic">No Image</span>
                                @endif
                            </td>
                            <td class="text-start text-truncate text-center" style="max-width: 200px;">
                                <span class="fw-semibold">{{ $post->title }}</span>
                            </td>
                             <td class="text-start text-truncate" style="max-width: 200px;">
                                <span class="fw-semibold">{{ $post->content }}</span>
                            </td>
                            <td>{{ $post->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info text-white me-1">View</a>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning text-white me-1">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger shadow-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-muted py-4">No blogs found. Start by adding one!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-0 py-3">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
