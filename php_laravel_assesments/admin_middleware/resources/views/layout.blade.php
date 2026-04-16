<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Auth</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">My Project</a>

            <div>
                @auth
                    <span class="text-white me-3">Welcome, {{ auth()->user()->name }}</span>
                    <form method="POST" action="/logout" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-light">Logout</button>
                    </form>
                @else
                    <a href="/login" class="btn btn-sm btn-light">Login</a>
                    <a href="/register" class="btn btn-sm btn-warning ms-2">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5">

        <!-- Error Message -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Page Content -->
        <div class="card shadow-sm">
            <div class="card-body">
                @yield('content')
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>