# 🚀 Laravel Notification Blog System – Full Application Prompt

Create a complete Laravel application named **"Blog Notification System"** with authentication, blog management, image upload, and email notification system using queues.

---

## 🔐 1. Authentication System

* Implement user **Signup (Register)** and **Signin (Login)**
* Use Laravel built-in authentication (Laravel Breeze or UI)
* Fields:

  * Name
  * Email
  * Password
* After login → redirect to Dashboard

---

## 🏠 2. Dashboard

* Create a responsive dashboard using **Bootstrap 5**
* Show:

  * Total Posts
  * Welcome message (Logged-in user name)
* Navigation menu:

  * Dashboard
  * Manage Blogs
  * Add Blog
  * Logout

---

## 📝 3. Blog Management (CRUD)

Create full CRUD system for blog posts.

### Fields:

* Title
* Content
* Image (file upload)
* Created_at

### Features:

* Add Blog
* Edit Blog
* Update Blog
* Delete Blog
* List all blogs in table format
* Pagination enabled
* Image preview in table

---

## 🖼️ 4. Image Upload

* Store images in `storage/app/public/posts`
* Use `php artisan storage:link`
* Validate image (jpg, png, max 2MB)

---

## 🔔 5. Notification System

* Use Laravel Notification system
* Create Notification class: `NewPostNotification`
* When a new blog is created:

  * Send email notification to all registered users

### Email Content:

* Subject: New Blog Published
* Message:

  * Blog Title
  * Short Content
  * Button: View Blog

---

## ⚡ 6. Queue System

* Use database queue driver

### Setup:

* QUEUE_CONNECTION=database in `.env`
* Run:

  * php artisan queue:table
  * php artisan migrate
* Notification should implement `ShouldQueue`

### Run worker:

```bash
php artisan queue:work
```

---

## 📧 7. Mail Configuration

Use SMTP (Mailtrap or Gmail)

* Configure `.env` with SMTP credentials
* Email should be sent via queue

---

## 🎨 8. Frontend Design

* Use:

  * HTML5
  * CSS3
  * Bootstrap 5

### Requirements:

* Fully responsive design
* Clean UI
* Card-based layout
* Styled forms
* Alert messages (success/error)

---

## 🧱 9. Project Structure

### Models:

* User
* Post

### Controllers:

* AuthController (if custom)
* DashboardController
* PostController

### Notifications:

* NewPostNotification

### Views:

* layouts/app.blade.php
* auth/login.blade.php
* auth/register.blade.php
* dashboard.blade.php
* posts/index.blade.php
* posts/create.blade.php
* posts/edit.blade.php

---

## 🛣️ 10. Routes

* Auth routes
* Dashboard route
* Resource route:

```php
Route::resource('posts', PostController::class);
```

---

## 🔒 11. Middleware

* Protect dashboard and blog routes with `auth` middleware

---

## ✅ 12. Extra Features

* Flash messages (success, error)
* Form validation
* CSRF protection
* Clean code structure (MVC)

---

## 🎯 Final Goal

* User registers and logs in
* User creates blog post with image
* Blog is saved in database
* Notification is triggered
* Email is sent to all users using queue system

---

## 📌 Output Requirement

Generate full Laravel code including:

* Models
* Controllers
* Notifications
* Blade templates
* Routes
* Migration files
* Bootstrap UI

Ensure code is clean, working, and ready to run.
