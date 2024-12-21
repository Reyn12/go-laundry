{{-- Sidebar Component --}}
<div class="sidebar bg-white w-64 h-full p-4 flex flex-col">

    {{-- Logo Admin dan nama Admin --}}
    <div class="flex justify-start items-center p-1">
        <span class="flex items-center justify-center w-12 h-12 bg-white rounded-full mr-2 ml-2">
            <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="">
        </span>
        <span>
            <p class="text-black text-sm font-bold tracking-wide">Muh Reyy</p>
            <p class="text-slate-400 text-xs tracking-wide text-sm">CEO, Founder</p>
        </span>
    </div>

    <hr class="border-2 border-slate-200 mt-4">
    {{-- Menu Sidebar --}}
    <ul class="mt-4">

        {{-- Dashboard --}}
        <li>
            <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/dashboard') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100' }}">
                <span class="mr-4"><img src="{{ asset('images/icons/iconDashboard.svg') }}" alt=""></span>
                <a href="../dashboard" class="">Dashboard</a>
            </div>
        </li>

        {{-- User Manage --}}
        <li>
            <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/user-manage') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100' }}">
                <span class="mr-4"><img src="{{ asset('images/icons/iconUserManage.svg') }}" alt=""></span>
                <a href="" class="">User Manage</a>
            </div>
        </li>

        {{-- Merchant Manage --}}
        <li>
            <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/merchant-manage') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100' }}">
                <span class="mr-4"><img src="{{ asset('images/icons/iconMerchantManage.svg') }}" alt=""></span>
                <a href="#" class="">Merchant Manage</a>
            </div>
        </li>

        {{-- Laporan & Statistik --}}
        <li>
            <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/reports') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100' }}">
                <span class="mr-4"><img src="{{ asset('images/icons/iconLaporan.svg') }}" alt=""></span>
                <a href="#" class="">Laporan & Statistik</a>
            </div>
        </li>
        <hr class="border-2 border-slate-200 mt-4">

        {{-- Pengaturan --}}
        <li>
            <div class="menu-sidebar mt-4 flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/reports') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100' }}">
                <span class="mr-4"><img src="{{ asset('images/icons/iconPengaturan.svg') }}" alt=""></span>
                <a href="#" class="">Pengaturan</a>
            </div>
        </li>

        {{-- Notifikasi --}}
        <li>
            <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/reports') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100' }}">
                <span class="mr-4"><img src="{{ asset('images/icons/iconNotifikasi.svg') }}" alt=""></span>
                <a href="#" class="">Notifikasi</a>
            </div>
        </li>
    </ul>

    {{-- <div class="flex-grow"></div> --}}
    <div class="button-logout mt-auto flex items-center justify-center w-full">
        <button class="flex items-center px-4 py-2 bg-red-700 text-white rounded-lg hover:bg-red-600 w-3/4 justify-center">
            <span class="mr-2">
                <img src="{{ asset('images/icons/iconLogout.svg') }}" alt="Logout" class="w-5 h-5">
            </span>
            Logout
        </button>
    </div>
</div>
