<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Pesanan;
use App\Models\LayananLaundry;
use App\Models\Merchant;
use Carbon\Carbon;

class DashboardMerchantController extends Controller
{
    public function index()
    {
       // Get merchant data
       $user = Auth::user();
       Log::info('User data:', ['user' => $user]);
        
       if (!$user) {
           Log::error('User not logged in');
           return redirect()->route('merchant.login')->with('error', 'Silakan login terlebih dahulu');
       }

       if (!$user->isMerchant()) {
           Log::error('User is not a merchant', ['user_id' => $user->id]);
           return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman merchant');
       }

       $merchant = $user->merchant;
       Log::info('Merchant data:', ['merchant' => $merchant]);
       
       if (!$merchant) {
           Log::error('Merchant not found for user', ['user_id' => $user->id]);
           return redirect()->route('merchant.register')
                          ->with('error', 'Silakan lengkapi data merchant Anda terlebih dahulu');
       }

        // Get today's statistics
        $today = Carbon::today();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        
        // Get orders through layanan_laundries
        $todayOrders = Pesanan::where('merchant_id', $merchant->id)
                              ->whereDate('created_at', $today);

        // Debug: Tampilkan pesanan hari ini
        Log::info('Today orders:', ['orders' => $todayOrders->get()->toArray()]);

        // Hitung pendapatan dengan mempertimbangkan pesanan yang dibatalkan
        $todayIncome = Pesanan::where('merchant_id', $merchant->id)
                             ->whereDate('created_at', $today)
                             ->where(function($query) {
                                 $query->where('status', '!=', 'dibatalkan')
                                     ->orWhereNull('status');
                             })
                             ->sum('total_harga');

        // Hitung total semua pesanan (tidak dibatasi hari ini)
        $totalOrders = Pesanan::where('merchant_id', $merchant->id)->count();
                
        // Hitung total layanan khusus untuk merchant yang login
        $totalLayanan = LayananLaundry::where('merchant_id', $merchant->id)->count();

        // Debug: Tampilkan statistik
        Log::info('Statistics:', [
            'today_income' => $todayIncome,
            'total_orders' => $totalOrders,
            'total_layanan' => $totalLayanan,
            'merchant_id' => $merchant->id
        ]);

        // Ganti order selesai dengan jumlah layanan yang tersedia
        $pendingOrders = $todayOrders->where('status', 'menunggu')->count();

        // Debug: Tampilkan statistik
        Log::info('Statistics:', [
            'today_income' => $todayIncome,
            'total_orders' => $totalOrders,
            'total_layanan' => $totalLayanan,
            'pending_orders' => $pendingOrders
        ]);

        // Hitung pelanggan baru hari ini
        $newCustomers = Pesanan::where('merchant_id', $merchant->id)
                            ->whereDate('created_at', $today)
                            ->distinct('customer_id')
                            ->count('customer_id');

        // Data untuk grafik mingguan
        $weeklyOrders = [];
        $weeklyEarnings = [];
        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            
            // Data pesanan
            $count = Pesanan::where('merchant_id', $merchant->id)
                           ->whereDate('created_at', $date)
                           ->count();
            $weeklyOrders[] = [
                'x' => $date->format('l'),
                'y' => $count
            ];

            // Data pendapatan (mempertimbangkan pesanan yang dibatalkan)
            $earnings = Pesanan::where('merchant_id', $merchant->id)
                             ->whereDate('created_at', $date)
                             ->where(function($query) {
                                 $query->where('status', '!=', 'dibatalkan')
                                     ->orWhereNull('status');
                             })
                             ->sum('total_harga');
            $weeklyEarnings[] = [
                'x' => $date->format('l'),
                'y' => (int)$earnings
            ];
        }

        // Ambil ulasan terbaru - cek dulu apakah kolom rating ada
        try {
            $latestReviews = Pesanan::where('merchant_id', $merchant->id)
                                  ->where('rating', '>', 0)
                                  ->with('user:id,nama_lengkap')
                                  ->orderBy('created_at', 'desc')
                                  ->take(5)
                                  ->get(['id', 'customer_id', 'rating', 'ulasan', 'created_at']);
        } catch (\Exception $e) {
            Log::warning('Rating column might not exist:', ['error' => $e->getMessage()]);
            $latestReviews = collect([]); // Empty collection if column doesn't exist
        }

        Log::info('Dashboard statistics:', [
            'today_income' => $todayIncome,
            'total_orders' => $totalOrders,
            'total_layanan' => $totalLayanan,
            'pending_orders' => $pendingOrders,
            'new_customers' => $newCustomers,
            'weekly_orders' => $weeklyOrders,
            'weekly_earnings' => $weeklyEarnings,
            'latest_reviews' => $latestReviews
        ]);

        return view('merchant.dashboard.index', [
            'merchant' => $merchant,
            'todayIncome' => $todayIncome,
            'totalOrders' => $totalOrders,
            'totalLayanan' => $totalLayanan,
            'pendingOrders' => $pendingOrders,
            'newCustomers' => $newCustomers,
            'weeklyOrders' => json_encode($weeklyOrders),
            'weeklyEarnings' => json_encode($weeklyEarnings),
            'latestReviews' => $latestReviews
        ]);

    }
}