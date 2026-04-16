@extends('task.layout')
@section('title-name')
Manage tasks
@endsection
@section('content')
<div class="w-100 min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card shadow p-5 text-center">
      <!-- Title -->
      <h5 class="fw-bold">
        Decent job today <span>😬</span>
      </h5>

      <!-- Progress -->
      <div class="my-4">
        <div class="progress-circle">
          <div class="progress-inner"></div>
        </div>
      </div>

      <!-- Stats -->
      <h4 class="fw-bold">75% Tasks</h4>  
      <p class="text-muted mb-4">Completed Today</p>

      <!-- Task List -->
      <ul class="list-unstyled task-list text-start">
        <li class="completed">
          <span class="task-dot"></span> Buy Groceries
        </li>
        <li class="completed">
          <span class="task-dot"></span> Evening Walk
        </li>
        <li>
          <span class="task-dot"></span> Client Work
        </li>
        <li>
          <span class="task-dot"></span> Social Media Posting
        </li>
      </ul>

    </div>
</div>
@endsection