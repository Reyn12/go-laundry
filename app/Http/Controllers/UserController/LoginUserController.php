<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginUserController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Logika login akan ditambahkan di sini
        // Setelah login berhasil, redirect ke dashboard
        return redirect()->route('user.dashboard');
    }
}
