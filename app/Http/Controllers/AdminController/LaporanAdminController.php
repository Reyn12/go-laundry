<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanAdminController extends Controller
{
    public function index()
    {
        // Data untuk bulan ini
        $currentMonth = Carbon::now()->month;
        $lastMonth = Carbon::now()->subMonth()->month;
        $currentYear = Carbon::now()->year;
        $lastMonthYear = Carbon::now()->subMonth()->year;

        // Total Transaksi
        $totalTransaksiNow = Pesanan::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
        
        $totalTransaksiLast = Pesanan::whereMonth('created_at', $lastMonth)
            ->whereYear('created_at', $lastMonthYear)
            ->count();

        $transaksiGrowth = $totalTransaksiLast > 0 
            ? (($totalTransaksiNow - $totalTransaksiLast) / $totalTransaksiLast) * 100 
            : 0;

        // Total Pendapatan
        $totalPendapatanNow = Pesanan::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('total_harga');
        
        $totalPendapatanLast = Pesanan::whereMonth('created_at', $lastMonth)
            ->whereYear('created_at', $lastMonthYear)
            ->sum('total_harga');

        $pendapatanGrowth = $totalPendapatanLast > 0 
            ? (($totalPendapatanNow - $totalPendapatanLast) / $totalPendapatanLast) * 100 
            : 0;

        // Total User
        $totalUserNow = User::where('role', 'customer')->count();
        $totalUserLast = User::where('role', 'customer')
            ->whereMonth('created_at', '<', $currentMonth)
            ->whereYear('created_at', '<=', $currentYear)
            ->count();

        $userGrowth = $totalUserLast > 0 
            ? (($totalUserNow - $totalUserLast) / $totalUserLast) * 100 
            : 0;

        // Total Merchant
        $totalMerchantNow = Merchant::count();
        $totalMerchantLast = Merchant::whereMonth('created_at', '<', $currentMonth)
            ->whereYear('created_at', '<=', $currentYear)
            ->count();

        $merchantGrowth = $totalMerchantLast > 0 
            ? (($totalMerchantNow - $totalMerchantLast) / $totalMerchantLast) * 100 
            : 0;

        // Data Transaksi Terbaru
        $transaksiTerbaru = Pesanan::select('pesanans.*', 'merchants.nama_laundry', 'users.nama_lengkap')
            ->join('layanan_laundries', 'pesanans.layanan_id', '=', 'layanan_laundries.id')
            ->join('merchants', 'layanan_laundries.merchant_id', '=', 'merchants.id')
            ->join('users', 'pesanans.customer_id', '=', 'users.id')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard.laporan-statistik.index', [
            'mainTitle' => 'Laporan & Statistik',
            'totalTransaksi' => $totalTransaksiNow,
            'transaksiGrowth' => round($transaksiGrowth),
            'totalPendapatan' => $totalPendapatanNow,
            'pendapatanGrowth' => round($pendapatanGrowth),
            'totalUser' => $totalUserNow,
            'userGrowth' => round($userGrowth),
            'totalMerchant' => $totalMerchantNow,
            'merchantGrowth' => round($merchantGrowth),
            'transaksiTerbaru' => $transaksiTerbaru
        ]);
    }
}