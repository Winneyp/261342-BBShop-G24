<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('products');
// });

Route::get('/', [ProductController::class, 'index'])->name('products.index');

//delete data
Route::get('/deleteclothfromdb', [ProductController::class, 'deleteClothFromDb'])->name('delete.cloth.from.db');
Route::delete('/deleteclothfromdb/{id}', [ProductController::class, 'destroy'])->name('delete.cloth.destroy');

//add data
Route::get('/addNewProduct', [ProductController::class, 'showAddProductForm'])->name('add.new.product');
Route::post('/addNewProduct', [ProductController::class, 'store'])->name('add.new.product.store');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');