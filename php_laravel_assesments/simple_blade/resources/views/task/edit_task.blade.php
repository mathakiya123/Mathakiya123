@extends('task.layout')
@section('title-name')
Edit Task
@endsection
@section('content')
<form method="post" >
@csrf


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="mb-3">
<label class="form-label">Task Title</label>
<input type="text"  name="title" class="form-control" value="{{$edittask->title}}" placeholder="Enter task title" >
</div>

<div class="mb-3">
<label class="form-label">Task Type</label>
<select class="form-select" name="task_type">
<option value="Important" z>Important</option>
<option value="TO DO" >To Do</option>
</select>
</div>

<select name="employee_id" class="form-control">
    <option value="">Select Employee</option>
    @foreach($emps as $emp)
        <option value="{{ $emp->id }}"
            {{ $edittask->employee_id == $emp->id ? 'selected' : '' }}>
            {{ $emp->name }}
        </option>
    @endforeach
</select>




<div class="mb-3">
<label class="form-label">Date</label>
<input type="date" name="date" value="{{$edittask->date}}" class="form-control">
</div>

<div class="row">
<div class="col-6 mb-3">
<label class="form-label">Start Time</label>
<input type="time" name="start_time" value="{{$edittask->start_time}}" class="form-control">
</div>
<div class="col-6 mb-3">
<label class="form-label">End Time</label>
<input type="time" name="end_time" value="{{$edittask->end_time}}" class="form-control">
</div>
</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea class="form-control" name="description" rows="3" placeholder="Optional">{{$edittask->description}}</textarea>
</div>

<button type="submit" class="btn btn-warning w-100 fw-semibold">
Update Task
</button>
</form>
@endsection