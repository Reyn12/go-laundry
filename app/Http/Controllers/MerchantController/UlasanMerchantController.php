<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UlasanMerchantController extends Controller
{
    public function index()
    {
        $merchant_id = Auth::user()->merchant->id;
        
        // Mengambil semua ulasan untuk merchant ini
        $allReviews = Review::whereHas('pesanan', function($query) use ($merchant_id) {
            $query->where('merchant_id', $merchant_id);
        })->with(['pesanan.user'])->get();

        // Mengambil ulasan dengan pagination
        $reviews = Review::whereHas('pesanan', function($query) use ($merchant_id) {
            $query->where('merchant_id', $merchant_id);
        })->with(['pesanan.user'])
          ->orderBy('created_at', 'desc')
          ->paginate(5);

        // Menghitung total ulasan
        $totalReviews = $allReviews->count();

        // Menghitung rata-rata rating
        $averageRating = $allReviews->avg('rating') ?? 0;

        // Menghitung breakdown rating
        $ratingBreakdown = [
            5 => $allReviews->where('rating', 5)->count(),
            4 => $allReviews->where('rating', 4)->count(),
            3 => $allReviews->where('rating', 3)->count(),
            2 => $allReviews->where('rating', 2)->count(),
            1 => $allReviews->where('rating', 1)->count(),
        ];

        // Mengambil data pendapatan per bulan untuk tahun ini
        $monthlyRevenue = DB::table('pesanans')
            ->where('merchant_id', $merchant_id)
            ->where('status', 'selesai')
            ->whereYear('created_at', Carbon::now()->year)
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_harga) as revenue'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Mengisi data untuk bulan yang kosong
        $revenueData = array_fill(0, 12, 0); // Inisialisasi array dengan 0
        foreach ($monthlyRevenue as $revenue) {
            $revenueData[$revenue->month - 1] = (int)$revenue->revenue;
        }

        // Menghitung statistik pesanan
        $completedOrders = Pesanan::where('merchant_id', $merchant_id)
            ->where('status', 'selesai')
            ->count();
        
        $cancelledOrders = Pesanan::where('merchant_id', $merchant_id)
            ->where('status', 'dibatalkan')
            ->count();

        return view('merchant.ulasan.index', [
            'totalReviews' => $totalReviews,
            'averageRating' => number_format($averageRating, 1),
            'ratingBreakdown' => $ratingBreakdown,
            'reviews' => $reviews,
            'revenueData' => $revenueData,
            'completedOrders' => $completedOrders,
            'cancelledOrders' => $cancelledOrders,
            'totalRevenue' => array_sum($revenueData)
        ]);
    }
}