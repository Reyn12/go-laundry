<?php
namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Merchant;

class OrderController extends Controller
{
    public function store(Request $request) {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'alamat_pengiriman' => 'required|string',
                'total_price' => 'required|numeric',
                'nama_laundry' => 'required|string',
            ]);
            // Simpan ke tabel pesanans
            $pesanan = Pesanan::create([
                'customer_id' => $request->user_id,
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'total_harga' => $request->total_price,
                'status' => 'Pending',  // Status default
                'created_at' => now(),
                'updated_at' => now(),
                // Isi kolom lainnya sesuai kebutuhan
            ]);

            // Simpan ke tabel merchant
            $merchant = Merchant::create([
                'nama_laundry' => $request->nama_laundry,
                'user_id' => $request->user_id
            ]);

            return response()->json(['success' => true, 'message' => 'Pesanan berhasil dibuat!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
