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
                <div>
                    <select id="location" name="location" class="px-3 py-2 border rounded-md">
                        <option selected>Distance</option>
                        <option value="1">Terdekat</option>
                    </select>
                </div>
                <div class="flex-grow">
                    <select id="price" name="price" class="w-32 px-3 py-2 border rounded-md">
                        <option selected>Price</option>
                        <option value="low">Low to High</option>
                        <option value="high">High to Low</option>
                    </select>
                </div>
                <div class="flex-grow">
                    <select id="rating" name="rating" class="w-full px-3 py-2 border rounded-md">
                        <option selected>Rating</option>
                        <option value="good">Good Rating</option>
                        <option value="bad">Bad Rating</option>
                    </select>
                </div>
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
        <div id="laundry-list" class="grid grid-cols-1 md:grid-cols-2 gap-3">
            @forelse ($results as $result)
            <div class="bg-white shadow rounded-lg flex items-start p-6 laundry-item">
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
                        <!-- Button Order dengan debug info -->
                        <div class="text-sm text-gray-500 mb-2">
                            Available fields: {{ implode(', ', array_keys((array)$result)) }}
                        </div>
                        <button class="chatSellerBtn px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" 
                                data-laundry-name="{{ $result->title }}"
                                data-merchant-id="{{ $result->merchant_id }}">
                            Order Laundry
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-gray-600">Tidak ada data ditemukan.</p>
            @endforelse
        </div>

<!-- Map Container -->
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
    <div id="orderFormContainer" class="fixed w-full max-w-4xl p-8 bg-white rounded-lg shadow-xl">
        <h2 class="text-2xl font-bold mb-2 text-center">Keranjang Belanja</h2>
        <div class="max-h-96 overflow-y-auto">
            <div id="pencarian-container">
                <!-- Layanan akan di-load secara dinamis lewat JavaScript -->
            </div>
        </div>

        <div class="mt-5 border-t pt-4 text-center">
            <h2 class="text-xl font-bold text-gray-800">Total: Rp<span id="total-harga">0</span></h2>
        </div>

        <div class="flex justify-between mt-5">
            <button id="closeOverlayBtn" class="w-1/2 bg-gray-500 text-white p-3 rounded-lg hover:bg-gray-600 mr-3 text-sm">Tutup</button>
            <button id="orderLaundryBtn" class="w-1/2 bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 text-sm">Order Laundry</button>
        </div>
    </div>
</div>

<!-- Order Form Overlay -->
<!--penerima-->
<div id="orderFormOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center">
    <div class="fixed w-full max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-xl">
        <!-- Alamat Penerima -->
        <h2 class="text-xl font-bold text-red-600 mb-4">Alamat Penerima</h2>
        <p class="font-bold">{{ auth()->user()->username }}</p>
        <p>{{ auth()->user()->alamat }}</p>
        <p>{{ auth()->user()->no_hp }}</p>

        <!-- Pencarian Produk -->
        <h3 class="text-lg font-semibold mt-6">Cari Produk</h3>
        <input type="text" id="searchInput" class="w-full px-3 py-2 border rounded-md mt-2" placeholder="Masukkan nama produk...">
        
        <!-- Produk Dipilih -->
        <h3 class="text-lg font-semibold mt-6">Produk Dipilih</h3>
        <div id="produkTerpilih" class="border p-4 rounded-lg mt-2"></div>

        <!-- Opsi Pengiriman -->
        <h3 class="text-lg font-semibold mt-6">Opsi Pengiriman</h3>
        <div class="border p-4 rounded-lg mt-2">
            <p class="font-semibold">Reguler - Rp10.000</p>
            <p class="text-sm text-gray-600">Estimasi tiba: 3-4 hari</p>
        </div>

        <!-- Metode Pembayaran -->
        <h3 class="text-lg font-semibold mt-6">Metode Pembayaran</h3>
        <div class="flex-grow">
            <select id="transactionMethod" name="transactionMethod" class="w-full px-3 py-2 border rounded-md">
                <option value="">Pilih Metode</option>
                <option value="QRIS">QRIS</option>
                <option value="COD">Cash On Delivery (COD)</option>
            </select>
        </div>
        
        <!-- Total Harga -->
        <div class="mt-6 flex justify-between items-center border-t pt-4">
            <p class="text-xl font-bold">Total:</p>
            <p id="finalTotal" class="text-xl font-bold text-red-600">Rp<span id="total-harga">0</span></p>
        </div>

        <!-- Button -->
        <div class="flex justify-between mt-5">
            <button id="closeFormOverlayBtn" class="w-1/2 bg-gray-500 text-white p-3 rounded-lg hover:bg-gray-600 mr-3 text-sm">Kembali</button>
            <button id="submitOrder" class="w-1/2 bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 text-sm">Pesan Sekarang</button>
        </div>
    </div>
