<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders();
        
        $washCount = $orders->where('status', 'wash')->count();
        $dryCount = $orders->where('status', 'dry')->count();
        $ironCount = $orders->where('status', 'iron')->count();
        $doneCount = $orders->where('status', 'done')->count();
        
        return view('user.dashboard.index', compact('washCount', 'dryCount', 'ironCount', 'doneCount'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'required|string|max:15',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function orders()
    {
        $orders = Auth::user()->orders()->latest()->paginate(10);
        return view('user.orders.index', compact('orders'));
    }

    public function orderDetail($id)
    {
        $order = Auth::user()->orders()->findOrFail($id);
        return view('user.orders.detail', compact('order'));
    }
}
