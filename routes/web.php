<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\DashboardAdminController;
use App\Http\Controllers\AdminController\RegisterController;
use App\Http\Controllers\UserController\LoginUserController;
use App\Http\Controllers\UserController\DashboardUserController;
use App\Http\Controllers\UserController\RegisterUserController;
use App\Http\Controllers\UserController\UserPencarianController;
use App\Http\Controllers\MerchantController\RegisterMerchantController;
use App\Http\Controllers\MerchantController\DashboardMerchantController;
use App\Http\Controllers\MerchantController\LoginMerchantController;

use App\Http\Controllers\AdminController\UserManageController;
use App\Http\Controllers\AdminController\MerchantManageController;

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
// Homepage Routes
Route::get('/', function () {
    return view('homepage.index');
});
Route::get('/daftar', function () {
    return view('homepage.daftar.index');
});
Route::get('/masuk', function () {
    return view('homepage.masuk.index');
});


// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.login.index');
    })->name('admin.login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/user-manage', [UserManageController::class, 'index'])->name('admin.dashboard.user-manage.index');
    
    //Admin register 
    Route::get('/register', [RegisterController::class, 'index'])->name('admin.register');
});

// User Routes
Route::prefix('user')->group(function () {
    Route::get('/login', function () {
        return view('user.login.index');
    })->name('user.login');
    Route::post('/login', [LoginUserController::class, 'login']);

    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');
    Route::get('/pencarian', [UserPencarianController::class, 'index'])->name('user.pencarian');
    Route::get('/register', [RegisterUserController::class, 'index'])->name('user.register');
});

// Merchant Routes
Route::prefix('merchant')->group(function () {
    Route::get('/login', function () {
        return view('merchant.login.index');
    })->name('merchant.login');
    Route::post('/login', [LoginMerchantController::class, 'login']);

    Route::get('/dashboard', [DashboardMerchantController::class, 'index'])->name('merchant.dashboard');
    
    //Admin register 
    Route::get('/register', [RegisterMerchantController::class, 'index'])->name('merchant.register');

    //Profile Route
    Route::get('/profile', [ProfileMerchantController::class, 'index'])->name('merchant.profile');
});
