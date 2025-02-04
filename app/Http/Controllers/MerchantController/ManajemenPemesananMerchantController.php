<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class ManajemenPemesananMerchantController extends Controller
{
    public function index()
    {
        // Mengambil merchant_id yang benar dari relasi
        $merchant_id = Auth::user()->merchant->id;
        
        // Mengambil pesanan yang terkait dengan merchant ini
        $pesanans = Pesanan::with(['user', 'layanan'])
            ->where('merchant_id', $merchant_id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('merchant.manajemenpemesanan.index', [
            'pesanans' => $pesanans
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,proses,selesai,dibatalkan'
        ]);

        $pesanan = Pesanan::findOrFail($id);
        
        // Pastikan merchant hanya bisa update pesanan miliknya
        if ($pesanan->merchant_id !== Auth::user()->merchant->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Simpan status dalam lowercase
        $pesanan->status = strtolower($request->status);
        $pesanan->save();

        // Trigger event untuk notifikasi ke user jika diperlukan
        // event(new PesananStatusUpdated($pesanan));

        return response()->json([
            'success' => true, 
            'status' => $pesanan->status,
            'message' => 'Status pesanan berhasil diperbarui'
        ]);
    }
}