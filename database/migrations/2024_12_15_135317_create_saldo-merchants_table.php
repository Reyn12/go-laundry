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
        Schema::create('saldo_merchants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained('merchants'); // foreign key ke tabel merchants
            $table->decimal('saldo_tersedia', 10, 2); // saldo tersedia
            $table->decimal('saldo_terkunci', 10, 2); // saldo terkunci
            $table->decimal('saldo_diproses', 10, 2); // saldo diproses
            $table->timestamps(); // waktu terakhir diperbarui dan waktu dibuat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saldo_merchants');
    }
};
