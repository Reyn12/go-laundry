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
                        <h1 class="text-lg font-semibold">{{ $mainTitle ?? $title ?? 'Ulasan & Pendapatan' }}</h1>
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
                    <p class="text-3xl font-bold">{{ $totalReviews }}</p>
                    <p class="text-sm text-gray-400">Total ulasan tahun ini</p>
                </div>
                <!-- Rata-rata Rating -->
                <div class="bg-white shadow rounded p-4">
                    <p class="text-gray-500">Rata-Rata Rating</p>
                    <div class="flex items-center mt-2">
                        <p class="text-3xl font-bold mr-2">{{ $averageRating }}</p>
                        <div class="flex text-yellow-400">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $averageRating)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                    </svg>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <p class="text-sm text-gray-400 mt-1">Dari {{ $totalReviews }} ulasan</p>
                </div>
                <!-- Rating Breakdown -->
                <div class="bg-white shadow rounded p-4 col-span-2">
                    <h2 class="font-semibold text-lg mb-4">Rating Breakdown</h2>
                    <div class="space-y-3">
                        @foreach(range(5, 1) as $rating)
                            @php
                                $count = $ratingBreakdown[$rating];
                                $percentage = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                                
                                // Menentukan warna berdasarkan rating
                                $barColor = match($rating) {
                                    5 => 'bg-green-500',
                                    4 => 'bg-green-400',
                                    3 => 'bg-yellow-400',
                                    2 => 'bg-orange-400',
                                    1 => 'bg-red-400',
                                };
                            @endphp
                            <div class="flex items-center">
                                <div class="flex items-center w-24">
                                    <span class="text-sm font-medium w-3">{{ $rating }}</span>
                                    <div class="flex text-yellow-400 ml-1">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $rating)
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 24 24">
                                                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <div class="flex-1 h-2 mx-4 rounded-full bg-gray-200">
                                    <div class="h-full rounded-full {{ $barColor }}" style="width: {{ $percentage }}%"></div>
                                </div>
                                <div class="w-16 text-right">
                                    <span class="text-sm font-medium">{{ $count }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Daftar Ulasan -->
            <div class="mt-6 bg-white shadow rounded p-4">
                <h2 class="font-semibold text-lg mb-4">Daftar Ulasan</h2>
                @if($reviews->count() > 0)
                    <div class="space-y-4">
                        @foreach($reviews as $review)
                            <div class="border-b border-gray-200 pb-4 last:border-0">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold">{{ $review->pesanan->user->name }}</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                                            <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                                        </svg>
                                                    @else
                                                        <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 24 24">
                                                            <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                                        </svg>
                                                    @endif
                                                @endfor
                                            </div>
                                            <span class="text-sm text-gray-500 ml-2">{{ $review->created_at->format('d F Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 mt-2">{{ $review->komentar }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $reviews->links() }}
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada ulasan</h3>
                        <p class="mt-1 text-sm text-gray-500">Tunggu pelanggan memberikan ulasan untuk layanan Anda.</p>
                    </div>
                @endif
            </div>

            <!-- Grafik -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-6">
                <!-- Grafik Pendapatan -->
                <div class="bg-white shadow rounded p-4">
                    <h2 class="font-semibold text-lg">Pendapatan</h2>
                    <p class="text-gray-500 mt-2">Total Pendapatan: <span class="font-bold">Rp. {{ number_format($totalRevenue, 0, ',', '.') }}</span></p>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Grafik Pendapatan
            var optionsPendapatan = {
                chart: { 
                    type: 'area', 
                    height: 350,
                    toolbar: {
                        show: true
                    }
                },
                series: [{ 
                    name: 'Pendapatan', 
                    data: @json($revenueData)
                }],
                xaxis: { 
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                colors: ['#4f46e5'],
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.3
                    }
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            };

            // Grafik Pesanan
            var optionsPesanan = {
                chart: { 
                    type: 'pie',
                    height: 350
                },
                series: [@json($completedOrders), @json($cancelledOrders)],
                labels: ['Selesai', 'Dibatalkan'],
                colors: ['#34d399', '#f87171'],
                legend: {
                    position: 'bottom'
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        return opts.w.config.series[opts.seriesIndex];
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value + ' pesanan';
                        }
                    }
                }
            };

            try {
                new ApexCharts(document.querySelector("#pendapatanChart"), optionsPendapatan).render();
                new ApexCharts(document.querySelector("#pesananChart"), optionsPesanan).render();
            } catch (error) {
                console.error('Error rendering charts:', error);
            }
        });
    </script>
</body>
</html>
