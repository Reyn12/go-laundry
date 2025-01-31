<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    {{-- container --}}
    <div class="w-full h-screen flex bg-gray-100">
        
        {{-- Include Sidebar Component --}}
        @include('merchant.components.merchantsidebar')
   <!-- Konten utama -->
   <div class="flex-1 h-full p-4 overflow-y-auto">
    <!-- Header -->
    <div class="sticky top-0 z-10 mb-4 bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-lg font-semibold">{{ $mainTitle ?? $title ?? 'Manajemen Pesanan' }}</h1>
                <p class="text-sm text-gray-500">{{ date('d F Y') }}</p>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input type="search" class="pl-10 pr-4 py-2 w-64 rounded-full bg-gray-100 focus:outline-none" placeholder="Search">
                </div>
                 {{-- Theme Toggle --}}
                <div class="theme-toggle flex items-center bg-gray-100 rounded-full p-1 space-x-3">
                    <button class="p-1 rounded-full bg-white">
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                        </svg>
                    </button>
                    <button class="p-1">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </button>
                 </div>

                <!-- Profile -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden">
                        <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile" class="w-full h-full object-cover">
                    </div>
                    <span class="font-medium">Krisna Ariangga</span>
                </div>
            </div>
        </div>
    </div>
        <!-- Header -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <!-- Gambar di kiri -->
                <img src="/images/mesinlaundry.png" alt="Kelola Layanan" class="w-24 h-24">
                
                <!-- Judul di tengah -->
                <h2 class="text-2xl font-bold text-center flex-1">Daftar Pesanan</h2>
                
                <!-- Tombol Edit Layanan di kanan -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded mt-20 block">Edit Status</button>
            </div> 
            <!-- Tabel Pesanan -->
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th class="border p-2 text-left">No</th>
                        <th class="border p-2 text-left">Nama Pelanggan</th>
                        <th class="border p-2 text-left">Layanan</th>
                        <th class="border p-2 text-left">Total Harga</th>
                        <th class="border p-2 text-left">Catatan Pelanggan</th>
                        <th class="border p-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border p-2">1</td>
                        <td class="border p-2">Krisna</td>
                        <td class="border p-2">Laundry Regular</td>
                        <td class="border p-2">Rp.50.000</td>
                        <td class="border p-2">Estimasi 1-3 Hari</td>
                        <td class="border p-2 text-orange-500">Menunggu Pickup</td>
                    </tr>
                    <tr>
                        <td class="border p-2">2</td>
                        <td class="border p-2">Krisna</td>
                        <td class="border p-2">Laundry Express</td>
                        <td class="border p-2">Rp.50.000</td>
                        <td class="border p-2">1 Hari Selesai</td>
                        <td class="border p-2 text-orange-500">Menunggu Pickup</td>
                    </tr>
                    <tr>
                        <td class="border p-2">3</td>
                        <td class="border p-2">Krisna</td>
                        <td class="border p-2">Laundry Regular</td>
                        <td class="border p-2">Rp.50.000</td>
                        <td class="border p-2">Estimasi 1-3 Hari</td>
                        <td class="border p-2 text-green-500">Selesai</td>
                    </tr>
                    <tr>
                        <td class="border p-2">4</td>
                        <td class="border p-2">Krisna</td>
                        <td class="border p-2">Laundry Regular</td>
                        <td class="border p-2">Rp.50.000</td>
                        <td class="border p-2">Estimasi 1-3 Hari</td>
                        <td class="border p-2 text-yellow-500">Proses</td>
                    </tr>
                    <tr>
                        <td class="border p-2">5</td>
                        <td class="border p-2">Krisna</td>
                        <td class="border p-2">Laundry Regular</td>
                        <td class="border p-2">Rp.50.000</td>
                        <td class="border p-2">Estimasi 1-3 Hari</td>
                        <td class="border p-2 text-blue-500">Dalam Pickup</td>
                    </tr>
                    <tr>
                        <td class="border p-2">6</td>
                        <td class="border p-2">Krisna</td>
                        <td class="border p-2">Laundry Regular</td>
                        <td class="border p-2">Rp.50.000</td>
                        <td class="border p-2">Estimasi 1-3 Hari</td>
                        <td class="border p-2 text-purple-500">Dalam Pengantaran</td>
                    </tr>
                    <tr>
                        <td class="border p-2">7</td>
                        <td class="border p-2">Krisna</td>
                        <td class="border p-2">Laundry Regular</td>
                        <td class="border p-2">Rp.50.000</td>
                        <td class="border p-2">Estimasi 1-3 Hari</td>
                        <td class="border p-2 text-orange-500">Menunggu Pickup</td>
                    </tr>
                    <tr>
                        <td class="border p-2">8</td>
                        <td class="border p-2">Krisna</td>
                        <td class="border p-2">Laundry Regular</td>
                        <td class="border p-2">Rp.50.000</td>
                        <td class="border p-2">Estimasi 1-3 Hari</td>
                        <td class="border p-2 text-green-500">Selesai</td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4 flex justify-center">
                <a href="?page=1" class="px-4 py-2 bg-blue-500 text-white rounded mx-1">1</a>
                <a href="?page=2" class="px-4 py-2 bg-blue-500 text-white rounded mx-1">2</a>
                <a href="?page=3" class="px-4 py-2 bg-blue-500 text-white rounded mx-1">3</a>
                <a href="?page=4" class="px-4 py-2 bg-blue-500 text-white rounded mx-1">4</a>
            </div>
        </div>
    </main>
</div>
</body>
</html>