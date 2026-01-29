<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php?action=login");
    exit();
}
require_once("../models/User.php");

$userObj = new User();
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    if ($userObj->changePassword($_SESSION['user']['id'], $current, $new)) {
        $message = "<div class='success'>Password changed successfully!</div>";
    } else {
        $message = "<div class='error'>Current password is incorrect.</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="container">
    <h2>Change Password</h2>
    <?= $message ?>
    <form method="POST">
        <label>Current Password:</label>
        <input type="password" name="current_password" required>
        <label>New Password:</label>
        <input type="password" name="new_password" required>
        <button type="submit">Change Password</button>
    </form>
    <a class="back-link" href="dashboard.php">&larr; Back to Dashboard</a>
</div>
</body>
</html>
