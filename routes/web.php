<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\DashboardAdminController;
use App\Http\Controllers\AdminController\RegisterController;

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