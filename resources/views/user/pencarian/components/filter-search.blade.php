<div class="search-sidebar">
    <h5 class="text-black font-bold text-lg mb-4">248 Ready in Bandung</h5>
    <form action="{{ route('user.pencarian') }}" method="GET">
        <div class="flex justify-between mb-3 space-x-2">
            <div>
                <select id="location" name="location" class="px-3 py-2 border rounded-md" onchange="this.form.submit()">
                    <option value="">Normal</option>
                    <option value="1" {{ request('location') == '1' ? 'selected' : '' }}>Terdekat</option>
                </select>
            </div>
            <!-- Filter Sorting -->
            <div class="flex justify-between items-center mb-4">
                <select id="sort-price" class="px-3 py-2 border rounded-md" onchange="sortByPrice()">
                    <option value="">Urutkan Harga</option>
                    <option value="low">Low to High</option>
                    <option value="high">High to Low</option>
                </select>
            </div>
        </div>
    </form>
</div>
