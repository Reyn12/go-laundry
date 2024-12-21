{{-- Card Rating & Ulasan --}}
<div class="card bg-white p-6 rounded-xl w-full shadow-lg">
    <div class="flex items-center gap-2 mb-6">
        <img src="{{ asset('images/icons/iconUlasan.svg') }}" alt="iconUlasan">
        <h2 class="text-xl font-semibold text-gray-800">Rating & Ulasan</h2>
    </div>

    <div class="relative">
        {{-- Navigation Buttons --}}
        <button class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow-md rounded-full p-2">
            <img src="{{ asset('images/icons/iconKiri.svg') }}" alt="Previous" class="w-6 h-6">
        </button>
        
        {{-- Review Card --}}
        <div class="mx-8">
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-500">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden">
                        <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h3 class="font-medium text-sm">Agus Sedih</h3>
                        <div class="flex items-center">
                            <img src="{{ asset('images/icons/iconStar.svg') }}" alt="Star" class="">
                            <img src="{{ asset('images/icons/iconStar.svg') }}" alt="Empty Star" class="">
                            <img src="{{ asset('images/icons/iconStarEmpty.svg') }}" alt="Empty Star" class="">
                            <img src="{{ asset('images/icons/iconStarEmpty.svg') }}" alt="Empty Star" class="">
                            <img src="{{ asset('images/icons/iconStarEmpty.svg') }}" alt="Empty Star" class="">
                        </div>
                    </div>
                </div>
                <p class="text-sm text-gray-600">Baikan duit gw..!! ga sudi gw itu duit gw goblog</p>
                <p class="text-xs text-gray-400 mt-2">04 Desember 2024</p>
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <button class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow-md rounded-full p-2">
            <img src="{{ asset('images/icons/iconKanan.svg') }}" alt="Next" class="w-6 h-6">
        </button>
    </div>
</div>