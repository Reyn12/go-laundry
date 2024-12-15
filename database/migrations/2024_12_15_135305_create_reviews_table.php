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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanans'); // foreign key ke tabel pesanan
            $table->foreignId('customer_id')->constrained('users'); // foreign key ke tabel users
            $table->integer('rating')->check('rating >= 1 AND rating <= 5'); // rating
            $table->text('komentar')->nullable(); // komentar
            $table->timestamps(); // waktu dibuat dan diperbarui
            $table->foreignId('merchant_id')->constrained('merchants'); // foreign key ke tabel merchants
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
