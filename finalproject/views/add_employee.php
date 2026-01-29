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
    <title>Add Employee</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        form .form-group {
            margin-bottom: 16px;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }
        .form-group input[type="text"],
        .form-group input[type="file"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group input[type="checkbox"],
        .form-group input[type="radio"] {
            margin-right: 6px;
        }
        button {
            padding: 12px 20px;
            background-color: #3498db;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 style="text-align:center">Add New Employee</h2>
    <img src="../assets/logo.png" alt="Company Logo" class="logo">
    <?= $message ?>
  <form action="../index.php?action=save_employee" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="fname" required placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lname" required placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label>Expertise:</label>
            <input type="text" name="expertise" required placeholder="e.g. Web Developer">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <textarea name="address" required placeholder="Enter full address"></textarea>
        </div>
        <div class="form-group">
            <label>City:</label>
            <select name="city" required>
                <option value="">-- Select City --</option>
                <option>Ahmedabad</option>
                <option>Rajkot</option>
                <option>Vadodara</option>
                <option>Surat</option>
                <option>Bhavnagar</option>
            </select>
        </div>
        <div class="form-group">
            <label>Technologies:</label><br>
            <label><input type="checkbox" name="tech[]" value="PHP"> PHP</label>
            <label><input type="checkbox" name="tech[]" value="Java"> Java</label>
            <label><input type="checkbox" name="tech[]" value="Flutter"> Flutter</label>
            <label><input type="checkbox" name="tech[]" value="React"> React</label>
        </div>
        <div class="form-group">
            <label>Gender:</label><br>
            <label><input type="radio" name="gender" value="Male" required> Male</label>
            <label><input type="radio" name="gender" value="Female" required> Female</label>
        </div>
        <div class="form-group">
            <label>Profile Picture:</label>
            <input type="file" name="profile" accept="image/*" required>
        </div>
        <div style="text-align:center">
            <button type="submit">Save Employee</button>
        </div>
    </form>
    <div style="text-align:center; margin-top: 20px;">
        <a href="dashboard.php">&larr; Back to Dashboard</a>
    </div>
</div>
</body>
</html>
