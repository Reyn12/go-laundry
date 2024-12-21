<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserRiwayatController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.login.index');
    });
    Route::post('/login', [LoginController::class, 'login']);
    
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');
});

// User Routes 
// Login Routes 
Route::get('/user/login', function () {
    return view('user.login.index');
})->name('user.login');
Route::post('/user/login', [UserLoginController::class, 'login'])->name('user.login.submit');

// Dashboard Routes
Route::middleware(['auth', 'user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/riwayat', [UserRiwayatController::class, 'index'])->name('user.riwayat');
});
