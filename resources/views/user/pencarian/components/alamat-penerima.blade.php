<div id="orderFormOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center">
    <div class="fixed w-full max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-xl">
        <!-- Alamat Penerima -->
        <h2 class="text-xl font-bold text-red-600 mb-4">Alamat Penerima</h2>
        <p class="font-bold">{{ auth()->user()->username }}</p>
        <p>{{ auth()->user()->alamat }}</p>
        <p>{{ auth()->user()->no_hp }}</p>
        
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