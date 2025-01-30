<?php
namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginUserController extends Controller
{
    // Metode untuk menampilkan form login
    public function showLoginForm()
    {
        return view('user.login.index'); 
    }

    public function login_proses(Request $request)
    {
    // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        Log::debug('Input tervalidasi', ['credentials' => $credentials]);
        Log::debug('Mencoba login dengan kredensial', ['username' => $credentials['username'], 'password' => $credentials['password']]);
        Log::debug('Login proses dimulai', ['input' => $request->all()]);

        if (Auth::attempt($credentials)) {
            Log::info('Login berhasil', ['username' => $credentials['username']]);

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
}
