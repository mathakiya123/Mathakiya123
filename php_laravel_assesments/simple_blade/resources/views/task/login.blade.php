<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daily Tasks</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #FFC43D;
      height: 100vh;
      margin: 0;
      font-family: "Segoe UI", sans-serif;
    }

    .screen {
      max-width: 420px;
      margin: auto;
      height: 100vh;
      display: flex;
      flex-direction: column;
      padding: 24px;
    }

    .illustration {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .illustration i {
      font-size: 16px;
      color: #000;
    }

    .content h2 {
      font-weight: 700;
      margin-bottom: 12px;
    }

    .content p {
      color: #333;
      font-size: 15px;
    }

    .footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: auto;
    }

    .next-btn {
      width: 56px;
      height: auto;
      border-radius: 50%;
      background-color: #fff;
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
    }

    .back {
      color: #000;
      text-decoration: none;
      font-weight: 500;
    }
  </style>
</head>

<body>

  <div class="screen">
      <!-- Text Content -->
    <div class="content text-center">
      <h2>signIn Here!</h2>
      <p>
        Accomplish your daily tasks and we help you
        keep track of your growth
      </p>
    </div>
  <!-- pass message -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <!-- Illustration Section -->
<div class="illustration">
  <form class="w-100">

    <div class="mb-3">
      <label class="form-label">Email Address</label>
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-envelope"></i>
        </span>
        <input type="email" class="form-control" placeholder="Enter your email" required>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-lock"></i>
        </span>
        <input type="password" class="form-control" placeholder="Enter your password" required>
      </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="remember">
        <label class="form-check-label" for="remember">
          Remember me
        </label>
      </div>
      <a href="#" class="text-decoration-none">Forgot password?</a>
    </div>

    <button type="submit" class="btn btn-dark w-100 py-2">
      Login
    </button>

    <p class="text-center mt-3 mb-0">
      Don’t have an account?
      <a href="register.html" class="fw-semibold">Create one</a>
    </p>

  </form>
</div>


  
      <!-- Footer Navigation -->
    <div class="footer mt-4">
      <a href="/register" class="back">
        <i class="bi bi-arrow-left"></i> back
      </a>

      <button class="next-btn">
        <a href="/dashboard"><i class="bi bi-arrow-right"></i></a>
      </button>
    </div>
  </div>

</body>
</html>
