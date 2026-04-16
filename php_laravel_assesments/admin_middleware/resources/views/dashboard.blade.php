@extends('layout')

@section('content')

<h3>User Dashboard</h3>

<p>Welcome: {{ auth()->user()->name }}</p>
<p>Email: {{ auth()->user()->email }}</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>

<br>

<a href="/admin">Go to Admin Panel</a>

@endsection