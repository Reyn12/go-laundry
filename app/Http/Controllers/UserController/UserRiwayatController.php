<?php
namespace App\Http\Controllers\userController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRiwayatController extends Controller
{
    public function index()
    {
        // Mengambil semua pesanan yang telah selesai
        $riwayatPesanan = Pesanan::with('layanan')->where('customer_id', auth()->id())->get();

        return view('user.riwayat.index', compact('riwayatPesanan'));
    }

    public function reorder($id)
    {
        // Logika untuk memproses reorder (contoh sederhana)
        return redirect()->route('user.riwayat')->with('success', 'Pesanan berhasil diulang untuk ID ' . $id);
    
    }
    }