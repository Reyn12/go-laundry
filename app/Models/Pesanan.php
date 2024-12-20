<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Merchant;
use App\Models\LayananLaundry;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'id_user',
        'id_merchant',
        'total_harga',
        'status',
        'tanggal_pesanan',
        'metode_pembayaran',
        'bukti_pembayaran',
        'created_at',
        'updated_at'
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi dengan Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'id_merchant');
    }

    // Relasi dengan LayananLaundry (jika ada)
    public function layananLaundry()
    {
        return $this->belongsToMany(LayananLaundry::class, 'detail_pesanan', 'id_pesanan', 'id_layanan');
    }
}
