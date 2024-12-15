<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique(); // Nama pengguna (unik untuk login)
            $table->string('email')->nullable(); // Email pengguna (opsional)
            $table->string('password'); // Kata sandi (hashed)
            $table->string('nama_lengkap'); // Nama lengkap pemilik akun
            $table->string('no_hp')->nullable(); // Nomor telepon (opsional)
            $table->string('alamat')->nullable(); // Alamat pengguna (opsional)
            $table->enum('role', ['admin', 'merchant', 'customer']); // Peran pengguna
            $table->enum('status', ['aktif', 'nonaktif']); // Status akun
            $table->rememberToken(); // Untuk fitur "Remember Me" saat login
            $table->timestamps(); // Waktu dibuat dan diperbarui
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
