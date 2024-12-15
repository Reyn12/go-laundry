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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanans'); // foreign key ke tabel pesanan
            $table->enum('metode_pembayaran', ['COD', 'QRIS']); // metode pembayaran
            $table->decimal('jumlah', 10, 2); // jumlah yang dibayar
            $table->decimal('biaya_admin', 10, 2); // biaya admin
            $table->enum('status', ['belum dibayar', 'sudah dibayar', 'gagal']); // status pembayaran
            $table->timestamp('tanggal_pembayaran')->nullable(); // tanggal pembayaran dilakukan
            $table->timestamps(); // waktu dibuat dan diperbarui
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
