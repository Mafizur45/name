<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'productList'])->name('product.index');

// Show create product form
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');

// Store new product
Route::post('/products', [ProductController::class, 'store'])->name('product.store');

// Show single product
Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');

// Show edit product form
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

// Update product
Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');

// Delete product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/products/export', [ProductController::class, 'export'])->name('product.export');
Route::post('/products/import', [ProductController::class, 'import'])->name('product.import');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
