{{-- Sidebar Component --}}
<div class="sidebar bg-white dark:bg-gray-800 w-64 h-full p-4 flex flex-col">

    {{-- Logo Admin dan nama Admin --}}
    <div class="flex justify-start items-center p-1">
        <span class="flex items-center justify-center w-12 h-12 bg-white dark:bg-gray-700 rounded-full mr-2 ml-2">
            <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="">
        </span>
        <span>
            <p class="text-black dark:text-white text-sm font-bold tracking-wide">Muh Reyy</p>
            <p class="text-slate-400 dark:text-slate-300 text-xs tracking-wide text-sm">CEO, Founder</p>
        </span>
    </div>

    <hr class="border-2 border-slate-200 dark:border-gray-700 mt-4">
    {{-- Menu Sidebar --}}
    <ul class="mt-4">
        {{-- Dashboard --}}
        <li>
            <a href="{{ route('admin.dashboard') }}" class="block">
                <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/dashboard') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100 dark:hover:bg-gray-700' }}">
                    <span class="mr-4"><img src="{{ asset('images/icons/iconDashboard.svg') }}" alt=""></span>
                    <span class="dark:text-white">Dashboard</span>
                </div>
            </a>
        </li>

        {{-- User Manage --}}
        <li>
            <a href="{{ route('admin.dashboard.user-manage.index') }}" class="block">
                <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/dashboard/user-manage') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100 dark:hover:bg-gray-700' }}">
                    <span class="mr-4"><img src="{{ asset('images/icons/iconUserManage.svg') }}" alt=""></span>
                    <span class="dark:text-white">User Manage</span>
                </div>
            </a>
        </li>

        {{-- Merchant Manage --}}
        <li>
            <a href="{{ route('admin.dashboard.merchant-manage.index') }}" class="block">
                <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->routeIs('admin.dashboard.merchant-manage.*') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100 dark:hover:bg-gray-700' }}">
                    <span class="mr-4"><img src="{{ asset('images/icons/iconMerchantManage.svg') }}" alt=""></span>
                    <span class="dark:text-white">Merchant Manage</span>
                </div>
            </a>
        </li>

        {{-- Laporan & Statistik --}}
        <li>
            <a href="#" class="block">
                <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/dashboard/reports') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100 dark:hover:bg-gray-700' }}">
                    <span class="mr-4"><img src="{{ asset('images/icons/iconLaporan.svg') }}" alt=""></span>
                    <span class="dark:text-white">Laporan & Statistik</span>
                </div>
            </a>
        </li>
        <hr class="border-2 border-slate-200 dark:border-gray-700 mt-4">

        {{-- Pengaturan --}}
        <li>
            <a href="#" class="block">
                <div class="menu-sidebar mt-4 flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/dashboard/reports') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100 dark:hover:bg-gray-700' }}">
                    <span class="mr-4"><img src="{{ asset('images/icons/iconPengaturan.svg') }}" alt=""></span>
                    <span class="dark:text-white">Pengaturan</span>
                </div>
            </a>
        </li>

        {{-- Notifikasi --}}
        <li>
            <a href="#" class="block">
                <div class="menu-sidebar flex items-center px-4 py-2 rounded-lg mb-3 {{ request()->is('admin/reports') ? 'bg-primary font-bold text-white' : 'hover:bg-blue-100 dark:hover:bg-gray-700' }}">
                    <span class="mr-4"><img src="{{ asset('images/icons/iconNotifikasi.svg') }}" alt=""></span>
                    <span class="dark:text-white">Notifikasi</span>
                </div>
            </a>
        </li>
    </ul>

    {{-- <div class="flex-grow"></div> --}}
    <div class="button-logout mt-auto flex items-center justify-center w-full px-4">
        <form action="{{ route('logout') }}" method="POST" class="w-full">
            @csrf
            <button class="flex items-center px-6 py-3 bg-red-700 text-white rounded-lg hover:bg-red-600 w-full justify-center">
                <img src="{{ asset('images/icons/iconLogout.svg') }}" alt="Logout" class="w-6 h-6 mr-3">
                <span class="text-lg font-medium">Logout</span>
            </button>
        </form>
    </div>
</div>