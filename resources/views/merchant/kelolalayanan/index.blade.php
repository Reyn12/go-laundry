<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Merchant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md flex flex-col justify-between flex-shrink-0">
            <div>
                <div class="px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Google" class="w-12 h-12">
                        <div>
                            <h2 class="text-lg font-semibold">Krisna Ariangga</h2>
                            <p class="text-sm text-gray-500">Merchant</p>
                        </div>
                    </div>
                </div>
                <ul class="space-y-2 mt-4">
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer flex items-center">
                        <img src="{{ asset('images/icons/iconDashboard.svg') }}" alt="Icon Dashboard" class="w-5 h-5 mr-2">
                    </i> Dashboard
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer flex items-center">
                        <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="Icon Profile Merchant" class="w-5 h-5 mr-2">
                    </i> Profile Merchant
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer flex items-center">
                        <img src="{{ asset('images/icons/iconKelolaMerchant.svg') }}" alt="Icon Kelola Layanan" class="w-5 h-5 mr-2">
                    </i> Kelola Layanan
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer flex items-center">
                        <img src="{{ asset('images/icons/iconMerchantManage.svg') }}" alt="Icon Manajemen Pemesanan" class="w-5 h-5 mr-2">
                    </i> Manajemen Pesanan
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer flex items-center">
                        <img src="{{ asset('images/icons/iconLaporan.svg') }}" alt="Icon Ulasan & Pendapatan" class="w-5 h-5 mr-2">
                    </i> Ulasan & Pendapatan
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer flex items-center">
                        <img src="{{ asset('images/icons/iconCashout.svg') }}" alt="Icon Penarikan Saldo" class="w-5 h-5 mr-2">
                        Penarikan Saldo
                    </li>
                    
                </ul>
                <hr class="my-4 border-1 border-black">
                <ul class="space-y-2">
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer flex items-center">
                        <img src="{{ asset('images/icons/iconPengaturan.svg') }}" alt="Icon Pengaturan" class="w-5 h-5 mr-2">
                        Settings
                    </li>
                    <li class="px-6 py-2 hover:bg-gray-100 cursor-pointer flex items-center">
                        <img src="{{ asset('images/icons/iconNotifikasi.svg') }}" alt="Icon Notifikasi" class="w-5 h-5 mr-2">
                        Notifikasi
                    </li>
                </ul>
            </div>
            <div class="px-6 py-4">
                <button class="w-full bg-red-600 text-white py-2 rounded-md">Log Out</button>
            </div>
        </div>
    <!-- Main Content -->
    <title>Kelola Layanan</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <!-- Header -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <!-- Gambar di kiri -->
                <img src="/images/mesinlaundry.png" alt="Kelola Layanan" class="w-24 h-24">
                
                <!-- Judul di tengah -->
                <h2 class="text-2xl font-bold text-center flex-1">Kelola Layanan</h2>
                
                <!-- Tombol Edit Layanan di kanan -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit Layanan</button>
            </div>
            <!-- Table -->
            <table class="min-w-full border border-gray-300 text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Jenis Layanan</th>
                        <th class="px-4 py-2 border">Harga</th>
                        <th class="px-4 py-2 border">Deskripsi</th>
                        <th class="px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border flex items-center">
                            <img src={{asset ("images/mesinlaundry2.png")}} alt="Laundry Reguler" class="w-8 h-8 mr-2">
                            Laundry Reguler
                        </td>
                        <td class="px-4 py-2 border">20.000/KG</td>
                        <td class="px-4 py-2 border">Pengerjaan 1-3 Hari</td>
                        <td class="px-4 py-2 border">
                            <span class="text-green-500">Tersedia</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border flex items-center">
                            <img src={{asset ("images/mesinlaundry2.png")}} alt="Laundry Express" class="w-8 h-8 mr-2">
                            Laundry Express
                        </td>
                        <td class="px-4 py-2 border">25.000/KG</td>
                        <td class="px-4 py-2 border">Pengerjaan 1 Hari</td>
                        <td class="px-4 py-2 border">
                            <span class="text-green-500">Tersedia</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border flex items-center">
                            <img src={{asset ("images/setrika.png")}} alt="Setrika" class="w-8 h-8 mr-2">
                            Setrika
                        </td>
                        <td class="px-4 py-2 border">7.000/PCS</td>
                        <td class="px-4 py-2 border">Layanan Setrika</td>
                        <td class="px-4 py-2 border">
                            <span class="text-red-500">Tidak Tersedia</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>