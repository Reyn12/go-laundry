<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\DashboardAdminController;
use App\Http\Controllers\AdminController\RegisterController;
use App\Http\Controllers\UserController\LoginUserController;
use App\Http\Controllers\UserController\DashboardUserController;
use App\Http\Controllers\UserController\RegisterUserController;
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
    });
    Route::post('/login', [LoginController::class, 'login']);
    
    // Dashboard route
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    // User Management route
    Route::get('/dashboard/user-manage', [UserManageController::class, 'index'])->name('admin.dashboard.user-manage.index');
    
    // Merchant Management route
    // Route::get('/dashboard/merchant-manage', [MerchantManageController::class, 'index'])->name('admin.dashboard.merchant-manage.index');

    // Merchant Management routes
    Route::prefix('dashboard/merchant-manage')->group(function () {
        Route::get('/', [MerchantManageController::class, 'index'])->name('admin.dashboard.merchant-manage.index');
        Route::get('/all', [MerchantManageController::class, 'all'])->name('admin.dashboard.merchant-manage.all');
        Route::get('/pending', [MerchantManageController::class, 'pending'])->name('admin.dashboard.merchant-manage.pending');
    });

    //Admin register 
    Route::get('/register', [RegisterController::class, 'index'])->name('admin.register');
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

// Merchant Routes
Route::prefix('merchant')->group(function () {
    Route::get('/login', function () {
        return view('merchant.login.index');
    });
    Route::post('/login', [LoginMerchantController::class, 'login']);
    
    // Dashboard route
    Route::get('/dashboard', [DashboardMerchantController::class, 'index'])->name('merchant.dashboard');
    
    //Admin register 
    Route::get('/register', [RegisterMerchantController::class, 'index'])->name('merchant.register');
});