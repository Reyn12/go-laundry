<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPencarianController extends Controller
{
    public function index()
    {
        // Data dummy untuk simulasi
        $results = [
            [
                'title' => 'LaundryKlin Chiampelas',
                'description' => 'Laundry Antar Jemput Bandung',
                'rating' => 5.0,
                'reviews' => 125,
                'location' => 'Dipatukur, 29 Blok M',
                'image' => 'https://via.placeholder.com/150',
            ],
            [
                'title' => 'LaundryPro Sukajadi',
                'description' => 'Jasa Laundry Profesional',
                'rating' => 4.8,
                'reviews' => 98,
                'location' => 'Sukajadi, Bandung',
                'image' => 'https://via.placeholder.com/150',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Kirim data ke view
        return view('user.pencarian.index', ['results' => $results]);

    }
}
