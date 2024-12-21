<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        // You can retrieve any necessary data here, for example:
        // $data = Model::all(); // Replace with your actual model and data retrieval logic

        // Return the view for the admin dashboard
        return view('user.dashboard.index', [
            // Pass any data to the view if needed
            // 'data' => $data,
        ]);
    }
}