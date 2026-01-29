<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img.profile {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
        }
        .toast {
            background: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .error {
            background: #f44336;
            color: white;
            padding: 10px;
            text-align: center;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .btn {
            padding: 6px 10px;
            background: #3498db;
            color: white;
            border: none;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 5px;
        }
        .btn-danger {
            background: #e74c3c;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<h2>All Employees</h2>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Profile</th>
            <th>Name</th>
            <th>Expertise</th>
            <th>Technologies</th>
            <th>Gender</th>
            <th>City</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($employees)): ?>
            <?php foreach ($employees as $index => $emp): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td>
                        <?php if (!empty($emp['profile_pic'])): ?>
                            <img src="uploads/<?= htmlspecialchars($emp['profile_pic']) ?>" class="profile" alt="Profile">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($emp['fname'] . ' ' . $emp['lname']) ?></td>
                    <td><?= htmlspecialchars($emp['expertise']) ?></td>
                    <td><?= htmlspecialchars($emp['tech']) ?></td>
                    <td><?= htmlspecialchars($emp['gender']) ?></td>
                    <td><?= htmlspecialchars($emp['city']) ?></td>
                    <td><?= htmlspecialchars($emp['address']) ?></td>
                    <td>
                        <a href="index.php?action=edit_employee&id=<?= $emp['id'] ?>" class="btn">✏️ Edit</a>
                        <a href="index.php?action=delete_employee&id=<?= $emp['id'] ?>"
                           class="btn btn-danger"
                           onclick="return confirm('Are you sure you want to delete this employee?');">🗑️ Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" style="text-align: center;">No employees found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
