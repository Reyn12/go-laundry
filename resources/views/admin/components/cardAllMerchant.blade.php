{{-- Card All Merchant Component --}}
@php
Log::info('Component Merchant Data:', [
    'isset' => isset($merchants),
    'merchants' => $merchants ?? 'not set'
]);
@endphp

<div class="flex flex-col">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8 p-2 md:p-4 lg:p-6 mx-2 md:mx-4 lg:mx-8">
        @forelse($merchants as $merchant)
        <div class="bg-white dark:bg-gray-800 rounded-[20px] shadow-[0_8px_30px_rgb(0,0,0,0.12)] p-4 md:p-6 hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-start justify-between mb-3 md:mb-4">
                <div class="flex gap-2 md:gap-3">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-100 dark:bg-blue-900 rounded-2xl flex items-center justify-center">
                        <img src="{{ asset('images/icons/iconMerchantLogo.svg') }}" alt="Merchant" class="w-6 h-6 md:w-8 md:h-8">
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 dark:text-white text-sm md:text-base">{{ $merchant->nama_laundry }}</h3>
                        <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400 text-xs md:text-sm">
                            <img src="{{ asset('images/icons/iconLokasi.svg') }}" alt="location" class="w-3 h-3 md:w-4 md:h-4">
                            <span>{{ $merchant->alamat_laundry }}</span>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('images/icons/iconVerified.svg') }}" alt="verified" class="w-5 h-5 md:w-6 md:h-6 text-blue-500">
            </div>

            {{-- Informasi Layanan dan Harga --}}
            <div class="border-t border-gray-200 dark:border-gray-700 pt-3 mt-3">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <p class="text-xs md:text-sm text-gray-500 dark:text-gray-400">Layanan:</p>
                        <ul class="list-disc list-inside text-xs md:text-sm text-gray-800 dark:text-gray-200">
                            <li>Cuci Reguler</li>
                            <li>Cuci Express</li>
                            <li>Setrika</li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-xs md:text-sm text-gray-500 dark:text-gray-400">Harga Mulai:</p>
                        <p class="text-xs md:text-sm font-medium text-gray-800 dark:text-gray-200">
                            Rp 7.000/kg
                        </p>
                    </div>
                </div>
            </div>
            {{-- Info Tambahan --}}
            <div class="flex justify-between items-center mt-3 text-xs md:text-sm text-gray-500 dark:text-gray-400">
                <div class="flex items-center gap-2">
                    <span>⭐ 4.5</span>
                    <span>•</span>
                    <span>Buka</span>
                </div>
                <span>1.2 km</span>
            </div>

            {{-- Button View Detail --}}
            <div class="mt-4">
                <button class="w-full bg-[#0051FF] text-white py-2 md:py-2.5 px-4 rounded-xl hover:bg-blue-700 transition-colors text-sm md:text-base">
                    View Detail
                </button>
            </div>
        </div>
        @empty
        <div class="col-span-3 flex flex-col items-center justify-center py-8 px-4">
            <img src="{{ asset('images/icons/iconEmpty.svg') }}" alt="Empty" class="w-20 h-20 mb-4">
            <p class="text-gray-500 dark:text-gray-400 text-center">Belum ada merchant yang terdaftar di area ini</p>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="flex justify-center items-center gap-1 md:gap-2 py-4 md:py-6">
        {{ $merchants->links() }}
    </div>
</div>