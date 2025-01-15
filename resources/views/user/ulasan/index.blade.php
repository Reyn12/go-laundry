@extends('user.components.main')
@section('container')
@include('user.components.sidebar')
      <!-- Header Section -->
      <div class="flex justify-between items-center mb-4">
        <div class="flex gap-2">
          <select class="border rounded-md p-2 bg-white shadow-sm">
            <option>Padjajaran, Bandung</option>
            <option>Jakarta</option>
            <option>Surabaya</option>
          </select>
          <select class="border rounded-md p-2 bg-white shadow-sm">
            <option>Date</option>
            <option>Name</option>
            <option>Rating</option>
          </select>
        </div>
        <button class="border rounded-md p-2 bg-white shadow-sm flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.75h16.5M3.75 12h16.5m-7.5 6.25h7.5" />
          </svg>
          More filter
        </button>
      </div>

      <!-- Search Section -->
      <div class="flex gap-2 mb-4">
        <input type="text" placeholder="Search or type command..." class="flex-grow border rounded-md p-2 shadow-sm">
        <button class="border rounded-md p-2 bg-gray-200 shadow-sm">Clear</button>
        <button class="border rounded-md p-2 bg-blue-600 text-white shadow-sm">Search</button>
      </div>

      <!-- Review List -->
      <div class="space-y-4">
        <!-- Single Review -->
        <div class="bg-white p-4 rounded-md shadow">
          <div class="flex gap-4">
            <img src="https://via.placeholder.com/50" alt="User" class="w-12 h-12 rounded-full">
            <div class="flex-grow">
              <div class="flex justify-between">
                <div class="flex items-center gap-1">
                  <span class="font-semibold">Laundry</span>
                  <span class="text-gray-500">by jjdhwoighiwe</span>
                </div>
                <span class="text-gray-400 text-sm">22, April 2025 pukul 11:25 WIB</span>
              </div>
              <div class="flex items-center text-yellow-400 mb-2">
                @for ($i = 0; $i < 5; $i++)
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                  </svg>
                @endfor
              </div>
              <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse euismod, nulla et fermentum pharetra, massa ex vulputate velit.</p>
            </div>
          </div>
        </div>
      </div>
    @endsection
  </div>
</body>
</html>
