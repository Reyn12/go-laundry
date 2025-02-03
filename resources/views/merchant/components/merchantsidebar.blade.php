{{-- Sidebar Component --}}
<div class="sidebar bg-white w-64 h-full p-4 flex flex-col">

    {{-- Logo Admin dan Nama Admin --}}
    <div class="flex justify-start items-center p-1">
        <span class="flex items-center justify-center w-12 h-12 bg-white rounded-full mr-2 ml-2">
            <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="">
        </span>
        <span>
            <p class="text-black text-sm font-bold tracking-wide">Krisna Ariangga</p>
            <p class="text-slate-400 text-xs tracking-wide text-sm">Merchant</p>
        </span>
    </div>

    <hr class="border-2 border-slate-200 mt-4">

    {{-- Menu Sidebar --}}
    <ul class="mt-4 space-y-2">
        {{-- Dashboard --}}
        <li>
            <a href="{{ route('merchant.dashboard') }}"
                class="flex items-center px-6 py-2 rounded-lg cursor-pointer 
                {{ request()->routeIs('merchant.dashboard') ? 'bg-blue-100 text-blue-600 font-bold' : 'hover:bg-blue-100' }}">
                <img src="{{ asset('images/icons/iconDashboard.svg') }}" alt="Dashboard" class="w-5 h-5 mr-2">
                Dashboard
            </a>
        </li>

        {{-- Profile Merchant --}}
        <li>
            <a href="{{ route('merchant.profile') }}"
                class="flex items-center px-6 py-2 rounded-lg cursor-pointer 
                {{ request()->routeIs('merchant.profile') ? 'bg-blue-100 text-blue-600 font-bold' : 'hover:bg-blue-100' }}">
                <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="Profile Merchant" class="w-5 h-5 mr-2">
                Profile Merchant
            </a>
        </li>

        {{-- Kelola Layanan --}}
        <li>
            <a href="{{ route('merchant.kelolalayanan') }}"
                class="flex items-center px-6 py-2 rounded-lg cursor-pointer 
                {{ request()->routeIs('merchant.kelolalayanan') ? 'bg-blue-100 text-blue-600 font-bold' : 'hover:bg-blue-100' }}">
                <img src="{{ asset('images/icons/iconKelolaMerchant.svg') }}" alt="Kelola Layanan" class="w-5 h-5 mr-2">
                Kelola Layanan
            </a>
        </li>

        {{-- Manajemen Pesanan --}}
        <li>
            <a href="{{ route('merchant.manajemenpemesanan') }}"
                class="flex items-center px-6 py-2 rounded-lg cursor-pointer 
                {{ request()->routeIs('merchant.manajemenpemesanan') ? 'bg-blue-100 text-blue-600 font-bold' : 'hover:bg-blue-100' }}">
                <img src="{{ asset('images/icons/iconMerchantManage.svg') }}" alt="Manajemen Pesanan" class="w-5 h-5 mr-2">
                Manajemen Pesanan
            </a>
        </li>

        {{-- Ulasan dan Pendapatan --}}
        <li>
            <a href="{{ route('merchant.ulasan') }}"
                class="flex items-center px-6 py-2 rounded-lg cursor-pointer 
                {{ request()->routeIs('merchant.ulasan') ? 'bg-blue-100 text-blue-600 font-bold' : 'hover:bg-blue-100' }}">
                <img src="{{ asset('images/icons/iconLaporan.svg') }}" alt="Ulasan & Pendapatan" class="w-5 h-5 mr-2">
                Ulasan & Pendapatan
            </a>
        </li>

        {{-- Penarikan Saldo --}}
        <li>
            <a href="{{ route('merchant.penarikansaldo') }}"
                class="flex items-center px-6 py-2 rounded-lg cursor-pointer 
                {{ request()->routeIs('merchant.penarikansaldo') ? 'bg-blue-100 text-blue-600 font-bold' : 'hover:bg-blue-100' }}">
                <img src="{{ asset('images/icons/iconCashout.svg') }}" alt="Penarikan Saldo" class="w-5 h-5 mr-2">
                Penarikan Saldo
            </a>
        </li>

        <hr class="border-2 border-slate-200 mt-4">

        {{-- Pengaturan --}}
        <li>
            <a href="#" class="block">
                <div class="menu-sidebar mt-4 flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/dashboard/reports') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100' }}">
                    <span class="mr-4"><img src="{{ asset('images/icons/iconPengaturan.svg') }}" alt=""></span>
                    <span>Pengaturan</span>
                </div>
            </a>
        </li>

        {{-- Notifikasi --}}
        <li>
            <a href="#" class="block">
                <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/reports') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100' }}">
                    <span class="mr-4"><img src="{{ asset('images/icons/iconNotifikasi.svg') }}" alt=""></span>
                    <span>Notifikasi</span>
                </div>
            </a>
        </li>
    </ul>

    {{-- Logout Button --}}
    <div class="button-logout mt-auto flex items-center justify-center w-full">
        <form action="{{ route('merchant.logout') }}" method="POST" class="w-3/4">
            @csrf
            <button type="submit" class="flex items-center px-4 py-2 bg-red-700 text-white rounded-lg hover:bg-red-600 w-full justify-center">
                <span class="mr-2">
                    <img src="{{ asset('images/icons/iconLogout.svg') }}" alt="Logout" class="w-5 h-5">
                </span>
                Logout
            </button>
        </form>
    </div>
</div>
