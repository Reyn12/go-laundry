<?php
namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
        if (!$user) {
            return redirect()->route('user.login')->withErrors(['error' => 'Pengguna belum login.']);
        }
    
        // Ambil data dari tabel layanan_laundries
        $LayananItems = DB::table('layanan_laundries')
            ->select('merchant_id', 'kategori_layanan', 'nama_layanan', 'created_at', 'waktu_pengerjaan')
            ->orderBy('created_at', 'desc')
            ->get();
    
        // Ambil data pesanan berdasarkan user yang sedang login
        $orders = DB::table('layanan_laundries')
            ->where('id', $user->id ?? 0)
            ->select('merchant_id', 'kategori_layanan', 'nama_layanan', 'created_at', 'waktu_pengerjaan')
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil data merchant berdasarkan user yang sedang login
        $merchant = DB::table('merchants')
            ->where('user_id', $user->id)
            ->select('nama_laundry')
            ->first();
    
        return view('user.dashboard.index', [
            'user' => $user,              
            'LayananLaundry' => $orders, 
            'washCount' => 2,             
            'ironCount' => 1,             
            'merchant' => $merchant, // Mengirim data merchant ke view
        ]);
    }    
}