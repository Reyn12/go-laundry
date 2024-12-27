@extends('user.components.main')

@section('container')
<div class="flex">
    <!-- Sidebar -->
    <div class="fixed left-0 top-0 w-20 bg-white shadow-lg h-screen flex flex-col items-center py-5 space-y-8">
        <div class="mb-8">
            <img src="{{ asset('images/logoGolaundry.png') }}" alt="Logo" class="w-12 h-12">
        </div>
        <nav class="flex flex-col items-center space-y-6">
            @foreach ([['/user/dashboard', 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'], ['/user/pencarian', 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'], ['#', 'M4 6h16M4 12h16M4 18h16'], ['#', 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z']] as $item)
                <a href="{{ $item[0] }}" class="p-2 hover:bg-gray-100 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item[1] }}"></path>
                    </svg>
                </a>
            @endforeach
        </nav>
        <div class="mt-auto flex flex-col items-center space-y-6">
            @foreach ([['#', 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0...'], ['#', 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11...'], ['#', 'M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3...']] as $item)
                <a href="{{ $item[0] }}" class="p-2 hover:bg-gray-100 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item[1] }}"></path>
                    </svg>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 ml-20">
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

        <!-- Status Pencucian Section -->
        <div class="p-4 px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ([['Wash', $washCount, 'red-500', 'images/wash-machine.png'], ['Iron', $ironCount, 'orange-400', 'images/iron.png']] as $status)
                    <div class="status-card {{ $status[1] > 0 ? 'bg-' . $status[2] : 'bg-gray-300' }} p-4 rounded-lg text-white">
                        <div class="icon mb-2">
                            <img src="{{ asset($status[3]) }}" alt="{{ $status[0] }}" class="w-35 h-50">
                        </div>
                        <div class="text-sm">{{ $status[0] }}</div>
                        <div class="font-bold text-xl">{{ $status[1] }}</div>
                        @if($status[1] > 0)
                            <a href="#" class="text-white text-sm hover:underline">View Details</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pesanan Terbaru Section -->
        <div class="p-4 px-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Pesanan Terbaru</h3>
                <a href="#" class="text-blue-600 hover:underline">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left bg-gray-50">
                            @foreach (['No', 'Jenis Paket', 'Berat', 'Tanggal Masuk', 'Status'] as $header)
                                <th class="py-2 px-4">{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                @foreach ([['1', 'Cuci Kering', '3 Kg', '21 Dec 2024', 'bg-red-100 text-red-600', 'Dibatalkan'], ['2', 'Cuci Setrika', '5 Kg', '20 Dec 2024', 'bg-green-100 text-green-600', 'Selesai'], ['3', 'Express', '2 Kg', '20 Dec 2024', 'bg-green-100 text-green-600', 'Selesai'], ['4', 'Regular', '4 Kg', '19 Dec 2024', 'bg-red-100 text-red-600', 'Dibatalkan']] as $row)
                 <tr class="border-t hover:bg-gray-50">
                  <td class="py-3 px-4">{{ $row[0] }}</td>
                  <td class="py-3 px-4">{{ $row[1] }}</td>
                  <td class="py-3 px-4">{{ $row[2] }}</td>
                  <td class="py-3 px-4">{{ $row[3] }}</td>
                  <td class="py-3 px-4">
                      <span class="px-2 py-1 rounded-full {{ $row[4] }} text-sm">{{ $row[5] }}</span>
                  </td>
                 </tr>
                 @endforeach
             </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
