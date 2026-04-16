@extends('layout')

@section('content')

<h3>Admin Panel</h3>

<p>Only Admin can see this page</p>

<p>Welcome Admin: {{ auth()->user()->name }}</p>

<a href="/dashboard">Back to Dashboard</a>

@endsection