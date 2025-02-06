<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Merchant-Manage</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        .bg-primary {
            background-color: #0039C9;
        }
        .text-primary {
            color: #0039C9;
        }
    </style>
    <script>
        // Set default theme to light
        if (!localStorage.getItem('theme')) {
            localStorage.setItem('theme', 'light');
        }
        // Apply theme on page load
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="dark:bg-gray-900">
    {{-- container --}}
    <div class="w-full h-screen flex bg-gray-100 dark:bg-gray-900" x-data="{ isOpen: false }">
        {{-- Hamburger Menu untuk Mobile --}}
        <button 
            @click="isOpen = !isOpen" 
            class="md:hidden fixed top-4 left-4 z-50 bg-white dark:bg-gray-800 p-2 rounded-lg shadow-lg">
            <svg class="w-6 h-6 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        {{-- Sidebar dengan toggle --}}
        <div 
            class="fixed md:static inset-y-0 left-0 transform -translate-x-full md:translate-x-0 w-64 transition-transform duration-200 ease-in-out z-30"
            :class="{'translate-x-0': isOpen}">
            @include('admin.components.sidebar')
        </div>

        {{-- Overlay untuk Mobile saat sidebar terbuka --}}
        <div 
            class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden" 
            x-show="isOpen"
            @click="isOpen = false">
        </div>

        {{-- Content --}}
        <div class="content flex-1 h-full p-4 overflow-y-scroll">
            {{-- Header --}}
            <div class="sticky top-0 z-10 mb-4">
                @include('admin.components.header')
            </div>
            
            {{-- Main Content --}}
            <div class="flex flex-col bg-white dark:bg-gray-800 rounded-lg shadow-lg"> 
                {{-- Navigation Tabs --}}
                @include('admin.components.nav-MerchantManage')
                {{-- Sort dan Filter Merchant--}}
                @include('admin.components.sortDanFilterMerchant')

                {{-- Conditional Content --}}
                @if(request()->routeIs('admin.dashboard.merchant-manage.index') || request()->routeIs('admin.dashboard.merchant-manage.all'))
                    {{-- Card All Merchant --}}
                    @include('admin.components.cardAllMerchant', ['merchants' => $merchants])
                @elseif(request()->routeIs('admin.dashboard.merchant-manage.pending'))
                    {{-- Card Pending Verifikasi --}}
                    @include('admin.components.cardPendingVerifikasi')
                @elseif(request()->routeIs('admin.dashboard.merchant-manage.verified'))
                    {{-- Card Verified --}}
                    @include('admin.components.cardVerified')
                @endif

                {{-- Content Area --}}
                <div class="p-6 dark:bg-gray-800">
                    <!-- Content akan ditambahkan nanti -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>