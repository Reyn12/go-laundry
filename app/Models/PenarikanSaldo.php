<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenarikanSaldo extends Model
{
    protected $table = 'penarikan_saldo';
    
    protected $fillable = [
        'merchant_id',
        'bank',
        'account_number',
        'amount',
        'status'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}