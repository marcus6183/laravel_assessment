<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'home'])->name('product.home');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/create', [ProductController::class, 'showCreate'])->name('product.create');
Route::post('/create', [ProductController::class, 'createProduct'])->name('product.create');
Route::get('/show/{product}', [ProductController::class, 'showProduct'])->name('product.show');
Route::get('/edit/{product}', [ProductController::class, 'showEditProduct'])->name('product.edit');
Route::put('/edit/{product}', [ProductController::class, 'editProduct'])->name('product.edit');
Route::delete('/delete/{product}', [ProductController::class, 'deleteProduct'])->name('product.delete');