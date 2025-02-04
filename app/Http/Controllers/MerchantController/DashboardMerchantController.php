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
        
        // Get merchant's layanan IDs
        try {
            $layananIds = $merchant->layananLaundry()->pluck('id');
            Log::info('Layanan IDs:', ['layanan_ids' => $layananIds]);
            
            // Get orders through layanan_laundries
            $todayOrders = Pesanan::whereIn('layanan_id', $layananIds)
                                ->whereDate('created_at', $today);
            
            $todayIncome = $todayOrders->sum('total_harga');
            $totalOrders = $todayOrders->count();
            $completedOrders = $todayOrders->where('status', 'selesai')->count();
            $pendingOrders = $todayOrders->where('status', 'menunggu')->count();

            Log::info('Dashboard statistics:', [
                'today_income' => $todayIncome,
                'total_orders' => $totalOrders,
                'completed_orders' => $completedOrders,
                'pending_orders' => $pendingOrders
            ]);

            return view('merchant.dashboard.index', [
                'merchant' => $merchant,
                'todayIncome' => $todayIncome,
                'totalOrders' => $totalOrders,
                'completedOrders' => $completedOrders,
                'pendingOrders' => $pendingOrders
            ]);

        } catch (\Exception $e) {
            Log::error('Error in dashboard:', [
                'error' => $e->getMessage(),
                'merchant_id' => $merchant->id
            ]);
            return back()->with('error', 'Terjadi kesalahan saat mengambil data dashboard');
        }
    }
}