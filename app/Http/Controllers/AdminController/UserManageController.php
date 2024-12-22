<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserManageController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        
        // Filter berdasarkan role jika ada
        if ($request->role && $request->role !== 'all') {
            $query->where('role', $request->role);
        }
        
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'aktif')->count();
        $newUsers = User::whereDate('created_at', '>=', now()->subWeek())->count();
        
        $activePercentage = $totalUsers > 0 ? round(($activeUsers / $totalUsers) * 100) : 0;
        
        // Get users with pagination
        $users = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        
        return view('admin.dashboard.user-manage.index', [
            'users' => $users,
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'newUsers' => $newUsers,
            'activePercentage' => $activePercentage,
            'title' => 'User Management',
            'selectedRole' => $request->role ?? 'all'
        ]);
    }

    public function create()
    {
        return view('admin.dashboard.user-manage.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create user
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.dashboard.user-manage.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        // Update user
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
