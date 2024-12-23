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
        <div class="flex-1 p-6 overflow-auto">
            <header class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold">Profile Merchant</h1>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search" class="border border-gray-300 rounded-md px-3 py-2">
                    <span class="text-gray-600">🔔</span>
                    <span class="text-gray-600">🌙</span>
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Profile Section -->
                <div class="bg-white shadow-md p-6 rounded-md">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile Icon" class="w-12 h-12 mr-2">
                        <div>
                            <h2 class="text-xl font-bold">Laundry Good</h2>
                            <p class="text-gray-500 text-sm">Merchant</p>
                        </div>
                    </div>
                    <p class="mb-2"><strong>About:</strong></p>
                    <p class="text-gray-600 mb-4">081081081081<br>laundrygood@lalalala.com</p>
                    <hr class="my-4 border-1 border-black">
                    <p class="mb-2"><strong>Jam Operasional:</strong></p>
                    <p class="text-gray-600 mb-4">09.00 - 20.00</p>
                    <hr class="my-4 border-1 border-black">
                    <p class="mb-2"><strong>Address:</strong></p>
                    <p class="text-gray-600 mb-4">JL Kesana Kesini</p>
                    <iframe
                        src="https://maps.google.com/maps?q=Monas%20Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        class="w-full h-48 rounded-md" frameborder="0">
                    </iframe>
                    <hr class="my-4 border-1 border-black">
                    <div class="flex justify-end mt-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">Edit</button>
                        <button class="bg-green-500 text-white px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </div>
                

                <!-- History Section -->
                <div class="bg-white shadow-md p-6 rounded-md">
                    <h2 class="text-xl font-bold mb-4">History Pesanan</h2>
                    <table class="table-auto w-full border-collapse border border-gray-300 text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-2 py-2">No</th>
                                <th class="border border-gray-300 px-2 py-2">Pesanan</th>
                                <th class="border border-gray-300 px-2 py-2">Tanggal Laundry</th>
                                <th class="border border-gray-300 px-2 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">1</td>
                                <td class="border border-gray-300 px-4 py-2">Baju</td>
                                <td class="border border-gray-300 px-4 py-2">13/12/2024</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="text-green-500 font-semibold">Sukses</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">2</td>
                                <td class="border border-gray-300 px-4 py-2">Celana</td>
                                <td class="border border-gray-300 px-4 py-2">13/12/2024</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="text-blue-500 font-semibold">Menunggu</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">3</td>
                                <td class="border border-gray-300 px-4 py-2">Jaket</td>
                                <td class="border border-gray-300 px-4 py-2">13/12/2024</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="text-yellow-500 font-semibold">Proses</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">4</td>
                                <td class="border border-gray-300 px-4 py-2">Sepatu</td>
                                <td class="border border-gray-300 px-4 py-2">13/12/2024</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="text-red-500 font-semibold">Dibatalkan</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">5</td>
                                <td class="border border-gray-300 px-4 py-2">Topi</td>
                                <td class="border border-gray-300 px-4 py-2">13/12/2024</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="text-green-500 font-semibold">Sukses</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">6</td>
                                <td class="border border-gray-300 px-4 py-2">Handuk</td>
                                <td class="border border-gray-300 px-4 py-2">13/12/2024</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="text-blue-500 font-semibold">Menunggu</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">7</td>
                                <td class="border border-gray-300 px-4 py-2">Kaos</td>
                                <td class="border border-gray-300 px-4 py-2">13/12/2024</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="text-yellow-500 font-semibold">Proses</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">8</td>
                                <td class="border border-gray-300 px-4 py-2">Sarung</td>
                                <td class="border border-gray-300 px-4 py-2">13/12/2024</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="text-red-500 font-semibold">Dibatalkan</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">9</td>
                                <td class="border border-gray-300 px-4 py-2">Kemeja</td>
                                <td class="border border-gray-300 px-4 py-2">13/12/2024</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="text-green-500 font-semibold">Sukses</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">10</td>
                                <td class="border border-gray-300 px-4 py-2">Rok</td>
                                <td class="border border-gray-300 px-4 py-2">13/12/2024</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="text-blue-500 font-semibold">Menunggu</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-between mt-4">
                        <a href="#" class="px-3 py-1 bg-gray-200 rounded">&laquo; Prev</a>
                        <a href="#" class="px-3 py-1 bg-gray-200 rounded">Next &raquo;</a>
                    </div>
             <!-- New Section for Laundry Images -->
             <div class="bg-white shadow-md p-6 rounded-md mt-6">
                <h2 class="text-xl font-bold mb-4">Gambar Laundry</h2>
                <div class="grid grid-cols-3 gap-4">
                    <img src="{{ asset('images/laundry1.png') }}" alt="Laundry Image 1" class="rounded-md w-full h-24 object-cover">
                    <img src="{{ asset('images/laundry2.png') }}" alt="Laundry Image 2" class="rounded-md w-full h-24 object-cover">
                </div>
            </div>
        </main>
    </div>
</body>
</html>
