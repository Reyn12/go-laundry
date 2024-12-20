<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterMerchantController extends Controller
{
    public function index()
    {
        return view('merchant.register.index');
    }
}
