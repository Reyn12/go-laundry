<div id="laundry-list" class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">
    @forelse ($results as $result)
    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-start">
                <h2 class="text-xl font-bold text-gray-800 hover:text-blue-600 transition-colors">{{ $result->title }}</h2>
                <div class="flex items-center bg-blue-50 px-3 py-1 rounded-full">
                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-600">{{ $result->rating }}</span>
                    <span class="mx-1.5 text-gray-400">•</span>
                    <span class="text-sm text-gray-500">{{ $result->reviews }} reviews</span>
                </div>
            </div>
            
            <p class="mt-3 text-gray-600 text-sm">{{ $result->description }}</p>
            
            <div class="mt-4 flex items-center text-gray-600">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="ml-2 text-sm">{{ $result->location }}</span>
            </div>

            <div class="mt-6">
                <button class="chatSellerBtn w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 px-4 rounded-lg transition-colors duration-300 flex items-center justify-center space-x-2"
                        data-laundry-name="{{ $result->title }}"
                        data-merchant-id="{{ $result->merchant_id }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>Order Laundry</span>
                </button>
            </div>
        </div>
    </div>
    @empty
        <div class="col-span-2 text-center py-10">
            <p class="text-gray-500">Tidak ada laundry yang ditemukan</p>
        </div>
    @endforelse
</div>