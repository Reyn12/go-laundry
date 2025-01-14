@extends('user.components.main')
@include('user.components.sidebar')
@section('container')
<!-- Main Content -->
<div class="max-w-full mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Header -->
    <div class="p-10 border-b border-gray-200">
        <h1 class="text-2xl font-bold">Order ID: {{ $order['id'] }}</h1>
        <div class="flex items-center justify-between mt-2">
            <p class="text-gray-600">{{ $order['date'] }} at {{ $order['time'] }} from {{ $order['seller'] }}</p>
            <span class="px-4 py-1 text-sm font-semibold text-white bg-green-500 rounded-full">{{ $order['status'] }}</span>
        </div>
    </div>

    <!-- Order Items -->
    <div id="order-items-container">
        @foreach ($order['items'] as $index => $item)
        <div class="flex flex-col md:flex-row items-start p-6 border-b last:border-none {{ $index >= 3 ? 'hidden' : '' }}" data-item-index="{{ $index }}">
            <!-- Image Placeholder -->
            <div class="w-20 h-20 bg-gray-200 rounded-md flex items-center justify-center">
                <img src="{{ file_exists(public_path('images/' . strtolower($item['name']) . '.jpg')) 
                    ? asset('images/' . strtolower($item['name']) . '.jpg') 
                    : asset('images/logoGolaundry.png') }}" 
                    alt="{{ $item['name'] }}" 
                    class="object-cover rounded-md" />
            </div>
                <!-- Item Details -->
                <div class="flex-1 ml-4">
                    <h2 class="text-lg font-bold">{{ $item['name'] }}</h2>
                    <p class="text-gray-600">{{ $item['quantity'] }} Pcs - <span class="text-black">{{ $item['color'] }}</span></p>
                    @if ($item['note'])
                    <p class="text-sm text-gray-500 mt-2">{{ $item['note'] }}</p>
                    @endif
                </div>

                <!-- Pricing and Action -->
                <div class="text-right">
                    <!-- Status dipindahkan ke atas price -->
                    <span class="inline-block px-3 py-1 text-xs font-semibold {{ $item['status'] === 'Selesai' ? 'bg-green-200 text-green-800' : ($item['status'] === 'Waiting' ? 'bg-yellow-200 text-yellow-800' : 'bg-blue-200 text-blue-800') }} rounded-full mb-2">{{ $item['status'] }}</span>
                    <p class="font-semibold text-gray-800">{{ $item['quantity'] }} x Rp.{{ number_format($item['price_per_item'], 0, ',', '.') }}</p>
                    <p class="font-bold text-gray-900">Rp.{{ number_format($item['quantity'] * $item['price_per_item'], 0, ',', '.') }}</p>
                    <button class="mt-4 px-4 py-2 text-sm font-semibold text-white bg-red-500 hover:bg-blue-600 rounded-md">Chat seller</button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-4">
        <button id="view-all-button" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">View All</button>
    </div>
    <script>
    document.getElementById('view-all-button').addEventListener('click', function() {
        document.querySelectorAll('#order-items-container [data-item-index]').forEach(function(item) {
            item.classList.remove('hidden');
        });
        this.style.display = 'none';
    });
</script>
@endsection


