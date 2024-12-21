@extends('layouts.main')

@section('container')
<div class="flex">
    <!-- Sidebar -->
    <div class="fixed left-0 top-0 w-20 bg-white shadow-lg h-screen flex flex-col items-center py-5 space-y-8">
        <!-- Logo -->
        <div class="mb-8">
            <img src="{{ asset('images/logoGolaundry.png') }}" alt="Logo" class="w-12 h-12">
        </div>

        <!-- Navigation Items -->
        <nav class="flex flex-col items-center space-y-6">
            <!-- Home -->
            <a href="#" class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
            </a>

            <!-- Search -->
            <a href="#" class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </a>

            <!-- Menu -->
            <a href="#" class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </a>

            <!-- History -->
            <a href="#" class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </a>
        </nav>

        <!-- Bottom Icons -->
        <div class="mt-auto flex flex-col items-center space-y-6">
            <!-- Settings -->
            <a href="#" class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </a>

            <!-- Notifications -->
            <a href="#" class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </a>

            <!-- Logout -->
            <a href="#" class="p-2 hover:bg-gray-100 rounded-lg mb-4">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 ml-20">
        <!-- User Profile Header -->
        <div class="relative">
            <!-- Background Header -->
            <div class="bg-[#1e3a8a] h-[120px] w-full relative overflow-hidden">
                <!-- Decorative Circles -->
                <div class="absolute top-0 right-0">
                    <div class="w-32 h-32 rounded-full bg-pink-300  absolute -top-10 -right-10"></div>
                    <div class="w-16 h-16 rounded-full bg-red-500  absolute top-4 right-20"></div>
                    <div class="w-24 h-24 rounded-full bg-yellow-300  absolute top-20 -right-4"></div>
                </div>
                
                <!-- User Name -->
                <div class="absolute left-[160px] top-[70px] text-white">
                    <div class="flex items-center space-x-4">
                        <h1 class="text-2xl font-bold">{{ $user->name ?? 'User' }}</h1>
                        <div class="flex items-center">
                            <span class="text-yellow-500">★</span>
                            <span class="text-yellow-500">★</span>
                            <span class="text-yellow-500">★</span>
                            <span class="text-gray-300">★</span>
                            <span class="text-gray-300">★</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Image -->
            <div class="absolute left-8 top-[60px]">
                <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-white shadow-lg">
                    @if($user && $user->profile_image)
                        <img src="{{ asset($user->profile_image) }}" alt="Profile" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-300 flex items-center justify-center text-gray-600">
                            {{ $user ? substr($user->name, 0, 1) : 'U' }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Status Pencucian Title -->
            <div class="mt-20 px-8">
                <h3 class="text-xl font-semibold">Status Pencucian</h3>
            </div>
        </div>

        <!-- Status Pencucian Section -->
        <div class="p-4 px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Wash Status -->
                <div class="status-card {{ $washCount > 0 ? 'bg-red-500' : 'bg-gray-300' }} p-4 rounded-lg text-white">
                    <div class="icon mb-2">
                        <img src="{{ asset('images/wash-machine.png') }}" alt="Wash" class="w-35 h-50">
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
                        <img src="{{ asset('images/iron.png') }}" alt="Iron" class="w30 h-50">
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
        <div class="p-4 px-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Pesanan Terbaru</h3>
                <a href="#" class="text-blue-600 hover:underline">View All</a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left bg-gray-50">
                            <th class="py-2 px-4">No</th>
                            <th class="py-2 px-4">Jenis Paket</th>
                            <th class="py-2 px-4">Berat</th>
                            <th class="py-2 px-4">Tanggal Masuk</th>
                            <th class="py-2 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dummy Data Row 1 -->
                        <tr class="border-t hover:bg-gray-50">
                            <td class="py-3 px-4">1</td>
                            <td class="py-3 px-4">Cuci Kering</td>
                            <td class="py-3 px-4">3 Kg</td>
                            <td class="py-3 px-4">21 Dec 2024</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full bg-red-100 text-red-600 text-sm">Diproses</span>
                            </td>
                        </tr>
                        <!-- Dummy Data Row 2 -->
                        <tr class="border-t hover:bg-gray-50">
                            <td class="py-3 px-4">2</td>
                            <td class="py-3 px-4">Cuci Setrika</td>
                            <td class="py-3 px-4">5 Kg</td>
                            <td class="py-3 px-4">20 Dec 2024</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-600 text-sm">Disetrika</span>
                            </td>
                        </tr>
                        <!-- Dummy Data Row 3 -->
                        <tr class="border-t hover:bg-gray-50">
                            <td class="py-3 px-4">3</td>
                            <td class="py-3 px-4">Express</td>
                            <td class="py-3 px-4">2 Kg</td>
                            <td class="py-3 px-4">20 Dec 2024</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-sm">Selesai</span>
                            </td>
                        </tr>
                        <!-- Dummy Data Row 4 -->
                        <tr class="border-t hover:bg-gray-50">
                            <td class="py-3 px-4">4</td>
                            <td class="py-3 px-4">Regular</td>
                            <td class="py-3 px-4">4 Kg</td>
                            <td class="py-3 px-4">19 Dec 2024</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-sm">Selesai</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection