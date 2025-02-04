<?php

namespace App\Http\Controllers\MerchantController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterMerchantController extends Controller
{
    public function index()
    {
        return view('merchant.register.index');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Mencoba registrasi merchant baru', ['data' => $request->all()]);
            
            $validator = $request->validate([
                'username'=> 'required|string|unique:users,username',
                'laundryName' => 'required|string|max:255',
                'laundryAddress' => 'required|string',
                'phone' => 'required|string|max:15',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'description' => 'nullable|string',
                'operationalHours' => 'required|string',
            ]);

            DB::beginTransaction();
            
            // Buat user baru
            $user = User::create([
                'username' => strtolower(str_replace(' ', '', $request->username)),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'nama_lengkap' => $request->laundryName,
                'no_hp' => $request->phone,
                'alamat'=> $request->laundryAddress,
                'role' => 'merchant',
                'status' => 'aktif'
            ]);

            Log::info('User berhasil dibuat', ['user_id' => $user->id]);

            // Buat merchant baru dengan default latitude longitude
            $merchant = Merchant::create([
                'user_id' => $user->id,
                'nama_laundry' => $request->laundryName,
                'alamat_laundry' => $request->laundryAddress,
                'deskripsi' => $request->description,
                'no_hp' => $request->phone,
                'email' => $request->email,
                'jam_operasional' => $request->operationalHours,
                'latitude' => -6.914744, // Default latitude Bandung
                'longitude' => 107.609810 // Default longitude Bandung
            ]);

            Log::info('Merchant berhasil dibuat', ['merchant_id' => $merchant->id]);

            DB::commit();
            
            // Login user setelah register
            auth()->login($user);
            
            return response()->json([
                'success' => true,
                'message' => 'Registrasi berhasil!'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error', [
                'errors' => $e->errors(),
                'request' => $request->all()
            ]);
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error saat registrasi merchant', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat registrasi: ' . $e->getMessage()
            ], 500);
        }
    }
}
