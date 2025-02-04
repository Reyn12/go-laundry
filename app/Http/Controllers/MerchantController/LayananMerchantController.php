<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use App\Models\LayananLaundry;
use Illuminate\Http\Request;

class LayananMerchantController extends Controller
{
    public function getLayanan($id)
    {
        $layanan = LayananLaundry::where('merchant_id', $id)->get();
        return response()->json($layanan);
    }
}