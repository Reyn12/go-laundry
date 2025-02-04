<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Merchant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full h-screen flex bg-gray-100">
        @include('merchant.components.merchantsidebar')
        <div class="flex-1 h-full p-4 overflow-y-auto">
            <div class="sticky top-0 z-10 mb-4 bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-lg font-semibold">{{ $mainTitle ?? $title ?? 'Profile Merchant' }}</h1>
                        <p class="text-sm text-gray-500">{{ date('d F Y') }}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                            <input type="search" class="pl-10 pr-4 py-2 w-64 rounded-full bg-gray-100 focus:outline-none" placeholder="Search">
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden">
                                <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <span class="font-medium">{{ $merchant->nama_laundry }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white shadow-md p-6 rounded-md">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile Icon" class="w-12 h-12 mr-2">
                        <div>
                            <h2 class="text-xl font-bold">{{ $merchant->nama_laundry }}</h2>
                        </div>
                    </div>
                    <form id="profileForm">
                        <label class="block mb-2 font-semibold">Nomor Telepon:</label>
                        <input type="text" id="phone" class="w-full border p-2 rounded-md bg-gray-100" value="{{ $merchant->no_hp }}" disabled>
                        <label class="block mt-4 mb-2 font-semibold">Email:</label>
                        <input type="text" id="email" class="w-full border p-2 rounded-md bg-gray-100" value="{{ $merchant->email }}" disabled>
                        <label class="block mt-4 mb-2 font-semibold">Jam Operasional:</label>
                        <input type="text" id="jam_operasional" class="w-full border p-2 rounded-md bg-gray-100" value="09.00 - 20.00" disabled>
                        <label class="block mt-4 mb-2 font-semibold">Address:</label>
                        <input type="text" id="address" class="w-full border p-2 rounded-md bg-gray-100" value="JL Kesana Kesini" disabled>
                    </form>
                    <div id="map" class="w-full h-48 rounded-md mt-4"></div>
                    <div class="flex justify-end mt-4">
                        <button id="editBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">Edit</button>
                        <button id="saveBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hidden">Simpan</button>
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
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        let editBtn = document.getElementById('editBtn');
                        let saveBtn = document.getElementById('saveBtn');
                        let phone = document.getElementById('phone');
                        let email = document.getElementById('email');
                        let jam_operasional = document.getElementById('jam_operasional');
                        let address = document.getElementById('address');
            
                        editBtn.addEventListener('click', function () {
                            phone.disabled = false;
                            email.disabled = false;
                            jam_operasional.disabled = false;
                            address.disabled = false;
                            phone.classList.remove('bg-gray-100');
                            email.classList.remove('bg-gray-100');
                            jam_operasional.classList.remove('bg-gray-100');
                            address.classList.remove('bg-gray-100');
                            editBtn.classList.add('hidden');
                            saveBtn.classList.remove('hidden');
                        });
            
                        saveBtn.addEventListener('click', function () {
                            phone.disabled = true;
                            email.disabled = true;
                            jam_operasional.disabled = true;
                            address.disabled = true;
                            phone.classList.add('bg-gray-100');
                            email.classList.add('bg-gray-100');
                            jam_operasional.classList.add('bg-gray-100');
                            address.classList.add('bg-gray-100');
                            editBtn.classList.remove('hidden');
                            saveBtn.classList.add('hidden');
                            updateMap(address.value);
                        });
            
                        function updateMap(address) {
                            let map = document.getElementById('map');
                            let encodedAddress = encodeURIComponent(address);
                            map.innerHTML = `<iframe src="https://www.google.com/maps?q=${encodedAddress}&output=embed" class="w-full h-full rounded-md" frameborder="0"></iframe>`;
                        }
                        updateMap(address.value);
                    });
                </script>
            </div>
        </div>
    </div>
</body>
</html>
