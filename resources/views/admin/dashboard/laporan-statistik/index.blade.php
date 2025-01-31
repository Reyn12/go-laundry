<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan-Statistik</title>
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
<body>
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
            <div class="flex gap-3">
                <div class="w-full">
                    {{-- Statistics Cards --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        {{-- Total Transaksi --}}
                        <div class="bg-white dark:bg-gray-800 rounded-[20px] p-6 shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Transaksi</p>
                                    <h3 class="text-2xl font-bold mt-2 dark:text-white">{{ number_format($totalTransaksi) }}</h3>
                                </div>
                                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-sm">
                                <span class="text-{{ $transaksiGrowth >= 0 ? 'green' : 'red' }}-500 dark:text-{{ $transaksiGrowth >= 0 ? 'green' : 'red' }}-400 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                    </svg>
                                    {{ abs($transaksiGrowth) }}%
                                </span>
                                <span class="text-gray-400 dark:text-gray-500 ml-2">dari bulan lalu</span>
                            </div>
                        </div>

                        {{-- Total Pendapatan --}}
                        <div class="bg-white dark:bg-gray-800 rounded-[20px] p-6 shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Pendapatan</p>
                                    <h3 class="text-2xl font-bold mt-2 dark:text-white">Rp {{ number_format($totalPendapatan) }}</h3>
                                </div>
                                <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-sm">
                                <span class="text-{{ $pendapatanGrowth >= 0 ? 'green' : 'red' }}-500 dark:text-{{ $pendapatanGrowth >= 0 ? 'green' : 'red' }}-400 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                    </svg>
                                    {{ abs($pendapatanGrowth) }}%
                                </span>
                                <span class="text-gray-400 dark:text-gray-500 ml-2">dari bulan lalu</span>
                            </div>
                        </div>

                        {{-- Total User --}}
                        <div class="bg-white dark:bg-gray-800 rounded-[20px] p-6 shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Total User</p>
                                    <h3 class="text-2xl font-bold mt-2 dark:text-white">{{ number_format($totalUser) }}</h3>
                                </div>
                                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-sm">
                                <span class="text-{{ $userGrowth >= 0 ? 'green' : 'red' }}-500 dark:text-{{ $userGrowth >= 0 ? 'green' : 'red' }}-400 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                    </svg>
                                    {{ abs($userGrowth) }}%
                                </span>
                                <span class="text-gray-400 dark:text-gray-500 ml-2">dari bulan lalu</span>
                            </div>
                        </div>

                        {{-- Total Merchant --}}
                        <div class="bg-white dark:bg-gray-800 rounded-[20px] p-6 shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Merchant</p>
                                    <h3 class="text-2xl font-bold mt-2 dark:text-white">{{ number_format($totalMerchant) }}</h3>
                                </div>
                                <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-sm">
                                <span class="text-{{ $merchantGrowth >= 0 ? 'green' : 'red' }}-500 dark:text-{{ $merchantGrowth >= 0 ? 'green' : 'red' }}-400 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                    </svg>
                                    {{ abs($merchantGrowth) }}%
                                </span>
                                <span class="text-gray-400 dark:text-gray-500 ml-2">dari bulan lalu</span>
                            </div>
                        </div>
                    </div>

                    {{-- Table Section --}}
                    <div class="bg-white dark:bg-gray-800 rounded-[32px] p-6 shadow-sm">
                        {{-- Table Header with Filters --}}
                        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                            <div class="flex gap-4 overflow-x-auto">
                                <button class="px-4 py-2 text-sm bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 whitespace-nowrap">Transaksi</button>
                                <button class="px-4 py-2 text-sm bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 whitespace-nowrap">User</button>
                                <button class="px-4 py-2 text-sm bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 whitespace-nowrap">Merchant</button>
                            </div>
                            <div class="flex gap-4">
                                <div class="relative">
                                    <input type="text" placeholder="Search" class="pl-10 pr-4 py-2 border rounded-xl bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <button class="px-4 py-2 bg-primary text-white rounded-xl hover:bg-blue-700">Export</button>
                                <button class="px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600">Filter</button>
                            </div>
                        </div>

                        {{-- Table Content --}}
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-left text-sm text-gray-500 dark:text-gray-400">
                                        <th class="pb-4 font-normal">ID Transaksi</th>
                                        <th class="pb-4 font-normal">Merchant</th>
                                        <th class="pb-4 font-normal">Customer</th>
                                        <th class="pb-4 font-normal">Tanggal</th>
                                        <th class="pb-4 font-normal">Total</th>
                                        <th class="pb-4 font-normal">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaksiTerbaru as $transaksi)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="py-3 dark:text-gray-300">#TR-{{ str_pad($transaksi->id, 3, '0', STR_PAD_LEFT) }}</td>
                                        <td class="py-3">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                                    <span class="text-blue-600 dark:text-blue-300">
                                                        {{ strtoupper(substr($transaksi->nama_laundry, 0, 2)) }}
                                                    </span>
                                                </div>
                                                <span class="dark:text-gray-300">{{ $transaksi->nama_laundry }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 dark:text-gray-300">{{ $transaksi->nama_lengkap }}</td>
                                        <td class="py-3 dark:text-gray-300">{{ $transaksi->created_at->format('d M Y') }}</td>
                                        <td class="py-3 dark:text-gray-300">Rp {{ number_format($transaksi->total_harga) }}</td>
                                        <td class="py-3">
                                            <span class="px-3 py-1 bg-{{ $transaksi->status === 'selesai' ? 'green' : 'yellow' }}-100 dark:bg-{{ $transaksi->status === 'selesai' ? 'green' : 'yellow' }}-900 text-{{ $transaksi->status === 'selesai' ? 'green' : 'yellow' }}-700 dark:text-{{ $transaksi->status === 'selesai' ? 'green' : 'yellow' }}-300 rounded-full text-sm">
                                                {{ ucfirst($transaksi->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- Add more rows here --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>