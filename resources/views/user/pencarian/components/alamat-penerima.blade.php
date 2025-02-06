<div id="orderFormOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="relative w-full max-w-2xl bg-white rounded-xl mx-auto">
        <!-- Header -->
        <div class="bg-blue-600 px-6 py-4 rounded-t-xl">
            <h2 class="text-2xl font-bold text-white">Alamat Penerima</h2>
        </div>

        <!-- Scrollable Content -->
        <div class="p-6 max-h-[calc(100vh-250px)] overflow-y-auto">
            <!-- Info Penerima -->
            <div class="bg-white rounded-xl mb-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-lg text-gray-900">{{ auth()->user()->username }}</p>
                        <p class="text-gray-600">{{ auth()->user()->alamat }}</p>
                        <p class="text-gray-600">{{ auth()->user()->no_hp }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Grid 2 Kolom: Produk & Pengiriman -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <!-- Produk Dipilih -->
                <div class="bg-white rounded-xl p-4 border border-gray-100">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Produk Dipilih</h3>
                    </div>
                    <div id="produkTerpilih" class="ml-[52px]"></div>
                </div>

                <!-- Opsi Pengiriman -->
                <div class="bg-white rounded-xl p-4 border border-gray-100">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Opsi Pengiriman</h3>
                    </div>
                    <div class="ml-[52px]">
                        <p class="font-semibold text-gray-900">Reguler - Rp10.000</p>
                        <p class="text-sm text-gray-600">Estimasi tiba: 3-4 hari</p>
                    </div>
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="bg-white rounded-xl p-4 mb-6 border border-gray-100">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900"> PilihMetode Pembayaran</h3>
                </div>
                <div class="ml-[52px] grid grid-cols-2 gap-4">
                    <!-- QRIS Payment Option -->
                    <label class="cursor-pointer">
                        <input type="radio" name="payment" value="QRIS" class="hidden payment-radio" onchange="updateTransactionMethod(this.value)">
                        <div class="payment-option flex items-center p-4 border border-gray-200 rounded-xl transition-all duration-200">
                            <div class="p-3 bg-blue-50 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-semibold text-gray-900">QRIS</p>
                                <p class="text-sm text-gray-600">Scan untuk bayar</p>
                            </div>
                        </div>
                    </label>

                    <!-- COD Payment Option -->
                    <label class="cursor-pointer">
                        <input type="radio" name="payment" value="COD" class="hidden payment-radio" onchange="updateTransactionMethod(this.value)">
                        <div class="payment-option flex items-center p-4 border border-gray-200 rounded-xl transition-all duration-200">
                            <div class="p-3 bg-blue-50 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-semibold text-gray-900">COD</p>
                                <p class="text-sm text-gray-600">Bayar saat terima</p>
                            </div>
                        </div>
                    </label>
                </div>

                <!-- Hidden select untuk maintain logic lama -->
                <select id="transactionMethod" name="transactionMethod" class="hidden">
                    <option value="">Pilih Metode</option>
                    <option value="QRIS">QRIS</option>
                    <option value="COD">Cash On Delivery (COD)</option>
                </select>
            </div>

            <style>
                .payment-radio:checked + .payment-option {
                    border-color: #2563eb;
                    background-color: #eff6ff;
                    box-shadow: 0 0 0 2px #2563eb;
                }
            </style>

            <script>
                function updateTransactionMethod(value) {
                    // Update hidden select value
                    document.getElementById('transactionMethod').value = value;
                    
                    // Update visual state
                    document.querySelectorAll('.payment-option').forEach(option => {
                        option.classList.remove('border-blue-500', 'bg-blue-50');
                    });
                    
                    const selectedOption = document.querySelector(`input[value="${value}"]`).nextElementSibling;
                    selectedOption.classList.add('border-blue-500', 'bg-blue-50');
                }
            </script>

            <!-- Total -->
            <div class="flex justify-between items-center py-4">
                <p class="text-xl font-bold text-gray-900">Total:</p>
                <p id="finalTotal" class="text-xl font-bold text-blue-600">Rp<span id="total-harga">0</span></p>
            </div>
        </div>

        <!-- Footer Buttons -->
        <div class="p-6 border-t border-gray-200">
            <div class="flex gap-4">
                <button id="closeFormOverlayBtn" class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all duration-200">
                    Kembali
                </button>
                <button id="submitOrder" class="flex-1 px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                    Pesan Sekarang
                </button>
            </div>
        </div>
    </div>
</div>