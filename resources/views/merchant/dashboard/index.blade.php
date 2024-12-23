<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md flex flex-col justify-between flex-shrink-0">
            <div>
                <div class="px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Google" class="w-12 h-12">
                        <div>
                            <h2 class="text-lg font-semibold">Krisna Ariangga</h2>
                            <p class="text-sm text-gray-500">Merchant</p>
                        </div>
                    </div>
                </div>
                <ul class="space-y-2 mt-4">
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer bg-blue-100">Dashboard</li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer">Profile Merchant</li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer">Kelola Layanan</li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer">Manajemen Pesanan</li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer">Penarikan Saldo</li>
                </ul>
                <hr class="my-4 border-gray-200">
                <ul class="space-y-2">
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer">Settings</li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer">Notifikasi</li>
                </ul>
            </div>
            <div class="px-6 py-4">
                <button class="w-full bg-red-600 text-white py-2 rounded-md">Log Out</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <header class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search" class="border border-gray-300 rounded-md px-3 py-2">
                    <span class="text-gray-600">🔔</span>
                    <span class="text-gray-600">🌙</span>
                </div>
            </header>

            <div class="grid grid-cols-4 gap-4 mb-6">
                <!-- Saldo -->
                <div class="bg-white shadow-md p-6 rounded-md col-span-1">
                    <h2 class="text-lg font-semibold mb-4">Halo Key Merchant</h2>
                    <h3 class="text-2xl font-bold">Saldo</h3>
                    <p class="text-lg font-semibold text-green-500">Rp. 2.500.000</p>
                </div>

                <!-- Today's Sales -->
                <div class="bg-white shadow-md p-6 rounded-md col-span-3">
                    <h2 class="text-lg font-semibold mb-4">Statistik Hari Ini</h2>
                    <div class="grid grid-cols-4 gap-4">
                        <div>
                            <h2 class="text-lg font-semibold mb-4">Pendapatan</h2>
                            <h3 class="text-2xl font-bold">Rp.500.000</h3>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold mb-4">Total Order</h2>
                            <h3 class="text-2xl font-bold">200</h3>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold mb-4">Layanan Tersedia</h2>
                            <h3 class="text-2xl font-bold">5</h3>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold mb-4">Pelanggan Baru</h2>
                            <h3 class="text-2xl font-bold">12</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-6">
                <!-- Total Orders Chart -->
                <div class="bg-white shadow-md p-6 rounded-md">
                    <h2 class="text-lg font-semibold mb-4">Total Pesanan Minggu Ini</h2>
                    <div id="ordersChart"></div>
                </div>

                <!-- Earnings Chart -->
                <div class="bg-white shadow-md p-6 rounded-md">
                    <h2 class="text-lg font-semibold mb-4">Pendapatan Minggu Ini</h2>
                    <div id="earningsChart"></div>
                </div>

              
                <!-- Latest Review -->
                <div class="bg-white shadow-md p-6 rounded-md relative">
                    <h2 class="text-lg font-semibold mb-4">Ulasan Terbaru</h2>
                    <div class="border rounded-md p-4 bg-gray-50">
                        <p class="text-gray-800">"Balikin duit gw!! Ga sesuai gw itu duit gw goblok."</p>
                        <p class="text-sm text-gray-500 mt-2">- Agus Sedih, 04 December 2024</p>
                        <p class="text-yellow-500">⭐ 1/5</p>
                    </div>
                    <div class="absolute top-4 right-4 flex items-center space-x-2">
                        <button class="px-3 py-1 bg-gray-300 text-gray-700 rounded">&#9664;</button>
                        <span class="text-sm text-gray-500">1/5</span>
                        <button class="px-3 py-1 bg-gray-300 text-gray-700 rounded">&#9654;</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // ApexCharts - Orders Chart
        var ordersOptions = {
            chart: {
                type: 'bar',
                height: 350
            },
            series: [{
                name: 'Orders',
                data: [80, 90, 70, 100, 60, 110, 95]
            }],
            xaxis: {
                categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']
            }
        };
        var ordersChart = new ApexCharts(document.querySelector("#ordersChart"), ordersOptions);
        ordersChart.render();

        // ApexCharts - Earnings Chart
        var earningsOptions = {
            chart: {
                type: 'line',
                height: 350
            },
            series: [{
                name: 'Earnings',
                data: [500000, 550000, 450000, 600000, 700000, 650000, 720000]
            }],
            xaxis: {
                categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']
            }
        };
        var earningsChart = new ApexCharts(document.querySelector("#earningsChart"), earningsOptions);
        earningsChart.render();
    </script>
</body>
</html>
