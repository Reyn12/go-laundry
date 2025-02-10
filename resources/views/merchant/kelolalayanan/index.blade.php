<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelola Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                    <div class="flex items-center">
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
                                                class="p-2 hover:bg-gray-100 rounded-full">
                                            <img src="{{ asset('images/updatex.png') }}" alt="Update" class="w-5 h-5">
                                        </button>
                                        <button onclick="deleteService('{{ $item->id }}')" 
                                                class="p-2 hover:bg-gray-100 rounded-full">
                                            <img src="{{ asset('images/delete.png') }}" alt="Delete" class="w-5 h-5">
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

    <script>
        function addService() {
            document.getElementById('modalTitle').textContent = 'Tambah Layanan Baru';
            document.getElementById('serviceId').value = '';
            document.getElementById('serviceForm').reset();
            document.getElementById('serviceModal').classList.remove('hidden');
        }

        function editService(id) {
            fetch(`{{ url('/merchant/layanan') }}/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('serviceId').value = data.id;
                    document.getElementById('kategoriLayanan').value = data.kategori_layanan;
                    document.getElementById('namaLayanan').value = data.nama_layanan;
                    document.getElementById('hargaPerUnit').value = data.harga_per_unit;
                    document.getElementById('satuan').value = data.satuan;
                    document.getElementById('waktuPengerjaan').value = data.waktu_pengerjaan;
                    document.getElementById('deskripsi').value = data.deskripsi;
                    document.getElementById('modalTitle').textContent = 'Edit Layanan';
                    document.getElementById('serviceModal').classList.remove('hidden');
                });
        }

        document.getElementById('serviceForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const serviceId = document.getElementById('serviceId').value;
            const url = serviceId ? `{{ url('/merchant/layanan') }}/${serviceId}` : '{{ url('/merchant/layanan') }}';
            const method = serviceId ? 'PUT' : 'POST';

            // Convert FormData to object
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });

            // Add _method field for PUT requests
            if (method === 'PUT') {
                data._method = 'PUT';
            }

            fetch(url, {
                method: 'POST', // Always use POST, Laravel will handle method spoofing
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success || data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: serviceId ? 'Layanan berhasil diperbarui' : 'Layanan berhasil ditambahkan',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error.message || 'Terjadi kesalahan. Silakan coba lagi.',
                });
            });
        });

        function deleteService(id) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data layanan akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/merchant/layanan/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire(
                                'Terhapus!',
                                'Layanan berhasil dihapus.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                data.message,
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan saat menghapus layanan.',
                            'error'
                        );
                    });
                }
            });
        }

        function closeModal() {
            document.getElementById('serviceModal').classList.add('hidden');
            document.getElementById('serviceForm').reset();
        }
    </script>
</body>
</html>