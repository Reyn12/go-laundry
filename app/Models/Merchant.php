<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pesanan;
use App\Models\LayananLaundry;
use App\Models\Review;
use App\Models\SaldoMerchant;

class Merchant extends Model
{
    use HasFactory;

    protected $table = 'merchants';

    protected $fillable = [
        'user_id',
        'nama_laundry',
        'alamat_laundry',
        'deskripsi',
        'no_hp',
        'email',
        'latitude',
        'longitude',
        'created_at',
        'updated_at'
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan Pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_merchant');
    }

    // Relasi dengan LayananLaundry
    public function layananLaundry()
    {
        return $this->hasMany(LayananLaundry::class, 'id_merchant');
    }

    // Relasi dengan Review
    public function review()
    {
        return $this->hasMany(Review::class, 'id_merchant');
    }

    // Relasi dengan SaldoMerchant
    public function saldoMerchant()
    {
        return $this->hasOne(SaldoMerchant::class, 'id_merchant');
    }
}
