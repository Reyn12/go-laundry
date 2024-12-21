<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('name');      // Nama item
        $table->integer('amount');   // Jumlah
        $table->date('date');        // Tanggal
        $table->string('status');    // Status (selesai/dibatalkan/dalam proses)
        $table->timestamps();
    });
}

};