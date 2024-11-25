<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\DiscountCategoryController;


// Tampilan halaman beranda
Route::get('/', [ProductController::class, 'index1'])->name('home');

// Tampilan halaman produk
Route::get('/produk', function () {
    return view('produk');
})->name('produk');

// Tampilan halaman detail produk
Route::get('/product-detail', function () {
    return view('product-detail');
})->name('product-detail');

// Tampilan halaman about
Route::get('/about', function () {
    return view('about');
})->name('about');

// CRUD Customer
Route::resource('customers', CustomerController::class);

// Tampilan halaman pembayaran
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

// Proses pembayaran
Route::post('/process-payments', [PaymentController::class, 'store'])->name('process-payments');

// Product Categories View
Route::resource('product_categories', ProductCategoryController::class);

// CRUD Products
Route::resource('products', ProductController::class);

// CRUD Payments
Route::resource('payments', PaymentController::class);

// CRUD Orders
Route::resource('orders', OrderController::class);

// CRUD Review
Route::resource('product_reviews', ProductReviewController::class);

// Discount_categories
Route::resource('discount_categories', DiscountCategoryController::class);

//CRUD Discounts
Route::resource('discounts', DiscountController::class);

//CRUD Wishlist
Route::resource('wishlists', WishlistController::class);

Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');