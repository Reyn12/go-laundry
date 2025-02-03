
@extends('user.components.main')
@section('container')
@include('user.components.sidebar')
<!-- Search Box -->
<div class="container-fluid mx-auto mt-4">
            <div class="mb-4">
                <input type="text" id="search-box" placeholder="Cari riwayat pesanan..." 
                       class="border border-gray-300 rounded-lg p-2 w-full">
            </div>
</div>
<!-- Riwayat Pesanan -->
<div class="flex flex-col w-full p-4 bg-white">
    <h2 class="text-2xl font-bold mb-4">Riwayat Pesanan</h2>
    
    <!-- Filter Status -->
    <div class="mb-4">
        <label for="filterStatus" class="block text-gray-700 font-semibold">Filter Status:</label>
        <select id="filterStatus" class="border rounded-md px-3 py-2 w-full">
            <option value="">Semua</option>
            <option value="Selesai">Selesai</option>
            <option value="Di Laundry">Di Laundry</option>
        </select>
    </div>

    <!-- Tabel Riwayat -->
    <table class="w-full border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">Paket Laundry</th>
            <th class="border px-4 py-2">Tanggal</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Total Harga</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody id="riwayatTable">
    @foreach($riwayatPesanan as $pesanan)
    <tr class="border">
        <td class="border px-4 py-2">{{ $pesanan->id }}</td>
        <td class="border px-4 py-2">{{ $pesanan->user->username }}</td>
        <td class="border px-4 py-2">{{ $pesanan->layanan->nama }}</td>
        <td class="border px-4 py-2">{{ $pesanan->alamat_pengambilan }}</td>
        <td class="border px-4 py-2">{{ $pesanan->alamat_pengiriman }}</td>
        <td class="border px-4 py-2">{{ $pesanan->status }}</td>
        <td class="border px-4 py-2">Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
        <td class="border px-4 py-2">{{ $pesanan->berat_kg }} kg</td>
        <td class="border px-4 py-2">{{ $pesanan->jumlah_pesanan }}</td>
        <td class="border px-4 py-2">{{ $pesanan->created_at }}</td>
    </tr>
    @endforeach
</tbody>

    </table>
</div>

<script>
    // Event listener untuk pencarian
    document.getElementById("search-box").addEventListener("input", function() {
        let searchQuery = this.value.toLowerCase();
        let rows = document.querySelectorAll("#riwayatTable tr");
        
        rows.forEach(row => {
            let statusCell = row.querySelector('.status');
            if (statusCell) {
                let status = statusCell.textContent.toLowerCase();
                if (searchQuery === '' || status === searchQuery) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });

    // Ambil data dari localStorage
     document.addEventListener("DOMContentLoaded", function() {
        let table = document.getElementById("riwayatTable");

        // Ambil data dari localStorage
        let orders = JSON.parse(localStorage.getItem("riwayatPesanan")) || [];

        orders.forEach(order => {
            let newRow = table.insertRow();
            newRow.innerHTML = `
                <td class="border px-4 py-2">${order.id}</td>
                <td class="border px-4 py-2">${order.name}</td>
                <td class="border px-4 py-2">${order.package}</td>
                <td class="border px-4 py-2">${order.date}</td>
                <td class="border px-4 py-2 status">${order.status}</td>
                <td class="border px-4 py-2">Rp${order.total_price}</td>
                <td class="border px-4 py-2">-</td>
            `;
        });
    });
    
     document.querySelector("button.bg-blue-600").addEventListener("click", function() {
        let nama = "{{ auth()->user()->username }}";
        let paket = document.getElementById("produkTerpilih").textContent.trim();
        let tanggal = new Date().toLocaleDateString();
        let status = "Pending";
        let totalHarga = document.getElementById("total-harga").textContent.trim();
        
        let table = document.getElementById("riwayatTable");
        let newRow = table.insertRow();
        
        newRow.innerHTML = `
            <td class="border px-4 py-2">#</td>
            <td class="border px-4 py-2">${nama}</td>
            <td class="border px-4 py-2">${paket}</td>
            <td class="border px-4 py-2">${tanggal}</td>
            <td class="border px-4 py-2 status">${status}</td>
            <td class="border px-4 py-2">Rp${totalHarga}</td>
            <td class="border px-4 py-2">-</td>
        `;
    });

    // Event listener untuk filter status
    document.getElementById('filterStatus').addEventListener('change', function() {
        let selectedStatus = this.value.toLowerCase();
        let rows = document.querySelectorAll('#riwayatTable tr');
        
        rows.forEach(row => {
            let statusCell = row.querySelector('.status');
            if (statusCell) {
                let status = statusCell.textContent.toLowerCase();
                if (selectedStatus === '' || status === selectedStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
</script>
@endsection