<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php?action=login");
    exit();
}

$message = isset($_SESSION['message']) ? $_SESSION['message'] : "";
unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?= $_SESSION['user']['username'] ?></h2>

    <div class="form-group">
        <a class="back-link" href="manage_profile.php">Manage Profile</a>
        <a class="back-link" href="change_password.php">Change Password</a>
        <a class="back-link" href="add_employee.php">Add Employee</a>
        <a class="back-link" href="../index.php?action=list_employees">👁️ View Employees</a>
        <a class="back-link" href="../logout.php">Logout</a>
    </div>

    <?php if (!empty($message)) echo $message; ?>
</div>
</body>
</html>
