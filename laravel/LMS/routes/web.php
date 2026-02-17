<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LeaveController::class, 'index']);
Route::post('/', [LeaveController::class, 'store']);
Route::get('leave-list', [LeaveController::class, 'show']);
Route::get('edit/{id}', [LeaveController::class, 'edit']);
Route::post('edit/{id}', [LeaveController::class, 'update']);
Route::get('delete/{id}', [LeaveController::class, 'destroy']);