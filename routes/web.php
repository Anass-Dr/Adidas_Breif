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

use App\Http\Controllers\AuthController;


# - Front :
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


# - Back :
Route::get('/admin', [\App\Http\Controllers\DashboardController::class, 'index']);
Route::resource('/admin/users', \App\Http\Controllers\UserController::class);
Route::resource('/admin/categories', \App\Http\Controllers\CategoryController::class);
Route::get('/admin/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::post('/admin/products/add', [\App\Http\Controllers\ProductController::class, 'store']);
Route::get('/admin/products/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/admin/products/update', [\App\Http\Controllers\ProductController::class, 'update']);
Route::post('/admin/products/delete', [\App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('/admin/roles', [\App\Http\Controllers\RoleController::class, 'index']);
Route::post('/admin/roles', [\App\Http\Controllers\RoleController::class, 'updateRole']);

# - Authentication :
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('password-reset', [AuthController::class, 'passwordReset']);
Route::post('password-reset', [AuthController::class, 'passwordReset']);
Route::get('password-reset/{token}', [AuthController::class, 'changePasswordPage']);
Route::post('new-password', [AuthController::class, 'changePassword']);
