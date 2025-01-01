@extends('user.components.main')

@section('container')

<div class="flex">
    <div class="container-fluid login-container">
        <div class="flex w-full">
            <!-- Sidebar -->
            <div class="fixed left-0 top-0 w-20 bg-white shadow-lg h-screen flex flex-col items-center py-5 space-y-8">
                <!-- Logo -->
                <div class="mb-8">
                    <img src="{{ asset('images/logoGolaundry.png') }}" alt="Logo" class="w-12 h-12">
                </div>

                <!-- Navigation Items -->
                <nav class="flex flex-col items-center space-y-6">
                    <!-- Home -->
                    <a href="/user/dashboard" class="p-2 hover:bg-gray-100 rounded-lg">
                        <button class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </button>
                    </a>

                    <!-- Search -->
                    <a href="/user/pencarian" class="p-2 hover:bg-gray-100 rounded-lg">
                        <button class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </a>

                    <!-- Menu -->
                    <a href="/user/pelacakan" class="p-2 hover:bg-gray-100 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </a>

                    <!-- History -->
                    <a href="/user/riwayat" class="p-2 hover:bg-gray-100 rounded-lg">
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

            <!-- Main Content Container (Konten utama dan peta) -->
            <div class="flex flex-col md:flex-row w-full ml-0">
                <!-- Konten Pencarian (Sidebar Kanan) -->
                <div class="w-full md:w-1/2 p-4">
                    <div class="search-sidebar">
                        <h5 class="text-center mb-4">248 Ready in Bandung</h5>
                        <form action="{{ route('user.pencarian') }}" method="GET">
                            <!-- Search Form Content -->
                            <div class="flex justify-between mb-3">
                                <div class="flex-grow">
                                    <label for="location" class="block text-sm font-medium">Location</label>
                                    <select id="location" name="location" class="w-full mt-1 p-2 border rounded-md">
                                        <option selected>Padjajaran, Bandung</option>
                                        <option value="1">Location 1</option>
                                        <option value="2">Location 2</option>
                                    </select>
                                </div>
                                <div class="flex-grow ml-3">
                                    <label for="price" class="block text-sm font-medium">Price</label>
                                    <select id="price" name="price" class="w-full mt-1 p-2 border rounded-md">
                                        <option selected>Price</option>
                                        <option value="low">Low to High</option>
                                        <option value="high">High to Low</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 flex justify-between items-center">
                                <input type="text" name="query" class="w-full p-2 border rounded-md" placeholder="Search or type command...">
                            </div>

                            <!-- Sort & Filter Buttons -->
                            <div class="mt-3">
                                <div class="flex justify-between mb-3">
                                <div style="display: flex; gap: 0.5rem;">
                                <button class="px-2 py-2 border rounded-md text-sm text-gray-700">Sort by Date</button>
                                 <button class="px-2 py-2 border rounded-md text-sm text-gray-700">Sort by Price</button>
                                </div>
                                    <div>
                                        <button class="px-4 py-2 border rounded-md text-sm text-gray-700">List</button>
                                    </div>
                                </div>

                                <!-- Results -->
                                <div class="search-results">
                                    @foreach ($results as $result)
                                    <div class="result-item mb-3 flex">
                                        <img src="{{ $result['image'] }}" alt="Laundry Image" class="w-1/4 h-24 object-cover rounded-lg">
                                        <div class="ml-4">
                                            <h5 class="text-lg">{{ $result['name'] ?? 'Nama tidak tersedia' }}</h5>
                                            <p>{{ $result['description'] }}</p>
                                            <p class="mb-1">{{ $result['address'] ?? 'Alamat tidak tersedia' }}</p>
                                            <p class="text-warning mb-0">
                                                &#9733; {{ str_repeat('&#9733;', $result['rating']) }}
                                                <span class="text-muted">({{ $result['reviews'] }} reviews)</span>
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <!-- Konten Utama dan Peta -->
                <div class="w-full md:w-1/2 p-4">
                    <div class="flex flex-row">
                        <!-- Konten Lain di Kiri -->
                        <div class="w-1/2 mt-20">
                            <div class="w-full">
                                <button type="button" class="px-4 py-2 border rounded-md bg-gray-300 hover:bg-gray-400">More Filter</button>
                                <div class="mt-2 flex">
                                    <button type="reset" class="px-4 py-2 border rounded-md bg-gray-300 hover:bg-gray-400">Clear</button>
                                    <button type="submit" class="px-4 py-2 border rounded-md bg-blue-500 text-white ml-2">Search</button>
                                </div>
                            </div>
                        </div>

                        <!-- Google Maps di Sebelah Kanan -->
                        <div class="w-1/2">
                            <div id="map" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script untuk Google Maps -->
    <script>
    function initMap() {
        var mapOptions = {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    }
    </script>
    <iframe src="https://maps.google.com/maps?q=Monas%20Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
    class="w-full h-80 mt-50 rounded-md" frameborder="0">
    </iframe>

@endsection
