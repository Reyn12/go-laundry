<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelola Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full h-screen flex bg-gray-100">
        @include('merchant.components.merchantsidebar')

        <!-- Konten utama -->
        <div class="flex-1 h-full p-4 overflow-y-auto">
            <!-- Header -->
            <div class="sticky top-0 z-10 mb-4 bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-lg font-semibold">{{ $mainTitle ?? 'Kelola Layanan' }}</h1>
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
                            <input type="search" id="searchInput" class="pl-10 pr-4 py-2 w-64 rounded-full bg-gray-100 focus:outline-none" placeholder="Cari Layanan...">
                        </div>

                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold">Daftar Layanan</h2>

                    <!-- Tombol Tambah Layanan -->
                    <div class="flex space-x-2">
                        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" onclick="addService()">Tambah Layanan</button>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto rounded-lg shadow-lg">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Nama Layanan</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Waktu Pengerjaan</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Deskripsi</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($layanan as $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-200" data-layanan-id="{{ $item->id }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0 w-10 h-10 rounded-full overflow-hidden shadow-sm">
                                            <img src="{{ asset('images/laundry-service.png') }}" alt="{{ $item->kategori_layanan }}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="font-medium text-gray-900">{{ $item->kategori_layanan }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-900">{{ $item->nama_layanan }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-gray-900 font-medium">Rp {{ number_format($item->harga_per_unit, 0, ',', '.') }}<span class="text-gray-500 text-sm">/{{ $item->satuan }}</span></div>
                                </td>
                                <td class="px-6 py-4 text-gray-500">{{ $item->waktu_pengerjaan }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $item->deskripsi }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <button onclick="editService('{{ $item->id }}')" 
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Update
                                        </button>
                                        <button onclick="deleteService('{{ $item->id }}')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Layanan -->
    <div id="serviceModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full mt-20">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">Tambah Layanan Baru</h3>
                <form id="serviceForm" class="mt-4">
                    @csrf
                    <input type="hidden" id="serviceId">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="kategoriLayanan">
                            Kategori Layanan
                        </label>
                        <input type="text" id="kategoriLayanan" name="kategori_layanan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="namaLayanan">
                            Nama Layanan
                        </label>
                        <select id="namaLayanan" name="nama_layanan" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="Reguler">Reguler</option>
                            <option value="Express">Express</option>
                            <option value="Kilat">Kilat</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="hargaPerUnit">
                            Harga
                        </label>
                        <input type="number" id="hargaPerUnit" name="harga_per_unit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="satuan">
                            Satuan
                        </label>
                        <select id="satuan" name="satuan" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="KG">KG</option>
                            <option value="PCS">PCS</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="waktuPengerjaan">
                            Waktu Pengerjaan
                        </label>
                        <input type="text" id="waktuPengerjaan" name="waktu_pengerjaan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                            Deskripsi
                        </label>
                        <textarea id="deskripsi" name="deskripsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="closeModal()">
                            Batal
                        </button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Update Layanan -->
    <div id="updateModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full mt-20">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Update Layanan</h3>
                <form id="updateForm" class="mt-4">
                    @csrf
                    <input type="hidden" id="updateLayananId" name="id">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="updateHargaPerUnit">
                            Harga
                        </label>
                        <input type="number" id="updateHargaPerUnit" name="harga_per_unit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="updateWaktuPengerjaan">
                            Waktu Pengerjaan
                        </label>
                        <input type="text" id="updateWaktuPengerjaan" name="waktu_pengerjaan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="updateDeskripsi">
                            Deskripsi
                        </label>
                        <textarea id="updateDeskripsi" name="deskripsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="closeUpdateModal()">
                            Batal
                        </button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addService() {
            document.getElementById('modalTitle').textContent = 'Tambah Layanan Baru';
            document.getElementById('serviceId').value = '';
            document.getElementById('serviceForm').reset();
            document.getElementById('serviceModal').classList.remove('hidden');
        }

        document.getElementById('serviceForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Kumpulkan data form
            const formData = new FormData(this);
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });

            try {
                const response = await fetch('{{ route("merchant.layanan.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin', // Penting untuk mengirim cookies session
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok && result.status === 'success') {
                    alert('Layanan berhasil ditambahkan!');
                    window.location.reload();
                } else {
                    let errorMessage = result.message || 'Terjadi kesalahan saat menyimpan data';
                    if (result.errors) {
                        errorMessage = Object.values(result.errors).flat().join('\n');
                    }
                    throw new Error(errorMessage);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan: ' + error.message);
            }
        });

        function closeModal() {
            document.getElementById('serviceModal').classList.add('hidden');
            document.getElementById('serviceForm').reset();
        }

        function editService(id) {
            fetch(`{{ url('/merchant/layanan') }}/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('updateLayananId').value = id;
                    document.getElementById('updateHargaPerUnit').value = data.harga_per_unit;
                    document.getElementById('updateWaktuPengerjaan').value = data.waktu_pengerjaan;
                    document.getElementById('updateDeskripsi').value = data.deskripsi || '';
                    document.getElementById('updateModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data layanan');
                });
        }

        function closeUpdateModal() {
            document.getElementById('updateModal').classList.add('hidden');
            document.getElementById('updateForm').reset();
        }

        document.getElementById('updateForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const id = document.getElementById('updateLayananId').value;
            const formData = new FormData(this);
            const data = {};
            formData.forEach((value, key) => {
                if (key !== '_token' && key !== 'id') { // Exclude CSRF token and ID
                    data[key] = value;
                }
            });

            try {
                const response = await fetch(`{{ url('/merchant/layanan') }}/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok && result.status === 'success') {
                    alert('Layanan berhasil diupdate!');
                    window.location.reload();
                } else {
                    throw new Error(result.message || 'Terjadi kesalahan saat mengupdate data');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan: ' + error.message);
            }
        });
    </script>
</body>
</html>