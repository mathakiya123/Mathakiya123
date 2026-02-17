@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Manage Leaves</h4>
        <button class="btn btn-success"><a href="/"  class="text-white " style="list-style-type: none;text-decoration: none;">
            + Apply Leave </a>
        </button>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped text-center">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Employee</th>
                    <th>Type</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->id }}</td>
                    <td>{{ $leave->employee_name }}</td>
                    <td>{{ $leave->type }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->reason }}</td>

                    <td>
                        @if($leave->status == 'Pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($leave->status == 'Approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>

                        <td>
                        <a href="{{ url('/edit/'.$leave->id) }}" 
                           onclick="return confirm('Are you sure you want to edit this task?')" 
                           class="btn btn-info btn-sm mb-1">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="{{ url('/delete/'.$leave->id) }}" 
                           onclick="return confirm('Are you sure you want to delete this task?')" 
                           class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
