{{-- Card Berita & Update --}}
<div class="card bg-white dark:bg-gray-800 p-6 rounded-xl w-full mb-4 shadow-lg">
    <div class="flex items-center gap-2 mb-6">
        <img src="{{ asset('images/icons/iconNews.svg') }}" alt="iconBerita" class="dark:invert">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Berita & Update</h2>
    </div>

    <div class="flex flex-col gap-3">
        {{-- Berita 1 --}}
        <div class="p-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-blue-700 dark:hover:bg-blue-600 hover:text-white text-black dark:text-white transition-colors">
            <h3 class="font-sm mb-1">Informasi Penting Layanan GoLaundry</h3>
            <h3 class="text-xs text-gray-500 dark:text-gray-400 group-hover:text-white">10 hari yang lalu</h3>
        </div>

        {{-- Berita 2 --}}
        <div class="p-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-blue-700 dark:hover:bg-blue-600 hover:text-white text-black dark:text-white transition-colors">
            <h3 class="font-sm mb-1">[INFO PENTING] - QRIS MAINTENANCE</h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 group-hover:text-white">12 November 2024</p>
        </div>

        {{-- Berita 3 --}}
        <div class="p-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-blue-700 dark:hover:bg-blue-600 hover:text-white text-black dark:text-white transition-colors">
            <h3 class="font-sm mb-1">Libur Tahun Baru 2025</h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 group-hover:text-white">13 November 2024</p>
        </div>

        {{-- Berita 4 --}}
        <div class="p-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-blue-700 dark:hover:bg-blue-600 hover:text-white text-black dark:text-white transition-colors">
            <h3 class="font-sm mb-1">Pilkada Serentak 2024</h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 group-hover:text-white">08 November 2024</p>
        </div>
    </div>
</div>