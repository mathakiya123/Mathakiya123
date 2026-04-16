@extends('task.layout')

@section('title-name')
Manage Tasks
@endsection

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-3">All Tasks</h4>

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Task Type</th>
                    <th>Employee</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $index => $task)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->task_type }}</td>
                    <td>{{ $task->employee_name }}</td>
                    <td>{{ $task->date }}</td>
                    <td>{{ $task->start_time }}</td>
                    <td>{{ $task->end_time }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        <a href="{{ url('/task-edit/'.$task->id) }}" 
                           onclick="return confirm('Are you sure you want to edit this task?')" 
                           class="btn btn-info btn-sm mb-1">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="{{ url('/task-delete/'.$task->id) }}" 
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

    @if(count($tasks) == 0)
        <p class="text-center text-muted">No tasks found.</p>
    @endif
</div>
@endsection
