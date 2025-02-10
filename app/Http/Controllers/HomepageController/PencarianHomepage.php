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
        // Ambil data dari form
        $selectedServices = $request->input('services', []);
        $selectedDurations = $request->input('durations', []);

        // Debug
        Log::info('Selected Services:', $selectedServices);
        Log::info('Selected Durations:', $selectedDurations);

        // Query dasar
        $query = LayananLaundry::with('merchant');

        // Filter berdasarkan services yang dipilih
        if (!empty($selectedServices)) {
            $query->whereIn('kategori_layanan', $selectedServices);
        }

        // Filter berdasarkan durasi yang dipilih
        if (!empty($selectedDurations)) {
            $query->whereIn('nama_layanan', $selectedDurations);
        }

        $layananLaundryList = $query->get();

        // Group hasil
        $groupedServices = [];
        foreach ($layananLaundryList as $layanan) {
            $merchantId = $layanan->merchant_id;

            // Skip jika tidak memenuhi filter
            if (!empty($selectedServices) && !in_array($layanan->kategori_layanan, $selectedServices)) {
                continue;
            }

            if (!empty($selectedDurations) && !in_array($layanan->nama_layanan, $selectedDurations)) {
                continue;
            }

            // Inisialisasi merchant baru
            if (!isset($groupedServices[$merchantId])) {
                $groupedServices[$merchantId] = [
                    'merchant' => $layanan->merchant,
                    'kategori_layanan' => $layanan->kategori_layanan,
                    'durasi' => []
                ];
            }

            // Tambah durasi jika belum ada
            if (!in_array($layanan->nama_layanan, $groupedServices[$merchantId]['durasi'])) {
                $groupedServices[$merchantId]['durasi'][] = $layanan->nama_layanan;
            }
        }

        return view('homepage.index', [
            'groupedServices' => $groupedServices,
            'selectedServices' => $selectedServices,
            'selectedDurations' => $selectedDurations
        ]);
    }
}