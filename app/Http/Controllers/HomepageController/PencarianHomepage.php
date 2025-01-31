<?php

// app/Http/Controllers/HomepageController/PencarianHomepage.php

namespace App\Http\Controllers\HomepageController;

use App\Http\Controllers\Controller;
use App\Models\LayananLaundry;  // Menggunakan model LayananLaundry
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
// tambahkan ini
class PencarianHomepage extends Controller
{
    /**
     * Menampilkan halaman utama dengan filter pencarian.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('homepage.index');
    }

    /**
     * Menangani pencarian berdasarkan filter yang diterima.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        // Ambil data filter dari form
        $services = $request->input('services', []);
        $durations = $request->input('durations', []);

        // Query dasar
        $query = LayananLaundry::join('merchants', 'layanan_laundries.merchant_id', '=', 'merchants.id')
            ->with(['merchant' => function($query) {
                $query->select('merchants.*');
            }]);
        // Filter berdasarkan kategori layanan yang dipilih
        if (!empty($services)) {
            $query->where(function($q) use ($services) {
                foreach ($services as $service) {
                    $q->orWhere('kategori_layanan', 'like', "%{$service}%");
                }
            });
        }

        // Filter berdasarkan nama layanan (durasi) yang dipilih
        if (!empty($durations)) {
            $query->where(function($q) use ($durations) {
                foreach ($durations as $duration) {
                    $q->orWhere('nama_layanan', 'like', "%{$duration}%");
                }
            });
        }

        // Eksekusi query
        $layananLaundryList = $query->get();

        // Log untuk debugging
        Log::info('Filter Services: ' . json_encode($services));
        Log::info('Filter Durations: ' . json_encode($durations));
        Log::info('Hasil Pencarian: ' . $layananLaundryList);
        // Sebelum return view, kita load dulu merchant untuk setiap layanan
        foreach ($layananLaundryList as $layanan) {
            $layanan->load('merchant');  // ini bakal load merchant berdasarkan relasi yang udah ada
        }

        return view('homepage.index', ['layananLaundries' => $layananLaundryList]);
    }
}