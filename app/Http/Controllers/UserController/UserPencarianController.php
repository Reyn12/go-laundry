<?php
namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                'nama_laundry as title',
                'deskripsi as description',
                DB::raw('5.0 as rating'), 
                DB::raw('125 as reviews'), 
                'alamat_laundry as location',
                DB::raw('"https://via.placeholder.com/150" as image') 
            )
            ->get();

        // Kirim data ke view
        return view('user.pencarian.index', compact('results'));
    }

    public function getLayanan($merchantId)
    {
        $layanan = DB::table('layanan_laundries')
            ->where('merchant_id', $merchantId)
            ->get();
            
        return response()->json($layanan);
    }
}
