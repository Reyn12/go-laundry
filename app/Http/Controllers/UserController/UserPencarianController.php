<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPencarianController extends Controller
{
    public function index()
    {
        $results = [
            [
                "title" => "LaundryKlin Chiampelas",
                "description" => "Laundry Antar Jemput Bandung",
                "rating" => 5.0,
                "reviews" => 125,
                "location" => "Dipatukur, 29 Blok M",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "LaundryPro Sukajadi",
                "description" => "Jasa Laundry Profesional",
                "rating" => 4.8,
                "reviews" => 98,
                "location" => "Sukajadi, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "SpeedyWash Dago",
                "description" => "Laundry Express Dago",
                "rating" => 4.7,
                "reviews" => 112,
                "location" => "Dago, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "Clean&Fresh Setiabudi",
                "description" => "Laundry Berkualitas Tinggi",
                "rating" => 4.9,
                "reviews" => 87,
                "location" => "Setiabudi, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "Cuci Kilat Pasteur",
                "description" => "Layanan Laundry Cepat",
                "rating" => 4.6,
                "reviews" => 75,
                "location" => "Pasteur, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "Laundry Express Bandung",
                "description" => "Cepat dan Mudah",
                "rating" => 4.5,
                "reviews" => 150,
                "location" => "Cihampelas, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "QuickWash Bandung",
                "description" => "Laundry Kilat dengan Kualitas Terjamin",
                "rating" => 4.3,
                "reviews" => 102,
                "location" => "Pahlawan, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "Laundry SukaSuka",
                "description" => "Jasa Cuci dan Antar Jemput",
                "rating" => 4.2,
                "reviews" => 68,
                "location" => "Sukajadi, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "FastLaundry Cimahi",
                "description" => "Cuci Cepat dan Efisien",
                "rating" => 4.1,
                "reviews" => 90,
                "location" => "Cimahi, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "Laundry Premium Cihampelas",
                "description" => "Layanan Laundry Premium",
                "rating" => 4.8,
                "reviews" => 134,
                "location" => "Cihampelas, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "SuperClean Bandung",
                "description" => "Super Bersih dan Hemat Waktu",
                "rating" => 4.6,
                "reviews" => 85,
                "location" => "Bandung, Indonesia",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "MightyWash Pasteur",
                "description" => "Laundry Express yang Handal",
                "rating" => 4.4,
                "reviews" => 76,
                "location" => "Pasteur, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "EcoClean Bandung",
                "description" => "Laundry Ramah Lingkungan",
                "rating" => 4.7,
                "reviews" => 109,
                "location" => "Bandung, Indonesia",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "Wash&Go Bandung",
                "description" => "Layanan Laundry Murah dan Cepat",
                "rating" => 4.3,
                "reviews" => 112,
                "location" => "Dago, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "Kilat Laundry Setiabudi",
                "description" => "Laundry Kilat dan Efisien",
                "rating" => 4.5,
                "reviews" => 98,
                "location" => "Setiabudi, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "FreshLaundry Bandung",
                "description" => "Laundry Bersih dan Terpercaya",
                "rating" => 4.9,
                "reviews" => 110,
                "location" => "Cimahi, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "LaundroExpress Sukajadi",
                "description" => "Layanan Laundry Cepat dan Profesional",
                "rating" => 4.6,
                "reviews" => 120,
                "location" => "Sukajadi, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "ExpressLaundry Cihampelas",
                "description" => "Layanan Cuci Kilat",
                "rating" => 4.4,
                "reviews" => 95,
                "location" => "Cihampelas, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "SuperWash Pasteur",
                "description" => "Laundry Cepat dan Berkualitas",
                "rating" => 4.7,
                "reviews" => 131,
                "location" => "Pasteur, Bandung",
                "image" => "https://via.placeholder.com/150"
            ],
            [
                "title" => "Fast&Clean Bandung",
                "description" => "Cuci Cepat dan Bersih",
                "rating" => 4.2,
                "reviews" => 112,
                "location" => "Bandung, Indonesia",
                "image" => "https://via.placeholder.com/150"
            ]
        ];

        // Kirim data ke view
        return view('user.pencarian.index', ['results' => $results]);
    }
}
