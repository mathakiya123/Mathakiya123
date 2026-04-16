@extends('blog.layout')

@section('content')

@if(session('update'))
<span class="alert  alert alert-success">
{{session('update')}}
</span>
@endif

<div class="container py-5">

<div class="row justify-content-center">
<div class="col-lg-6 col-md-8">

<div class="card shadow-lg border-0 rounded-4">

<div class="card-header text-white text-center rounded-top-4"
style="background: linear-gradient(135deg,#20c997,#198754);">

<h4 class="mb-0 fw-bold">Edit Blog</h4>

</div>

<div class="card-body p-4">

<form method="post" action="/edit/{{$edit->id}}" enctype="multipart/form-data">
@csrf
@method('put')

<div class="mb-4">
<label class="form-label fw-semibold">image</label>
<img src="{{asset('images/'.$edit->image)}}" alt="" Width="200">
</div>

<div class="mb-4">
<label class="form-label fw-semibold"> new image</label>
<input type="file" name="image" class="form-control form-control-lg" placeholder="Enter blog title">
</div>

<div class="mb-4">
<label class="form-label fw-semibold">Blog Title</label>
<input type="text" name="title" value="{{$edit->title}}"
class="form-control form-control-lg">
</div>

<div class="mb-4">
<label class="form-label fw-semibold">Blog Content</label>
<textarea name="content" rows="5"
class="form-control form-control-lg">{{$edit->content}}</textarea>
</div>

<div class="d-grid">
<button type="submit" class="btn btn-success btn-lg rounded-3">
Update Blog
</button>
</div>

</form>

</div>

</div>

</div>
</div>

</div>

@endsection
