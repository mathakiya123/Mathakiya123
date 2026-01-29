<?php
require_once("models/User.php");

class UserController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $loggedInUser = $user->login($username, $password);
            if ($loggedInUser) {
                session_start();
                $_SESSION['user'] = $loggedInUser;
                header("Location: views/dashboard.php");
            } else {
                echo "Invalid credentials";
            }
        }
        include("views/login.php");
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user->register($username, $password);
            header("Location: ../index.php?action=login");
        }
        include("views/register.php");
    }

    public function addEmployeeForm() {
        include("views/add_employee.php");
    }

    // public function saveEmployee() {
    //     session_start();

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $user = new User(); // Using User model
    //         $result = $user->save($_POST, $_FILES);

    //         $_SESSION['message'] = $result
    //             ? "<div class='toast'>Employee added successfully!</div>"
    //             : "<div class='error'>Failed to add employee.</div>";
    //     }

    //     header("Location: ../index.php?action=add_employee");
    //     exit();
    // }
   public function saveEmployee() {
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = new User(); // User model also contains employee logic
        $result = $user->save($_POST, $_FILES);

        $_SESSION['message'] = $result
            ? "<div class='toast'>Employee added successfully!</div>"
            : "<div class='error'>Failed to add employee.</div>";
    }

    header("Location: index.php?action=add_employee");
    exit();
}



    public function listEmployees() {
        session_start();
        $user = new User();
        $employees = $user->getAll();
        include("views/employee_list.php");
    }
    public function editEmployeeForm() {
    if (!isset($_GET['id'])) {
        echo "Employee ID missing!";
        return;
    }

    $user = new User();
    $employee = $user->getById($_GET['id']);
    include("views/edit_employee.php");
}

public function updateEmployee() {
    $employee = new User();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = $employee->update($_POST, $_FILES);
        session_start();
        $_SESSION['message'] = $result ? "<div class='toast'>Employee updated successfully!</div>"
                                       : "<div class='error'>Failed to update employee.</div>";
        header("Location: index.php?action=list_employees");
        exit();
    }
}


public function deleteEmployee() {
    session_start();
    if (!isset($_GET['id'])) {
        $_SESSION['message'] = "<div class='error'>Employee ID missing.</div>";
        header("Location: index.php?action=list_employees");
        exit();
    }

    $user = new User();
    $deleted = $user->delete($_GET['id']);

    $_SESSION['message'] = $deleted
        ? "<div class='toast'>Employee deleted successfully!</div>"
        : "<div class='error'>Failed to delete employee.</div>";

    header("Location: index.php?action=list_employees");
    exit();
}

}
