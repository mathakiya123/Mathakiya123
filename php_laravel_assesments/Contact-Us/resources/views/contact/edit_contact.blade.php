@extends('contact.layout')
@section('title')
::Contact Managegement
@endsection
@section('content')

<div class="container vh-98 d-flex justify-content-center align-items-center">

    <div class="card shadow-lg p-4" style="width: 700px;">
        <h4 class="text-center mb-3">Contact Edit</h4>
<form action="" method="post">
            @csrf

            @method('PUT')
            <!-- Name -->
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name"
                class="form-control "
                value="{{$edits->name}}">

               
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email"
                class="form-control "
                value="{{$edits->email }}">

            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone"
                class="form-control "
                value="{{$edits->phone }}">

            </div>

            <!-- Subject -->
            <div class="mb-3">
                <label>Subject</label>
                <input type="text" name="subject"
                class="form-control "
               value="{{$edits->subject }}">
             
            </div>

            <!-- Message -->
            <div class="mb-3">
                <label>Message</label>
                <textarea name="message"
                class="form-control ">{{ $edits->message }}</textarea>
              
            </div>

            <!-- Button -->
            <button type="submit" class="btn btn-primary w-100">
                Update
            </button>

        </form>
    </div>
        
    </div>
@endsection 
