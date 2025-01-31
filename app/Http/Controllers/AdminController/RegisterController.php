<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.register.index');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Register attempt with data:', $request->except('password', 'password_confirmation'));
            
            $validated = $request->validate([
                'fullName' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i'],
                'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9]+$/'],
                'address' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'phone.regex' => 'Nomor telepon hanya boleh berisi angka',
                'email.regex' => 'Email harus menggunakan domain @gmail.com'
            ]);

            Log::info('Validation passed, creating user');

            User::create([
                'nama_lengkap' => $validated['fullName'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'no_hp' => $validated['phone'],
                'alamat' => $validated['address'],
                'password' => Hash::make($validated['password']),
                'role' => 'admin',
                'status' => 'nonaktif'
            ]);

            Log::info('User created successfully');

            return response()->json([
                'success' => true,
                'message' => 'Registrasi berhasil!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed:', ['errors' => $e->errors()]);
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Registration failed:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat registrasi: ' . $e->getMessage()
            ], 500);
        }
    }
}
