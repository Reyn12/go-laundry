<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananLaundry;
use Illuminate\Support\Facades\Auth;

class KelolaLayananMerchantController extends Controller
{
    public function index()
    {
        $layanan = LayananLaundry::where('merchant_id', Auth::id())->get();
        return view('merchant.kelolalayanan.index', [
            'mainTitle' => 'Kelola Layanan',
            'layanan' => $layanan
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_layanan' => 'required|string|max:255',
            'nama_layanan' => 'required|string|max:255',
            'harga_per_unit' => 'required|numeric|min:0',
            'satuan' => 'required|string|in:KG,PCS',
            'waktu_pengerjaan' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        $layanan = new LayananLaundry();
        $layanan->merchant_id = Auth::id();
        $layanan->kategori_layanan = $validated['kategori_layanan'];
        $layanan->nama_layanan = $validated['nama_layanan'];
        $layanan->harga_per_unit = $validated['harga_per_unit'];
        $layanan->satuan = $validated['satuan'];
        $layanan->waktu_pengerjaan = $validated['waktu_pengerjaan'];
        $layanan->deskripsi = $validated['deskripsi'];
        $layanan->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Layanan berhasil ditambahkan',
            'data' => $layanan
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $layanan = LayananLaundry::where('merchant_id', Auth::id())
                                ->where('id', $id)
                                ->firstOrFail();

        $validated = $request->validate([
            'kategori_layanan' => 'sometimes|string|max:255',
            'nama_layanan' => 'sometimes|string|max:255',
            'harga_per_unit' => 'sometimes|numeric|min:0',
            'satuan' => 'sometimes|string|in:KG,PCS',
            'waktu_pengerjaan' => 'sometimes|string',
            'deskripsi' => 'nullable|string',
        ]);

        $layanan->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Layanan berhasil diperbarui',
            'data' => $layanan
        ]);
    }

    public function updateBatch(Request $request)
    {
        $validated = $request->validate([
            'layanan' => 'required|array',
            'layanan.*.id' => 'required|exists:layanan_laundries,id',
            'layanan.*.waktu_pengerjaan' => 'required|string'
        ]);

        foreach ($validated['layanan'] as $data) {
            LayananLaundry::where('id', $data['id'])
                         ->where('merchant_id', Auth::id())
                         ->update(['waktu_pengerjaan' => $data['waktu_pengerjaan']]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Status layanan berhasil diperbarui'
        ]);
    }

    public function destroy($id)
    {
        $layanan = LayananLaundry::where('merchant_id', Auth::id())
                                ->where('id', $id)
                                ->firstOrFail();
        
        $layanan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Layanan berhasil dihapus'
        ], 200);
    }
}