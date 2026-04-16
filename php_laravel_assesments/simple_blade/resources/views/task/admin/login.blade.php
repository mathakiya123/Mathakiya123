<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- custom css -->
<link href="{{asset('task/admin/css/style.css')}}" rel="stylesheet">

</head>

<body>

<div class="container-fluid min-vh-100">
  <div class="row min-vh-100">

    <!-- Left Image Section -->
    <div class="col-lg-6 d-none d-lg-flex login-image">
      <!-- Replace with your own GIF -->
      <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExMDRmM2RjYzBkYzUxZDUxM2JlNDU5NDI0OWE1MDk1MjBlNTFhNTg1MiZlcD12MV9naWZzX3NlYXJjaCZjdD1n/26tn33aiTi1jkl6H6/giphy.gif" 
           alt="Admin Login GIF">
    </div>

    <!-- Right Login Form -->
    <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center">

      <div class="col-10 col-sm-8 col-md-6 col-lg-8">
        <div class="card login-card shadow p-4">

          <h3 class="fw-bold text-center mb-3">Admin Login</h3>
          <p class="text-muted text-center mb-4">
            Login to access admin dashboard
          </p>

          <form>
            <!-- Email -->
            <div class="mb-3">
              <label class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text bg-white">
                  <i class="bi bi-envelope"></i>
                </span>
                <input type="email" class="form-control" placeholder="admin@example.com" required>
              </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text bg-white">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="password" class="form-control" placeholder="********" required>
              </div>
            </div>

            <!-- Remember -->
            <div class="d-flex justify-content-between align-items-center mb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">Remember me</label>
              </div>
              <a href="#" class="text-decoration-none text-warning fw-semibold">
                Forgot password?
              </a>
            </div>

            <!-- Button -->
            <div class="d-grid">
              <button class="btn login-btn py-2">
                Login
              </button>
            </div>
          </form>

        </div>
      </div>

    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
