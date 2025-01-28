<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\DashboardAdminController;
use App\Http\Controllers\AdminController\RegisterController;
use App\Http\Controllers\UserController\LoginUserController;
use App\Http\Controllers\UserController\DashboardUserController;
use App\Http\Controllers\UserController\RegisterUserController;
use App\Http\Controllers\UserController\UserPencarianController;
use App\Http\Controllers\UserController\UserRiwayatController;
use App\Http\Controllers\UserController\UserPelacakanController;
use App\Http\Controllers\UserController\UserUlasanController;
use App\Http\Controllers\MerchantController\RegisterMerchantController;
use App\Http\Controllers\MerchantController\DashboardMerchantController;
use App\Http\Controllers\MerchantController\LoginMerchantController;
use App\Http\Controllers\MerchantController\ProfileMerchantController;
use App\Http\Controllers\MerchantController\KelolaLayananMerchantController;
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
    // Public routes (tidak perlu login)
    Route::get('/login', function () {
        return view('admin.login.index');
    })->name('admin.login');
    Route::post('/login', [LoginController::class, 'login']);

    // Admin Register
    Route::get('/register', [RegisterController::class, 'index'])->name('admin.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('admin.register.submit');
    
    // Protected routes (perlu login dan role admin)
    Route::middleware(['auth', 'admin'])->group(function () {
        // Logout route
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        // Dashboard route
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

        // User Management route
        Route::get('/dashboard/user-manage', [UserManageController::class, 'index'])->name('admin.dashboard.user-manage.index');

        // Merchant Management routes
        Route::prefix('dashboard/merchant-manage')->group(function () {
            Route::get('/', [MerchantManageController::class, 'index'])->name('admin.dashboard.merchant-manage.index');
            Route::get('/all', [MerchantManageController::class, 'all'])->name('admin.dashboard.merchant-manage.all');
            Route::get('/pending', [MerchantManageController::class, 'pending'])->name('admin.dashboard.merchant-manage.pending');
            Route::get('/verified', [MerchantManageController::class, 'verified'])->name('admin.dashboard.merchant-manage.verified');
        });
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
    Route::post('/register', [RegisterUserController::class, 'store'])->name('user.register.submit');

    //Pencarian Route
    Route::get('/pencarian', [UserPencarianController::class, 'index'])->name('user.pencarian');

    //Riwayat Route
    Route::get('/riwayat', [UserRiwayatController::class, 'index'])->name('user.riwayat');

    //Reorder Route
    Route::get('/riwayat/reorder', [UserRiwayatController::class, 'reorder'])->name('riwayat.reorder');

    //pelacakan Route
    Route::get('/pelacakan/{id?}', [UserPelacakanController::class, 'show'])->name('user.pelacakan');

    //Ulasan Route
    Route::get('/ulasan', function () {
        return view('user.ulasan.index');
    });

    //Reviews Route
    Route::get('/reviews', [UserUlasanController::class, 'getReviews'])->name('user.reviews');
});

// Merchant Routes
Route::prefix('merchant')->group(function () {
    Route::get('/login', function () {
        return view('merchant.login.index');
    });
    Route::post('/login', [LoginMerchantController::class, 'login']);
    
    // Dashboard route
    Route::get('/dashboard', [DashboardMerchantController::class, 'index'])->name('merchant.dashboard');
    
    //Merchant register 
    Route::get('/register', [RegisterMerchantController::class, 'index'])->name('merchant.register');
    Route::post('/register', [RegisterMerchantController::class, 'store'])->name('merchant.register.submit');


    //Profile Route
        Route::get('/profile', [ProfileMerchantController::class, 'index'])->name('merchant.profile');

     //KelolaLayanan Route
     Route::get('/kelolalayanan', [KelolaLayananMerchantController::class, 'index'])->name('merchant.kelolalayanan');
});