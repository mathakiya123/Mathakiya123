@extends('contact.layout')

@section('title')
Contact Management
@endsection

@section('content')

<div class="container vh-98 d-flex justify-content-center align-items-center">

    <div class="card shadow-lg p-4" style="width: 700px;">
        <h4 class="text-center mb-3">Contact Form</h4>

        <!-- Error Message -->
        <!-- @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif -->

         @if(session('success'))
            <span class="alert alert-success ">{{session('success')}} </span>
         @endif
         
        <form action="" method="post">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}">

                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}">

                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone"
                class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone') }}">

                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Subject -->
            <div class="mb-3">
                <label>Subject</label>
                <input type="text" name="subject"
                class="form-control @error('subject') is-invalid @enderror"
                value="{{ old('subject') }}">
                  @error('subject')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Message -->
            <div class="mb-3">
                <label>Message</label>
                <textarea name="message"
                class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
              @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Button -->
            <button type="submit" class="btn btn-primary w-100">
                Submit
            </button>

        </form>
    </div>

</div>

@endsection