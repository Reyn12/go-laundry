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

            <div class="absolute left-[160px] top-[70px] text-white">
                <div class="flex items-center space-x-4">
                    <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                    <div class="bg-yellow-400 text-black rounded-full px-2 flex items-center">
                        <span class="text-black-500">★</span><span class="text-black-500">★</span><span class="text-black-500">★</span>
                        <span class="text-yellow-300">★</span><span class="text-yellow-300">★</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute left-8 top-[60px]">
            <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-white shadow-lg">
                @if($user && $user->image)
                    <img src="{{ asset($user->image) }}" alt="Profile" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-300 flex items-center justify-center text-gray-600">
                        {{ $user ? substr($user->image, 0, 1) : 'U' }}
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-20 px-8">
            <h3 class="text-xl font-semibold">Status Pencucian</h3>
        </div>
    </div>
</div>

<!-- Status Pencucian Section -->
<div class="p-4 relative bg-white mb-2">
    <div class="relative">
        <div id="slider" class="overflow-x-auto scroll-smooth custom-scrollbar h-64 flex space-x-4 snap-x snap-mandatory px-12">
            @foreach ([['icon' => 'images/washing-machine.png', 'title' => 'Wash', 'time' => 'One Day Ago', 'color' => 'bg-red-600 text-white'], ['icon' => 'images/bleach.png', 'title' => 'Iron', 'time' => 'Two Days Ago', 'color' => 'bg-gray-200 text-gray-700'], ['icon' => 'images/logomerchantx1.png', 'title' => 'Dry', 'time' => 'Two Days Ago', 'color' => 'bg-gray-200 text-gray-700']] as $status)
            <div class="relative flex flex-col items-center snap-center">
                <div class="bg-white shadow-lg rounded-lg p-4 -mb-8 z-10">
                    <img src="{{ asset($status['icon']) }}" alt="{{ $status['title'] }}" class="h-16 w-16">
                </div>
                <div class="{{ $status['color'] }} p-6 rounded-lg flex flex-col justify-between h-48 w-48 mb-6">
                    <div class="absolute bottom-8 left-4 mb-10">
                        <div class="font-bold text-lg">{{ $status['title'] }}</div>
                        <div class="text-sm">{{ $status['time'] }}</div>
                    </div>
                    <a href="/user/pelacakan" class="transition-transform duration-300 hover:scale-105 btn btn-primary absolute bottom-8 left-3 btn-primary px-4 py-2 rounded-full text-sm">View</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Scroll JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slider = document.getElementById('slider');
            const scrollLeftButton = document.getElementById('scroll-left');
            const scrollRightButton = document.getElementById('scroll-right');

            scrollLeftButton.addEventListener('click', () => {
                slider.scrollBy({ left: -300, behavior: 'smooth' });
            });

            scrollRightButton.addEventListener('click', () => {
                slider.scrollBy({ left: 300, behavior: 'smooth' });
            });
        });
    </script>

    <!-- Scrollbar Styling -->
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            height: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

    <!-- Pesanan Terbaru Section -->
    <div class="mt-1 px-3 bg-white">
    <h3 class="text-xl font-semibold">Layanan Laundry</h3>
    <div class="text-right mt-4">
            <button id="viewAllButton" class="px-4 py-2 bg-transparent text-black underline rounded hover:bg-transparent transition-transform duration-300 hover:scale-105">
                View All
            </button>
        </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white" id="laundryTable">
            <thead>
                <tr class="text-left">
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Kategori Layanan</th>
                    <th class="py-2 px-4">Nama Layanan</th>
                    <th class="py-2 px-4">Harga</th>
                    <th class="py-2 px-4">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($laundryItems) && $laundryItems->count() > 0)
                    @foreach ($laundryItems as $index => $item)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $index + 1 }}</td>
                            <td class="py-3 px-4">{{ $item->kategori_layanan ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $item->nama_layanan ?? '-' }}</td>
                            <td class="py-3 px-4">Rp {{ number_format($item->harga_per_unit, 0, ',', '.') }}</td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center py-3">Tidak ada layanan laundry tersedia.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('viewAllButton').addEventListener('click', function () {
        const rows = document.querySelectorAll('#laundryTable tr');
        rows.forEach(row => row.classList.remove('hidden'));
        this.style.display = 'none'; // Hide the "View All" button after showing all rows
    });
</script>

@endsection