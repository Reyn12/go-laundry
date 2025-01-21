@extends('user.components.main')
@section('container')
<div class="lg:w-1/4 hidden lg:block">
      @include('user.components.sidebar')
</div>
<!-- Search Box -->
<div class="container-fluid mx-auto mt-4">
            <div class="mb-4">
                <input type="text" id="search-box" placeholder="Cari riwayat pesanan..." 
                       class="border border-gray-300 rounded-lg p-2 w-full">
            </div>
        </div>
    <!--main content-->
    <div class="flex-grow ml-20">
        <h1 class="text-2xl font-semibold ">Riwayat Pesanan</h1>
        <div class="container-fluid mx-auto mt-4">
            <div class="bg-white shadow rounded-lg">
                <div class="p-4">
                    <div class="mb-4">
                        <select class="border border-gray-300 rounded-lg p-2">
                            <option>Apr 1 - Apr 30 2024</option>
                        </select>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2 text-center align-middle">No</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center align-middle">Nama laundry</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center align-middle">Amount</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center align-middle">Date</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center align-middle">Status</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center align-middle">Total Price</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center align-middle">Reorder</th>
                                </tr>
                            </thead>
                            <tbody id="order-history-container">
                                @forelse ($riwayatPesanan as $index => $pesanan)
                                <tr class="text-center {{ $index >= 3 ? 'hidden' : '' }}" data-item-index="{{ $index }}">
                                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $pesanan['nama'] }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $pesanan['amount'] }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $pesanan['date'] }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if ($pesanan['status'] == 'Selesai')
                                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-lg">{{ $pesanan['status'] }}</span>
                                        @else
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-lg">{{ $pesanan['status'] }}</span>
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ number_format($pesanan['total_price'], 0, ',', '.') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <form action="{{ route('riwayat.reorder', $pesanan['id']) }}" method="POST">
                                            @csrf
                                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg" type="submit">↻ Reorder</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center border border-gray-300 px-4 py-2">Tidak ada riwayat pesanan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center mt-4">
                        <button id="view-more-button" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">View All</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Search functionality
            document.getElementById('search-box').addEventListener('input', function() {
                const searchValue = this.value.toLowerCase();
                const rows = document.querySelectorAll('#order-history-container tr');
                
                rows.forEach(row => {
                    const rowText = row.innerText.toLowerCase();
                    row.style.display = rowText.includes(searchValue) ? '' : 'none';
                });
            });

            // View More functionality
            document.getElementById('view-more-button').addEventListener('click', function() {
                let hiddenRows = document.querySelectorAll('#order-history-container .hidden');
                let count = 0;

                hiddenRows.forEach(function(row) {
                    if (count < 3) {
                        row.classList.remove('hidden');
                        count++;
                    }
                });

                if (document.querySelectorAll('#order-history-container .hidden').length === 0) {
                    this.style.display = 'none';
                }
            });
        </script>
    </div>
@endsection
