<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterUserController extends Controller
{
    public function index()
    {
        Log::info('Halaman registrasi user diakses');
        return view('user.register.index');
    }

    public function store(Request $request)
    {
        try {
            // Log request data (kecuali password)
            Log::info('Mencoba registrasi user baru', [
                'fullName' => $request->fullName,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            
            // Validasi input
            Log::info('Memulai validasi data user');
            $validated = $request->validate([
                'fullName' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i'],
                'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9]+$/'],
                'address' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'fullName.required' => 'Nama lengkap harus diisi',
                'fullName.max' => 'Nama lengkap maksimal 255 karakter',
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username sudah digunakan',
                'username.max' => 'Username maksimal 255 karakter',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'email.regex' => 'Email harus menggunakan domain @gmail.com',
                'phone.required' => 'Nomor telepon harus diisi',
                'phone.regex' => 'Nomor telepon hanya boleh berisi angka',
                'phone.max' => 'Nomor telepon maksimal 15 karakter',
                'address.required' => 'Alamat harus diisi',
                'address.max' => 'Alamat maksimal 255 karakter',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal 8 karakter',
                'password.confirmed' => 'Konfirmasi password tidak cocok'
            ]);

            Log::info('Validasi berhasil, membuat user baru');

            // Buat user baru
            $user = User::create([
                'nama_lengkap' => $validated['fullName'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'no_hp' => $validated['phone'],
                'alamat' => $validated['address'],
                'password' => Hash::make($validated['password']),
                'role' => 'customer',
                'status' => 'aktif'
            ]);

            Log::info('User berhasil dibuat', ['user_id' => $user->id]);

            return response()->json([
                'success' => true,
                'message' => 'Registrasi berhasil!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validasi gagal:', [
                'errors' => $e->errors(),
                'request_data' => [
                    'fullName' => $request->fullName,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address
                ]
            ]);
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error saat registrasi user:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => [
                    'fullName' => $request->fullName,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address
                ]
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat registrasi: ' . $e->getMessage()
            ], 500);
        }
    }
}
