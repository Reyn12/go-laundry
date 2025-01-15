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
            ['Tirai', $curtainCount ?? 2, '#00008B', 'images/tirai.jpg'], 
            ['Seprei', $bedSheetCount ?? 2, '#00008B', 'images/seprei.jpg'], 
            ['Handuk', $towelCount ?? 1, '#00008B', 'images/handuk.jpg'], 
            ['Karpet', $carpetCount ?? 1, '#00008B', 'images/karpet.jpg'], 
            ['Gorden', $drapesCount ?? 8, '#00008B', 'images/gorden.jpg'], 
            ['Bantal', $pillowCount ?? 2, '#00008B', 'images/bantal.jpg'], 
            ['Selimut', $blanketCount ?? 1, '#00008B', 'images/selimut.jpg'], 
            ['Jas', $suitCount ?? 5, '#00008B', 'images/jas.jpg'], 
            ['Topi', $hatCount ?? 1, '#00008B', 'images/topi.jpg'], 
            ['Sarung', $sarongCount ?? 3, '#00008B', 'images/sarung.jpg'], 
            ['Kaos', $tshirtCount ?? 4, '#00008B', 'images/kaos.jpg'], 
            ['Jeans', $jeansCount ?? 2, '#00008B', 'images/jeans.jpg'], 
            ['Kemeja', $shirtCount ?? 6, '#00008B', 'images/kemeja.jpg'], 
            ['Rok', $skirtCount ?? 2, '#00008B', 'images/rok.jpg'], 
            ['Gaun', $dressCount ?? 3, '#00008B', 'images/gaun.jpg'], 
            ['Jaket', $jacketCount ?? 4, '#00008B', 'images/jaket.jpg'], 
            ['Sweater', $sweaterCount ?? 5, '#00008B', 'images/sweater.jpg'], 
            ['Seragam', $uniformCount ?? 7, '#00008B', 'images/seragam.jpg'], 
            ['Tas', $bagCount ?? 1, '#00008B', 'images/tas.jpg'], 
            ['Sepatu', $shoesCount ?? 1, '#00008B', 'images/sepatu.jpg']
            ] as $item)

                    <div class="status-card {{ $item[1] > 0 ? 'bg-' . $item[2] : 'bg-gray-300' }} p-6 rounded-md text-black bold transition-transform transform hover:scale-105 hover:shadow-lg flex flex-col items-center justify-center h-48 w-48 snap-center">
                        <div class="icon mb-4 w-24 h-24 flex items-center justify-center">
                            <img src="{{ asset($item[3]) }}" alt="{{ $item[0] }}" class="w-24 h-24 object-cover rounded-lg">
                        </div>
                        <div class="text-center">
                            <div class="text-sm">{{ $item[0] }}</div>
                            <div class="font-bold text-xl">{{ $item[1] }}</div>
                            @if($item[1] > 0)
                                <a href="#" class="text-black regular text-sm hover:underline">View Details</a>
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
@include('user.components.pesananterbaru')
@endsection
