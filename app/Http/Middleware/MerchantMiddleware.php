<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('merchant.login');
        }

        $merchant = Merchant::where('user_id', auth()->id())->first();
        if (!$merchant) {
            auth()->logout();
            return redirect()->route('merchant.login')
                ->with('error', 'Akses ditolak. Anda bukan merchant.');
        }

        return $next($request);
    }
}