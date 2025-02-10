<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant; // Add this line to import the Merchant model

class ProfileMerchantController extends Controller
{
    public function index()
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        // Ambil data merchant berdasarkan pengguna
        $merchant = Merchant::where('user_id', $user->id)->first();

        // Ambil data pesanan yang sudah selesai (history)
        $historyPesanan = $merchant->pesanan()
            ->with('layanan')  // Eager load relasi layanan
            ->whereIn('status', ['menunggu', 'proses', 'selesai', 'dibatalkan'])
            ->orderBy('created_at', 'desc')
            ->paginate(10); // 10 pesanan per halaman

        // Kirim data ke view
        return view('merchant.profile.index', [
            'merchant' => $merchant,
            'historyPesanan' => $historyPesanan,
        ]);
    }

    public function edit()
    {
        $user = auth()->user();
        $merchant = Merchant::where('user_id', $user->id)->first();
        return view('merchant.profile.edit', compact('merchant'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $merchant = Merchant::where('user_id', $user->id)->first();

        $validatedData = $request->validate([
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email',
            'jam_operasional' => 'required|string',
            'alamat' => 'required|string'
        ]);

        $merchant->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Profile berhasil diupdate'
        ]);
    }
}