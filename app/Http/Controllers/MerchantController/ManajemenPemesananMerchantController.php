<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        
        Log::info('Data pesanan:', $pesanans->toArray());

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

        // Simpan status lama untuk pengecekan
        $oldStatus = $pesanan->status;

        // Simpan status dalam lowercase
        $pesanan->status = strtolower($request->status);
        
        // Jika status berubah menjadi selesai, update saldo merchant
        if ($pesanan->status === 'selesai' && $oldStatus !== 'selesai') {
            $merchant = Auth::user()->merchant;
            $merchant->saldo = $merchant->saldo + $pesanan->total_harga;
            $merchant->save();
        }

        $pesanan->save();

        return response()->json([
            'success' => true, 
            'status' => $pesanan->status,
            'message' => 'Status pesanan berhasil diperbarui'
        ]);
    }

    public function cancel($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        
        // Pastikan merchant hanya bisa membatalkan pesanan miliknya
        if ($pesanan->merchant_id !== Auth::user()->merchant->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Cek apakah pesanan sudah selesai
        if ($pesanan->status === 'selesai') {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan yang sudah selesai tidak bisa dibatalkan'
            ], 400);
        }

        $pesanan->status = 'dibatalkan';
        $pesanan->save();

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibatalkan'
        ]);
    }
}