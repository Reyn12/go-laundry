<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginUserController extends Controller
{
    public function login_proses(Request $request)
    {
        Log::info(request()->all()); // Tambahkan ini untuk mencatat semua data yang diterima
        // Log debug input request
        Log::debug('Login proses dimulai', ['input' => $request->all()]);

        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        Log::debug('Input tervalidasi', ['credentials' => $credentials]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Log::info('User berhasil login', ['user_id' => $user->id, 'role' => $user->role]);

            if ($user->role === 'customer') {
                $request->session()->regenerate();
                Log::info('Sesi berhasil diregenerasi', ['user_id' => $user->id]);

                return redirect()->route('user.dashboard');
            }

            Log::warning('Login gagal: Bukan akun user', ['user_id' => $user->id]);
            return back()->withErrors([
                'username' => 'Invalid credentials or not an user account.',
            ])->onlyInput('username');
        }

        // Jika login gagal
        Log::warning('Login gagal: Username atau password salah', ['username' => $request->username]);
        Auth::logout();

        return redirect()
            ->route('user.login')
            ->with('failed', 'Username atau password salah!')
            ->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        Log::info('User melakukan logout', ['user_id' => Auth::id()]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info('Sesi berhasil dihapus');

        return redirect('/user/login');
    }
}
