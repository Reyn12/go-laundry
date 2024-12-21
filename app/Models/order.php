<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Kolom yang diizinkan untuk diisi
    protected $fillable = ['name', 'amount', 'date', 'status'];
}
?>

@forelse ($orders as $order)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $order->name }}</td>
        <td>{{ $order->amount }} Pcs</td>
        <td>{{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</td>
        <td>
            @if ($order->status == 'selesai')
                <span class="badge bg-success">{{ $order->status }}</span>
            @elseif ($order->status == 'Dibatalkan')
                <span class="badge bg-danger">{{ $order->status }}</span>
            @else
                <span class="badge bg-warning text-dark">{{ $order->status }}</span>
            @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center">Tidak ada data pesanan.</td>
    </tr>
@endforelse
