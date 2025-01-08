<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Pesanan;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Hitung total transaksi
        $totalTransaksi = Pesanan::count();
        
        // Hitung total users (exclude merchant dan admin)
        $totalUsers = User::where('role', 'customer')->count();
        
        // Hitung total merchant
        $totalMerchant = Merchant::count();

        // Return view dengan data
        return view('admin.dashboard.index', [
            'totalTransaksi' => $totalTransaksi,
            'totalUsers' => $totalUsers,
            'totalMerchant' => $totalMerchant,
        ]);
    }
}