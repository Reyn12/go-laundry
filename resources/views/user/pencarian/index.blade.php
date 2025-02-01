@extends('user.components.main')
@section('container')
<div class="lg:w-1/4 hidden lg:block">
    @include('user.components.sidebar')
</div>
<style>
    #overlay {
        filter: blur(5px);
        pointer-events: none; /* Mencegah klik pada elemen di belakang overlay */
    }
</style>
<div id="overlay" class="hidden"></div>
<div class="flex flex-col md:flex-row w-full" id="mainContent">
    <!-- Konten Pencarian (Sidebar Kiri) -->
    <div class="w-full md:w-2/3 p-4 bg-white">
        <div class="search-sidebar">
            <h5 class="text-black font-bold text-lg mb-4">248 Ready in Bandung</h5>
            <form action="{{ route('user.pencarian') }}" method="GET">
                <div class="flex justify-between mb-3 space-x-2">
                    <div class="flex gap-2">
                        <select id="location" name="location" class="px-3 py-2 border rounded-md">
                            <option selected>Padjajaran, Bandung</option>
                            <option value="1">Location 1</option>
                            <option value="2">Location 2</option>
                        </select>
                    </div>
                    <div class="flex-grow">
                        <select id="price" name="price" class="px-3 py-2 border rounded-md">
                            <option selected>Price</option>
                            <option value="low">Low to High</option>
                            <option value="high">High to Low</option>
                        </select>
                    </div>
                    <button class="border rounded-md p-2 bg-white shadow-md flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.75h16.5M3.75 12h16.5m-7.5 6.25h7.5" />
                        </svg>
                        More filter
                    </button>
                </div>
                <!-- Search Box -->
                <div class="container-fluid mx-auto mt-4">
                    <div class="mb-4">
                        <input type="text" id="search-box" placeholder="Cari riwayat pesanan..." 
                               class="border border-gray-300 rounded-lg p-2 w-full">
                    </div>
                </div>
            </form>
        </div>
        <!-- List Laundry -->
        <div id="laundry-list" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse ($results as $result)
            <div class="bg-white shadow rounded-lg flex items-start p-6 laundry-item">
                <img src="{{ $result->image }}" alt="{{ $result->title }}" class="w-32 h-32 rounded-md object-cover">
                <div class="ml-6">
                    <h2 class="text-xl font-bold text-gray-800">{{ $result->title }}</h2>
                    <div class="flex items-center mt-2">
                        <span class="text-yellow-400 text-xl mr-1">★★★★★</span>
                        <span class="text-gray-600 text-sm">{{ $result->rating }}</span>
                        <span class="text-gray-400 text-sm ml-2">{{ $result->reviews }} reviews</span>
                    </div>
                    <div class="flex items-center mt-1 text-sm text-gray-600">
                        <span>{{ $result->description }}</span>
                    </div>
                    <div class="flex items-center justify-between mt-1 text-sm text-gray-600 w-full">
                        <span>{{ $result->location }}</span>
                    </div>
                    <div>
                        <button class="chatSellerBtn px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Order Laundry
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-gray-600">Tidak ada data ditemukan.</p>
            @endforelse
        </div>

    </div>
    <div class="flex-1 p-4 bg-white">
        <div id="map-container" class="h-screen w-full">
            <iframe src="https://maps.google.com/maps?q=AIzaSyDhJtqrVPguRHaas1QvCBK8WiRVpD36kKM&t=&z=13&ie=UTF8&iwloc=&output=embed"
                class="w-full h-full rounded-md" frameborder="0"></iframe>
        </div>
    </div>
</div>
<!-- Overlay for the form -->
<div id="orderOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center">
    <div id="orderFormContainer" class="p-8 bg-white rounded-lg shadow-xl w-[100%] max-w-lg">
        <h2 class="text-2xl font-bold mb-2 text-center">Keranjang Belanja</h2>

        @if(isset($layanan_laundries) && count($layanan_laundries) > 0)
            <div class="max-h-96 overflow-y-auto">
            <tbody id="pencarian-container">
                @foreach($layanan_laundries as $layanan)
                <div class="border p-2 rounded-lg shadow-sm mb-4 bg-gray-50">
                    <div class="flex items-center justify-between border-b pb-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="mr-3">
                            <span class="font-medium text-gray-700 text-sm">Layanan Laundry</span>
                        </div>
                    </div>
                    <div class="flex items-center mt-3">
                        <img src="laundry.jpg" alt="Layanan Laundry" class="w-20 h-20 mr-5 rounded-md object-cover">
                        <div class="flex-1">
                            <p class="text-gray-800 font-semibold text-lg">{{ $layanan->kategori_layanan }} - {{ $layanan->nama_layanan }}</p>
                            <span class="text-gray-500 text-sm">Waktu Pengerjaan: {{ $layanan->waktu_pengerjaan }}</span>
                        </div>
                        <div class="text-right">
                            <span class="line-through text-gray-400 text-sm">Rp{{ number_format($layanan->harga_per_unit * 1.5, 0, ',', '.') }}</span>
                            <p class="text-red-500 font-bold text-xl">Rp{{ number_format($layanan->harga_per_unit, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 text-sm">Tidak ada layanan tersedia.</p>
        @endif
        
        <div class="mt-5 border-t pt-4 text-center">
            <h2 class="text-xl font-bold text-gray-800">Total: Rp{{ isset($layanan_laundries) ? number_format($layanan_laundries->sum('harga_per_unit'), 0, ',', '.') : '0' }}</h2>
        </div>

        <div class="flex justify-between mt-5">
            <button id="closeOverlayBtn" class="w-1/2 bg-gray-500 text-white p-3 rounded-lg hover:bg-gray-600 mr-3 text-sm">Tutup</button>
            <button class="w-1/2 bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 text-sm">Order Laundry</button>
        </div>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchBox = document.getElementById('search-box');
        const laundryList = document.getElementById('laundry-list');
        const laundryItems = laundryList.querySelectorAll('.laundry-item');

        searchBox.addEventListener('keyup', function () {
            const searchValue = this.value.toLowerCase().trim();
            
            laundryItems.forEach(item => {
                const title = item.querySelector('h2').innerText.toLowerCase();
                const description = item.querySelector('.text-sm').innerText.toLowerCase();

                if (title.includes(searchValue) || description.includes(searchValue)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Order button functionality
        const overlay = document.getElementById("orderOverlay");
        const mainContent = document.getElementById("mainContent");
        const orderButtons = document.querySelectorAll(".chatSellerBtn");
        const closeOverlayBtn = document.getElementById("closeOverlayBtn");

        orderButtons.forEach(button => {
            button.addEventListener("click", () => {
                overlay.classList.remove("hidden");
                mainContent.classList.add("blurred");
            });
        });

        closeOverlayBtn.addEventListener("click", () => {
            overlay.classList.add("hidden");
            mainContent.classList.remove("blurred");
        });
    });
</script>

@endsection
