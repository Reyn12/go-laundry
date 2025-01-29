@extends('user.components.main')
@section('container')
<div class="lg:w-1/4 hidden lg:block">
    @include('user.components.sidebar')
</div>
<div class="flex flex-col md:flex-row w-full" id="mainContent">
    <!-- Konten Pencarian (Sidebar Kiri) -->
    <div class="w-full md:w-2/3 p-4">
        <div class="search-sidebar">
            <h5 class="text-black font-bold text-lg mb-4">248 Ready in Bandung</h5>
            <form action="{{ route('user.pencarian') }}" method="GET">
                <!-- Form Pencarian -->
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
                    <!-- Filter Button -->
                    <button class="border rounded-md p-2 bg-white shadow-md flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.75h16.5M3.75 12h16.5m-7.5 6.25h7.5" />
                        </svg>
                        More filter
                    </button>
                </div>
                <!-- Search Bar -->
                <div class="mb-3 flex items-center space-x-2">
                    <input type="text" name="query" class="flex-1 p-2 border rounded-md" placeholder="Search or type command...">
                    <button type="reset" class="px-4 py-2 border rounded-md bg-red-500 hover:bg-gray-400 text-white shadow-md">Clear</button>
                    <button type="submit" class="px-4 py-2 border rounded-md bg-blue-600 hover:bg-gray-400 text-white shadow-md">Search</button>
                </div>
            </form>
        </div>

        <!-- Card with 'Chat Seller Laundry' button -->
        <div class="bg-white shadow rounded-lg flex items-start p-6">
            <img src="https://via.placeholder.com/150" alt="Laundry Basket" class="w-32 h-32 rounded-md object-cover">
            <div class="ml-6">
                <p class="text-sm text-gray-500 font-semibold">Sukses maju terus</p>
                <h2 class="text-lg font-bold text-gray-800">LaundryKlin Cihampelas (Laundry Antar Bandung)</h2>
                <div class="flex items-center mt-2">
                    <span class="text-yellow-400 text-sm mr-1">★★★★★</span>
                    <span class="text-gray-600 text-sm">5.0</span>
                    <span class="text-gray-400 text-sm ml-2">125 reviews</span>
                </div>
                <div class="flex items-center mt-4 text-sm text-gray-600">
                    <span>laundry by ijdhwoighiwe</span>
                </div>
                <div class="flex items-center mt-1 text-sm text-gray-600">
                    <span>Dipatiukur, 29 Blok M</span>
                </div>
                <div class="mt-4">
                    <button class="chatSellerBtn px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Chat Seller Laundry</button>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg flex items-start p-6">
            <img src="https://via.placeholder.com/150" alt="Laundry Basket" class="w-32 h-32 rounded-md object-cover">
            <div class="ml-6">
                <p class="text-sm text-gray-500 font-semibold">Sukses maju terus</p>
                <h2 class="text-lg font-bold text-gray-800">LaundryKlin Cihampelas (Laundry Antar Jemput Bandung)</h2>
                <div class="flex items-center mt-2">
                    <span class="text-yellow-400 text-sm mr-1">★★★★★</span>
                    <span class="text-gray-600 text-sm">5.0</span>
                    <span class="text-gray-400 text-sm ml-2">125 reviews</span>
                </div>
                <div class="flex items-center mt-4 text-sm text-gray-600">
                    <span>laundry by ijdhwoighiwe</span>
                </div>
                <div class="flex items-center mt-1 text-sm text-gray-600">
                    <span>Dipatiukur, 29 Blok M</span>
                </div>
                <div class="mt-4">
                    <button class="chatSellerBtn px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Chat Seller Laundry</button>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg flex items-start p-6">
            <img src="https://via.placeholder.com/150" alt="Laundry Basket" class="w-32 h-32 rounded-md object-cover">
            <div class="ml-6">
                <p class="text-sm text-gray-500 font-semibold">Sukses maju terus</p>
                <h2 class="text-lg font-bold text-gray-800">LaundryKlin Cihampelas (Laundry Antar Jemput Bandung)</h2>
                <div class="flex items-center mt-2">
                    <span class="text-yellow-400 text-sm mr-1">★★★★★</span>
                    <span class="text-gray-600 text-sm">5.0</span>
                    <span class="text-gray-400 text-sm ml-2">125 reviews</span>
                </div>
                <div class="flex items-center mt-4 text-sm text-gray-600">
                    <span>laundry by ijdhwoighiwe</span>
                </div>
                <div class="flex items-center mt-1 text-sm text-gray-600">
                    <span>Dipatiukur, 29 Blok M</span>
                </div>
                <div class="mt-4">
                    <button class="chatSellerBtn px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Chat Seller Laundry</button>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg flex items-start p-6">
            <img src="https://via.placeholder.com/150" alt="Laundry Basket" class="w-32 h-32 rounded-md object-cover">
            <div class="ml-6">
                <p class="text-sm text-gray-500 font-semibold">Sukses maju terus</p>
                <h2 class="text-lg font-bold text-gray-800">LaundryKlin Cihampelas (Laundry Antar Jemput Bandung)</h2>
                <div class="flex items-center mt-2">
                    <span class="text-yellow-400 text-sm mr-1">★★★★★</span>
                    <span class="text-gray-600 text-sm">5.0</span>
                    <span class="text-gray-400 text-sm ml-2">125 reviews</span>
                </div>
                <div class="flex items-center mt-4 text-sm text-gray-600">
                    <span>laundry by ijdhwoighiwe</span>
                </div>
                <div class="flex items-center mt-1 text-sm text-gray-600">
                    <span>Dipatiukur, 29 Blok M</span>
                </div>
                <div class="mt-4">
                    <button class="chatSellerBtn px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Chat Seller Laundry</button>
                </div>
            </div>
        </div>

    </div>

    <!-- Peta (Sidebar Kanan) -->
    <div class="flex-1 p-4">
        <div id="map-container" class="h-screen w-full">
            <iframe src="https://maps.google.com/maps?q=Monas%20Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                class="w-full h-full rounded-md" frameborder="0">
            </iframe>
        </div>
    </div>
