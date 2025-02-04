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
                'produk_terpilih' => 'required|string',
                'metode_pembayaran' => 'required|in:COD,QRIS',
            ]);

            // Decode produk yang dipilih dari JSON
            $selectedServices = json_decode($request->produk_terpilih, true);
            if (empty($selectedServices)) {
                throw new \Exception('Tidak ada layanan yang dipilih');
            }

            // Ambil layanan pertama sebagai layanan_id
            $firstService = $selectedServices[0];
            
            // Hitung total berat dari semua layanan
            $totalBerat = 0;
            foreach ($selectedServices as $service) {
                $totalBerat += floatval($service['berat']);
            }

            // Cari merchant berdasarkan nama laundry
            $merchant = Merchant::where('nama_laundry', $request->nama_laundry)->first();
            if (!$merchant) {
                throw new \Exception('Merchant tidak ditemukan');
            }

            // Simpan ke tabel pesanans
            $pesanan = Pesanan::create([
                'customer_id' => $request->user_id,
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'alamat_pengambilan' => $request->alamat_pengiriman, // Gunakan alamat yang sama untuk pengambilan
                'total_harga' => $request->total_price,
                'status' => 'menunggu',
                'produk_terpilih' => $request->produk_terpilih,
                'layanan_id' => 1, // Sementara kita set default ke 1
                'merchant_id' => $merchant->id,
                'berat_kg' => $totalBerat,
                'jumlah_pesanan' => count($selectedServices),
            ]);

            // Simpan ke tabel payments
            $payment = Payment::create([
                'pesanan_id' => $pesanan->id,
                'metode_pembayaran' => $request->metode_pembayaran,
                'jumlah' => $request->total_price,
                'biaya_admin' => 0, // Untuk sementara set 0
                'status' => 'belum dibayar',
            ]);

            return response()->json(['success' => true, 'message' => 'Pesanan berhasil dibuat!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}