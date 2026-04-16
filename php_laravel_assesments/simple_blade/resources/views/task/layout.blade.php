<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- custom css -->
<link href="{{asset('task/user/css/style.css')}}" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- Sidebar (Offcanvas) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar">
<div class="offcanvas-header">
<h5 class="offcanvas-title">Menu</h5>
<button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
</div>
<div class="offcanvas-body">
<ul class="list-unstyled">
<li class="mb-3"><i class="bi bi-house me-2"></i> Dashboard</li>
<li class="mb-3"><i class="bi bi-check2-square me-2"></i><a href="#" data-bs-toggle="modal" data-bs-target="#addTaskModal"> Add Tasks</a></li>
<li class="mb-3"><i class="bi bi-check2-square me-2"></i><a href="/manage"> Manage Tasks</a></li>
<li class="mb-3"><i class="bi bi-person me-2"></i> Profile</li>
<li class="mb-3"> <a href="#" class="text-decoration-none text-dark"
     data-bs-toggle="modal"
     data-bs-target="#logoutModal">
    <i class="bi bi-power me-2 text-danger"></i> Logout
  </a></li>
</ul>
</div>
</div>

<!-- Dashboard -->
<div class="dashboard">
<!-- Header -->
<div class="d-flex align-items-center mb-4">
<button class="btn p-0 me-3" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
<i class="bi bi-list fs-3"></i>
</button>
</div>
<h4 class="fw-bold">Good Evening</h4>
<p class="text-muted mb-4">Sharanya!</p>

<!-- content start here  -->
@yield('content')   

<!-- Floating Action Button -->
<button class="fab" data-bs-toggle="modal" data-bs-target="#addTaskModal">
<i class="bi bi-plus"></i>
</button>

</div>

<!-- create a add task model -->


<div class="modal fade" id="addTaskModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered  ">
<div class="modal-content rounded-4">

<div class="modal-header border-0">
<h5 class="modal-title fw-bold">Add New Task</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">


@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form method="post" >

@csrf
<div class="mb-3">
<label class="form-label">Task Title</label>
<input type="text"  name="title" class="form-control" placeholder="Enter task title" >
</div>

<div class="mb-3">
<label class="form-label">Task Type</label>
<select class="form-select" name="task_type">
<option>Important</option>
<option>To Do</option>
</select>
</div>

@isset($emps)
<select name="employee_id" class="form-control">
    <option value="">Select Employee</option>
    @foreach($emps as $emp)
        <option value="{{ $emp->id}}">
            {{ $emp->name}}
        </option>
    @endforeach
</select>
 @endisset  


<div class="mb-3">
<label class="form-label">Date</label>
<input type="date" name="date" class="form-control">
</div>

<div class="row">
<div class="col-6 mb-3">
<label class="form-label">Start Time</label>
<input type="time" name="start_time" class="form-control">
</div>
<div class="col-6 mb-3">
<label class="form-label">End Time</label>
<input type="time" name="end_time" class="form-control">
</div>
</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea class="form-control" name="description" rows="3" placeholder="Optional"></textarea>
</div>

<button type="submit" class="btn btn-warning w-100 fw-semibold">
Add Task
</button>
</form>
</div>
</div>
</div>
</div>

<!-- logout modal -->

<div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="bi bi-exclamation-triangle text-warning me-2"></i>
          Confirm Logout
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">
        <p class="mb-0 fs-5">Are you sure you want to logout?</p>
      </div>

      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
          Cancel
        </button>

        <a href="logout.html" class="btn btn-danger px-4">
          Logout
        </a>
      </div>

    </div>
  </div>
</div>


</body>
</html>
