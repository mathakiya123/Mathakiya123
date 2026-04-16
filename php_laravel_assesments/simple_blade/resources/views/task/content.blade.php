@extends('task.layout')
@section('title-name')
Daily Tasks                       
@endsection
@section('content')
<div class="section-label">IMPORTANT</div>
  <div class="task-card task-important">
    <div class="task-info">
      <div class="task-icon">
        <i class="bi bi-briefcase"></i>
      </div>
      <div>
        <strong>Client Work</strong>
        <div class="small">10am - 2pm</div>
      </div>
    </div>
    <div class="toggle-circle"></div>
  </div>

  <div class="task-card task-normal">
    <div class="task-info">
      <div class="task-icon bg-light">
        <i class="bi bi-walk"></i>
      </div>
      <div>
        <strong>Evening Walk</strong>
        <div class="small text-muted">6pm</div>
      </div>
    </div>
    <div class="toggle-circle toggle-off"></div>
  </div>

  <!-- To Do -->
  <div class="section-label">TO DO</div>

  <div class="task-card task-normal">
    <div class="task-info">
      <div class="task-icon bg-light">
        <i class="bi bi-cart"></i>
      </div>
      <div>
        <strong>Buy Groceries</strong>
        <div class="small text-muted">7pm - 7:40pm</div>
      </div>
    </div>
    <div class="toggle-circle toggle-off"></div>
  </div>

  @endsection