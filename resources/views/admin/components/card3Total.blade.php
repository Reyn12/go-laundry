<div class="tengah flex w-full h-full flex-col gap-4">
    {{-- Statistics Cards --}}
    <div class="stats grid grid-cols-3 gap-10">

        {{-- Total Transaksi Card --}}
        <div class="card bg-primary p-6 rounded-xl text-white shadow-lg cursor-pointer">
            <div class="flex items-center gap-2 mb-4">
                <img src="{{ asset('images/icons/iconLaporan.svg') }}" alt="iconLaporan">
                <span class="font-semibold">Total Transaksi</span>
            </div>
            <div class="text-4xl font-bold mb-2">10,227</div>
            <div class="text-sm">Total Transaksi</div>
        </div>

        {{-- Total Users Card --}}
        <div class="card bg-white p-6 rounded-xl shadow-lg cursor-pointer">
            <div class="flex items-center gap-2 mb-4">
                <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="iconProfile">
                <span class="font-semibold">Total Users</span>
            </div>
            <div class="text-4xl font-bold mb-2">8,514</div>
            <div class="text-sm">Total Pelanggan dan Merchant</div>
        </div>

        {{-- Total Merchant Card --}}
        <div class="card bg-white p-6 rounded-xl shadow-lg cursor-pointer">
            <div class="flex items-center gap-2 mb-4">
                <img src="{{ asset('images/icons/iconMerchantManage.svg') }}" alt="iconMerchant">
                <span class="font-semibold">Total Merchant</span>
            </div>
            <div class="text-4xl font-bold mb-2">235</div>
            <div class="text-sm">Total Laundry Aktif</div>
        </div>

        
    </div>
</div>