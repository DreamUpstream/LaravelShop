<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controllers\Home\HomeController::class, 'index'])->name('home');
Route::get('/products', [Controllers\Products\ProductController::class, 'index'])->name('products');
Route::get('/orders', [Controllers\Orders\OrderController::class, 'index'])->name('orders');
Route::get('/contact', [Controllers\Contacts\ContactController::class, 'index'])->name('contact');

// Not implemented yet:
// Route::get('/admin/create', [Controllers\Products\ProductController::class, 'create'])->name('admin.create');
// Route::post('/admin/store', [Controllers\Products\ProductController::class, 'store'])->name('admin.store');

Route::get('/products/{name}/{id}', [Controllers\Products\ProductController::class, 'showProduct'])->name('products.show');

Route::view('/shop', 'shop.index');

