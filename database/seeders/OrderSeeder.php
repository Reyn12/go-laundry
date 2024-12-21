<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create(['name' => 'Baju', 'amount' => 3, 'date' => '2024-04-02', 'status' => 'Dibatalkan']);
        Order::create(['name' => 'Celana', 'amount' => 3, 'date' => '2024-04-02', 'status' => 'Selesai']);
        Order::create(['name' => 'Handuk', 'amount' => 3, 'date' => '2024-04-02', 'status' => 'Selesai']);
    }
}
