<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardUserController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang terautentikasi
        $user = auth()->user(); // Mendapatkan data pengguna yang login saat ini

        // Pastikan ada pengguna yang login
        if (!$user) {
            return redirect()->route('user.login')->withErrors(['error' => 'Pengguna belum login.']);
        }

        // Data pengguna (contoh dengan data dummy untuk sementara)
        $user = (object)[
            'name' => 'HAMIDUN',
            'email' => 'john@example.com',
            'phone_number' => '1234567890',
            'address' => '123 Main St',
            'image' => asset('images/hamid.jpeg')
        ];

        // Ambil data dari tabel layanan_laundries
        $laundryItems = DB::table('layanan_laundries')
            ->select('kategori_layanan', 'nama_layanan', 'harga_per_unit', 'created_at')
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan data terbaru
            ->get();

        return view('user.dashboard.index', [
            'user' => $user,              // Data pengguna yang login
            'laundryItems' => $laundryItems, // Data layanan laundry
            'washCount' => 2,             // Data tambahan jika diperlukan
            'ironCount' => 1,             // Data tambahan jika diperlukan
        ]);
    }
}
