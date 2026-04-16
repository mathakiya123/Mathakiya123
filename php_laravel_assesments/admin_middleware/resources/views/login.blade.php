@extends('layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12 p-2">

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">

                <h3 class="text-center mb-4">Login</h3>

                <!-- Error -->
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>

                    <!-- Remember -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>

                    <!-- Button -->
                    <button type="submit" class="btn btn-primary w-100">
                        Login
                    </button>

                </form>

                <!-- Register link -->
                <div class="text-center mt-3">
                    <small>
                        Don’t have an account? 
                        <a href="/register">Register</a>
                    </small>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection 