@extends('user.components.main')
@section('container')

<div class="lg:w-1/4 hidden lg:block">
    @include('user.components.sidebar')
</div>

<!-- Main Content -->
<div class="mb-3 flex items-center space-x-2">
    <input type="text" id="search-box" placeholder="Cari riwayat pesanan..." 
           class="border border-gray-300 rounded-lg p-2 w-full" onkeyup="searchLaundry()">
    <button type="reset" class="px-4 py-2 border rounded-md bg-red-500 hover:bg-gray-400 text-white shadow-md" onclick="clearSearch()">Clear</button>
</div>

<div class="max-w-full mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">
    @if ($orders->isNotEmpty())
        @foreach ($orders as $order)
            <div class="border-b border-gray-200 pb-6 mb-6">
                <h1 class="text-2xl font-bold">Order ID: {{ $order->id }}</h1>
                <div class="flex items-center justify-between mt-2">
                    <p class="text-gray-600 text-sm">{{ $order->created_at }} - Layanan ID: {{ $order->layanan_id }}</p>
                    <span class="px-4 py-1 text-sm font-semibold text-white 
                        {{ $order->status === 'dibayar' ? 'bg-green-500' : 'bg-yellow-500' }} rounded-full">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>
            
            <!-- Order Items -->
            <div id="order-items-container">
                @if (!empty($order->items))
                    @foreach ($order->items as $index => $item)
                        <div class="bg-white p-6 border rounded-lg shadow-sm mb-4">
                            <div class="flex items-start">
                                <!-- Image -->
                                <div class="w-20 h-20 flex-shrink-0">
                                    <img src="{{ asset('images/logoGolaundry.png') }}" alt="{{ $item->id }}" class="w-full h-full object-cover rounded-md" />
                                </div>
                                
                                <!-- Item Details -->
                                <div class="ml-4 flex-1">
                                    <h2 class="text-lg font-bold">{{ ucfirst($item->nama) }}</h2>
                                    <p class="text-gray-600 text-sm">{{ $item->deskripsi }}</p>
                                    <p class="text-sm text-gray-500 mt-2">{{ $item->alamat_pengambilan }}</p>
                                    <p class="text-sm text-gray-500 mt-2">{{ $item->alamat_pengiriman }}</p>
                                </div>
                                
                                <!-- Pricing & Status -->
                                <div class="text-right">
                                    <span class="inline-block px-3 py-1 text-xs font-semibold 
                                        {{ $item->status === 'selesai' ? 'bg-green-200 text-green-800' : ($item->status === 'waiting' ? 'bg-yellow-200 text-yellow-800' : 'bg-blue-200 text-blue-800') }} 
                                        rounded-full mb-2">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                    <p class="font-bold text-gray-900">Rp.{{ number_format($item->total_harga, 0, ',', '.') }}</p>
                                    <button class="mt-4 px-4 py-2 text-sm font-semibold text-white bg-blue-500 hover:bg-blue-600 rounded-md">Chat seller</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
                <!-- Additional Item Layout Based on Image -->
                <div class="bg-white rounded-lg shadow-sm border p-4">
                    <h3 class="font-bold">Order Item</h3>
                    <div class="flex items-center p-4">
                        <div class="ml-4">
                            <h4 class="font-bold">Cuci Kering</h4>
                            <p class="text-sm">5 Pcs</p>
                            <p class="text-sm text-gray-600">Tshirt,celana panjang,baju panjang,rompi</p>
                        </div>
                        <div class="ml-auto text-right">
                            <span class="px-2 py-1 text-xs font-semibold bg-green-200 text-green-800 rounded-full">Selesai</span>
                            <p class="text-sm">5 x Rp. 2000</p>
                            <p class="font-bold">Rp. 10.000</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Item Layout Based on Image -->
                <div class="bg-white rounded-lg shadow-sm border p-4">
                    <h3 class="font-bold">Order Item</h3>
                    <div class="flex items-center p-4">
                        <div class="ml-4">
                            <h4 class="font-bold">Reguler</h4>
                            <p class="text-sm">3 Pcs</p>
                            <p class="text-sm text-gray-600">Selimut,bed cover,Bantal</p>
                        </div>
                        <div class="ml-auto text-right">
                            <span class="px-2 py-1 text-xs font-semibold bg-green-200 text-green-800 rounded-full">Selesai</span>
                            <p class="text-sm">5 x Rp. 2000</p>
                            <p class="font-bold">Rp. 10.000</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Item Layout Based on Image -->
                <div class="bg-white rounded-lg shadow-sm border p-4">
                    <h3 class="font-bold">Order Item</h3>
                    <div class="flex items-center p-4">
                        <div class="ml-4">
                            <h4 class="font-bold">Express</h4>
                            <p class="text-sm">3 Pcs</p>
                            <p class="text-sm text-gray-600">Kaos Dalam,Celana dalam,Daleman</p>
                        </div>
                        <div class="ml-auto text-right">
                            <span class="px-2 py-1 text-xs font-semibold bg-yellow-200 text-yellow-800 rounded-full">Proses</span>
                            <p class="text-sm">5 x Rp. 2000</p>
                            <p class="font-bold">Rp. 10.000</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Item Layout Based on Image -->
                <div class="bg-white rounded-lg shadow-sm border p-4">
                    <h3 class="font-bold">Order Item</h3>
                    <div class="flex items-center p-4">
                        <div class="ml-4">
                            <h4 class="font-bold">Cuci Kering</h4>
                            <p class="text-sm">5 Pcs</p>
                            <p class="text-sm text-gray-600">Tshirt,celana panjang,baju panjang,rompi</p>
                        </div>
                        <div class="ml-auto text-right">
                            <span class="px-2 py-1 text-xs font-semibold bg-green-200 text-green-800 rounded-full">Selesai</span>
                            <p class="text-sm">5 x Rp. 2000</p>
                            <p class="font-bold">Rp. 10.000</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Item Layout Based on Image -->
                <div class="bg-white rounded-lg shadow-sm border p-4">
                    <h3 class="font-bold">Order Item</h3>
                    <div class="flex items-center p-4">
                        <div class="ml-4">
                            <h4 class="font-bold">Reguler</h4>
                            <p class="text-sm">3 Pcs</p>
                            <p class="text-sm text-gray-600">Selimut,bed cover,Bantal</p>
                        </div>
                        <div class="ml-auto text-right">
                            <span class="px-2 py-1 text-xs font-semibold bg-green-200 text-green-800 rounded-full">Selesai</span>
                            <p class="text-sm">5 x Rp. 2000</p>
                            <p class="font-bold">Rp. 10.000</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Item Layout Based on Image -->
                <div class="bg-white rounded-lg shadow-sm border p-4">
                    <h3 class="font-bold">Order Item</h3>
                    <div class="flex items-center p-4">
                        <div class="ml-4">
                            <h4 class="font-bold">Express</h4>
                            <p class="text-sm">3 Pcs</p>
                            <p class="text-sm text-gray-600">Kaos Dalam,Celana dalam,Daleman</p>
                        </div>
                        <div class="ml-auto text-right">
                            <span class="px-2 py-1 text-xs font-semibold bg-yellow-200 text-yellow-800 rounded-full">Proses</span>
                            <p class="text-sm">5 x Rp. 2000</p>
                            <p class="font-bold">Rp. 10.000</p>
                        </div>
                    </div>
                </div>
        @endforeach
    @else
        <p class="text-center text-gray-600">Tidak ada pesanan.</p>
    @endif
</div>

@endsection