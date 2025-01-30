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
                'nama_laundry as title',
                'deskripsi as description',
                DB::raw('5.0 as rating'), // Dummy rating
                DB::raw('125 as reviews'), // Dummy reviews
                'alamat_laundry as location',
                DB::raw('"https://via.placeholder.com/150" as image') // Dummy image
            )
            ->get();

        // Ambil data dari tabel layanan_laundries
        $layanan_laundries = DB::table('layanan_laundries')->get();

        // Kirim data ke view
        return view('user.pencarian.index', compact('results', 'layanan_laundries'));
    }
}
