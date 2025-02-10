{{-- Sort dan Filter Component --}}
<div class="flex flex-col md:flex-row justify-center items-center md:items-start p-2 md:p-4 gap-4 md:gap-32 mt-4 md:mt-0">
    {{-- Sort Section --}}
    <div class="flex flex-col gap-1 w-full md:w-auto px-4 md:px-0">
        <span class="text-xs md:text-sm font-medium text-gray-700 dark:text-gray-300">Sort</span>
        <select class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-xs md:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full md:w-48 p-2">
            <option selected>Merchant Verified</option>
            <option>Name (A-Z)</option>
            <option>Name (Z-A)</option>
            <option>Newest First</option>
            <option>Oldest First</option>
        </select>
    </div>

    {{-- Filter Section --}}
    <div class="flex flex-col gap-1 w-full md:w-auto px-4 md:px-0">
        <span class="text-xs md:text-sm font-medium text-gray-700 dark:text-gray-300">Filter</span>
        <select class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-xs md:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full md:w-48 p-2">
            <option selected>Choose Filter</option>
            <option>Location</option>
            <option>Rating</option>
            <option>Price Range</option>
            <option>Service Type</option>
        </select>
    </div>
</div>