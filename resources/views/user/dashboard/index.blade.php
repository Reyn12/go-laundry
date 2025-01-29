@extends('user.components.main')
@section('container') 
<div class="lg:w-1/4 hidden lg:block">
      @include('user.components.sidebar')
</div>
<body class="bg-white">
    <!-- Main Content -->
    <div class="flex-1 m-auto">
        <div class="relative">
            <div class="bg-[#1e3a8a] h-[120px] w-full relative overflow-hidden">
                <div class="absolute top-0 right-0">
                    @foreach ([['-top-10 -right-10', 'w-32 h-32 bg-pink-300'], ['top-4 right-20', 'w-16 h-16 bg-red-500'], ['top-20 -right-4', 'w-24 h-24 bg-yellow-300']] as $circle)
                        <div class="{{ $circle[1] }} rounded-full absolute {{ $circle[0] }}"></div>
                    @endforeach
                </div>
                
                <div class="absolute left-[160px] top-[70px] text-white">
                    <div class="flex items-center space-x-4">
                        <h1 class="text-2xl font-bold">{{ $user->name ?? 'User' }}</h1>
                        <div class="bg-yellow-400 text-black rounded-full px-2 flex items-center">
                            <span class="text-yellow-500">★</span><span class="text-yellow-500">★</span><span class="text-yellow-500">★</span><span class="text-gray-300">★</span><span class="text-gray-300">★</span>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="mt-20 px-8">
                <h3 class="text-xl font-semibold">Status Pencucian</h3>
            </div>
        </div>
    </div>

      <!-- Status Pencucian Section -->
<div class="p-4 relative">
    <!-- Wrapper for Horizontal Scroll -->
    <div class="relative">
        <!-- Container Slider -->
        <div id="slider" class="overflow-x-auto scroll-smooth custom-scrollbar h-64 flex space-x-4 snap-x snap-mandatory">
        <!-- Individual Status Cards -->
            <div class="status-card bg-red-500 text-white p-6 rounded-md text-center flex flex-col items-center justify-between h-48 w-48 snap-center transform transition-transform duration-300 hover:scale-105 hover:translate-y-7">
                 <div class="icon mb-4 flex items-center justify-center w-full h-20 overflow-hidden">
                  <img src="images/iconwash.png" alt="Wash" class="w-auto h-full object-contain">
                 </div>
                <div class="font-bold text-xl">Wash</div>
                <div class="text-sm">One Day Ago</div>
                <button class="mt-4 px-4 py-2 bg-blue-600 hover:bg-gray-400 text-white text-sm rounded">View</button>
            </div>

            <div class="status-card bg-gray-200 text-gray-700 p-6 rounded-md text-center flex flex-col items-center justify-center h-48 w-48 snap-center transform transition-transform duration-300 hover:scale-105 hover:translate-y-7">
                <div class="icon mb-4 flex items-center justify-center w-full h-20 overflow-hidden">
                    <img src="images/iron-icon.png" alt="Iron" class="w-16 h-16">
                </div>
                <div class="font-bold text-xl">Iron</div>
                <div class="text-sm">Two Day Ago</div>
                <button class="mt-4 px-4 py-2 bg-blue-600 hover:bg-gray-400 text-white text-sm rounded">View</button>
            </div>

            <div class="status-card bg-gray-200 text-gray-700 p-6 rounded-md text-center flex flex-col items-center justify-center h-48 w-48 snap-center transform transition-transform duration-300 hover:scale-105 hover:translate-y-7">
                <div class="icon mb-4 flex items-center justify-center w-full h-20 overflow-hidden">
                    <img src="images/iron-icon.png" alt="Iron" class="w-16 h-16">
                </div>
                <div class="font-bold text-xl">Iron</div>
                <div class="text-sm">Two Day Ago</div>
                <button class="mt-4 px-4 py-2 bg-blue-600 hover:bg-gray-400 text-white text-sm rounded">View</button>
            </div>

            <div class="status-card bg-gray-200 text-gray-700 p-6 rounded-md text-center flex flex-col items-center justify-center h-48 w-48 snap-center transform transition-transform duration-300 hover:scale-105 hover:translate-y-7">
                <div class="icon mb-4 flex items-center justify-center w-full h-20 overflow-hidden">
                    <img src="images/iron-icon.png" alt="Iron" class="w-16 h-16">
                </div>
                <div class="font-bold text-xl">Iron</div>
                <div class="text-sm">Two Day Ago</div>
                <button class="mt-4 px-4 py-2 bg-blue-600 hover:bg-gray-400 text-white text-sm rounded">View</button>
            </div>
        </div>
    </div>
</div>

<!-- Scroll JavaScript -->
<script>
    const slider = document.getElementById('slider');
    const scrollLeftButton = document.getElementById('scroll-left');
    const scrollRightButton = document.getElementById('scroll-right');

    scrollLeftButton?.addEventListener('click', () => {
        slider.scrollBy({
            left: -300,
            behavior: 'smooth'
        });
    });

    scrollRightButton?.addEventListener('click', () => {
        slider.scrollBy({
            left: 300,
            behavior: 'smooth'
        });
    });
</script>

<!-- Scrollbar Styling -->
<style>
    .custom-scrollbar::-webkit-scrollbar {
        height: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

@include('user.components.pesananterbaru')
@endsection