<?php
require_once("controllers/UserController.php");

$action = $_GET['action'] ?? 'login';
$controller = new UserController();

switch($action) 
{
    case 'register':
        $controller->register();
        break;
    case 'login':
         //$controller->login();
    default:
        $controller->login();
        break;
    case 'add_employee':
    $controller->addEmployeeForm();
    break;
case 'save_employee':
    $controller->saveEmployee();
    break;

case 'list_employees':
    $controller->listEmployees();
    break;  
     
case 'edit_employee':
    $controller->editEmployeeForm();
    break;

case 'update_employee':
    $controller->updateEmployee();
    break;

case 'delete_employee':
    $controller->deleteEmployee();
    break;    

    
}
?>