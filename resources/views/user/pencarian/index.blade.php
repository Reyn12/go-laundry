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
    <!-- Konten Kiri -->
    <div class="w-full md:w-2/3 p-4 bg-white">

        {{-- Filter & Search --}}
        @include('user.pencarian.components.filter-search')
       <!-- List Merchant -->
       @include('user.pencarian.components.list-merchant')
    </div>
    
    <!-- Map Container -->
    @include('user.pencarian.components.map')
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
            <div class="max-h-[calc(100vh-400px)] overflow-y-auto pr-2" style="scrollbar-width: thin;">
                <div id="pencarian-container" class="grid grid-cols-2 gap-4">
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
@include('user.pencarian.components.alamat-penerima')

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
                        <label class="block cursor-pointer">
                            <div class="border p-4 rounded-xl shadow-sm bg-white hover:bg-blue-50 peer-checked:bg-blue-50 transition-all duration-200 relative group">
                                <!-- Badge Selected -->
                                <div class="absolute -top-2 -right-2 scale-0 group-peer-checked:scale-100 transition-transform">
                                    <span class="bg-blue-500 text-white text-xs font-medium px-2.5 py-1 rounded-full shadow-sm inline-flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Selected
                                    </span>
                                </div>

                                <input type="radio" 
                                       name="layanan-radio" 
                                       class="layanan-radio peer hidden"
                                       data-nama="${layanan.nama_layanan}" 
                                       data-kategori="${layanan.kategori_layanan}" 
                                       data-harga="${layanan.harga_per_unit}" 
                                       data-berat="5 kg"
                                       data-merchant-id="${merchantId}">
                                <div class="flex items-center gap-4">
                                    <!-- Icon Container -->
                                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-blue-50 group-hover:bg-blue-100 peer-checked:bg-blue-500 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500 group-hover:text-blue-600 peer-checked:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    
                                    <div class="flex-1">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="text-gray-800 font-semibold text-lg group-hover:text-blue-600 peer-checked:!text-blue-600 transition-colors">${layanan.nama_layanan}</p>
                                                <div class="space-y-0.5">
                                                    <span class="text-gray-500 text-sm block">Waktu Pengerjaan:</span>
                                                    <span class="text-gray-600 font-medium block">${layanan.waktu_pengerjaan}</span>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <span class="line-through text-gray-400 text-sm">Rp${formatNumber(layanan.harga_per_unit * 1.5)}</span>
                                                <p class="text-red-500 font-bold text-xl">Rp${formatNumber(layanan.harga_per_unit)}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Active State Border -->
                                <div class="absolute inset-0 border-2 border-blue-500 rounded-xl opacity-0 peer-checked:!opacity-100 transition-all"></div>
                            </div>
                        </label>
                    `;
                });
                
                // Event listener untuk radio buttons
                container.addEventListener('change', (e) => {
                    if (e.target.classList.contains('layanan-radio')) {
                        // Update total harga
                        const harga = parseInt(e.target.dataset.harga);
                        document.getElementById('total-harga').textContent = formatNumber(harga);
                    }
                });
                
            } catch (error) {
                console.error('Error:', error);
                showErrorAlert('Gagal mengambil data layanan. Coba refresh ya!');
            } finally {
                hideLoading();
                this.disabled = false;
            }
        });
    });

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