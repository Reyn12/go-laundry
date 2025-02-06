<div class="search-sidebar">
    <h5 class="text-black font-bold text-lg mb-4">248 Ready in Bandung</h5>
    
    <form action="{{ route('user.pencarian') }}" method="GET">
    <div class="flex justify-between mb-3 space-x-2">
        <div>
            <select id="location" name="location" class="px-3 py-2 border rounded-md">
                <option selected>Distance</option>
                <option value="1">Terdekat</option>
            </select>
        </div>
        <div class="flex-grow">
            <select id="price" name="price" class="w-32 px-3 py-2 border rounded-md">
                <option selected>Price</option>
                <option value="low">Low to High</option>
                <option value="high">High to Low</option>
            </select>
        </div>
        <div class="flex-grow">
            <select id="rating" name="rating" class="w-full px-3 py-2 border rounded-md">
                <option selected>Rating</option>
                <option value="good">Good Rating</option>
                <option value="bad">Bad Rating</option>
            </select>
        </div>
    </div>

        <!-- Search Box -->
        <div class="container-fluid mx-auto mt-4">
            <div class="mb-4">
                <input type="text" id="search-box" placeholder="Cari riwayat pesanan..." 
                       class="border border-gray-300 rounded-lg p-2 w-full">
            </div>
        </div>
    </form>
</div>