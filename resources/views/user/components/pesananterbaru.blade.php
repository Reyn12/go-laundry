<!-- Pesanan Terbaru Section -->
<div class="p-4 px-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Pesanan Terbaru</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left bg-gray-50">
                            @foreach (['No', 'Jenis Paket', 'Berat', 'Tanggal Masuk', 'Status'] as $header)
                                <th class="py-2 px-4">{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>   
                    @php
                    $laundryItems = [
                    ['Tirai', $curtainCount ?? 2, 'red-500', 'Dibatalkan'],
                    ['Seprei', $bedSheetCount ?? 2, 'red-500', 'Dibatalkan'],
                    ['Handuk', $towelCount ?? 1, 'green-500', 'Selesai'],
                    ['Karpet', $carpetCount ?? 1, 'green-500', 'Selesai'],
                    ['Gorden', $drapesCount ?? 8, 'green-500', 'Selesai'],
                    ['Bantal', $pillowCount ?? 2, 'green-500', 'Selesai'],
                    ['Selimut', $blanketCount ?? 1, 'red-500', 'Dibatalkan'],
                    ['Jas', $suitCount ?? 5, 'red-500', 'Dibatalkan'],
                    ['Topi', $hatCount ?? 1, 'green-500', 'Selesai'],
                    ['Sarung', $sarongCount ?? 3, 'red-500', 'Dibatalkan'],
                    ['Kaos', $tshirtCount ?? 4, 'red-500', 'Dibatalkan'],
                    ['Jeans', $jeansCount ?? 2, 'red-500', 'Dibatalkan'],
                    ['Kemeja', $shirtCount ?? 6, 'green-500', 'Selesai'],
                    ['Rok', $skirtCount ?? 2, 'red-500', 'Dibatalkan'],
                    ['Gaun', $dressCount ?? 3, 'red-500', 'Dibatalkan'],
                    ['Jaket', $jacketCount ?? 4, 'green-500', 'Selesai'],
                    ['Sweater', $sweaterCount ?? 5, 'green-500', 'Selesai'],
                    ['Seragam', $uniformCount ?? 7, 'green-500', 'Selesai'],
                    ['Tas', $bagCount ?? 1, 'red-500', 'Dibatalkan'],
                    ['Sepatu', $shoesCount ?? 1, 'green-500', 'Selesai']
                    ];      
                    @endphp
    
    <table class="table-auto w-full border-collapse border border-gray-200">
    <tbody id="laundryTable">
        @foreach ($laundryItems as $index => $item)
        <tr class="border-t hover:bg-gray-50 {{ $index >= 10 ? 'hidden' : '' }}">
            <td class="py-3 px-4">{{ $index + 1 }}</td>
            <td class="py-3 px-4">{{ $item[0] }}</td>
            <td class="py-3 px-4">{{ $item[1] }} item(s)</td>
            <td class="py-3 px-4">{{ now()->format('d M Y') }}</td>
            <td class="py-3 px-4">
                <span class="px-2 py-1 rounded-full {{ $item[2] === 'red-500' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }} text-sm">
                    {{ $item[3] }}
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center mt-4">
    <button id="viewAllButton" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        View All
    </button>
</div>

<script>
    document.getElementById('viewAllButton').addEventListener('click', function () {
        const rows = document.querySelectorAll('#laundryTable tr');
        rows.forEach(row => row.classList.remove('hidden'));
        this.style.display = 'none'; // Hide the "View All" button after showing all rows
    });
</script>

             </tbody>
                </table>
            </div>
        </div>
    </div>
</div>