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
use App\Http\Controllers\UserController\PelacakanController;
use App\Http\Controllers\UserController\PesananController;
use App\Http\Controllers\UserController\OrderController;
use App\Http\Controllers\MerchantController\RegisterMerchantController;
use App\Http\Controllers\MerchantController\DashboardMerchantController;
use App\Http\Controllers\MerchantController\LoginMerchantController;
use App\Http\Controllers\MerchantController\ProfileMerchantController;
use App\Http\Controllers\MerchantController\KelolaLayananMerchantController;
use App\Http\Controllers\MerchantController\ManajemenPemesananMerchantController;
use App\Http\Controllers\MerchantController\UlasanMerchantController;
use App\Http\Controllers\MerchantController\PenarikanSaldoMerchantController;


use App\Http\Controllers\AdminController\UserManageController;
use App\Http\Controllers\AdminController\MerchantManageController;
use App\Http\Controllers\AdminController\LaporanAdminController;
use App\Http\Controllers\HomepageController\PencarianHomepage;

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
        Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

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

        // Laporan & Statistik route
        Route::get('/dashboard/laporan-statistik', [LaporanAdminController::class, 'index'])->name('admin.dashboard.laporan-statistik');

    });
});

// User Routes
Route::middleware(['auth', 'user'])->group(function () {
    // Logout route
    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');
});
Route::prefix('user')->group(function () {
    Route::get('/login', function () {
        return view('user.login.index');
    });
    Route::post('/login_proses', [LoginUserController::class, 'login_proses'])->name('login_proses');

    // Login Route
    Route::get('/user/login', [LoginUserController::class, 'showLoginForm'])->name('user.login');

    // Dashboard route
    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');
    
    //User register 
    Route::get('/register', [RegisterUserController::class, 'index'])->name('user.register');

    //User register submit
    Route::post('/register', [RegisterUserController::class, 'store'])->name('user.register.submit');

    //Pencarian Route
    Route::get('/pencarian', [UserPencarianController::class, 'index'])->name('user.pencarian');

    //Riwayat Route
    Route::get('/riwayat', [UserRiwayatController::class, 'index'])->name('user.riwayat');

    //Reorder Route
    Route::get('/riwayat/reorder', [UserRiwayatController::class, 'reorder'])->name('riwayat.reorder');

     //Order Route
     Route::post('/order', [OrderController::class, 'createOrder'])->name('order');
     Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
 

    //pelacakan Route
    Route::get('/pelacakan/{id?}', [UserPelacakanController::class, 'show'])->name('user.pelacakan');

    //Ulasan Route
    Route::get('/ulasan', function () {
        return view('user.ulasan.index');
    });

    //Reviews Route
    Route::get('/reviews', [UserUlasanController::class, 'getReviews'])->name('user.reviews');

    //Pesanan Layanan Route
    Route::get('/pesananlayanan',function(){
        return view('user.pesananlayanan.index');
    });

    // Pelacakan Route
    Route::get('/pelacakan', [PelacakanController::class, 'index'])->name('user.pelacakan.index');

    // Proses Login Route
    Route::post('/user/login', [LoginUserController::class, 'login_proses'])->name('user.login.post');

    //Pesanan Route
    Route::post('/pesanan/store', [PesananController::class, 'store']);
    Route::get('/riwayat', [PesananController::class, 'index']);

    //Pelacakan Route
    Route::get('/user/pelacakan/{id?}', [UserPelacakanController::class, 'show'])->name('user.pelacakan.index');

    // Logout route
    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

    //Submit order
    Route::post('/submit-order', 'OrderController@submitOrder');

    //Order Route
    Route::post('/create-order', [OrderController::class, 'createOrder']);
    });

    // Route untuk API layanan
    Route::get('/api/merchant/{id}/layanan', [App\Http\Controllers\UserController\UserPencarianController::class, 'getLayanan'])->name('api.merchant.layanan');

    // Route untuk pencarian homepage
    Route::get('/pencarian', [PencarianHomepage::class, 'index'])->name('pencarian.homepage');
    Route::get('/pencarian/search', [PencarianHomepage::class, 'search'])->name('pencarian.search');

    //Merchant Routes
    Route::prefix('merchant')->group(function () {
        Route::get('/login', [LoginMerchantController::class, 'index'])->name('merchant.login');
        Route::post('/login', [LoginMerchantController::class, 'login'])->name('merchant.login.process');
        Route::post('/logout', [LoginMerchantController::class, 'logout'])->name('merchant.logout');
        
        // Protected merchant routes
        Route::middleware(['auth'])->group(function () {
            Route::get('/dashboard', [DashboardMerchantController::class, 'index'])->name('merchant.dashboard');
            // Add other merchant routes here
        });
    
    //Merchant register 
    Route::get('/register', [RegisterMerchantController::class, 'index'])->name('merchant.register');
    Route::post('/register', [RegisterMerchantController::class, 'store'])->name('merchant.register.submit');

    //Profile Route
    Route::get('/profile', [ProfileMerchantController::class, 'index'])->name('merchant.profile');
    Route::get('/merchant/profile/edit', [ProfileMerchantController::class, 'edit'])->name('merchant.profile.edit');
Route::post('/merchant/profile/update', [ProfileMerchantController::class, 'update'])->name('merchant.profile.update');

     //KelolaLayanan Route
     Route::get('/kelolalayanan', [KelolaLayananMerchantController::class, 'index'])->name('merchant.kelolalayanan');
     Route::post('/layanan', [KelolaLayananMerchantController::class, 'store'])->name('merchant.layanan.store');
     Route::get('/layanan/{id}', [KelolaLayananMerchantController::class, 'show'])->name('merchant.layanan.show');
     Route::put('/layanan/{id}', [KelolaLayananMerchantController::class, 'update'])->name('merchant.layanan.update');

     //ManajemenPemesanan Route
     Route::get('/manajemenpemesanan', [ManajemenPemesananMerchantController::class, 'index'])->name('merchant.manajemenpemesanan');
     Route::get('/pesanan', [ManajemenPemesananMerchantController::class, 'index'])->name('merchant.pesanan');
     Route::post('/pesanan/{id}/status', [ManajemenPemesananMerchantController::class, 'updateStatus'])->name('merchant.pesanan.updateStatus');
    
     //Ulasan dan Pendapatan Route
     Route::get('/ulasan', [UlasanMerchantController::class, 'index'])->name('merchant.ulasan');

      //Penarikan Saldo Route
      Route::get('/penarikansaldo', [PenarikanSaldoMerchantController::class, 'index'])->name('merchant.penarikansaldo');
});