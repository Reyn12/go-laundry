<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMerchantController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'merchant') {
            return redirect('/merchant/dashboard');
        }
        return view('merchant.login.index');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Coba login menggunakan credentials
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Cek role dan status user
            if ($user->role === 'merchant' && $user->status === 'aktif') {
                $request->session()->regenerate();
                return redirect('/merchant/dashboard');
            }
            
            // Jika user bukan merchant atau status nonaktif, logout
            Auth::logout();
            return back()->withErrors([
                'username' => $user->role !== 'merchant' ? 
                    'Akun ini bukan akun merchant.' : 
                    'Akun merchant anda sedang nonaktif.'
            ])->withInput();
        }

        // Jika login gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/merchant/login');
    }
}
