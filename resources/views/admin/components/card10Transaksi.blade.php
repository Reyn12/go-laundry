{{-- Card 10 Transaksi Terakhir --}}
<div class="card bg-white p-6 rounded-xl w-full shadow-sm">
    <div class="flex items-center gap-2 mb-6">
        <img src="{{ asset('images/icons/iconLaporan.svg') }}" alt="iconLaporan">
        <h2 class="text-xl font-semibold text-gray-800">10 Transaksi Terakhir</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left py-3 text-gray-600 font-medium">Nama</th>
                    <th class="text-left py-3 text-gray-600 font-medium">Status</th>
                    <th class="text-left py-3 text-gray-600 font-medium">Date</th>
                    <th class="text-left py-3 text-gray-600 font-medium">Metode Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                {{-- Transaksi 1 --}}
                <tr class="border-b border-gray-100">
                    <td class="py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden">
                                <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <span class="font-medium">Agus Sedih</span>
                        </div>
                    </td>
                    <td class="py-3"><span class="px-4 py-1 rounded-full bg-yellow-100 text-yellow-800">Proses</span></td>
                    <td class="py-3">12 Des 2024</td>
                    <td class="py-3"><span class="px-4 py-1 rounded-full bg-green-100 text-green-800">QRIS</span></td>
                </tr>

                {{-- Transaksi 2 --}}
                <tr class="border-b border-gray-100">
                    <td class="py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden">
                                <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <span class="font-medium">Miftah Goblog</span>
                        </div>
                    </td>
                    <td class="py-3"><span class="px-4 py-1 rounded-full bg-green-100 text-green-800">Selesai</span></td>
                    <td class="py-3">11 Des 2024</td>
                    <td class="py-3"><span class="px-4 py-1 rounded-full bg-yellow-100 text-yellow-800">COD</span></td>
                </tr>

                {{-- Transaksi 3 --}}
                <tr class="border-b border-gray-100">
                    <td class="py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden">
                                <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <span class="font-medium">Agus Sedih</span>
                        </div>
                    </td>
                    <td class="py-3"><span class="px-4 py-1 rounded-full bg-yellow-100 text-yellow-800">Proses</span></td>
                    <td class="py-3">12 Des 2024</td>
                    <td class="py-3"><span class="px-4 py-1 rounded-full bg-green-100 text-green-800">QRIS</span></td>
                </tr>

                {{-- Transaksi 4 --}}
                <tr class="border-b border-gray-100">
                    <td class="py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-200 rounded-full overflow-hidden">
                                <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <span class="font-medium">Miftah Goblog</span>
                        </div>
                    </td>
                    <td class="py-3"><span class="px-4 py-1 rounded-full bg-green-100 text-green-800">Selesai</span></td>
                    <td class="py-3">11 Des 2024</td>
                    <td class="py-3"><span class="px-4 py-1 rounded-full bg-yellow-100 text-yellow-800">COD</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>