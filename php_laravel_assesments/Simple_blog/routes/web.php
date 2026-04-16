<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;





// Show all blogs (Home Page)
Route::get('/', [blogController::class, 'show']);

// Add Form
Route::get('/add', [blogController::class, 'index']);

// Store Data
Route::post('/add', [blogController::class, 'store']);

// Delete (GET - simple)
Route::delete('/delete/{id}', [blogController::class, 'destroy']);

// Edit  record
Route::get('/edit/{id}',[blogController::class,'edit']);

//Update record
Route::put('edit/{id}',[blogController::class,'update']);






