</div>
<form>
</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    console.log('DOM fully loaded');
    
    // Event listener untuk tombol Order Laundry
    const orderButtons = document.querySelectorAll('.chatSellerBtn');
    console.log('Found order buttons:', orderButtons.length);
    
    orderButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Button clicked');
            
            const merchantId = this.getAttribute('data-merchant-id');
            console.log('Merchant ID:', merchantId);
            
            // Show overlay first
            document.getElementById('orderOverlay').classList.remove('hidden');
            
            // Ajax request untuk ambil layanan
            fetch(`/api/merchant/${merchantId}/layanan`)
                .then(response => {
                    console.log('Response status:', response.status);
                    return response.json();
                })
                .then(data => {
                    console.log('Layanan data:', data);
                    // Update container layanan
                    const container = document.getElementById('pencarian-container');
                    container.innerHTML = ''; // Clear existing content
                    
                    data.forEach(layanan => {
                        container.innerHTML += `
                            <div class="border p-2 rounded-lg shadow-sm mb-4 bg-gray-50">
                                <div class="flex items-center mt-3">
                                    <div class="flex items-center mr-4">
                                        <input type="radio" 
                                               name="layanan-radio" 
                                               class="mr-3 layanan-radio" 
                                               data-nama="${layanan.nama_layanan}" 
                                               data-kategori="${layanan.kategori_layanan}" 
                                               data-harga="${layanan.harga_per_unit}" 
                                               data-berat="5 kg">
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-gray-800 font-semibold text-lg">${layanan.kategori_layanan} - ${layanan.nama_layanan}</p>
                                        <span class="text-gray-500 text-sm">Waktu Pengerjaan: ${layanan.waktu_pengerjaan}</span>
                                    </div>
                                    <div class="text-right">
                                        <span class="line-through text-gray-400 text-sm">Rp${formatNumber(layanan.harga_per_unit * 1.5)}</span>
                                        <p class="text-red-500 font-bold text-xl">Rp${formatNumber(layanan.harga_per_unit)}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    
                    // Reinitialize radio button event listeners
                    initRadioListeners();
                })
                .catch(error => {
                    console.error('Error fetching layanan:', error);
                    alert('Gagal mengambil data layanan. Silakan coba lagi.');
                });
        });
    });

    function initRadioListeners() {
        let radios = document.querySelectorAll(".layanan-radio");
        let totalHargaElement = document.getElementById("total-harga");
        let selectedService = null;

        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    selectedService = {
                        nama: this.dataset.nama,
                        kategori: this.dataset.kategori,
                        harga: parseInt(this.dataset.harga),
                        berat: this.dataset.berat
                    };
                    
                    // Update total
                    totalHargaElement.textContent = formatNumber(selectedService.harga);
                }
            });
        });
    }

    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Close overlay button
    const closeBtn = document.getElementById('closeOverlayBtn');
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            document.getElementById('orderOverlay').classList.add('hidden');
        });
    }

    // Order Laundry button handler
    const orderLaundryBtn = document.getElementById('orderLaundryBtn');
    if (orderLaundryBtn) {
        orderLaundryBtn.addEventListener('click', function() {
            // Check if a service is selected
            const selectedRadio = document.querySelector('.layanan-radio:checked');
            if (!selectedRadio) {
                alert('Silakan pilih layanan terlebih dahulu!');
                return;
            }

            // Hide order overlay
            document.getElementById('orderOverlay').classList.add('hidden');
            // Show order form overlay
            document.getElementById('orderFormOverlay').classList.remove('hidden');
        });
    }

    // Close form overlay button
    const closeFormBtn = document.getElementById('closeFormOverlayBtn');
    if (closeFormBtn) {
        closeFormBtn.addEventListener('click', function() {
            document.getElementById('orderFormOverlay').classList.add('hidden');
            document.getElementById('orderOverlay').classList.remove('hidden');
        });
    }

    // Submit order button handler
    const submitOrderBtn = document.getElementById('submitOrder');
    if (submitOrderBtn) {
        submitOrderBtn.addEventListener('click', function() {
            const selectedRadio = document.querySelector('.layanan-radio:checked');
            const transactionMethod = document.getElementById('transactionMethod').value;

            if (!transactionMethod) {
                alert('Silakan pilih metode pembayaran!');
                return;
            }

            // Collect order data
            const orderData = {
                layanan_nama: selectedRadio.dataset.nama,
                layanan_kategori: selectedRadio.dataset.kategori,
                harga: parseInt(selectedRadio.dataset.harga),
                metode_pembayaran: transactionMethod
            };

            // Send order data to server
            fetch('/api/order/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(orderData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Order berhasil dibuat!');
                    window.location.href = '/user/orders'; // Redirect ke halaman orders
                } else {
                    alert('Gagal membuat order: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat membuat order');
            });
        });
    }
});
</script>

@endsection