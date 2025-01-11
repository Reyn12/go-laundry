@extends('user.components.main')
@include('user.components.sidebar')
@section('container')
    <!-- Main Content -->
    <div class="flex-1 ml-20">
        <div class="relative">
            <div class="bg-[#1e3a8a] h-[120px] w-full relative overflow-hidden">
                <div class="absolute top-0 right-0">
                    @foreach ([['-top-10 -right-10', 'w-32 h-32 bg-pink-300'], ['top-4 right-20', 'w-16 h-16 bg-red-500'], ['top-20 -right-4', 'w-24 h-24 bg-yellow-300']] as $circle)
                        <div class="{{ $circle[1] }} rounded-full absolute {{ $circle[0] }}"></div>
                    @endforeach
                </div>
                <div class="absolute left-[160px] top-[70px] text-white">
                    <div class="flex items-center space-x-4">
                        <h1 class="text-2xl font-bold">{{ $user->name ?? 'User' }}</h1>
                        <div class="bg-yellow-400 text-black rounded-full px-2 flex items-center">
                            <span class="text-yellow-500">★</span><span class="text-yellow-500">★</span><span class="text-yellow-500">★</span><span class="text-gray-300">★</span><span class="text-gray-300">★</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute left-8 top-[60px]">
                <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-white shadow-lg">
                    @if($user && $user->profile_image)
                        <img src="{{ asset($user->profile_image) }}" alt="Profile" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center text-gray-600">
                            {{ $user ? substr($user->name, 0, 1) : 'U' }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-20 px-8">
                <h3 class="text-xl font-semibold">Status Pencucian</h3>
            </div>
        </div>

      <!-- Status Pencucian Section -->
<div class="p-4 relative">
    <!-- Tombol Navigasi -->
    <button id="scroll-left" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-md hover:bg-gray-700 z-10">
        &#9664;
    </button>
    <button id="scroll-right" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-md hover:bg-gray-700 z-10">
        &#9654;
    </button>

    <!-- Wrapper untuk Scrollbar -->
    <div class="relative">
        <!-- Container Slider -->
        <div id="slider" class="overflow-x-auto scroll-smooth custom-scrollbar h-60">
            <div class="flex space-x-4 snap-x snap-mandatory">
            @foreach ([ 
            ['Tirai', $curtainCount ?? 2, 'red-500', 'images/tirai.jpeg'], 
            ['Seprei', $bedSheetCount ?? 2, 'red-500', 'images/seprei.jpeg'], 
            ['Handuk', $towelCount ?? 1, 'green-500', 'images/handuk.jpeg'], 
            ['Karpet', $carpetCount ?? 1, 'green-500', 'images/karpet.jpeg'], 
            ['Gorden', $drapesCount ?? 8, 'green-500', 'images/gorden.jpeg'], 
            ['Pakaian', $clothesCount ?? 2, 'red-500', 'images/pakaian.jpeg'], 
            ['Bantal', $pillowCount ?? 2, 'green-500', 'images/bantal.jpeg'], 
            ['Selimut', $blanketCount ?? 1, 'red-500', 'images/selimut.jpeg'], 
            ['Jas', $suitCount ?? 5, 'red-500', 'images/jas.jpeg'], 
            ['Topi', $hatCount ?? 1, 'green-500', 'images/topi.jpeg'], 
            ['Sarung', $sarongCount ?? 3, 'red-500', 'images/sarung.jpeg'], 
            ['Kaos', $tshirtCount ?? 4, 'red-500', 'images/kaos.jpeg'], 
            ['Jeans', $jeansCount ?? 2, 'red-500', 'images/jeans.jpeg'], 
            ['Kemeja', $shirtCount ?? 6, 'green-500', 'images/kemeja.jpeg'], 
            ['Rok', $skirtCount ?? 2, 'red-500', 'images/rok.jpeg'], 
            ['Gaun', $dressCount ?? 3, 'red-500', 'images/gaun.jpeg'], 
            ['Jaket', $jacketCount ?? 4, 'green-500', 'images/jaket.jpeg'], 
            ['Sweater', $sweaterCount ?? 5, 'green-500', 'images/sweater.jpeg'], 
            ['Seragam', $uniformCount ?? 7, 'green-500', 'images/seragam.jpeg'], 
            ['Tas', $bagCount ?? 1, 'red-500', 'images/tas.jpeg'], 
            ['Sepatu', $shoesCount ?? 1, 'green-500', 'images/sepatu.jpeg']
            ] as $item)

                    <div class="status-card {{ $item[1] > 0 ? 'bg-' . $item[2] : 'bg-gray-300' }} p-6 rounded-md text-white transition-transform transform hover:scale-105 hover:shadow-lg flex flex-col items-center justify-center h-48 w-48 snap-center">
                        <div class="icon mb-4 flex items-center justify-center">
                            <img src="{{ asset($item[3]) }}" alt="{{ $item[0] }}" class="w-24 h-24 object-cover rounded-lg">
                        </div>
                        <div class="text-center">
                            <div class="text-sm">{{ $item[0] }}</div>
                            <div class="font-bold text-xl">{{ $item[1] }}</div>
                            @if($item[1] > 0)
                                <a href="#" class="text-white text-sm hover:underline">View Details</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Scroll -->
<script>
    const slider = document.getElementById('slider');
    const scrollLeftButton = document.getElementById('scroll-left');
    const scrollRightButton = document.getElementById('scroll-right');

    // Scroll ke kiri
    scrollLeftButton.addEventListener('click', () => {
        slider.scrollBy({
            left: -300, // Geser ke kiri sejauh 300px
            behavior: 'smooth'
        });
    });

    // Scroll ke kanan
    scrollRightButton.addEventListener('click', () => {
        slider.scrollBy({
            left: 300, // Geser ke kanan sejauh 300px
            behavior: 'smooth'
        });
    });
</script>

<!-- Tambahkan CSS untuk scrollbar -->
<style>
    .custom-scrollbar {
        overflow-y: auto; /* Tambahkan scrollbar vertikal */
    }

    /* Scrollbar gaya khusus */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #888; /* Warna scrollbar */
        border-radius: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #555; /* Warna hover scrollbar */
    }
