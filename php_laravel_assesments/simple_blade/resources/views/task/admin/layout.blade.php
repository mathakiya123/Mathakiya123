<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin @yield("title-name")</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- custom css -->
 <link href="{{asset('task/admin/css/style.css')}}" rel="stylesheet">
<body>
<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <nav class="col-lg-2 col-md-3 d-none d-md-block sidebar p-3">
      <h4 class="fw-bold mb-4 text-center">Admin</h4>

      <a href="/admin/admin-dashboard" class="active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
      <a href="/manage"><i class="bi bi-list-task me-2"></i> Tasks manage</a>
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" 
             data-bs-toggle="dropdown">
            <i class="bi bi-people me-2"></i> Employees
          </a>

          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="/admin/Employee-create">
                <i class="bi bi-person-plus me-2"></i> Add Employee
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="/admin/add_employees">
                <i class="bi bi-list me-2"></i> Manage Employees
              </a>
            </li>
          </ul>
        </li>

              <a href="/admin/user"><i class="bi bi-people me-2"></i> Users Manage</a>
   

      <a href="/admin/contact-manage"><i class="bi bi-people me-2"></i> Contact-manage</a>
      <a href="#"><i class="bi bi-bar-chart me-2"></i> Reports</a>

      <hr>

      <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
        <i class="bi bi-power text-danger me-2"></i> Logout
      </a>
    </nav>

    <!-- Main Content -->
    @yield('dashboard')
  </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Logout</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer justify-content-center">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="logout.html" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
