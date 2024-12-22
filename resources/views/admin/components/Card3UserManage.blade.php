{{-- Card 3 User Manage Component --}}
<div class="grid grid-cols-3 gap-4">
    {{-- Total User Card --}}
    <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white text-sm">Total User</p>
                <h3 class="text-white text-2xl font-bold mt-2">{{ number_format($totalUsers) }}</h3>
            </div>
            <div class="bg-blue-500/30 p-3 rounded-full">
                <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="Users" class="w-6 h-6">
            </div>
        </div>
        <p class="text-blue-200 text-xs mt-4">Semua user terdaftar</p>
    </div>

    {{-- Active User Card --}}
    <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white text-sm">Active Users</p>
                <h3 class="text-white text-2xl font-bold mt-2">{{ number_format($activeUsers) }}</h3>
            </div>
            <div class="bg-indigo-500/30 p-3 rounded-full">
                <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="Active Users" class="w-6 h-6">
            </div>
        </div>
        <p class="text-indigo-200 text-xs mt-4">{{ $activePercentage }}% dari total users</p>
    </div>

    {{-- New Users Card --}}
    <div class="bg-gradient-to-br from-cyan-600 to-cyan-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white text-sm">New Users</p>
                <h3 class="text-white text-2xl font-bold mt-2">{{ number_format($newUsers) }}</h3>
            </div>
            <div class="bg-cyan-500/30 p-3 rounded-full">
                <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="New Users" class="w-6 h-6">
            </div>
        </div>
        <p class="text-cyan-200 text-xs mt-4">Bergabung minggu ini</p>
    </div>
</div>