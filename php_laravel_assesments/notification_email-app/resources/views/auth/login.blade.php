@extends('layouts.app') 

@section('content') 
<div class="container py-5"> 
    <div class="row justify-content-center"> 
        <div class="col-md-6 "> 
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden"> 
                <div class="card-header bg-primary text-white text-center py-4 border-0"> 
                    <h4 class="mb-0 fw-bold">{{ __('Welcome Back!') }}</h4> 
                    <p class="mb-0 mt-1 small opacity-75">Please login to your account</p> 
                </div> 
                
                <div class="card-body p-6"> 
                    <form method="POST" action="{{ route('login') }}"> 
                        @csrf 
                        
                        <div class="mb-3"> 
                            <label for="email" class="form-label fw-bold small">{{ __('Email Address') }}</label> 
                            <div class="input-group"> 
                                <span class="input-group bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span> 
                                <input id="email" type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com"> 
                            </div> 
                            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror 
                        </div> 

                        <div class="mb-3"> 
                            <div class="d-flex justify-content-between align-items-center mb-1"> 
                                <label for="password" class="form-label fw-bold small mb-0">{{ __('Password') }}</label> 
                                @if (Route::has('password.request')) 
                                    <a class="small text-decoration-none" href="{{ route('password.request') }}"> 
                                        {{ __('Forgot?') }} 
                                    </a> 
                                @endif 
                            </div> 
                            <div class="input-group"> 
                                <span class="input-group bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span> 
                                <input id="password" type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••"> 
                            </div> 
                            @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror 
                        </div> 

                        <div class="mb-3"> 
                            <div class="form-check"> 
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
                                <label class="form-check-label small" for="remember"> {{ __('Remember Me') }} </label> 
                            </div> 
                        </div> 

                        <div class="d-grid mb-3"> 
                            <button type="submit" class="btn btn-primary fw-bold py-2"> 
                                {{ __('Login') }} 
                            </button> 
                        </div> 

                        <div class="text-center"> 
                            <span class="text-muted small">Don't have an account?</span> 
                            <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none small">Sign Up</a> 
                        </div> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 


@endsection
