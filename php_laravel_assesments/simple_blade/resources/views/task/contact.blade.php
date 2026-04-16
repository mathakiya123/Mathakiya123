<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Contact Us</title>

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

.content h2 {
font-weight: 700;
margin-bottom: 12px;
}

.content p {
color: #333;
font-size: 15px;
}

.map-container {
border-radius: 16px;
overflow: hidden;
margin-bottom: 16px;
}

.card-box {
background-color: #fff;
border-radius: 16px;
padding: 16px;
margin-bottom: 16px;
}

.card-box i {
font-size: 20px;
margin-right: 8px;
}

.form-control, textarea {
border-radius: 10px;
}

.footer {
display: flex;
align-items: center;
justify-content: space-between;
margin-top: auto;
}

.next-btn {
width: 56px;
height: 56px;
border-radius: 50%;
background-color: #fff;
border: none;
display: flex;
align-items: center;
justify-content: center;
font-size: 22px;
}

.next-btn a {
color: #000;
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

<!-- Header -->
<div class="content text-center">
<h2>Contact Us</h2>
<p>We’d love to hear from you. Send us a message or visit us.</p>
</div>

<!-- Google Map -->
<div class="map-container">
<iframe
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093497!2d144.9537353159045!3d-37.81627974202125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f1f7e7e1%3A0x5045675218ce6e0!2sMelbourne%20VIC!5e0!3m2!1sen!2sau!4v1700000000000"
width="100%"
height="220"
style="border:0;"
allowfullscreen=""
loading="lazy">
</iframe>
</div>

<!-- Address Info -->
<div class="card-box">
<div class="d-flex mb-2">
<i class="bi bi-geo-alt"></i>
<span>
123 Growth Street,<br>
Daily Tasks City,<br>
Melbourne, Australia
</span>
</div>
<div class="d-flex mb-2">
<i class="bi bi-telephone"></i>
<span>+61 123 456 789</span>
</div>
<div class="d-flex">
<i class="bi bi-envelope"></i>
<span>support@dailytasks.com</span>
</div>
</div>

<!-- Contact Form -->
<div class="card-box">
<!-- pass a success messages  -->
@if(Session('success'))
<div class="alert alert-success">
<span>{{session('success')}}</span>
</div>
@endif
<!-- pass a error vaalidation message -->
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form method="post" Action="">
@csrf
<div class="row g-2">

<div class="col-6">
<input type="text" name="name" class="form-control" placeholder="Your Name">
</div>

<div class="col-6">
<input type="email" name="email" class="form-control" placeholder="Your Email">
</div>

<div class="col-6">
<input type="tel" name="phone" class="form-control" placeholder="Phone">
</div>

<div class="col-6">
<input type="text" name="subject" class="form-control" placeholder="Subject">
</div>

<div class="col-12">
<textarea class="form-control" name="message" rows="3" placeholder="Your Message"></textarea>
</div>

<div class="col-12">
<button type="submit" class="btn btn-dark w-100 mt-2">
Send Message
</button>
</div>

</div>
</form>
</div>



<!-- Footer -->
<div class="footer mt-3">
<a href="/" class="back">
<i class="bi bi-arrow-left"></i> back
</a>

<button class="next-btn">
<a href="/thank-you">
<i class="bi bi-arrow-right"></i>
</a>
</button>
</div>

</div>

</body>





