<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\first_controller;
use App\Http\Controllers\register;
use App\Http\Controllers\admin\addEmployeeController;
 use App\http\Controllers\admin\admincontrollerDashboard;
 use App\http\Controllers\admin\admincontrollerLogin;
 use App\http\Controllers\ContactController;




//index page
  Route::get('/', [first_controller::class, 'index']);

  //register page 
 Route::get('/register', [Register::class, 'index']);
 Route::post('/register', [Register::class, 'add']);
 Route::get('/login', [Register::class, 'login']);
 Route::get('/admin/user', [Register::class, 'shw']);
Route::get('/admin/user-delete/{id}', [Register::class, 'delete']);

 
 //add task
 Route::get('/dashboard', [Register::class, 'dashboard']);
 Route::post('/dashboard', [Register::class, 'store']);
 Route::get('/manage-task'  ,[register::class,'show']);
 Route::get('/manage' ,[register::class,'manage']);
 Route::get('/task-edit/{id}' ,[register::class,'edittask']);
 Route::post('/task-edit/{id}' ,[register::class,'update']);
  Route::get('/task-delete/{id}' ,[register::class,'destroy']);


 //Admin site
  Route::get('/admin/admin-dashboard',[admincontrollerDashboard::class,'index']);
  Route::get('/admin/admin-login',[admincontrollerLogin::class,'index']);
  Route::get('/admin/task1',[admincontrollerDashboard::class,'task']);


  // contact-us manage pagex  
  Route::get('/admin/contact-manage', [ContactController::class, 'index']);
  Route::post('/contact-us', [ContactController::class, 'store']);
  Route::get('/contact-us', [ContactController::class, 'create']);
  Route::get('/admin/contact-manage', [ContactController::class, 'index']);
  Route::get('/admin/contact-delete/{id}', [ContactController::class,'destroy']);
  
//addEmployees
Route::post('/admin/employee-store', [addEmployeeController::class, 'store']);
Route::get('/admin/Employee-create', [addEmployeeController::class, 'create']);
Route::get('/admin/add_employees', [addEmployeeController::class, 'index']);
Route::get('/admin/employee-edit/{id}', [addEmployeeController::class, 'edit']);
Route::get('/admin/employee-delete/{id}', [addEmployeeController::class,'destroy']);

//add task
//  Route::post('/add-task', [Register::class,'Task']);
//  Route::get('/add-task', [Register::class,'Task']);


