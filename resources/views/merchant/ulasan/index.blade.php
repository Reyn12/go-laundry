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
                    </div>
                </div>
            </div>

          <!-- Card Review dengan ApexCharts -->
<div class="grid grid-cols-3 gap-6">
    <!-- Total Reviews Card -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div>
            <p class="text-[14px] text-gray-600 font-bold mb-1">Total Ulasan</p>
            <div class="flex items-center gap-2">
                <span class="text-[32px] font-bold text-gray-900">{{ $totalReviews }}</span>
                <div class="flex items-center text-[13px] text-green-500 font-medium bg-green-50 px-2 py-0.5 rounded">
                    21%
                    <svg class="w-3 h-3 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                    </svg>
                </div>
            </div>
            <p class="text-[13px] text-gray-400 mt-1">Total ulasan tahun ini</p>
        </div>
    </div>

    <!-- Average Rating Card -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div>
            <p class="text-[14px] text-gray-600 font-bold mb-1">Rata-Rata Rating</p>
            <div class="flex items-center gap-2">
                <span class="text-[32px] font-bold text-gray-900">{{ number_format($averageRating, 1) }}</span>
                <div class="flex text-yellow-400 mt-1">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $averageRating)
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @else
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                        @endif
                    @endfor
                </div>
            </div>
            <p class="text-[13px] text-gray-400 mt-1">Rata-rata rating tahun ini</p>
        </div>
    </div>

    <!-- Rating Breakdown -->
    <div class="bg-white p-6 rounded-lg shadow">
        <p class="text-[13px] text-gray-500 font-medium mb-4">Rating Breakdown</p>
        <div class="space-y-3">
            @php
                $maxRating = max($ratingBreakdown);
            @endphp
            
            @foreach ($ratingBreakdown as $star => $count)
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-1 min-w-[32px]">
                        <span class="text-[13px] text-gray-600 font-medium">{{ $star }}</span>
                        <svg class="w-3.5 h-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="w-full bg-gray-100 rounded-full h-[6px]">
                            <div class="h-[6px] rounded-full transition-all duration-300
                                @if($star == 5) bg-emerald-400
                                @elseif($star == 4) bg-violet-400
                                @elseif($star == 3) bg-yellow-400
                                @elseif($star == 2) bg-orange-400
                                @else bg-red-400 @endif"
                                style="width: {{ $maxRating > 0 ? ($count / $maxRating) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>
                    <span class="text-[13px] text-gray-600 font-medium min-w-[35px] text-right">{{ $count }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>

            <!-- Daftar Ulasan -->
            <div class="mt-6 bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">Daftar Ulasan</h2>
                    
                    @if($reviews->count() > 0)
                        <!-- List Ulasan -->
                        @foreach($reviews as $review)
                        <div class="border-b border-gray-200 py-4 last:border-0">
                            <div class="flex items-start gap-4">
                                <!-- Avatar -->
                                <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('images/icons/iconProfile.svg') }}" 
                                         alt="Profile" 
                                         class="w-full h-full object-cover">
                                </div>
                                
                                <!-- Konten Ulasan -->
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <!-- Informasi Customer -->
                                        <div>
                                            <!-- Nama Customer -->
                                            <h3 class="text-lg font-semibold text-gray-800">
                                                {{ $review->customer->nama_lengkap ?? 'Customer' }}
                                            </h3>
                                            
                                            <!-- Rating dan Tanggal -->
                                            <div class="flex items-center gap-2 mt-1">
                                                <div class="flex">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" 
                                                             fill="currentColor" 
                                                             viewBox="0 0 20 20">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                        </svg>
                                                    @endfor
                                                </div>
                                                <span class="text-sm text-gray-500">{{ $review->created_at->format('d F Y, H:i') }}</span>
                                            </div>
                                        </div>

                                        <!-- Detail Pesanan -->
                                        <div class="text-right">
                                            <p class="text-sm text-gray-500">Total Pesanan:</p>
                                            <p class="font-medium">Rp {{ number_format($review->pesanan->total_harga ?? 0, 0, ',', '.') }}</p>
                                        </div>
                                    </div>

                                    <!-- Komentar -->
                                    <p class="text-gray-600 mt-3">{{ $review->komentar }}</p>
                                    
                                    <!-- Detail Pesanan -->
                                    @if($review->pesanan)
                                        <div class="mt-2 text-sm text-gray-500">
                                            <span class="font-medium">Kode Pesanan:</span> {{ $review->pesanan->pesanan_id }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $reviews->links() }}
                        </div>
                    @else
                        <p class="text-center text-gray-500 py-4">Belum ada ulasan</p>
                    @endif
                </div>
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