</style>

        <!-- Pesanan Terbaru Section -->
        <div class="p-4 px-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Pesanan Terbaru</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left bg-gray-50">
                            @foreach (['No', 'Jenis Paket', 'Berat', 'Tanggal Masuk', 'Status'] as $header)
                                <th class="py-2 px-4">{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    
                    @php
$laundryItems = [
    ['Tirai', $curtainCount ?? 2, 'red-500', 'Dibatalkan'],
    ['Seprei', $bedSheetCount ?? 2, 'red-500', 'Dibatalkan'],
    ['Handuk', $towelCount ?? 1, 'green-500', 'Selesai'],
    ['Karpet', $carpetCount ?? 1, 'green-500', 'Selesai'],
    ['Gorden', $drapesCount ?? 8, 'green-500', 'Selesai'],
    ['Pakaian', $clothesCount ?? 2, 'red-500', 'Dibatalkan'],
    ['Bantal', $pillowCount ?? 2, 'green-500', 'Selesai'],
    ['Selimut', $blanketCount ?? 1, 'red-500', 'Dibatalkan'],
    ['Jas', $suitCount ?? 5, 'red-500', 'Dibatalkan'],
    ['Topi', $hatCount ?? 1, 'green-500', 'Selesai'],
    ['Sarung', $sarongCount ?? 3, 'red-500', 'Dibatalkan'],
    ['Kaos', $tshirtCount ?? 4, 'red-500', 'Dibatalkan'],
    ['Jeans', $jeansCount ?? 2, 'red-500', 'Dibatalkan'],
    ['Kemeja', $shirtCount ?? 6, 'green-500', 'Selesai'],
    ['Rok', $skirtCount ?? 2, 'red-500', 'Dibatalkan'],
    ['Gaun', $dressCount ?? 3, 'red-500', 'Dibatalkan'],
    ['Jaket', $jacketCount ?? 4, 'green-500', 'Selesai'],
    ['Sweater', $sweaterCount ?? 5, 'green-500', 'Selesai'],
    ['Seragam', $uniformCount ?? 7, 'green-500', 'Selesai'],
    ['Tas', $bagCount ?? 1, 'red-500', 'Dibatalkan'],
    ['Sepatu', $shoesCount ?? 1, 'green-500', 'Selesai']
];
@endphp

<table class="table-auto w-full border-collapse border border-gray-200">
    <tbody id="laundryTable">
        @foreach ($laundryItems as $index => $item)
        <tr class="border-t hover:bg-gray-50 {{ $index >= 10 ? 'hidden' : '' }}">
            <td class="py-3 px-4">{{ $index + 1 }}</td>
            <td class="py-3 px-4">{{ $item[0] }}</td>
            <td class="py-3 px-4">{{ $item[1] }} item(s)</td>
            <td class="py-3 px-4">{{ now()->format('d M Y') }}</td>
            <td class="py-3 px-4">
                <span class="px-2 py-1 rounded-full {{ $item[2] === 'red-500' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }} text-sm">
                    {{ $item[3] }}
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center mt-4">
    <button id="viewAllButton" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        View All
    </button>
</div>

<script>
    document.getElementById('viewAllButton').addEventListener('click', function () {
        const rows = document.querySelectorAll('#laundryTable tr');
        rows.forEach(row => row.classList.remove('hidden'));
        this.style.display = 'none'; // Hide the "View All" button after showing all rows
    });
</script>

             </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
