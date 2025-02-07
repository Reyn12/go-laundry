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
                    </div>
                </div>
            </div>

            <!-- Header -->
            <div class="bg-white shadow rounded-lg p-6">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold">Daftar Pesanan</h2>
                </div> 

                <!-- Tabel Pesanan -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pelanggan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($pesanans as $index => $p)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $p->user->nama_lengkap  }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $p->layanan->nama_layanan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-4 py-2 rounded-full text-white font-semibold 
                                        {{ $p->status === 'menunggu' ? 'bg-yellow-500' : 
                                           ($p->status === 'proses' ? 'bg-blue-500' : 
                                           ($p->status === 'selesai' ? 'bg-green-500' : 'bg-red-500')) }}">
                                        {{ ucfirst($p->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <img src="{{ asset('images/updatex.png') }}" 
                                             alt="Update Status" 
                                             class="w-6 h-6 cursor-pointer mr-6" 
                                             onclick="cycleStatus(this, {{ $p->id }})"
                                             title="Update Status">
                                        <img src="{{ asset('images/cancelx.png') }}" 
                                             alt="Cancel Order" 
                                             class="w-6 h-6 cursor-pointer" 
                                             onclick="cancelOrder({{ $p->id }})"
                                             title="Cancel Order">
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

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function cycleStatus(button, pesananId) {
            // Ambil status dari td sebelumnya (kolom status)
            const statusCell = button.closest('tr').querySelector('td:nth-child(5) span');
            const currentStatus = statusCell.textContent.trim().toLowerCase();

            // Cek jika status sudah selesai
            if (currentStatus === 'selesai') {
                Swal.fire({
                    title: 'Tidak bisa diubah',
                    text: 'Status pesanan sudah selesai tidak bisa diubah lagi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }

            let newStatus;
            // Menentukan status berikutnya
            if (currentStatus === 'menunggu') {
                newStatus = 'proses';
            } else if (currentStatus === 'proses') {
                newStatus = 'selesai';
            } else {
                return; // Jika status bukan menunggu atau proses, tidak lakukan apa-apa
            }

            // Konfirmasi menggunakan Sweet Alert
            Swal.fire({
                title: 'Konfirmasi',
                text: `Apakah Anda yakin ingin mengubah status menjadi ${newStatus}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah status!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim request ke server
                    $.ajax({
                        url: `/merchant/pesanan/${pesananId}/status`,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            status: newStatus
                        },
                        success: function(response) {
                            // Tampilkan pesan sukses
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            // Tampilkan pesan error
                            Swal.fire({
                                title: 'Error!',
                                text: 'Gagal mengupdate status pesanan',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        }

        function cancelOrder(pesananId) {
            // Konfirmasi menggunakan Sweet Alert
            Swal.fire({
                title: 'Konfirmasi Pembatalan',
                text: 'Apakah Anda yakin ingin membatalkan pesanan ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, batalkan!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim request ke server
                    $.ajax({
                        url: `/merchant/pesanan/${pesananId}/cancel`,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Tampilkan pesan sukses
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            // Tampilkan pesan error
                            const response = xhr.responseJSON;
                            Swal.fire({
                                title: 'Error!',
                                text: response?.message || 'Gagal membatalkan pesanan',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>