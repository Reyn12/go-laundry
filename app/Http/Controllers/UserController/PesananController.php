<?php
namespace App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:users,id',
            'layanan_id' => 'required|exists:layanan_laundries,id',
            'merchant_id' => 'required|exists:merchants,id',
            'status' => 'required|in:menunggu,proses,selesai,dibatalkan',
            'alamat_pengambilan' => 'required|string|max:255',
            'alamat_pengiriman' => 'required|string|max:255',
            'total_harga' => 'required|numeric',
            'berat_kg' => 'required|numeric',
            'jumlah_pesanan' => 'required|integer',
        ]);

        // Simpan ke database
        $pesanan = Pesanan::create([
            'customer_id' => $request->customer_id,
            'layanan_id' => $request->layanan_id,
            'merchant_id' => $request->merchant_id,
            'status' => $request->status,
            'alamat_pengambilan' => $request->alamat_pengambilan,
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'total_harga' => $request->total_harga,
            'berat_kg' => $request->berat_kg,
            'jumlah_pesanan' => $request->jumlah_pesanan,
        ]);

        return response()->json(['success' => true, 'pesanan' => $pesanan]);
    }

    public function index()
    {
        $riwayatPesanan = Pesanan::with('layanan')->where('customer_id', auth()->id())->get();
        return view('user.riwayat.index', compact('riwayatPesanan'));
    }
}
