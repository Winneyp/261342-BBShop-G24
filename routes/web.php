<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;

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

// Profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

//Product
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

//
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

});

// Wishlist
Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist')->middleware('auth');
// Route::put('/profile', [WishlistController::class, 'update'])->name('profile.update')->middleware('auth');

// Cart
Route::get('/cart', [CartController::class, 'show'])->name('cart')->middleware('auth');
Route::put('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity')->middleware('auth');
Route::put('/cart/delete-item', [CartController::class, 'deleteItem'])->name('cart.deleteItem')->middleware('auth');
Route::post('/cart/heckout', [CartController::class, 'heckout'])->name('cart.heckout')->middleware('auth');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');



require __DIR__.'/auth.php';
