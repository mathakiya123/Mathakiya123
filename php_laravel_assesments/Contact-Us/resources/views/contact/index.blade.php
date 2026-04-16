@extends('contact.layout')
@section('title')
::Contact Managegement
@endsection
@section('content')


<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        @if(session('success'))
        <span class="alert alert-success text-center">{{session('success')}}</span>
        @endif
        <!-- Header -->
        <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h4 class="mb-0">📋Contact Managegement System</h4>
        </div>

        

        <!-- add contact -->
   
<div class="d-flex justify-content-end  p-2">
    <a href="/add" class="btn btn-info btn-lg shadow-sm rounded-pill px-4">
        <span class="bi bi bi-plus">Add Contact</span>
    </a>
</div>

        <!-- Table -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle text-center">
                    
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($data as $d => $row)
                            <tr>
                                <td>{{ ++$d }}</td>
                                <td class="fw-semibold">{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $row->subject }}
                                    </span>
                                </td>
                                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $row->message }}
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="/edit/{{ $row->id }}" class="btn btn-warning btn-sm px-3">
                                            ✏ Edit
                                        </a>
                                       <form action="/delete/{{$row->id}}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure To  Delete record')"><span class="bi bi-trash">Delete</span></button>
                                       </form>
                                    </div>
                                </td>
                            </tr>
                       
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

      
    </div>
</div>

@endsection
