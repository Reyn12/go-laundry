<?php
namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardUserController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Jika pengguna belum login, redirect ke halaman login
        if (!$user) {
            return redirect()->route('user.login')->withErrors(['error' => 'Pengguna belum login.']);
        }

         // Ambil data dari tabel layanan_laundries
         $LayananItems = DB::table('layanan_laundries')
        ->select('kategori_layanan', 'nama_layanan', 'created_at', 'waktu_pengerjaan', 'created_at')
        ->orderBy('created_at', 'desc')
        ->get();

         // Ambil data pesanan berdasarkan user yang sedang login
         $orders = DB::table('layanan_laundries')
         ->where('merchant_id', $user->id)  // Hanya ambil pesanan milik user yang login
         ->select('kategori_layanan', 'nama_layanan', 'created_at', 'waktu_pengerjaan', 'created_at')
         ->orderBy('created_at', 'desc')
         ->get();

     return view('user.dashboard.index', [
         'user' => $user,              // Data pengguna yang login
         'LayananLaundry' => $LayananItems, // Data layanan laundry
         'washCount' => 2,             // Data tambahan jika diperlukan
         'ironCount' => 1,             // Data tambahan jika diperlukan
     ]);
 }
}