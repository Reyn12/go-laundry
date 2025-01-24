<?php

namespace App\Http\Controllers\HomepageController;

use App\Http\Controllers\Controller;
use App\Models\LayananLaundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PencarianHomepage extends Controller
{
    /**
     * Menampilkan halaman utama dengan filter pencarian.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua layanan laundry untuk ditampilkan di filter (bisa disesuaikan)
        $layananLaundryList = LayananLaundry::all();
        Log::info('Menampilkan Layanan Laudries: ' . $layananLaundryList);

        return view('homepage.index', ['layananLaundries' => $layananLaundryList]);
    }

    /**
     * Menangani pencarian berdasarkan filter yang diterapkan.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        // Ambil layanan yang dicentang dari request
        $services = $request->input('', []);
        $durations = $request->input('durations', []);

        // Query untuk LayananLaundry
        $query = LayananLaundry::query();

        // Filter berdasarkan layanan laundry yang dicentang
        if (!empty($services)) {
            $query->whereIn('nama_layanan', $services);
        }

        // Filter berdasarkan durasi pengerjaan yang dicentang
        if (!empty($durations)) {
            $query->whereIn('estimasi', $durations);
        }

        // Ambil data layanan laundry yang sudah difilter
        $layananLaundries = $query->get();

        // Kirim data layanan laundry yang ditemukan dan layanan yang dipilih ke tampilan
        return view('homepage.search_results', compact('layananLaundries', 'services', 'durations'));
    }

}