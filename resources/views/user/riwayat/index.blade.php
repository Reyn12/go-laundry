@extends('user.components.main')
@include('user.components.sidebar')
@section('container')
    <!--main content-->
    <div class="flex-grow ml-20">
        <h1 class="text-2xl font-semibold mb-4">Riwayat Pesanan</h1>
        <div class="container mx-auto mt-4">
        <div class="bg-white shadow rounded-lg">
        <div class="p-4">
            <h4 class="text-lg font-semibold mb-3">Riwayat Pesanan</h4>

            <div class="mb-4">
                <select class="border border-gray-300 rounded-lg p-2">
                    <option>Apr 1 - Apr 30 2024</option>
                </select>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Nama</th>
                            <th class="border border-gray-300 px-4 py-2">Amount</th>
                            <th class="border border-gray-300 px-4 py-2">Date</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">Total Price</th>
                            <th class="border border-gray-300 px-4 py-2">Reorder</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayatPesanan as $pesanan)
                        <tr class="text-center">
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
                <a href="#" class="text-blue-500 hover:underline">View All</a>
            </div>
        </div>
    </div>
</div>
@endsection