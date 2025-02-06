@extends('user.components.main')
@section('container')
<!-- Import SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            </div>

                <!-- Search Box -->
                <div class="container-fluid mx-auto mt-4">
                    <div class="mb-4">
                        <input type="text" id="search-box" placeholder="Cari laundry..." 
                               class="border border-gray-300 rounded-lg p-2 w-full">
                    </div>
                </div>
            </form>
        </div>
       <!-- List Laundry -->
       <div id="laundry-list" class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">
            <!-- Card Laundry -->
            @forelse ($results as $result)
            @php
            // Menentukan rentang harga berdasarkan merchant_id
            $prices = [
                1 => [6000, 12000], // Kilat Laundry
                2 => [25000, 35000], // Bersih Sejahtera Laundry
                3 => [20000, 30000], // Super Clean Laundry
                4 => [15000, 25000], // Cerah Laundry
                5 => [4000, 9000], // Santai Laundry
            ];
            $merchant_id = $result->merchant_id;
            $price_range = isset($prices[$merchant_id]) ? 'Rp ' . number_format($prices[$merchant_id][0], 0, ',', '.') . ' - Rp ' . number_format($prices[$merchant_id][1], 0, ',', '.') : 'Harga tidak tersedia';
        @endphp
            <!-- Card Laundry -->
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

                    <!-- Rentang Harga dalam Label -->
                    <div class="flex items-center justify-between mt-3">

                        <!-- Deskripsi -->
                        <p class="text-gray-600 text-sm">{{ $result->description }}</p>

                        <!-- Rentang Harga dalam Label -->
                        <div class="bg-gray-100 px-3 py-1 rounded-full">
                            <span class="text-sm font-semibold text-gray-800">{{ $price_range }}</span>
                        </div>
                    </div>

                    <!--Location-->
                    <div class="mt-4 flex items-center text-gray-600">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="ml-2 text-sm">{{ $result->location }}</span>
                    </div>
        
                    <!-- Order Button -->
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
<div id="loadingSpinner" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex justify-center items-center">
    <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-blue-500"></div>
