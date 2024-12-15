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
        Schema::create('layanan_laundries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained('merchants'); // Foreign key ke tabel merchants
            $table->string('kategori_layanan'); // Kategori layanan
            $table->string('nama_layanan'); // Nama layanan
            $table->decimal('harga_per_unit', 10, 2); // Harga per unit
            $table->string('satuan'); // Satuan
            $table->string('waktu_pengerjaan'); // Waktu pengerjaan
            $table->text('deskripsi')->nullable(); // Deskripsi layanan (opsional)
            $table->timestamps(); // Waktu dibuat dan diperbarui
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_laundries');
    }
};
