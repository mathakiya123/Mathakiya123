<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ContactController;

Route::get('/add',[ContactController::class,'index']);
Route::post('/add',[ContactController::class,'store']);
Route::get('/',[ContactController::class,'show']);
Route::get('/edit/{id}',[ContactController::class,'edit']);
Route::put('/edit/{id}',[ContactController::class,'update']);
Route::delete('/delete/{id}',[ContactController::class,'destroy']);