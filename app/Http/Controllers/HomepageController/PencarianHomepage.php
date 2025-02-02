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

        // Mengelompokkan layanan berdasarkan merchant
        $groupedServices = [];
        foreach ($layananLaundryList as $layanan) {
            $merchantId = $layanan->merchant->id;
            if (!isset($groupedServices[$merchantId])) {
                $groupedServices[$merchantId] = [
                    'merchant' => $layanan->merchant,
                    'kategori_layanan' => $layanan->kategori_layanan,
                    'durasi' => []
                ];
            }
            // Tambahkan durasi jika belum ada dalam array
            if (!in_array($layanan->nama_layanan, $groupedServices[$merchantId]['durasi'])) {
                $groupedServices[$merchantId]['durasi'][] = $layanan->nama_layanan;
            }
        }

        // Log untuk debugging
        Log::info('Filter Services: ' . json_encode($services));
        Log::info('Filter Durations: ' . json_encode($durations));
        Log::info('Hasil Pencarian: ' . json_encode($groupedServices));

        return view('homepage.index', ['groupedServices' => $groupedServices]);
    }
}