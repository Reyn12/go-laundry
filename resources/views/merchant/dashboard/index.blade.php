<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
        {{-- container --}}
        <div class="w-full h-screen flex bg-gray-100">

            {{-- Include Sidebar Component --}}
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
                            <span class="font-medium">{{ Auth::user()->nama_lengkap }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-5 gap-4 mb-6">
                <!-- Saldo Tersedia -->
                <div class="bg-white shadow-md p-6 rounded-md">
                    <div class="flex justify-center mb-2">
                        <img src={{asset("images/walletx.png")}} alt="Saldo Icon" class="w-8 h-8">
                    </div>
                    <h2 class="text-lg font-semibold mb-1 text-center">Saldo Tersedia</h2>
                    <h3 class="text-2xl font-bold text-center text-green-500">Rp. {{ number_format(Auth::user()->merchant->saldoMerchant->saldo_tersedia ?? 0, 0, ',', '.') }}</h3>
                </div>

                <!-- Pendapatan -->
                <div class="bg-white shadow-md p-6 rounded-md">
                    <div class="flex justify-center mb-2">
                        <img src={{asset("images/icons/iconMerchant1.svg")}} alt="Pendapatan Icon" class="w-8 h-8">
                    </div>
                    <h2 class="text-lg font-semibold mb-1 text-center">Pendapatan</h2>
                    <h3 class="text-2xl font-bold text-center">Rp. {{ number_format($todayIncome ?? 0, 0, ',', '.') }}</h3>
                </div>
                
                <!-- Total Order -->
                <div class="bg-white shadow-md p-6 rounded-md">
                    <div class="flex justify-center mb-2">
                        <img src={{asset("images/icons/iconMerchant2.svg")}} alt="Total Order Icon" class="w-8 h-8">
                    </div>
                    <h2 class="text-lg font-semibold mb-1 text-center">Total Order</h2>
                    <h3 class="text-2xl font-bold text-center">{{ $totalOrders ?? 0 }}</h3>
                </div>

                <!-- Layanan Laundry -->
                <div class="bg-white shadow-md p-6 rounded-md">
                    <div class="flex justify-center mb-2">
                        <img src={{asset("images/icons/iconMerchant3.svg")}} alt="Layanan Icon" class="w-8 h-8">
                    </div>
                    <h2 class="text-lg font-semibold mb-1 text-center">Layanan Laundry</h2>
                    <h3 class="text-2xl font-bold text-center">{{ $totalLayanan }}</h3>
                </div>

                <!-- Pelanggan Baru -->
                <div class="bg-white shadow-md p-6 rounded-md">
                    <div class="flex justify-center mb-2">
                        <img src={{asset("images/icons/iconMerchant4.svg")}} alt="Customer Icon" class="w-8 h-8">
                    </div>
                    <h2 class="text-lg font-semibold mb-1 text-center">Pelanggan Baru</h2>
                    <h3 class="text-2xl font-bold text-center">{{ $newCustomers ?? 0 }}</h3>
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
                <div class="bg-white shadow-md p-6 rounded-md">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold">Ulasan Terbaru</h2>
                    </div>
                    
                    <div class="space-y-4">
                        @forelse($latestReviews as $review)
                            <!-- Review Card -->
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">
                                            <span class="text-purple-600 font-semibold">{{ substr($review->user->nama_lengkap ?? 'A', 0, 1) }}</span>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-1">
                                            <h3 class="font-medium text-gray-900">{{ $review->user->nama_lengkap ?? 'Anonymous' }}</h3>
                                            <span class="text-sm text-gray-500">{{ optional($review->created_at)->format('d F Y') }}</span>
                                        </div>
                                        @if(isset($review->rating))
                                        <div class="flex items-center mb-2">
                                            <div class="flex items-center">
                                                @for ($i = 0; $i < $review->rating; $i++)
                                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endfor
                                                @for ($i = 0; $i < (5 - ($review->rating ?? 0)); $i++)
                                                    <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endfor
                                                <span class="ml-2 text-sm font-medium text-gray-500">{{ $review->rating }}.0/5.0</span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(isset($review->ulasan))
                                            <p class="text-gray-700">"{{ $review->ulasan }}"</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500">
                                Belum ada ulasan
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Chart initialization - Orders
        var ordersOptions = {
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            series: [{
                name: 'Pesanan',
                data: {!! $weeklyOrders !!}
            }],
            xaxis: {
                type: 'category'
            },
            colors: ['#8b5cf6'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                }
            }
        };

        var ordersChart = new ApexCharts(document.querySelector("#ordersChart"), ordersOptions);
        ordersChart.render();

        // Chart initialization - Earnings
        var earningsOptions = {
            chart: {
                type: 'line',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            series: [{
                name: 'Pendapatan',
                data: {!! $weeklyEarnings !!}
            }],
            xaxis: {
                type: 'category'
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return 'Rp. ' + val.toLocaleString('id-ID');
                    }
                }
            },
            colors: ['#10B981'],
            stroke: {
                curve: 'smooth',
                width: 3
            },
            markers: {
                size: 4
            }
        };

        var earningsChart = new ApexCharts(document.querySelector("#earningsChart"), earningsOptions);
        earningsChart.render();
    </script>
</body>
</html>
