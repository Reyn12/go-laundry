{{-- Sort dan Filter Component --}}
<div class="flex justify-center items-start p-4 gap-32">
    {{-- Sort Section --}}
    <div class="flex flex-col gap-1">
        <span class="text-sm font-medium text-gray-700">Sort</span>
        <select class="bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5">
            <option selected>Merchant Verified</option>
            <option>Name (A-Z)</option>
            <option>Name (Z-A)</option>
            <option>Newest First</option>
            <option>Oldest First</option>
        </select>
    </div>

    {{-- Filter Section --}}
    <div class="flex flex-col gap-1">
        <span class="text-sm font-medium text-gray-700">Filter</span>
        <select class="bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5">
            <option selected>Choose Filter</option>
            <option>Location</option>
            <option>Rating</option>
            <option>Price Range</option>
            <option>Service Type</option>
        </select>
    </div>
</div>
