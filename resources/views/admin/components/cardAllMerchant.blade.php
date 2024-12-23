{{-- Card All Merchant Component --}}
<div class="flex flex-col">
    <div class="grid grid-cols-3 gap-8 p-6 mx-8">
        @for($i = 0; $i < 6; $i++)
        <div class="bg-white rounded-[20px] shadow-[0_8px_30px_rgb(0,0,0,0.12)] p-6 hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-start justify-between mb-4">
                <div class="flex gap-3">
                    <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center">
                        <img src="{{ asset('images/icons/iconMerchantLogo.svg') }}" alt="Merchant" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">Reyy Laundry</h3>
                        <div class="flex items-center gap-1 text-gray-500 text-sm">
                            <img src="{{ asset('images/icons/iconLokasi.svg') }}" alt="location" class="w-4 h-4">
                            <span>Jl Sekeloa Utara</span>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('images/icons/iconVerified.svg') }}" alt="verified" class="w-6 h-6 text-blue-500">
            </div>
            
            <div class="flex items-center gap-2 mb-2">
                <img src="{{ asset('images/icons/iconBox.svg') }}" alt="box" class="w-5 h-5">
                <span class="text-gray-600 text-sm">5 Layanan Tersedia</span>
            </div>

            <div class="flex items-center gap-2 mb-4">
                <img src="{{ asset('images/icons/iconPrice.svg') }}" alt="price" class="w-5 h-5">
                <span class="text-gray-600 text-sm">Rp. 6.000 - Rp. 10.000</span>
            </div>

            <button class="w-full bg-[#0051FF] text-white py-2.5 px-4 rounded-xl hover:bg-blue-700 transition-colors">
                View Detail
            </button>
        </div>
        @endfor
    </div>

    {{-- Pagination --}}
    <div class="flex justify-center items-center gap-2 py-6">
        <button class="w-9 h-9 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M10 12L6 8L10 4" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <button class="w-9 h-9 rounded-lg bg-[#0051FF] text-white flex items-center justify-center">
            1
        </button>
        <button class="w-9 h-9 rounded-lg hover:bg-gray-50 text-gray-600 flex items-center justify-center">
            2
        </button>
        <button class="w-9 h-9 rounded-lg hover:bg-gray-50 text-gray-600 flex items-center justify-center">
            3
        </button>
        <span class="text-gray-600">...</span>
        <button class="w-9 h-9 rounded-lg hover:bg-gray-50 text-gray-600 flex items-center justify-center">
            8
        </button>
        
        <button class="w-9 h-9 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M6 12L10 8L6 4" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
</div>
