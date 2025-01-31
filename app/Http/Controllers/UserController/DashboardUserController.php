<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{
    public function index()
{
    // Ambil data pengguna yang terautentikasi
    $user = auth()->user(); // Mendapatkan data pengguna yang login saat ini

    // Pastikan ada pengguna yang login
    if (!$user) {
        return redirect()->route('user.login')->withErrors(['error' => 'Pengguna belum login.']);
    }

    // data user dummy
    $user = (object)[
        'name' => 'HAMIDUN',
        'email' => 'john@example.com',
        'phone_number' => '1234567890',
        'address' => '123 Main St',
        'image' => asset('images/hamid.jpeg')
    ];

    // Get the user's name
    $userName = $user->name;

    // Create dummy orders data
    $orders = collect([
        (object)[
            'item_name' => 'Baju Kemeja',
            'amount' => 3,
            'created_at' => '2024-12-20',
            'status' => 'dilaundry'
        ],
        (object)[
            'item_name' => 'Celana Jeans',
            'amount' => 2,
            'created_at' => '2024-12-19',
            'status' => 'selesai'
        ],
        (object)[
            'item_name' => 'Jaket Hoodie',
            'amount' => 1,
            'created_at' => '2024-12-18',
            'status' => 'dilaundry'
        ],
        (object)[
            'item_name' => 'Kaos',
            'amount' => 5,
            'created_at' => '2024-12-17',
            'status' => 'selesai'
        ]
    ]);

    return view('user.dashboard.index', [
        'user' => $user, // Kirim data pengguna yang login
        'washCount' => 2,
        'ironCount' => 1,
        'orders' => $orders
    ]);
}
}