</div>
<div id="orderOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center">
    <div id="orderFormContainer" class="fixed w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6">
            <h2 class="text-2xl font-bold text-white text-center">Keranjang Belanja</h2>
        </div>

        <!-- Content -->
        <div class="p-6">
            <div class="max-h-[calc(100vh-400px)] overflow-y-auto pr-2 space-y-4" style="scrollbar-width: thin;">
                <div id="pencarian-container">
                    <!-- Layanan akan di-load secara dinamis lewat JavaScript -->
                </div>
            </div>

            <!-- Total -->
            <div class="mt-6 border-t border-gray-100 pt-6">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Total Pembayaran</span>
                    <h2 class="text-2xl font-bold text-blue-600">Rp<span id="total-harga">0</span></h2>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 mt-6">
                <button id="closeOverlayBtn" class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-colors duration-200 font-medium">
                    Tutup
                </button>
                <button id="orderLaundryBtn" class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors duration-200 font-medium flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    Order Laundry
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Order Form Overlay -->
<!--penerima-->
<div id="orderFormOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center">
    <div class="fixed w-full max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-xl">
        <!-- Alamat Penerima -->
        <h2 class="text-xl font-bold text-red-600 mb-4">Alamat Penerima</h2>
        <p class="font-bold">{{ auth()->user()->username }}</p>
        <p>{{ auth()->user()->alamat }}</p>
        <p>{{ auth()->user()->no_hp }}</p>

        <!-- Pencarian Produk -->
        {{-- <h3 class="text-lg font-semibold mt-6">Cari Produk</h3>
        <input type="text" id="searchInput" class="w-full px-3 py-2 border rounded-md mt-2" placeholder="Masukkan nama produk..."> --}}
        
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
    
    // Function helper
    function showLoading() {
        document.getElementById('loadingSpinner').classList.remove('hidden');
    }

    function hideLoading() {
        document.getElementById('loadingSpinner').classList.add('hidden');
    }

    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Function helper untuk alert
    function showErrorAlert(message) {
        Swal.fire({
            title: 'Error!',
            text: message,
            icon: 'error',
            confirmButtonText: 'Oke',
            confirmButtonColor: '#3085d6'
        });
    }

    function showSuccessAlert(message, callback = null) {
        Swal.fire({
            title: 'Berhasil!',
            text: message,
            icon: 'success',
            confirmButtonText: 'Oke',
            confirmButtonColor: '#3085d6'
        }).then((result) => {
            if (result.isConfirmed && callback) {
                callback();
            }
        });
    }

    function showConfirmAlert(message, callback) {
        Swal.fire({
            title: 'Konfirmasi',
            text: message,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Oke',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                callback();
            }
        });
    }

    // Event listener untuk tombol Order Laundry
    const orderButtons = document.querySelectorAll('.chatSellerBtn');
    console.log('Found order buttons:', orderButtons.length);
    
    orderButtons.forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            
            const merchantId = this.getAttribute('data-merchant-id');
            console.log('Merchant ID:', merchantId);
            
            try {
                // Disable button dan show loading
                this.disabled = true;
                showLoading();
                
                // Show overlay
                document.getElementById('orderOverlay').classList.remove('hidden');
                
                // Fetch data layanan
                const response = await fetch(`/api/merchant/${merchantId}/layanan`);
                if (!response.ok) {
                    throw new Error('Gagal ambil data layanan');
                }
                
                const data = await response.json();
                console.log('Layanan data:', data);
                
                // Update container layanan
                const container = document.getElementById('pencarian-container');
                container.innerHTML = ''; // Clear existing content
                
                data.forEach(layanan => {
                    container.innerHTML += `
                        <div class="border p-2 rounded-lg shadow-sm mb-4 bg-gray-50 hover:bg-gray-100">
                            <div class="flex items-center mt-3">
                                <div class="flex items-center mr-4">
                                    <input type="radio" 
                                           name="layanan-radio" 
                                           class="mr-3 layanan-radio" 
                                           data-nama="${layanan.nama_layanan}" 
                                           data-kategori="${layanan.kategori_layanan}" 
                                           data-harga="${layanan.harga_per_unit}" 
                                           data-berat="5 kg"
                                           data-merchant-id="${merchantId}">
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
                
            } catch (error) {
                console.error('Error:', error);
                showErrorAlert('Gagal mengambil data layanan. Coba refresh ya!');
            } finally {
                hideLoading();
                this.disabled = false;
            }
        });
    });

    function initRadioListeners() {
        let radios = document.querySelectorAll(".layanan-radio");
        let totalHargaElement = document.getElementById("total-harga");

        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    const harga = parseInt(this.dataset.harga);
                    totalHargaElement.textContent = formatNumber(harga);
                }
            });
        });
    }

    // Submit order handler
    const submitOrderBtn = document.getElementById('submitOrder');
    if (submitOrderBtn) {
        submitOrderBtn.addEventListener('click', async function() {
            const selectedRadio = document.querySelector('.layanan-radio:checked');
            const transactionMethod = document.getElementById('transactionMethod').value;

            // Validasi
            if (!selectedRadio) {
                showErrorAlert('Pilih layanan dulu ya!');
                return;
            }
            if (!transactionMethod) {
                showErrorAlert('Pilih metode pembayaran dulu ya!');
                return;
            }

            // Validasi merchant
            const merchantId = selectedRadio.getAttribute('data-merchant-id');
            if (!merchantId) {
                showErrorAlert('Data merchant tidak ditemukan!');
                return;
            }

            const orderButton = document.querySelector(`.chatSellerBtn[data-merchant-id="${merchantId}"]`);
            if (!orderButton) {
                showErrorAlert('Data laundry tidak ditemukan!');
                return;
            }

            // Konfirmasi order dengan SweetAlert2
            showConfirmAlert('Yakin mau submit order ini?', async () => {
                try {
                    showLoading();
                    submitOrderBtn.disabled = true;

                    const hargaLayanan = parseInt(selectedRadio.dataset.harga);
                    const hargaOngkir = 10000;
                    const totalHarga = hargaLayanan + hargaOngkir;

                    const orderData = {
                        user_id: {{ auth()->id() }},
                        alamat_pengiriman: '{{ auth()->user()->alamat }}',
                        total_price: totalHarga,
                        nama_laundry: orderButton.getAttribute('data-laundry-name'),
                        merchant_id: merchantId,
                        produk_terpilih: JSON.stringify([{
                            nama: selectedRadio.dataset.nama,
                            kategori: selectedRadio.dataset.kategori,
                            harga: hargaLayanan,
                            berat: selectedRadio.dataset.berat
                        }]),
                        metode_pembayaran: transactionMethod
                    };

                    const response = await fetch('/user/create-order', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify(orderData)
                    });

                    const result = await response.json();
                    
                    if (result.success) {
                        showSuccessAlert('Order berhasil dibuat!', () => {
                            window.location.href = '/user/riwayat';
                        });
                    } else {
                        throw new Error(result.message || 'Gagal membuat order');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showErrorAlert('Gagal membuat order: ' + error.message);
                } finally {
                    hideLoading();
                    submitOrderBtn.disabled = false;
                }
            });
        });
    }

    // Close overlay handlers
    const closeBtn = document.getElementById('closeOverlayBtn');
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            document.getElementById('orderOverlay').classList.add('hidden');
        });
    }

    const closeFormBtn = document.getElementById('closeFormOverlayBtn');
    if (closeFormBtn) {
        closeFormBtn.addEventListener('click', function() {
            document.getElementById('orderFormOverlay').classList.add('hidden');
            document.getElementById('orderOverlay').classList.remove('hidden');
        });
    }

    // Order Laundry button handler
    const orderLaundryBtn = document.getElementById('orderLaundryBtn');
    if (orderLaundryBtn) {
        orderLaundryBtn.addEventListener('click', function() {
            const selectedRadio = document.querySelector('.layanan-radio:checked');
            if (!selectedRadio) {
                showErrorAlert('Pilih layanan dulu ya!');
                return;
            }

            // Update produk terpilih
            updateProdukTerpilih(selectedRadio);

            // Hide order overlay dan show form
            document.getElementById('orderOverlay').classList.add('hidden');
            document.getElementById('orderFormOverlay').classList.remove('hidden');
        });
    }

    function updateProdukTerpilih(selectedRadio) {
        const produkTerpilihContainer = document.getElementById('produkTerpilih');
        produkTerpilihContainer.innerHTML = `
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <div>
                    <p class="font-semibold">${selectedRadio.dataset.kategori} - ${selectedRadio.dataset.nama}</p>
                    <p class="text-sm text-gray-600">Berat: ${selectedRadio.dataset.berat}</p>
                </div>
                <div class="text-right">
                    <p class="text-red-500 font-bold">Rp${formatNumber(selectedRadio.dataset.harga)}</p>
                </div>
            </div>
        `;

        // Update final total
        const finalTotalElement = document.getElementById('finalTotal');
        const hargaLayanan = parseInt(selectedRadio.dataset.harga);
        const hargaOngkir = 10000;
        const totalHarga = hargaLayanan + hargaOngkir;
        finalTotalElement.innerHTML = `Rp${formatNumber(totalHarga)}`;
    }
});
</script>
@endsection