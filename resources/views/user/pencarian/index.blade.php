@extends('user.components.main')
@section('container')
<div class="lg:w-1/4 hidden lg:block">
    @include('user.components.sidebar')
</div>
<div class="flex flex-col md:flex-row w-full">
    <!-- Konten Pencarian (Sidebar Kiri) -->
    <div class="w-full md:w-2/3 p-4">
        <div class="search-sidebar">
            <h5 class="text-black font-bold text-lg mb-4">248 Ready in Bandung</h5>
            <form action="{{ route('user.pencarian') }}" method="GET">
                <!-- Form Pencarian -->
                <div class="flex justify-between mb-3 space-x-2">
                    <div class="flex gap-2">
                        <select id="location" name="location" class="px-3 py-2 border rounded-md">
                            <option selected>Padjajaran, Bandung</option>
                            <option value="1">Location 1</option>
                            <option value="2">Location 2</option>
                        </select>
                    </div>
                    <div class="flex-grow">
                        <select id="price" name="price" class="px-3 py-2 border rounded-md">
                            <option selected>Price</option>
                            <option value="low">Low to High</option>
                            <option value="high">High to Low</option>
                        </select>
                    </div>
                    <!-- Filter Button -->
                    <button class="border rounded-md p-2 bg-white shadow-md flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.75h16.5M3.75 12h16.5m-7.5 6.25h7.5" />
                        </svg>
                        More filter
                    </button>
                </div>
                <!-- Search Bar -->
                <div class="mb-3 flex items-center space-x-2">
                    <input type="text" name="query" class="flex-1 p-2 border rounded-md" placeholder="Search or type command...">
                    <button type="reset" class="px-4 py-2 border rounded-md bg-red-500 hover:bg-gray-400 text-white shadow-md">Clear</button>
                    <button type="submit" class="px-4 py-2 border rounded-md bg-blue-600 hover:bg-gray-400 text-white shadow-md">Search</button>
                </div>
                <!-- Sort & Filter Buttons -->
                <div class="mt-3">
                    <div class="flex justify-between mb-3">
                        <!-- Sort Buttons -->
                        <div class="background-gray-200 flex gap-2">
                            <button id="sortByDate" type="button" class="sort-btn px-4 py-2 border rounded-md text-sm font-medium text-black bg-gray-200">Sort by Date</button>
                            <button id="sortByPrice" type="button" class="sort-btn px-4 py-2 border rounded-md text-sm font-medium text-black-500 bg-gray-200 hover:bg-gray-200">Sort by Price</button>
                        </div>

                        <!-- List & Grid Buttons -->
                        <div class="background-gray-200 flex gap-2">
                            <button id="listView" type="button" class="view-btn px-4 py-2 border rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200">List</button>
                            <button id="gridView" type="button" class="view-btn px-4 py-2 border rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200">Grid</button>
                        </div>
                    </div>
                </div>

                <!-- Results -->
                <div id="searchResults" class="search-results">
                    @foreach ($results as $result)
                    <div class="result-item mb-3 flex gap-4 bg-white p-4 rounded-lg shadow hover:shadow-lg" 
                         data-date="{{ $result['date'] ?? '' }}" 
                         data-price="{{ $result['price'] ?? 0 }}">
                        <img src="{{ $result['image'] }}" alt="Laundry Image" class="w-1/4 h-24 object-cover rounded-lg">
                        <div class="ml-4">
                            <h5 class="text-lg font-semibold text-gray-800">{{ $result['name'] ?? 'Name not available' }}</h5>
                            <p class="text-gray-600">{{ $result['description'] }}</p>
                            <p class="mb-1 text-gray-500">{{ $result['address'] ?? 'Address not available' }}</p>
                            <p class="text-warning mb-0 text-yellow-500">
                                &#9733; {{ str_repeat('&#9733;', $result['rating']) }}
                                <span class="text-gray-400">({{ $result['reviews'] }} reviews)</span>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
    <!-- Peta (Sidebar Kanan) -->
    <div class="flex-1 p-4">
        <div id="map-container" class="h-screen w-full">
            <iframe src="https://maps.google.com/maps?q=Monas%20Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                class="w-full h-full rounded-md" frameborder="0">
            </iframe>
        </div>
    </div>
</div>

<script>
    // Get references to buttons
    const sortByDateBtn = document.getElementById('sortByDate');
    const sortByPriceBtn = document.getElementById('sortByPrice');
    const listViewBtn = document.getElementById('listView');
    const gridViewBtn = document.getElementById('gridView');

    // Function to handle active state for sort buttons
    function setActiveSortButton(activeButton) {
        document.querySelectorAll('.sort-btn').forEach(button => {
            button.classList.remove('bg-green-500', 'text-white');
            button.classList.add('text-gray-700', 'bg-gray-200'); 
        });
        activeButton.classList.remove('text-gray-700', 'bg-gray-200');
        activeButton.classList.add('bg-green-500', 'text-white');
    }

    // Function to handle active state for view buttons
    function setActiveViewButton(activeButton) {
        document.querySelectorAll('.view-btn').forEach(button => {
            button.classList.remove('bg-green-500', 'text-white');
            button.classList.add('text-gray-700', 'bg-gray-200'); 
        });
        activeButton.classList.remove('text-gray-700', 'bg-gray-200');
        activeButton.classList.add('bg-green-500', 'text-white');
    }

    // Add event listeners
    sortByDateBtn.addEventListener('click', () => setActiveSortButton(sortByDateBtn));
    sortByPriceBtn.addEventListener('click', () => setActiveSortButton(sortByPriceBtn));
    listViewBtn.addEventListener('click', () => setActiveViewButton(listViewBtn));
    gridViewBtn.addEventListener('click', () => setActiveViewButton(gridViewBtn));
</script>

@endsection
