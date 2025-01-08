{{-- Card 3 Total Component --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    {{-- Total Transaksi Card --}}
    <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white text-sm">Total Transaksi</p>
                <h3 class="text-white text-2xl font-bold mt-2">{{ number_format($totalTransaksi) }}</h3>
            </div>
            <div class="bg-blue-500/30 p-3 rounded-full">
                <img src="{{ asset('images/icons/iconLaporan.svg') }}" alt="Transaksi" class="w-6 h-6">
            </div>
        </div>
        <p class="text-blue-200 text-xs mt-4">Total Transaksi</p>
    </div>

    {{-- Total Users Card --}}
    <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white text-sm">Total Users</p>
                <h3 class="text-white text-2xl font-bold mt-2">{{ number_format($totalUsers) }}</h3>
            </div>
            <div class="bg-indigo-500/30 p-3 rounded-full">
                <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="Users" class="w-6 h-6">
            </div>
        </div>
        <p class="text-indigo-200 text-xs mt-4">Total Pelanggan dan Merchant</p>
    </div>

    {{-- Total Merchant Card --}}
    <div class="bg-gradient-to-br from-cyan-600 to-cyan-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-white text-sm">Total Merchant</p>
                <h3 class="text-white text-2xl font-bold mt-2">{{ number_format($totalMerchant) }}</h3>
            </div>
            <div class="bg-cyan-500/30 p-3 rounded-full">
                <img src="{{ asset('images/icons/iconMerchantManage.svg') }}" alt="Merchant" class="w-6 h-6">
            </div>
        </div>
        <p class="text-cyan-200 text-xs mt-4">Total Laundry Aktif</p>
    </div>
</div>