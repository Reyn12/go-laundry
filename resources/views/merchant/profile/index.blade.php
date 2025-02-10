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
                        @csrf
                        <label class="block mb-2 font-semibold">Nomor Telepon:</label>
                        <input type="text" id="phone" name="no_hp" class="w-full border p-2 rounded-md bg-gray-100" value="{{ $merchant->no_hp }}" disabled>
                        
                        <label class="block mt-4 mb-2 font-semibold">Email:</label>
                        <input type="text" id="email" name="email" class="w-full border p-2 rounded-md bg-gray-100" value="{{ $merchant->email }}" disabled>
                        
                        <label class="block mt-4 mb-2 font-semibold">Jam Operasional:</label>
                        <input type="text" id="jam_operasional" name="jam_operasional" class="w-full border p-2 rounded-md bg-gray-100" value="{{ $merchant->jam_operasional }}" disabled>
                        
                        <label class="block mt-4 mb-2 font-semibold">Address:</label>
                        <input type="text" id="address" name="alamat_laundry" class="w-full border p-2 rounded-md bg-gray-100" value="{{ $merchant->alamat_laundry }}" disabled>
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
                            @forelse($historyPesanan as $index => $pesanan)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $pesanan->layanan->nama_layanan }} ({{ $pesanan->jumlah_pesanan }} pcs)</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $pesanan->created_at->format('d/m/Y') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if($pesanan->status == 'selesai')
                                            <span class="text-green-500 font-semibold">Sukses</span>
                                        @elseif($pesanan->status == 'menunggu')
                                            <span class="text-blue-500 font-semibold">Menunggu</span>
                                        @elseif($pesanan->status == 'proses')
                                            <span class="text-yellow-500 font-semibold">Proses</span>
                                        @else
                                            <span class="text-red-500 font-semibold">Dibatalkan</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="border border-gray-300 px-4 py-2 text-center">Tidak ada history pesanan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $historyPesanan->links() }}
                    </div>

                    <!-- Gambar Laundry Section -->
                    <h2 class="text-xl font-bold mb-4 mt-6">Gambar Laundry</h2>
                    <div class="grid grid-cols-3 gap-4">
                        <img src="{{ asset('images/laundry1.png') }}" alt="Laundry Image 1" class="rounded-md w-full h-24 object-cover">
                        <img src="{{ asset('images/laundry2.png') }}" alt="Laundry Image 2" class="rounded-md w-full h-24 object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editBtn = document.getElementById('editBtn');
            const saveBtn = document.getElementById('saveBtn');
            const inputs = document.querySelectorAll('#profileForm input[type="text"]');
            
            editBtn.addEventListener('click', function() {
                inputs.forEach(input => {
                    input.disabled = false;
                    input.classList.remove('bg-gray-100');
                    input.classList.add('bg-white');
                });
                editBtn.classList.add('hidden');
                saveBtn.classList.remove('hidden');
            });

            saveBtn.addEventListener('click', function() {
                const formData = new FormData(document.getElementById('profileForm'));
                
                fetch('/merchant/profile/update', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(Object.fromEntries(formData))
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        inputs.forEach(input => {
                            input.disabled = true;
                            input.classList.add('bg-gray-100');
                            input.classList.remove('bg-white');
                        });
                        editBtn.classList.remove('hidden');
                        saveBtn.classList.add('hidden');
                        alert('Profile berhasil diupdate!');
                    } else {
                        alert('Gagal update profile. Silakan coba lagi.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                });
            });
        });
    </script>
</body>
</html>
