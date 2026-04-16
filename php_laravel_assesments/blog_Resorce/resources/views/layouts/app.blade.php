<!DOCTYPE html>
<html>
<head>
    <title>Blog App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Blog App</a>
        <div>
            <a href="{{ route('categories.index') }}" class="btn btn-light btn-sm">Categories</a>
            <a href="{{ route('posts.index') }}" class="btn btn-light btn-sm">Posts</a>
        </div>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>