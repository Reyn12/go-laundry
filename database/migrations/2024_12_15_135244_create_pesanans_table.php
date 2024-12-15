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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users'); // foreign key ke tabel users (customer)
            $table->foreignId('layanan_id')->constrained('layanan_laundries'); // foreign key ke tabel layanan_laundry
            $table->enum('status', ['menunggu', 'proses', 'selesai', 'dibatalkan']); // status pesanan
            $table->string('alamat_pengambilan'); // alamat pengambilan
            $table->string('alamat_pengiriman'); // alamat pengiriman
            $table->decimal('total_harga', 10, 2); // total harga pesanan
            $table->decimal('berat_kg', 10, 2); // berat cucian dalam kg
            $table->integer('jumlah_pesanan'); // jumlah pesanan
            $table->timestamps(); // waktu dibuat dan diperbarui
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
