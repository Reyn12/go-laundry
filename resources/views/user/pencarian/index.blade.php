@extends('user.components.main')
@include('user.components.sidebar')
@section('container')
    <!-- Main Content Container (Konten utama dan peta) -->
    <div class="flex flex-col md:flex-row w-full ml-0">
        <!-- Konten Pencarian (Sidebar Kiri) -->
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
                    <!--Search Bar-->
                    <div class="mb-3 flex items-center space-x-2">
                        <input type="text" name="query" class="flex-1 p-2 border rounded-md" placeholder="Search or type command...">
                        <!--clear and search-->
                        <button type="reset" class="px-4 py-2 border rounded-md bg-gray-300 hover:bg-gray-400">Clear</button>
                        <button type="submit" class="px-4 py-2 border rounded-md bg-blue-500 text-white">Search</button>
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
            class="w-full h-80 mt-4 rounded-md" frameborder="0">
    </iframe>
    </div>
    </div>
@endsection
