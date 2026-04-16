<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daily Tasks</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('task/user/css/style.css')}}">
  <style>

    
  </style>
</head>

<body>

  <div class="screen">

    <!-- Illustration Section -->
    <div class="illustration">
      <img src="{{asset('task/user/images/user.png')}}">
    </div>

    <!-- Text Content -->
    <div class="content text-center">
      <h2>Complete your daily tasks!</h2>
      <p>
        Accomplish your daily tasks and we help you
        keep track of your growth
      </p>
    </div>

    <!-- Footer Navigation -->
    <div class="footer mb-3">
      <a href="index.html" class="back">
        <i class="bi bi-arrow-left"></i> back
      </a>

      <button class="next-btn">
        <a href="/register"><i class="bi bi-arrow-right"></i></a>
      </button>
    </div>

  </div>

</body>
</html>
