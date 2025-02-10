{{-- Card 3 User Manage Component --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
    {{-- Total User Card --}}
    <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-4 md:p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white text-xs md:text-sm">Total User</p>
                <h3 class="text-white text-xl md:text-2xl font-bold mt-1 md:mt-2">{{ number_format($totalUsers ?? 0) }}</h3>
            </div>
            <div class="bg-blue-500/30 p-2 md:p-3 rounded-full">
                <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="Users" class="w-5 h-5 md:w-6 md:h-6">
            </div>
        </div>
        <p class="text-blue-200 text-[10px] md:text-xs mt-2 md:mt-4">Semua user terdaftar</p>
    </div>

    {{-- Active User Card --}}
    <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 p-4 md:p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white text-xs md:text-sm">Active Users</p>
                <h3 class="text-white text-xl md:text-2xl font-bold mt-1 md:mt-2">{{ number_format($activeUsers ?? 0) }}</h3>
            </div>
            <div class="bg-indigo-500/30 p-2 md:p-3 rounded-full">
                <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="Active Users" class="w-5 h-5 md:w-6 md:h-6">
            </div>
        </div>
        <p class="text-indigo-200 text-[10px] md:text-xs mt-2 md:mt-4">{{ $activePercentage ?? 0 }}% dari total users</p>
    </div>

    {{-- New Users Card --}}
    <div class="bg-gradient-to-br from-cyan-600 to-cyan-800 p-4 md:p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white text-xs md:text-sm">New Users</p>
                <h3 class="text-white text-xl md:text-2xl font-bold mt-1 md:mt-2">{{ number_format($newUsers ?? 0) }}</h3>
            </div>
            <div class="bg-cyan-500/30 p-2 md:p-3 rounded-full">
                <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="New Users" class="w-5 h-5 md:w-6 md:h-6">
            </div>
        </div>
        <p class="text-cyan-200 text-[10px] md:text-xs mt-2 md:mt-4">Bergabung minggu ini</p>
    </div>
</div>