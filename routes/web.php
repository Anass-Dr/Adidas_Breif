<?php

use Illuminate\Support\Facades\Route;

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

# - Front :
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

# - Back :
Route::get('/admin', [\App\Http\Controllers\DashboardController::class, 'index']);
Route::resource('/admin/categories', \App\Http\Controllers\CategoryController::class);
Route::get('/admin/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::post('/admin/products/add', [\App\Http\Controllers\ProductController::class, 'store']);
Route::get('/admin/products/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/admin/products/update', [\App\Http\Controllers\ProductController::class, 'update']);
Route::post('/admin/products/delete', [\App\Http\Controllers\ProductController::class, 'destroy']);
