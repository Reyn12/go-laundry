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
                        <!-- Button Order -->
                        <button class="chatSellerBtn px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" 
                                data-laundry-name="{{ $result->title }}">
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

        @if(isset($layanan_laundries) && count($layanan_laundries) > 0)
            <div class="max-h-96 overflow-y-auto">
                <tbody id="pencarian-container">
                @foreach($layanan_laundries->take(3) as $layanan)
                    <div class="border p-2 rounded-lg shadow-sm mb-4 bg-gray-50">
                        <div class="flex items-center justify-between border-b pb-3">
                            <div class="flex items-center">
                                <input type="checkbox" class="mr-3 layanan-checkbox" data-nama="{{ $layanan->nama_layanan }}" data-kategori="{{ $layanan->kategori_layanan }}" data-harga="{{ $layanan->harga_per_unit }}" data-berat="5 kg">
                                <span class="font-medium text-gray-700 text-sm">Layanan Laundry</span>
                            </div>
                        </div>
                        <div class="flex items-center mt-3">
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
                </tbody>
            </div>
        @else
            <p class="text-center text-gray-500 text-sm">Tidak ada layanan tersedia.</p>
        @endif

        <div class="mt-5 border-t pt-4 text-center">
            <h2 class="text-xl font-bold text-gray-800">Total: Rp<span id="total-harga">0</span></h2>
        </div>

        <div class="flex justify-between mt-5">
            <button id="closeOverlayBtn" class="w-1/2 bg-gray-500 text-white p-3 rounded-lg hover:bg-gray-600 mr-3 text-sm">Tutup</button>
            <button id="orderLaundryBtn" class="w-1/2 bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 text-sm">Order Laundry</button>
        </div>
    </div>
</div>
<form>
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
                <option selected>Pilih Metode</option>
                <option value="qris">Qris</option>
                <option value="cod">Cash On Delivery (COD)</option>
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
</form>

<script>
    // Search functionality
    document.addEventListener("DOMContentLoaded", function () {
        const searchBox = document.getElementById('searchInput');
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

        // Open the overlay
        orderButtons.forEach(button => {
            button.addEventListener("click", () => {
                overlay.classList.remove("hidden");
                mainContent.classList.add("blurred");
            });
        });

        // Close the overlay
        closeOverlayBtn.addEventListener("click", () => {
            overlay.classList.add("hidden");
            mainContent.classList.remove("blurred");
        });
    });

    // Close order form
    document.getElementById("closeFormOverlayBtn").addEventListener("click", function() {
        document.getElementById("orderFormOverlay").classList.add("hidden");
        document.getElementById("orderOverlay").classList.remove("hidden");
    });

    
    // Update total harga 1
    document.addEventListener("DOMContentLoaded", function () {
        let checkboxes = document.querySelectorAll(".layanan-checkbox");
        let totalHargaElement = document.getElementById("total-harga");

        function updateTotal() {
            let total = 0;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    total += parseFloat(checkbox.getAttribute("data-harga"));
                }
            });
            totalHargaElement.textContent = total.toLocaleString("id-ID");
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", updateTotal);
        });
    });

    // Order button functionality 1
    document.getElementById("orderLaundryBtn").addEventListener("click", function() {
        document.getElementById("orderOverlay").classList.add("hidden");
        document.getElementById("orderFormOverlay").classList.remove("hidden");
    });

    document.getElementById("closeOverlayBtn").addEventListener("click", function() {
        document.getElementById("orderOverlay").classList.add("hidden");
    });

    // Order button functionality 2
    document.getElementById("orderLaundryBtn").addEventListener("click", function() {
        let selectedServices = document.querySelectorAll(".layanan-checkbox:checked");
        let produkTerpilih = document.getElementById("produkTerpilih");
        let finalTotal = document.getElementById("finalTotal");
        produkTerpilih.innerHTML = "";
        let totalHarga = 0;

        selectedServices.forEach(service => {
            let nama = service.getAttribute("data-nama");
            let kategori = service.getAttribute("data-kategori");
            let harga = parseInt(service.getAttribute("data-harga"));
            let berat = service.getAttribute("data-berat");
            totalHarga += harga;

            let div = document.createElement("div");
            div.classList.add("flex", "justify-between", "items-center", "mb-2");
            div.innerHTML = `<div><p class='font-semibold'>${kategori} - ${nama}</p><p class='text-sm text-gray-600'>Berat: ${berat}</p></div><p class='font-bold'>Rp${harga.toLocaleString("id-ID")}</p>`;
            produkTerpilih.appendChild(div);
        });
        finalTotal.textContent = `Rp${(totalHarga + 10000).toLocaleString("id-ID")}`;
        document.getElementById("orderOverlay").classList.add("hidden");
        document.getElementById("orderFormOverlay").classList.remove("hidden");
    });

    document.getElementById("closeOverlayBtn").addEventListener("click", function() {
        document.getElementById("orderOverlay").classList.add("hidden");
    });
    document.getElementById("submitOrder").addEventListener("click", function() {
    let searchInput = document.getElementById("searchInput").value.trim();
    let selectedProduct = document.getElementById("produkTerpilih").textContent.trim();
    let totalPrice = document.getElementById("total-harga").textContent.trim();
    let userName = "{{ auth()->user()->username }}";
    let userId = "{{ auth()->user()->id }}";
    let alamatPengiriman = "{{ auth()->user()->alamat }}";
    let metodePembayaran = document.getElementById("transactionMethod").value.trim();

    if (searchInput === "" || selectedProduct === "" || totalPrice === "") {
        alert("Silakan lengkapi semua informasi sebelum memesan.");
        return;
    }

    let orderData = {
        alamat_pengiriman: alamatPengiriman,
        nama_laundry: searchInput,
        produk_terpilih: selectedProduct,
        user_id: userId,
        total_price: totalPrice,
        metode_pembayaran: metodePembayaran
    };

    fetch("{{ route('order') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify(orderData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("HTTP status " + response.status);
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        if (data.success) {
            alert("Pesanan berhasil dibuat!");
            window.location.href = "/user/riwayat";
        } else {
            alert("Terjadi kesalahan: " + data.message);
        }
    })
    .catch(error => console.error("Error:", error));
});
</script>

@endsection
