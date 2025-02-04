<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananLaundry;
use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;

class KelolaLayananMerchantController extends Controller
{
    public function index()
    {
        // Dapatkan merchant_id dari user yang login
        $merchant = Merchant::where('user_id', Auth::id())->first();
        
        if (!$merchant) {
            return redirect()->back()->with('error', 'Akun anda bukan merchant');
        }

        // Ambil layanan berdasarkan merchant_id yang benar
        $layanan = LayananLaundry::where('merchant_id', $merchant->id)->get();
        
        return view('merchant.kelolalayanan.index', [
            'mainTitle' => 'Kelola Layanan',
            'layanan' => $layanan
        ]);
    }

    public function store(Request $request)
    {
        try {
            // Pastikan user sudah login
            if (!Auth::check()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda harus login terlebih dahulu'
                ], 401);
            }

            // Cek apakah user adalah merchant
            $merchant = Merchant::where('user_id', Auth::id())->first();
            if (!$merchant) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Akun anda bukan merchant'
                ], 403);
            }

            // Validasi input
            $validated = $request->validate([
                'kategori_layanan' => 'required|string|max:255',
                'nama_layanan' => 'required|string|max:255',
                'harga_per_unit' => 'required|numeric|min:0',
                'satuan' => 'required|string|in:KG,PCS',
                'waktu_pengerjaan' => 'required|string',
                'deskripsi' => 'nullable|string',
            ]);

            // Buat layanan baru
            $layanan = new LayananLaundry();
            $layanan->merchant_id = $merchant->id;
            $layanan->kategori_layanan = $validated['kategori_layanan'];
            $layanan->nama_layanan = $validated['nama_layanan'];
            $layanan->harga_per_unit = $validated['harga_per_unit'];
            $layanan->satuan = $validated['satuan'];
            $layanan->waktu_pengerjaan = $validated['waktu_pengerjaan'];
            $layanan->deskripsi = $validated['deskripsi'] ?? '';

            // Simpan ke database
            $layanan->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Layanan berhasil ditambahkan',
                'data' => $layanan
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan layanan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $merchant = Merchant::where('user_id', Auth::id())->first();
            if (!$merchant) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Akun anda bukan merchant'
                ], 403);
            }

            $layanan = LayananLaundry::where('merchant_id', $merchant->id)
                                   ->where('id', $id)
                                   ->first();

            if (!$layanan) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Layanan tidak ditemukan'
                ], 404);
            }

            return response()->json($layanan);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $merchant = Merchant::where('user_id', Auth::id())->first();
            if (!$merchant) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Akun anda bukan merchant'
                ], 403);
            }

            $layanan = LayananLaundry::where('merchant_id', $merchant->id)
                                   ->where('id', $id)
                                   ->first();

            if (!$layanan) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Layanan tidak ditemukan'
                ], 404);
            }

            // Validasi input
            $validated = $request->validate([
                'harga_per_unit' => 'required|numeric|min:0',
                'waktu_pengerjaan' => 'required|string',
                'deskripsi' => 'nullable|string',
            ]);

            // Update data
            $layanan->harga_per_unit = $validated['harga_per_unit'];
            $layanan->waktu_pengerjaan = $validated['waktu_pengerjaan'];
            $layanan->deskripsi = $validated['deskripsi'] ?? '';
            $layanan->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Layanan berhasil diupdate',
                'data' => $layanan
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengupdate layanan: ' . $e->getMessage()
            ], 500);
        }
    }
}