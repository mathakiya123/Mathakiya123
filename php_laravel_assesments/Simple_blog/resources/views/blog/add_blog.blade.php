@extends('blog.layout')

@section('title')
Add Blog
@endsection

@section('content')



<div class="container py-5">

<div class="row justify-content-center">
<div class="col-lg-6 col-md-8">   {{-- Medium Width --}}

<div class="card shadow-lg border-0 rounded-4">
<a href="/" class="btn btn-primary btn-lg p-2 mb-3 w-25">back</a>
<div class="card-header text-white text-center rounded-top-4"
style="background: linear-gradient(135deg,#0d6efd,#0a58ca);">

<h4 class="mb-0 fw-bold">Add New Blog</h4>

</div>

<div class="card-body p-4">

<form method="post" action="" enctype="multipart/form-data">
@csrf

@if(session('success'))
<span class=" alert alert-success alert-lg float-end ">
{{session('success')}}
</span>
@endif
<div class="mb-4">
<label class="form-label fw-semibold">image</label>
<input type="file" name="image" class="form-control form-control-lg" placeholder="Enter blog title">
</div>


<div class="mb-4">
<label class="form-label fw-semibold">Blog Title</label>
<input type="text" name="title" class="form-control form-control-lg"
placeholder="Enter blog title">
</div>

<div class="mb-4">
<label class="form-label fw-semibold">Blog Content</label>
<textarea name="content" rows="5"
class="form-control form-control-lg"
placeholder="Write your blog content..."></textarea>
</div>

<div class="d-grid">
<button type="submit" class="btn btn-primary btn-lg rounded-3">
Add  Blog
</button>
</div>

</form>

</div>

</div>

</div>
</div>

</div>

@endsection
