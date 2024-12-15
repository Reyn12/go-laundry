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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Foreign key ke tabel users
            $table->string('nama_laundry'); // Nama toko laundry
            $table->string('alamat_laundry'); // Alamat toko laundry
            $table->text('deskripsi'); // Deskripsi laundry
            $table->decimal('latitude', 10, 8); // Koordinat latitude (untuk maps)
            $table->decimal('longitude', 11, 8); // Koordinat longitude (untuk maps)
            $table->string('no_hp'); // Nomor telepon toko laundry
            $table->string('email')->nullable(); // Email toko laundry (opsional)
            $table->timestamps(); // Waktu dibuat dan diperbarui
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
