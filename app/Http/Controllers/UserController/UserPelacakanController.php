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
                    'name' => 'jaket',
                    'quantity' => 5,
                    'price_per_item' => 2000,
                    'color' => 'black',
                    'status' => 'Selesai',
                    'note' => 'Sedang Diantarkan ke Jl. Seti...',
                ],
                [
                    'name' => 'kaos',
                    'quantity' => 1,
                    'price_per_item' => 2000,
                    'color' => 'red',
                    'status' => 'Waiting',
                    'note' => 'Estimate 15 menit lagi',
                ],
                [
                    'name' => 'gaun',
                    'quantity' => 1,
                    'price_per_item' => 2000,
                    'color' => 'black',
                    'status' => 'Sending',
                    'note' => '',
                ],
                [
                    'name' => 'gorden',
                    'quantity' => 5,
                    'price_per_item' => 2000,
                    'color' => 'black',
                    'status' => 'Selesai',
                    'note' => 'Sedang Diantarkan ke Jl. Seti...',
                ],
                [
                    'name' => 'seragam',
                    'quantity' => 1,
                    'price_per_item' => 2000,
                    'color' => 'red',
                    'status' => 'Waiting',
                    'note' => 'Estimate 15 menit lagi',
                ],
                [
                    'name' => 'topi',
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
