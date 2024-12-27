<?php
namespace App\Http\Controllers\userController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRiwayatController extends Controller
{
    public function index()
    {
        // Contoh data riwayat pesanan
        $riwayatPesanan = [
            [
                'id' => 1,
                'nama' => 'John Doe',
                'amount' => 2,
                'date' => '2024-04-01',
                'status' => 'Selesai',
                'total_price' => 50000,
            ],
            [
                'id' => 2,
                'nama' => 'Jane Doe',
                'amount' => 1,
                'date' => '2024-04-15',
                'status' => 'Di Laundry',
                'total_price' => 25000,
            ],
        ];

        return view('user.riwayat.index', compact('riwayatPesanan'));
    }

    public function reorder($id)
    {
        // Logika untuk memproses reorder (contoh sederhana)
        return redirect()->route('user.riwayat')->with('success', 'Pesanan berhasil diulang untuk ID ' . $id);
    
    }
    }