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
            $request->session()->regenerate();
            $user = Auth::user();
            
            // Simpan username ke session
            session(['username' => $user->username]);
        
            return redirect()->route('user.dashboard');
        }

        Log::warning('Login gagal: Username atau password salah', ['username' => $request->username]);
        Auth::logout();        

        // Jika login gagal
        Log::warning('Login gagal: Username atau password salah', ['username' => $request->username]);
        Auth::logout();

        return redirect()
            ->route('user.login')
            ->with('failed', 'Username atau password salah!')
            ->withInput($request->only('username'));
    }

    // Metode untuk logout
    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/user/login');
}
}


