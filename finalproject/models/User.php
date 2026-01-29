<?php
require_once(__DIR__ . '/../config/database.php');

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // -------------------- USER FUNCTIONS --------------------

    public function register($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = "INSERT INTO users (username, password) VALUES (?, ?)";
        $query = mysqli_prepare($this->conn, $stmt);
        mysqli_stmt_bind_param($query, "ss", $username, $hash);
        return mysqli_stmt_execute($query);
    }

    public function login($username, $password) {
        $stmt = "SELECT * FROM users WHERE username = ?";
        $query = mysqli_prepare($this->conn, $stmt);
        mysqli_stmt_bind_param($query, "s", $username);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function updateProfile($id, $username) {
        $stmt = "UPDATE users SET username = ? WHERE id = ?";
        $query = mysqli_prepare($this->conn, $stmt);
        mysqli_stmt_bind_param($query, "si", $username, $id);
        return mysqli_stmt_execute($query);
    }

    public function changePassword($id, $currentPassword, $newPassword) {
        $stmt = "SELECT password FROM users WHERE id = ?";
        $query = mysqli_prepare($this->conn, $stmt);
        mysqli_stmt_bind_param($query, "i", $id);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($currentPassword, $user['password'])) {
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateStmt = "UPDATE users SET password = ? WHERE id = ?";
            $updateQuery = mysqli_prepare($this->conn, $updateStmt);
            mysqli_stmt_bind_param($updateQuery, "si", $hash, $id);
            return mysqli_stmt_execute($updateQuery);
        }
        return false;
    }

    // -------------------- EMPLOYEE FUNCTIONS --------------------

    public function save($post, $files) {
        $fname      = mysqli_real_escape_string($this->conn, $post['fname']);
        $lname      = mysqli_real_escape_string($this->conn, $post['lname']);
        $expertise  = mysqli_real_escape_string($this->conn, $post['expertise']);
        $address    = mysqli_real_escape_string($this->conn, $post['address']);
        $city       = mysqli_real_escape_string($this->conn, $post['city']);
        $gender     = mysqli_real_escape_string($this->conn, $post['gender']);
        $technologies = isset($post['tech']) ? implode(",", $post['tech']) : '';

        // File upload
        $file = $files['profile'];
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $filename = time() . '_' . basename($file["name"]);
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            $stmt = "INSERT INTO employees (fname, lname, expertise, address, city, tech, gender, profile_pic)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $query = mysqli_prepare($this->conn, $stmt);
            mysqli_stmt_bind_param($query, "ssssssss", $fname, $lname, $expertise, $address, $city, $technologies, $gender, $filename);
            return mysqli_stmt_execute($query);
        }

        return false;
    }

    public function getAll() {
        $stmt = "SELECT * FROM employees ORDER BY id DESC";
        $result = mysqli_query($this->conn, $stmt);
        $employees = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $employees[] = $row;
        }
        return $employees;
    }
    public function getById($id) {
    $stmt = "SELECT * FROM employees WHERE id = ?";
    $query = mysqli_prepare($this->conn, $stmt);
    mysqli_stmt_bind_param($query, "i", $id);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    return mysqli_fetch_assoc($result);
}

public function update($post, $files) {
    $id        = $post['id'];
    $fname     = mysqli_real_escape_string($this->conn, $post['fname']);
    $lname     = mysqli_real_escape_string($this->conn, $post['lname']);
    $expertise = mysqli_real_escape_string($this->conn, $post['expertise']);
    $address   = mysqli_real_escape_string($this->conn, $post['address']);
    $city      = mysqli_real_escape_string($this->conn, $post['city']);
    $gender    = mysqli_real_escape_string($this->conn, $post['gender']);
    $techs     = isset($post['tech']) ? implode(",", $post['tech']) : '';

    $filename = $post['old_profile'];
    if (!empty($files['profile']['name'])) {
        $targetDir = "uploads/";
        $filename = time() . '_' . basename($files['profile']['name']);
        $targetFile = $targetDir . $filename;
        move_uploaded_file($files['profile']['tmp_name'], $targetFile);
    }

    $stmt = "UPDATE employees SET fname=?, lname=?, expertise=?, address=?, city=?, tech=?, gender=?, profile_pic=? WHERE id=?";
    $query = mysqli_prepare($this->conn, $stmt);
    mysqli_stmt_bind_param($query, "ssssssssi", $fname, $lname, $expertise, $address, $city, $techs, $gender, $filename, $id);
    return mysqli_stmt_execute($query);
}

public function delete($id) {
    $stmt = "DELETE FROM employees WHERE id = ?";
    $query = mysqli_prepare($this->conn, $stmt);
    mysqli_stmt_bind_param($query, "i", $id);
    return mysqli_stmt_execute($query);
}

}
?>
