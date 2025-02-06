{{-- Card Pending Verifikasi Component --}}
<div class="flex flex-col">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8 p-2 md:p-4 lg:p-6 mx-2 md:mx-4 lg:mx-8">
        @for($i = 0; $i < 6; $i++)
        <div class="bg-white dark:bg-gray-800 rounded-[20px] shadow-[0_8px_30px_rgb(0,0,0,0.12)] p-4 md:p-6 hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-start justify-between mb-3 md:mb-4">
                <div class="flex gap-2 md:gap-3">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-100 dark:bg-blue-900 rounded-2xl flex items-center justify-center">
                        <img src="{{ asset('images/icons/iconMerchantLogo.svg') }}" alt="Merchant" class="w-6 h-6 md:w-8 md:h-8 dark:invert">
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 dark:text-white text-sm md:text-base">Reyy Laundry</h3>
                        <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400 text-xs md:text-sm">
                            <img src="{{ asset('images/icons/iconLokasi.svg') }}" alt="location" class="w-3 h-3 md:w-4 md:h-4 dark:invert">
                            <span>Jl Sekeloa Utara</span>
                        </div>
                    </div>
                </div>
                <div class="px-2 md:px-3 py-0.5 md:py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full text-xs md:text-sm">
                    Pending
                </div>
            </div>
            
            <div class="flex items-center gap-2 mb-2">
                <img src="{{ asset('images/icons/iconBox.svg') }}" alt="box" class="w-4 h-4 md:w-5 md:h-5 dark:invert">
                <span class="text-gray-600 dark:text-gray-300 text-xs md:text-sm">5 Layanan Tersedia</span>
            </div>

            <div class="flex items-center gap-2 mb-3 md:mb-4">
                <img src="{{ asset('images/icons/iconPrice.svg') }}" alt="price" class="w-4 h-4 md:w-5 md:h-5 dark:invert">
                <span class="text-gray-600 dark:text-gray-300 text-xs md:text-sm">Rp. 6.000 - Rp. 10.000</span>
            </div>

            <div class="flex gap-2">
                <button class="flex-1 bg-[#0051FF] text-white py-2 md:py-2.5 px-3 md:px-4 rounded-xl hover:bg-blue-700 transition-colors text-xs md:text-sm">
                    Terima
                </button>
                <button class="flex-1 bg-red-500 text-white py-2 md:py-2.5 px-3 md:px-4 rounded-xl hover:bg-red-700 transition-colors text-xs md:text-sm">
                    Tolak
                </button>
            </div>
        </div>
        @endfor
    </div>

    {{-- Pagination --}}
    <div class="flex justify-center items-center gap-1 md:gap-2 py-4 md:py-6">
        <button class="w-8 h-8 md:w-9 md:h-9 rounded-lg border border-gray-300 dark:border-gray-600 flex items-center justify-center hover:bg-gray-50 dark:hover:bg-gray-700">
            <svg width="14" height="14" md:width="16" md:height="16" viewBox="0 0 16 16" fill="none">
                <path d="M10 12L6 8L10 4" stroke="currentColor" class="text-gray-600 dark:text-gray-400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <button class="w-8 h-8 md:w-9 md:h-9 rounded-lg bg-[#0051FF] text-white flex items-center justify-center text-sm md:text-base">
            1
        </button>
        <button class="w-8 h-8 md:w-9 md:h-9 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-400 flex items-center justify-center text-sm md:text-base">
            2
        </button>
        <button class="w-8 h-8 md:w-9 md:h-9 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-400 flex items-center justify-center text-sm md:text-base">
            3
        </button>
        <span class="text-gray-600 dark:text-gray-400 text-sm md:text-base">...</span>
        <button class="w-8 h-8 md:w-9 md:h-9 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-400 flex items-center justify-center text-sm md:text-base">
            8
        </button>
        
        <button class="w-8 h-8 md:w-9 md:h-9 rounded-lg border border-gray-300 dark:border-gray-600 flex items-center justify-center hover:bg-gray-50 dark:hover:bg-gray-700">
            <svg width="14" height="14" md:width="16" md:height="16" viewBox="0 0 16 16" fill="none">
                <path d="M6 12L10 8L6 4" stroke="currentColor" class="text-gray-600 dark:text-gray-400" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
</div>