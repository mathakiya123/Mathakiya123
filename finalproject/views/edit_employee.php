<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        .container {
            max-width: 700px;
            margin: auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background: #2980b9;
        }
        .form-check {
            display: inline-block;
            margin-right: 10px;
        }
        img.profile {
            max-height: 80px;
            margin-top: 5px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Employee</h2>
    <!-- <form action="../index.php?action=update_employee" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $employee['id'] ?>"> -->
        <form action="index.php?action=update_employee" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $employee['id'] ?>">
        <input type="hidden" name="old_profile" value="<?= $employee['profile_pic'] ?>">

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" value="<?= htmlspecialchars($employee['fname']) ?>" required>
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lname" value="<?= htmlspecialchars($employee['lname']) ?>" required>
        </div>

        <div class="form-group">
            <label>Expertise</label>
            <input type="text" name="expertise" value="<?= htmlspecialchars($employee['expertise']) ?>" required>
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address"><?= htmlspecialchars($employee['address']) ?></textarea>
        </div>

        <div class="form-group">
            <label>City</label>
            <select name="city" required>
                <option value="">-- Select City --</option>
                <?php
                $cities = ['Ahmedabad', 'Rajkot', 'Surat', 'Baroda', 'Bhavnagar'];
                foreach ($cities as $city) {
                    $selected = $employee['city'] === $city ? 'selected' : '';
                    echo "<option value=\"$city\" $selected>$city</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <label class="form-check">
                <input type="radio" name="gender" value="Male" <?= $employee['gender'] === 'Male' ? 'checked' : '' ?>> Male
            </label>
            <label class="form-check">
                <input type="radio" name="gender" value="Female" <?= $employee['gender'] === 'Female' ? 'checked' : '' ?>> Female
            </label>
        </div>

        <div class="form-group">
            <label>Technologies</label>
            <?php
            $allTechs = ['PHP', 'Java', 'Flutter', 'Android', 'Python'];
            $userTechs = explode(",", $employee['tech']);
            foreach ($allTechs as $tech) {
                $checked = in_array($tech, $userTechs) ? 'checked' : '';
                echo "<label class='form-check'><input type='checkbox' name='tech[]' value='$tech' $checked> $tech</label>";
            }
            ?>
        </div>

        <div class="form-group">
            <label>Profile Picture</label>
            <input type="file" name="profile">
            <?php if (!empty($employee['profile_pic'])): ?>
                <img src="uploads/<?= htmlspecialchars($employee['profile_pic']) ?>" class="profile" alt="Profile">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn">Update Employee</button>
        <a href="../index.php?action=list_employees" class="btn" style="background: gray;">Cancel</a>
    </form>
</div>
</body>
</html>
