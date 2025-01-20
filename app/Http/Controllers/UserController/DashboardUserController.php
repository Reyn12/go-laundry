<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{
    public function updateProfileImage(Request $request)
    {
        // Validasi file gambar
        $request->validate([
            'profile_image' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Pastikan pengguna login
        $user = auth()->user();
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Pengguna belum login.']);
        }

        // Jika file gambar diunggah
        if ($request->hasFile('profile_image')) {
            // Menyimpan gambar dan mendapatkan path
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');

            // Perbarui data pengguna
            $user->profile_image = $imagePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }

    public function index()
    {
        // Create dummy user
        $user = (object)[
            'name' => 'HAMIDUN',
            'profile_image' => null,
            'created_at' => now()
        ];

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
            'user' => $user,
            'washCount' => 2,
            'ironCount' => 1,
            'orders' => $orders
        ]);
    }
}
