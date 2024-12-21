<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Merchant;

class SaldoMerchant extends Model
{
    use HasFactory;

    protected $table = 'saldo_merchants';

    protected $fillable = [
        'id_merchant',
        'saldo',
        'created_at',
        'updated_at'
    ];

    // Relasi dengan Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'id_merchant');
    }
}
