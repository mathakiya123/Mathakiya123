@extends('blog.layout')

@section('title')
Blog List
@endsection

@section('content')

<div class="container mt-5">

    <div class="card shadow-lg border-0 rounded-4">
        
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center rounded-top-4">
            <h4 class="mb-0">📚 Blog Management</h4>
            <a href="/add" class="btn btn-success btn-sm">+ Add Blog</a>
        </div>

        <div class="card-body">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Table --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle text-center">

                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($data as $index => $blog)
                        <tr>

                            {{-- Serial Number --}}
                            <td><strong>{{ ++$index  }}</strong></td>

                            {{-- Image --}}
                            <td>
                                <img src=" {{ asset('images/'. $blog->image) }}"
                                     class="rounded shadow-sm blog-img"
                                     width="70" height="50">
                            </td>

                            {{-- Title --}}
                            <td class="fw-bold text-primary">
                                {{ $blog->title }}
                            </td>

                            {{-- Content --}}
                            <td style="max-width:200px;">
                                {{ Str::limit($blog->content, 60) }}
                            </td>

                            {{-- Actions --}}
                            <td class="d-flex justify-content-center gap-2">
                                <a href="/edit/{{ $blog->id }}" 
                                   class="btn btn-sm btn-warning">
                                   ✏ Edit
                                </a>

                                <form action="/delete/{{$blog->id}}" method="post">
                                    @csrf
                                    @method('Delete')

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete Data')"><span class="bi bi-trash">Delete</span></button>
                                </form>
                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-danger">
                                No Blogs Found 😢
                            </td>
                        </tr>
                        @endforelse

                    </tbody>

                </table>

                {{$data->links('pagination::bootstrap-5')}}

            </div>

        </div>
    </div>

</div>

@endsection