<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DashboardUserController extends Controller
{
    public function index()
    {
        // Create dummy user
        $user = (object)[
            'name' => 'John Doe',
            'profile_image' => null,
            'created_at' => now()
        ];

        // Create dummy orders data
        $orders = collect([
            (object)[
                'item_name' => 'Baju Kemeja',
                'amount' => 3,
                'created_at' => '2024-12-20',
                'status' => 'dilaundry'
            ],
            (object)[
                'item_name' => 'Celana Jeans',
                'amount' => 2,
                'created_at' => '2024-12-19',
                'status' => 'selesai'
            ],
            (object)[
                'item_name' => 'Jaket Hoodie',
                'amount' => 1,
                'created_at' => '2024-12-18',
                'status' => 'dilaundry'
            ],
            (object)[
                'item_name' => 'Kaos',
                'amount' => 5,
                'created_at' => '2024-12-17',
                'status' => 'selesai'
            ]
        ]);

        return view('user.dashboard.index', [
            'user' => $user,
            'washCount' => 2,
            'ironCount' => 1,
            'orders' => $orders
        ]);
    }
}