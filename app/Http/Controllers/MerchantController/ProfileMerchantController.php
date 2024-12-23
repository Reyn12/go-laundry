<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileMerchantController extends Controller
{
    public function index()
    {
        // You can retrieve any necessary data here, for example:
        // $data = Model::all(); // Replace with your actual model and data retrieval logic

        // Return the view for the merchant dashboard
        return view('merchant.profile.index', [
            // Pass any data to the view if needed
            // 'data' => $data,
        ]);
    }
}