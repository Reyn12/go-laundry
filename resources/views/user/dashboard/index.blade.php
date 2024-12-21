@extends('layouts.main')

@section('container')
<div class="dashboard-container p-4">
    <!-- User Profile Header -->
    <div class="profile-header bg-navy-blue p-4 rounded-lg mb-4">
        <div class="flex items-center">
            @if(auth()->user()->profile_image)
                <img src="{{ asset(auth()->user()->profile_image) }}" alt="Profile" class="w-16 h-16 rounded-full mr-4">
            @else
                <div class="w-16 h-16 rounded-full mr-4 bg-gray-300 flex items-center justify-center text-gray-600">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
            @endif
            <div class="user-info">
                <h2 class="text-white text-xl font-bold">{{ auth()->user()->name }}</h2>
                <p class="text-gray-300">Member since {{ auth()->user()->created_at->format('M Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Status Pencucian Section -->
    <div class="mb-6">
        <h3 class="text-lg font-semibold mb-4">Status Pencucian</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Wash Status -->
            <div class="status-card {{ $washCount > 0 ? 'bg-red-500' : 'bg-gray-300' }} p-4 rounded-lg text-white">
                <div class="icon mb-2">
                    <img src="{{ asset('icons/wash.png') }}" alt="Wash" class="w-12 h-12">
                </div>
                <div class="text-sm">Wash</div>
                <div class="font-bold text-xl">{{ $washCount }}</div>
                @if($washCount > 0)
                    <a href="#" class="text-white text-sm hover:underline">View Details</a>
                @endif
            </div>

            <!-- Iron Status -->
            <div class="status-card {{ $ironCount > 0 ? 'bg-orange-400' : 'bg-gray-300' }} p-4 rounded-lg text-white">
                <div class="icon mb-2">
                    <img src="{{ asset('icons/iron.png') }}" alt="Iron" class="w-12 h-12">
                </div>
                <div class="text-sm">Iron</div>
                <div class="font-bold text-xl">{{ $ironCount }}</div>
                @if($ironCount > 0)
                    <a href="#" class="text-white text-sm hover:underline">View Details</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Pesanan Terbaru Section -->
    <div>
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Pesanan Terbaru</h3>
            <a href="#" class="text-blue-600 hover:underline">View All</a>
        </div>
        
        <div class="overflow-x-auto">
            @if($orders->count() > 0)
            <table class="min-w-full">
                <thead>
                    <tr class="text-left bg-gray-50">
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Amount</th>
                        <th class="py-2 px-4">Date</th>
                        <th class="py-2 px-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index => $order)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">{{ $order->item_name }}</td>
                        <td class="py-3 px-4">{{ $order->amount }} Pcs</td>
                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                        <td class="py-3 px-4">
                            @if($order->status == 'dilaundry')
                                <span class="px-2 py-1 rounded-full bg-red-100 text-red-600 text-sm">Dilaundry</span>
                            @else
                                <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-sm">Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="text-center py-8 bg-gray-50 rounded-lg">
                <p class="text-gray-500">No orders found</p>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.bg-navy-blue {
    background-color: #1a237e;
}
.status-card {
    transition: transform 0.2s;
}
.status-card:hover {
    transform: translateY(-2px);
}
</style>
@endsection