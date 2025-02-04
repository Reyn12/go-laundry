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
        'customer_id',
        'layanan_id',
        'merchant_id',
        'status',
        'alamat_pengambilan',
        'alamat_pengiriman',
        'total_harga',
        'berat_kg',
        'jumlah_pesanan',
        'created_at',
        'updated_at'
    ];

      // Relasi dengan User
      public function user()
      {
          return $this->belongsTo(User::class, 'customer_id', 'id');
      }
  
      // Relasi dengan LayananLaundry
      public function layanan()
      {
          return $this->belongsTo(LayananLaundry::class, 'layanan_id');
      }

    // Relasi dengan Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }

    
}
