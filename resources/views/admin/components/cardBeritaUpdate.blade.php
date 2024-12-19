{{-- Card Berita & Update --}}
<div class="card bg-white p-6 rounded-xl w-full mb-4">
    <div class="flex items-center gap-2 mb-6">
        <img src="{{ asset('images/icons/iconNews.svg') }}" alt="iconBerita">
        <h2 class="text-xl font-semibold text-gray-800">Berita & Update</h2>
    </div>

    <div class="flex flex-col gap-3">
        {{-- Berita 1 --}}
        <div class="p-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-blue-700 hover:text-white text-black">
            <h3 class="font-sm mb-1">Informasi Penting Layanan GoLaundry</h3>
            <h3 class="text-xs text-gray-500 hover:text-white">10 hari yang lalu</h3>
        </div>

        {{-- Berita 2 --}}
        <div class="p-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-blue-700 hover:text-white text-black">
            <h3 class="font-sm mb-1">[INFO PENTING] - QRIS MAINTENANCE</h3>
            <p class="text-xs text-gray-500 hover:text-white">12 November 2024</p>
        </div>

        {{-- Berita 3 --}}
        <div class="p-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-blue-700 hover:text-white text-black">
            <h3 class="font-sm mb-1">Libur Tahun Baru 2025</h3>
            <p class="text-xs text-gray-500 hover:text-white">13 November 2024</p>
        </div>

        {{-- Berita 4 --}}
        <div class="p-3 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-blue-700 hover:text-white text-black">
            <h3 class="font-sm mb-1">Pilkada Serentak 2024</h3>
            <p class="text-xs text-gray-500 hover:text-white">08 November 2024</p>
        </div>
    </div>
</div>