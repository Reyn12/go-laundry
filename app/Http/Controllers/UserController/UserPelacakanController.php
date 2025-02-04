<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pesanan;

class UserPelacakanController extends Controller
{
    public function show($id = null)
{
    $orders = collect(Pesanan::where('Customer_id', auth()->id())->get());
    if ($orders->isEmpty()) {
        return abort(404, 'Pesanan tidak ditemukan');
    }

    return view('user.pelacakan.index', compact('orders'));
}
}
