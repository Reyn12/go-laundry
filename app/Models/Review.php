<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Pesanan;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';

    protected $fillable = [
        'id_user',
        'id_merchant',
        'id_pesanan',
        'rating',
        'ulasan',
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

    // Relasi dengan Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }
}
