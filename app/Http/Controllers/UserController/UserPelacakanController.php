<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPelacakanController extends Controller
{
    public function show($id = null)
    {
        // Jika ID tidak disediakan, gunakan ID default atau berikan pesan.
        $id = $id ?? 'default_id';

        // Contoh data berdasarkan ID (di dunia nyata, ambil dari database).
        $order = [
            'id' => $id,
            'date' => 'April 12, 2024',
            'time' => '9:10 pm',
            'status' => 'Dibayar',
            'seller' => 'Subur Makmur',
            'items' => [
                [
                    'name' => 'Tshirt',
                    'quantity' => 5,
                    'price_per_item' => 2000,
                    'color' => 'black',
                    'status' => 'Selesai',
                    'note' => 'Sedang Diantarkan ke Jl. Seti...',
                ],
                [
                    'name' => 'Jeans',
                    'quantity' => 1,
                    'price_per_item' => 2000,
                    'color' => 'red',
                    'status' => 'Waiting',
                    'note' => 'Estimate 15 menit lagi',
                ],
                [
                    'name' => 'Shoes',
                    'quantity' => 1,
                    'price_per_item' => 2000,
                    'color' => 'black',
                    'status' => 'Sending',
                    'note' => '',
                ],
            ],
        ];

        return view('user.pelacakan.index', compact('order'));
    }
}
