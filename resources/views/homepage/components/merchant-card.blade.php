<div class="flex flex-col items-center gap-4 px-4 pb-6" data-aos="fade-up" data-aos-duration="1000">
    <div class="flex flex-col items-center w-full max-w-7xl gap-4 p-6 rounded-2xl backdrop-blur-lg shadow-lg"
        data-aos="fade-up" data-aos-delay="200">
        <!-- Hasil Pencarian Header -->
        <div class="flex flex-wrap items-center justify-center gap-3 w-full" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-2xl font-bold">Hasil Pencarian</h2>
            <div class="flex flex-wrap justify-center gap-2">
                @if(isset($selectedServices))
                @foreach($selectedServices as $service)
                <div class="px-4 py-1.5 rounded-full bg-gray-800/80  border border-gray-700">
                    <p class="text-sm text-white font-medium">{{ $service }}</p>
                </div>
                @endforeach
                @endif
                @if(isset($selectedDurations))
                @foreach($selectedDurations as $duration)
                <div class="px-4 py-1.5 rounded-full bg-gray-800/80  border border-gray-700">
                    <p class="text-sm text-white font-medium">{{ $duration }}</p>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Grid hasil pencarian -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full place-items-center">
            @php
            $delay = 600;
            @endphp

            @foreach ($groupedServices as $merchantId => $data)
            <div class="group relative overflow-hidden w-full max-w-[350px] justify-self-center" data-aos="fade-up"
                data-aos-delay="{{ $delay + ($loop->iteration * 200) }}">
                <div
                    class="flex flex-col p-4 rounded-xl bg-gradient-to-br from-gray-800 to-gray-900 hover:from-gray-700 hover:to-gray-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-700">
                            <span class="text-base text-white font-bold">{{ $loop->iteration }}</span>
                        </div>
                        <h3 class="text-lg text-white font-bold line-clamp-1">{{ $data['merchant']->nama_laundry }}</h3>
                    </div>

                    <div class="space-y-3 flex-1">
                        <div class="flex items-start gap-2">
                            <img src="{{ asset('images/icons/iconLocationInformation.svg') }}" alt=""
                                class="w-4 h-4 mt-1">
                            <p class="text-xs text-gray-300 line-clamp-2">{{ $data['merchant']->alamat_laundry }}</p>
                        </div>

                        <div class="space-y-1.5">
                            <h4 class="text-sm text-white font-semibold">Layanan</h4>
                            <p class="text-xs text-gray-300">{{ $data['kategori_layanan'] }}</p>
                        </div>

                        <div class="space-y-1.5">
                            <h4 class="text-sm text-white font-semibold">Durasi</h4>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach ($data['durasi'] as $durasi)
                                <span
                                    class="px-2 py-0.5 text-xs text-gray-300 bg-gray-700 rounded-full">{{ $durasi }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ url('/user/login') }}"
                            class="flex items-center justify-center gap-2 w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg font-medium transition-all duration-300 group-hover:shadow-lg">
                            Pilih Laundry
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
