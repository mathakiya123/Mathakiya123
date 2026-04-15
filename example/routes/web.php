<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\CategoryController;
use App\http\Controllers\productController;

// Route::get('/', function () {
//     return view('welcome');
// });







Route::get('/category',[categoryController::class,'index']);
Route::post('/category',[categoryController::class,'store']);

//product
 
Route::get('/product',[productController::class,'index']);
Route::post('/product',[productController   ::class,'store']);

Route::get('/product-edit',[productController   ::class,'edit']);
Route::post('/product-edit',[productController   ::class,'update']);
Route::get('/product-delete',[productController   ::class,'destroy']);

Route::get('/', [ProductController::class, 'show'])->middleware('auth');
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])
    ->name('add.to.cart')
    ->middleware('auth');



Route::get('/dashboard', [ProductController::class, 'shw'])
    ->middleware('auth')
    ->name('dashboard');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
