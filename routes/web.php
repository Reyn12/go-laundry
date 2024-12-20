<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\DashboardAdminController;
use App\Http\Controllers\AdminController\RegisterController;
use App\Http\Controllers\UserController\LoginUserController;
use App\Http\Controllers\UserController\DashboardUserController;
use App\Http\Controllers\UserController\RegisterUserController;

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
    return view('homepage.index');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.login.index');
    });
    Route::post('/login', [LoginController::class, 'login']);
    
    // Dashboard route
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    
    //Admin register 
    Route::get('/register', [RegisterController::class, 'index'])->name('admin.register');
});

// Merchant Routes
Route::prefix('merchant')->group(function () {
    Route::get('/register', function () {
        return view('merchant.register.index');
    });
});

// User Routes
Route::prefix('user')->group(function () {
    Route::get('/login', function () {
        return view('user.login.index');
    });
    Route::post('/login', [LoginUserController::class, 'login']);
    
    // Dashboard route
    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');
    
    //Admin register 
    Route::get('/register', [RegisterUserController::class, 'index'])->name('user.register');
});
