<div class="mb-4">
    <input type="text" id="search-box" placeholder="Cari Laundry..." 
           class="border border-gray-300 rounded-lg p-2 w-full" oninput="performSearch()">
</div>
<!-- Daftar Laundry -->
<div id="laundry-list" class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">
    @forelse ($results as $result)
        <div class="laundry-card bg-white rounded-xl p-4 shadow" 
             data-name="{{ strtolower($result->nama_laundry) }}" 
             data-price="{{ $result->price_range['min'] }}">
             
            <!-- Logo dan Info -->
            <div class="laundry-item flex items-center gap-3 mb-4">
                <img src="{{ asset('images/icons/iconMerchantLogo.svg') }}" alt="Logo" class="w-12 h-12 rounded-xl">
                <div>
                    <h3 class="font-semibold text-gray-800">{{ $result->nama_laundry }}</h3>
                    <p class="text-sm text-gray-500">{{ $result->alamat_laundry }}</p>
                </div>
            </div>

            <!-- Layanan dan Harga -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="layanan">
                    <span class="text-sm text-gray-500">Layanan:</span>
                    <ul class="mt-2 space-y-1">
                        @foreach($result->layananLaundries as $layanan)
                            <li class="text-sm">{{ $layanan->nama_layanan }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="harga-mulai">
                    <span class="text-sm text-gray-500">Harga:</span>
                    <div class="mt-2">
                        <p class="text-sm">
                            Rp {{ number_format($result->price_range['min'], 0, ',', '.') }} - 
                            Rp {{ number_format($result->price_range['max'], 0, ',', '.') }}/kg
                        </p>
                    </div>
                </div>
            </div>

            <!-- Rating dan Jarak -->
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center gap-2 text-sm">
                    <span>⭐ {{ number_format($result->rating, 1) }}</span>
                    <span>•</span>
                    <span>{{ $result->reviews }} ulasan</span>
                </div>
                <span class="text-sm">{{ $result->distance ?? '1.2 km' }}</span>
            </div>

            <!-- Button -->
            <button class="chatSellerBtn w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg flex items-center justify-center gap-2"
                    data-laundry-name="{{ $result->nama_laundry }}"
                    data-merchant-id="{{ $result->merchant_id }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span>Order Laundry</span>
            </button>
        </div>
    @empty
        <div class="col-span-2 text-center py-10">
            <p class="text-gray-500">Tidak ada laundry yang ditemukan</p>
        </div>
    @endforelse
</div>



<script>
    // Fungsi untuk mencari laundry
    function performSearch() {
        let query = document.getElementById('search-box').value.toLowerCase();
        let cards = document.querySelectorAll('.laundry-card');
        cards.forEach(card => {
            let name = card.getAttribute('data-name');
            if (name.includes(query)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }
    
    // Fungsi untuk sorting harga
    function sortByPrice() {
        let sortValue = document.getElementById('sort-price').value;
        let list = document.getElementById('laundry-list');
        let cards = Array.from(list.getElementsByClassName('laundry-card'));

        cards.sort((a, b) => {
            let priceA = parseInt(a.getAttribute('data-price'));
            let priceB = parseInt(b.getAttribute('data-price'));

            return sortValue === 'low' ? priceA - priceB : priceB - priceA;
        });

        list.innerHTML = "";
        cards.forEach(card => list.appendChild(card));
    }
</script>