</div>

<!-- Overlay for the form -->
<div id="overlay" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden z-10">
    <div id="orderForm" class="bg-white w-full md:w-1/2 mx-auto p-6 rounded-lg shadow-lg mt-24">
        <h1 class="text-2xl font-bold text-center text-blue-600">Form Pemesanan Laundry</h1>
        
        <form id="orderFormElement" class="mt-4">
            <label class="block text-gray-700 font-medium">Pilih Jenis Layanan</label>
            <select name="layanan" class="w-full p-2 border rounded-lg mt-1">
                <option>Cuci Biasa</option>
                <option>Setrika</option>
                <option>Ekspres</option>
            </select>
            
            <label class="block text-gray-700 font-medium mt-3">Jumlah Cucian (kg/item)</label>
            <input type="number" name="jumlah" class="w-full p-2 border rounded-lg mt-1" placeholder="Masukkan berat/jumlah item">
            
            <label class="block text-gray-700 font-medium mt-3">Catatan Tambahan</label>
            <input type="text" name="catatan" class="w-full p-2 border rounded-lg mt-1" placeholder="Misal: Jangan pakai pewangi">
            
            <div class="mt-4">
                <h2 class="text-lg font-bold">Detail Harga + Ongkos Kirim</h2>
                <p class="text-gray-600">Harga akan dihitung berdasarkan berat dan layanan yang dipilih.</p>
            </div>
            
            <label class="block text-gray-700 font-medium mt-3">Metode Pembayaran</label>
            <select name="pembayaran" class="w-full p-2 border rounded-lg mt-1">
                <option>QRIS</option>
                <option>COD (Cash on Delivery)</option>
            </select>
            
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-lg mt-4 hover:bg-blue-700">Confirm Pesanan</button>
        </form>
        
        <button id="closeFormBtn" class="mt-4 w-full text-center bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">Close</button>
    </div>
</div>

<script>
    // Handle the display of the form and blur effect on main content
    const chatSellerBtns = document.querySelectorAll('.chatSellerBtn');
    chatSellerBtns.forEach(function(chatSellerBtn) {
        chatSellerBtn.addEventListener('click', function() {
            // Show the overlay and form, and apply blur to the main content
            overlay.classList.remove('hidden');
            mainContent.style.filter = 'blur(5px)';
        });
    });

    const overlay = document.getElementById('overlay');
    const closeFormBtn = document.getElementById('closeFormBtn');
    const mainContent = document.getElementById('mainContent');

    closeFormBtn.addEventListener('click', function() {
        // Close the form and remove the blur effect from main content
        overlay.classList.add('hidden');
        mainContent.style.filter = 'none';
    });

    // Handle form submission (fake submission for now)
    const form = document.getElementById('orderFormElement');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        alert('Pesanan berhasil dikonfirmasi!');
        overlay.classList.add('hidden');
        mainContent.style.filter = 'none';
    });
</script>

@endsection
