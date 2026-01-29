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
    $newUsername = $_POST['username'];
    if ($userObj->updateProfile($_SESSION['user']['id'], $newUsername)) {
        $_SESSION['user']['username'] = $newUsername;
        $message = "<div class='success'>Profile updated successfully!</div>";
    } else {
        $message = "<div class='error'>Failed to update profile.</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            margin: 60px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form input[type="text"],
        form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        form button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #218838;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manage Profile</h2>
        <?= $message ?>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" value="<?= $_SESSION['user']['username'] ?>" required>
            <button type="submit">Update</button>
        </form>
        <a class="back-link" href="dashboard.php">&larr; Back to Dashboard</a>
    </div>
</body>
</html>
