   @extends('task.admin.layout')
   @section('title-name')
   ::dashboard 
   @endsection 
   @section('dashboard')
   <main class="col-lg-10 col-md-9 ms-sm-auto p-4">

      <!-- Top Bar -->
      <div class="topbar p-3 mb-4 d-flex justify-content-between align-items-center shadow-sm">
        <h5 class="fw-bold mb-0">Dashboard Overview</h5>
        <span class="badge bg-warning text-dark px-3 py-2">Admin Panel</span>
      </div>

      <!-- Stats Cards -->
      <div class="row g-4 mb-4">
        <div class="col-md-4">
          <div class="card dashboard-card shadow-sm p-4">
            <h6 class="text-muted">Total Tasks</h6>
            <h3 class="fw-bold">{{$task}}</h3>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card dashboard-card shadow-sm p-4">
            <h6 class="text-muted">Users</h6>
            <h3 class="fw-bold text-success">6</h3>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card dashboard-card shadow-sm p-4">
            <h6 class="text-muted">Pending</h6>
            <h3 class="fw-bold text-danger">6</h3>
          </div>
        </div>
      </div>

      <!-- Progress + Table -->
      <div class="row g-4">

        <!-- Progress Card -->
        <div class="col-lg-4">
          <div class="card dashboard-card shadow-sm p-4 text-center">
            <h6 class="fw-bold">Daily Progress</h6>
            <h2 class="fw-bold my-3">75%</h2>

            <div class="progress" style="height: 10px;">
              <div class="progress-bar" style="width: 75%"></div>
            </div>
          </div>
        </div>

        <!-- Table -->
        <div class="col-lg-8">
          <div class="card dashboard-card shadow-sm p-4">
            <h6 class="fw-bold mb-3">Recent Tasks</h6>

            <div class="table-responsive">
              <table class="table align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Buy Groceries</td>
                    <td><span class="badge bg-success">Completed</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">View</button></td>
                  </tr>
                  <tr>
                    <td>Client Work</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">View</button></td>
                  </tr>
                  <tr>
                    <td>Social Media</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">View</button></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>

    </main>

    @endsection