<?php
namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Merchant;
use App\Models\Payment;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'alamat_pengiriman' => 'required|string',
                'total_price' => 'required|numeric',
                'nama_laundry' => 'required|string',
                'produk_terpilih' => 'required|string', // Validasi produk terpilih
                'metode_pembayaran' => 'required|in:COD,QRIS',
            ]);

            // Simpan ke tabel pesanans
            $pesanan = Pesanan::create([
                'customer_id' => $request->user_id,
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'total_harga' => $request->total_price,
                'status' => 'Pending',
                'metode_pembayaran' => $request->metode_pembayaran,
                'produk_terpilih' => $request->produk_terpilih,
                'created_at' => now(),
                'updated_at' => now(),
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