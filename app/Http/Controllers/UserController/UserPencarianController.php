<?php
namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\layananLaundry;

class UserPencarianController extends Controller
{
    public function index(Request $request)
    {
        // Ambil keyword pencarian dari request
        $keyword = $request->input('q'); 

        // Query data dari tabel merchants
        $results = DB::table('merchants')
            ->when($keyword, function ($query, $keyword) {
                return $query->where('nama_laundry', 'like', '%' . $keyword . '%')
                             ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                             ->orWhere('alamat_laundry', 'like', '%' . $keyword . '%');
            })
            ->select(
                'id as merchant_id', 
                'nama_laundry',
                'deskripsi as description',
                DB::raw('5.0 as rating'), 
                DB::raw('125 as reviews'), 
                'alamat_laundry',
                'latitude',
                'longitude',
                DB::raw('"https://via.placeholder.com/150" as image') 
            )
            ->get();

        // Tambah data price_range dan layanan untuk setiap merchant
        foreach ($results as $result) {
            // Ambil price range
            $priceRange = $this->getMerchantPriceRange($result->merchant_id);
            $result->price_range = $priceRange;

            // Ambil layanan
            $layananLaundries = LayananLaundry::where('merchant_id', $result->merchant_id)->get();
            $result->layananLaundries = $layananLaundries;
        }

        // Kirim data ke view
        return view('user.pencarian.index', ['results' => $results, 'merchants' => $results]);
    }

    public function getLayanan($merchantId)
    {
        $layanan = DB::table('layanan_laundries')
            ->where('merchant_id', $merchantId)
            ->get();
            
        return response()->json($layanan);
    }

    public function getMerchantPriceRange($merchantId) {
        $priceRange = LayananLaundry::where('merchant_id', $merchantId)
            ->selectRaw('MIN(harga_per_unit) as min_price, MAX(harga_per_unit) as max_price')
            ->first();
            
        return [
            'min' => $priceRange->min_price,
            'max' => $priceRange->max_price
        ];
    }
}