{{-- Header Component --}}
<div class="header w-full h-16 flex bg-white justify-between items-center px-6 rounded-lg shadow-lg">
    {{-- Left Side - Title and Date --}}
    <div class="left">
        <h1 class="text-lg font-semibold">Dashboard</h1>
        <p class="text-xs text-gray-500">{{ date('d F Y') }}</p>
    </div>

    {{-- Right Side - Search, Theme Toggle, and Profile --}}
    <div class="right flex items-center space-x-6">
        {{-- Search Bar --}}
        <div class="search-bar">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="search" class="pl-10 pr-4 py-2 w-64 rounded-full bg-gray-100 focus:outline-none" placeholder="Search">
            </div>
        </div>

        {{-- Theme Toggle --}}
        <div class="theme-toggle flex items-center bg-gray-100 rounded-full p-1 space-x-3">
            <button class="p-1 rounded-full bg-white">
                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                </svg>
            </button>
            <button class="p-1">
                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
            </button>
        </div>

        {{-- Profile --}}
        <div class="profile flex items-center space-x-3">
            <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden">
                <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile" class="w-full h-full object-cover">
            </div>
            <span class="font-medium">Muh Reyy</span>
        </div>
    </div>
</div>