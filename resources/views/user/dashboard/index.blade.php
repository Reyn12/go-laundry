@extends('user.components.main')
@section('container') 
<div class="lg:w-1/4 hidden lg:block">
    @include('user.components.sidebar')
</div>

<!-- Main Content -->
<div class="flex-1 m-auto bg-white">
    <div class="relative">
        <div class="bg-[#1e3a8a] h-[120px] w-full relative overflow-hidden">
            <div class="absolute top-0 right-0">
                @foreach ([['-top-10 -right-10', 'w-32 h-32 bg-pink-300'], ['top-4 right-20', 'w-16 h-16 bg-red-500'], ['top-20 -right-4', 'w-24 h-24 bg-yellow-300']] as $circle)
                    <div class="{{ $circle[1] }} rounded-full absolute {{ $circle[0] }}"></div>
                @endforeach
            </div>

            <!-- Profile Picture and Name -->
            <div class="absolute left-[160px] top-[70px] text-white">
                <div class="flex items-center space-x-4">
                    <h1 class="text-2xl font-bold">{{ auth()->user()->username }}</h1>
                    <div class="bg-yellow-400 text-black rounded-full px-2 flex items-center">
                    <span class="text-black-500">★</span><span class="text-black-500">★</span><span class="text-black-500">★</span>
                    <span class="text-yellow-300">★</span><span class="text-yellow-300">★</span>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Profile Picture -->
        <div class="absolute left-8 top-[60px]">
            <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-white shadow-lg">
                @php
                    $imagePath = 'storage/profile_images/' . auth()->user()->username . '.jpg';
                @endphp

                @if(file_exists(public_path($imagePath)))
                    <img src="{{ asset($imagePath) }}" alt="Profile Picture" class="w-full h-full object-cover">
                @else
                    <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?w=400&h=400" alt="Profile Picture" class="w-full h-full object-cover">
                @endif
            </div>
        </div>

        <!-- Status Pencucian Title -->
        <div class="mt-20 px-8">
        </div>
    </div>
</div>
    <!-- Pesanan Terbaru Section -->
    <div class="mt-1 px-3 bg-transparent">
    <h3 class="text-xl font-semibold">Pesanan Terbaru</h3>
    <div class="text-right mt-4">
            <button id="viewAllButton" class="px-4 py-2 bg-transparent text-black underline rounded hover:bg-transparent transition-transform duration-300 hover:scale-105">
                View All
            </button>
        </div>

    <!-- Table Pesanan -->
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="text-left">
                    <th class="py-2 px-4 ">No</th>
                    <th class="py-2 px-4 ">Nama Laundry</th>
                    <th class="py-2 px-4 ">Kategori Layanan</th>
                    <th class="py-2 px-4 ">Jenis Layanan</th>
                    <th class="py-2 px-4 ">Tanggal</th>
                    <th class="py-2 px-4 ">Status</th>
                </tr>
            </thead>
            <!-- Tabel Pesanan -->
            <tbody id="isi-table-container">
            @forelse ($LayananLaundry as $index => $order)
    @php
        $statuses = ['Selesai', 'Dibatalkan'];
        $randomStatus = $statuses[array_rand($statuses)];
    @endphp
    <tr class="border-t hover:bg-transparent hover:bg-gray-50 visible-row">
        <td class="py-3 px-4">{{ $index + 1 }}</td>
        <td class="py-3 px-4">{{ $merchant->nama_laundry ?? 'Tidak ada data' }}</td>
        <td class="py-3 px-4">{{ $order->kategori_layanan }}</td>
        <td class="py-3 px-4">{{ $order->nama_layanan }}</td>
        <td class="py-3 px-4">{{ $order->created_at }}</td>

        <!-- Menampilkan status dengan warna sesuai -->
        <td class="py-3 px-4">
            @if ($randomStatus == 'Selesai')
                <span class="inline-flex items-center px-2 py-1 text-sm font-semibold text-green-700 bg-green-200 rounded-full">
                    ● Selesai
                </span>
            @else
                <span class="inline-flex items-center px-2 py-1 text-sm font-semibold text-red-700 bg-red-200 rounded-full">
                    ● Dibatalkan
                </span>
            @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="py-3 px-4 text-center">Tidak ada data tersedia</td>
    </tr>
@endforelse

        <!-- Hidden Rows -->
        @forelse ($LayananLaundry->skip(3) as $index => $order)
            @php
                $statuses = ['Selesai', 'Dibatalkan'];
                $randomStatus = $statuses[array_rand($statuses)];
            @endphp
            <tr class="border-t hover:bg-transparent hover:bg-gray-50 hidden-row">
                <td class="py-3 px-4">{{ $index + 4 }}</td>
                <td class="py-3 px-4">{{ $merchant->nama_laundry ?? 'Tidak ada data' }}</td>
                <td class="py-3 px-4">{{ $order->kategori_layanan }}</td>
                <td class="py-3 px-4">{{ $order->nama_layanan }}</td>
                <td class="py-3 px-4">{{ $order->created_at }}</td>

                <!-- Menampilkan status dengan warna sesuai -->
                <td class="py-3 px-4">
                    @if ($randomStatus == 'Selesai')
                        <span class="inline-flex items-center px-2 py-1 text-sm font-semibold text-green-700 bg-green-200 rounded-full">
                            ● Selesai
                        </span>
                    @else
                        <span class="inline-flex items-center px-2 py-1 text-sm font-semibold text-red-700 bg-red-200 rounded-full">
                            ● Dibatalkan
                        </span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="py-3 px-4 text-center">Tidak ada data lainnya</td>
            </tr>
        @endforelse
    </tbody>
    </table>
    </div>
    </div>

    <script>
        document.getElementById('viewAllButton').addEventListener('click', function() {
            // Menampilkan semua baris tersembunyi
            const hiddenRows = document.querySelectorAll('.hidden-row');
            hiddenRows.forEach(row => {
                row.classList.remove('hidden-row');
                row.classList.add('visible-row');
            });
            // Menyembunyikan tombol setelah diklik
            this.style.display = 'none';
        });
    </script>
@endsection
