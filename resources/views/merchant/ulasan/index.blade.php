<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan & Pendapatan</title>
    <!-- CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    <!-- Container utama -->
    <div class="w-full h-screen flex bg-gray-100">
        <!-- Sidebar -->
        @include('merchant.components.merchantsidebar')

        <!-- Konten utama -->
        <div class="flex-1 h-full p-4 overflow-y-auto">
            <!-- Header -->
            <div class="sticky top-0 z-10 mb-4 bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-lg font-semibold">{{ $mainTitle ?? $title ?? 'Dashboard' }}</h1>
                        <p class="text-sm text-gray-500">{{ date('d F Y') }}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <input type="search" class="pl-10 pr-4 py-2 w-64 rounded-full bg-gray-100 focus:outline-none" placeholder="Search">
                        </div>
                         {{-- Theme Toggle --}}
                        <div class="theme-toggle flex items-center bg-gray-100 rounded-full p-1 space-x-3">
                            <button class="p-1 rounded-full bg-white">
                                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                                </svg>
                            </button>
                            <button class="p-1">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                            </button>
                         </div>

                        <!-- Profile -->
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden">
                                <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <span class="font-medium">Krisna Ariangga</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konten statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Total Ulasan -->
                <div class="bg-white shadow rounded p-4">
                    <p class="text-gray-500">Total Ulasan</p>
                    <p class="text-3xl font-bold">1000</p>
                    <p class="text-sm text-gray-400">Total ulasan tahun ini</p>
                </div>
                <!-- Rata-rata Rating -->
                <div class="bg-white shadow rounded p-4">
                    <p class="text-gray-500">Rata-Rata Rating</p>
                    <p class="text-3xl font-bold">5.0</p>
                    <p class="text-sm text-gray-400">Rata-rata rating tahun ini</p>
                </div>
                <!-- Rating Breakdown -->
                <div class="bg-white shadow rounded p-4">
                    <h2 class="font-semibold text-lg">Rating Breakdown</h2>
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center">
                            <img src="{{ asset('images/icons/iconStar.svg') }}" alt="Star" class="w-4 h-4 mr-2">
                            <span class="w-6 text-gray-500">5</span>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden mx-2">
                                <div class="h-full bg-green-500" style="width: 60%;"></div>
                            </div>
                            <span class="w-8 text-gray-500">600</span>
                        </div>
                        <div class="flex items-center">
                            <img src="{{ asset('images/icons/iconStar.svg') }}" alt="Star" class="w-4 h-4 mr-2">
                            <span class="w-6 text-gray-500">4</span>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden mx-2">
                                <div class="h-full bg-yellow-500" style="width: 25%;"></div>
                            </div>
                            <span class="w-8 text-gray-500">250</span>
                        </div>
                        <div class="flex items-center">
                            <img src="{{ asset('images/icons/iconStar.svg') }}" alt="Star" class="w-4 h-4 mr-2">
                            <span class="w-6 text-gray-500">3</span>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden mx-2">
                                <div class="h-full bg-blue-500" style="width: 10%;"></div>
                            </div>
                            <span class="w-8 text-gray-500">100</span>
                        </div>
                        <div class="flex items-center">
                            <img src="{{ asset('images/icons/iconStar.svg') }}" alt="Star" class="w-4 h-4 mr-2">
                            <span class="w-6 text-gray-500">2</span>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden mx-2">
                                <div class="h-full bg-red-500" style="width: 5%;"></div>
                            </div>
                            <span class="w-8 text-gray-500">50</span>
                        </div>
                        <div class="flex items-center">
                            <img src="{{ asset('images/icons/iconStar.svg') }}" alt="Star" class="w-4 h-4 mr-2">
                            <span class="w-6 text-gray-500">1</span>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden mx-2">
                                <div class="h-full bg-gray-500" style="width: 0%;"></div>
                            </div>
                            <span class="w-8 text-gray-500">0</span>
                        </div>
                    </div>
                </div>
                <!-- Ulasan Terbaru -->
                <div class="bg-white shadow rounded p-4">
                    <h2 class="font-semibold text-lg">Ulasan Terbaru</h2>
                    <div class="mt-4">
                        <div class="p-4 bg-gray-50 rounded shadow-sm">
                            <p class="font-bold">Agus Sedih</p>
                            <p class="text-yellow-500 text-sm">★☆☆☆☆</p>
                            <p class="text-gray-600 mt-2">Balikin duit gw..! Ga sudi gw itu duit gw gobloq</p>
                            <p class="text-xs text-gray-400 mt-1">04 Desember 2024</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-6">
                <!-- Grafik Pendapatan -->
                <div class="bg-white shadow rounded p-4">
                    <h2 class="font-semibold text-lg">Pendapatan</h2>
                    <p class="text-gray-500 mt-2">Total Pendapatan: <span class="font-bold">Rp. 2.500.000</span></p>
                    <div id="pendapatanChart" class="mt-6"></div>
                </div>
                <!-- Grafik Pesanan -->
                <div class="bg-white shadow rounded p-4">
                    <h2 class="font-semibold text-lg">Pesanan</h2>
                    <div id="pesananChart" class="mt-6"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script ApexCharts -->
    <script>
        // Grafik Pendapatan
        var optionsPendapatan = {
            chart: { type: 'area', height: 350 },
            series: [{ name: 'Pendapatan', data: [1200000, 1800000, 2200000, 2500000, 2300000, 2000000, 2400000, 2600000, 2800000, 3000000, 3200000, 3400000] }],
            xaxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] },
            colors: ['#4f46e5']
        };
        new ApexCharts(document.querySelector("#pendapatanChart"), optionsPendapatan).render();

        // Grafik Pesanan
        var optionsPesanan = {
            chart: { type: 'pie', height: 350 },
            series: [80, 20],
            labels: ['Selesai', 'Dibatalkan'],
            colors: ['#34d399', '#f87171']
        };
        new ApexCharts(document.querySelector("#pesananChart"), optionsPesanan).render();
    </script>
</body>
</html>
