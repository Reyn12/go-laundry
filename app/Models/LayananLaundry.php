<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Merchant;
use App\Models\Pesanan;

class LayananLaundry extends Model
{
    use HasFactory;

    protected $table = 'layanan_laundries';

    protected $fillable = [
        'merchant_id',
        'kategori_layanan',
        'nama_layanan',
        'harga_per_unit',
        'satuan',
        'waktu_pengerjaan',
        'deskripsi',
        'created_at',
        'updated_at'
    ];

    // Relasi dengan Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }

    // Relasi dengan Pesanan
    public function pesanan()
    {
        return $this->belongsToMany(Pesanan::class, 'detail_pesanan', 'id_layanan', 'id_pesanan');
    }
}
