<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesanan;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'pesanan_id',
        'metode_pembayaran',
        'jumlah',
        'biaya_admin',
        'status',
        'tanggal_pembayaran',
        'created_at',
        'updated_at'
    ];

    // Relasi dengan Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }
}
