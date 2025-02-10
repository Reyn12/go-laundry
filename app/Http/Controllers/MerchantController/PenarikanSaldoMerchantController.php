<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\PenarikanSaldo;
use App\Models\SaldoMerchant;
use Illuminate\Support\Facades\Auth;

class PenarikanSaldoMerchantController extends Controller
{
    public function index()
    {
        $merchant = Merchant::where('user_id', Auth::id())->first();
        $saldo = SaldoMerchant::where('merchant_id', $merchant->id)->first();
        
        return view('merchant.penarikansaldo.index', [
            'merchant' => $merchant,
            'saldo' => $saldo
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank' => 'required|string',
            'account_number' => 'required|string',
            'amount' => 'required|numeric|min:10000'
        ]);

        $merchant = Merchant::where('user_id', Auth::id())->first();
        $saldo = SaldoMerchant::where('merchant_id', $merchant->id)->first();

        if($request->amount > $saldo->saldo_tersedia) {
            return redirect()->back()->with('error', 'Saldo tidak mencukupi!');
        }

        // Kurangi saldo merchant
        $saldo->saldo_tersedia -= $request->amount;
        $saldo->save();

        // Catat history penarikan
        PenarikanSaldo::create([
            'merchant_id' => $merchant->id,
            'bank' => $request->bank,
            'account_number' => $request->account_number,
            'amount' => $request->amount,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Permintaan penarikan saldo berhasil diajukan!');
    }
}