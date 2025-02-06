<div class="flex flex-col items-center gap-2 px-6 pb-6">
    <div class="flex flex-col items-center w-full gap-6 p-6 rounded-[36px] border border-black">
        <div class="flex flex-col items-center gap-2">
            <!-- Hasil Pencarian Header -->
            <div class="flex flex-wrap items-center gap-2">
                <p class="flex flex-wrap items-center text-xl text-black">Hasil Pencarian :</p>
                <!-- Tampilkan filter yang aktif -->
                @if(isset($selectedServices))
                @foreach($selectedServices as $service)
                <div
                    class="flex flex-wrap items-center justify-center gap-2 px-6 py-2 rounded-3xl border border-black w-[200px]">
                    <p class="text-xs text-black">{{ $service }}</p>
                </div>
                @endforeach
                @endif
                @if(isset($selectedDurations))
                @foreach($selectedDurations as $duration)
                <div
                    class="flex flex-wrap items-center justify-center gap-2 px-6 py-2 rounded-3xl border border-black w-[200px]">
                    <p class="text-xs text-black">{{ $duration }}</p>
                </div>
                @endforeach
                @endif
            </div>

            <!-- Loop hasil pencarian -->
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($groupedServices as $merchantId => $data)
                <div class="flex flex-col items-center p-6 rounded-3xl bg-[#0039c9] w-[240px] h-[420px]">
                    <div class="flex flex-col items-start gap-1.5 flex-1">
                        <div class="flex items-start gap-1.5 pb-2">
                            <p class="text-xl text-white">{{ $loop->iteration }}.</p>
                            <p class="text-xl text-white">{{ $data['merchant']->nama_laundry }}</p>
                        </div>
                        <p class="text-xs text-white flex items-center gap-1">
                            <img src="{{ asset('images/icons/iconLocationInformation.svg') }}" alt="">
                            {{ $data['merchant']->alamat_laundry }}
                        </p>
                        <p class="text-lg text-white py-3 font-bold">Service Category :</p>
                        <p class="text-base text-white">{{ $data['kategori_layanan'] }}</p>
                        <p class="text-lg text-white py-3 font-bold">Durasi yang Tersedia:</p>
                        @foreach ($data['durasi'] as $durasi)
                        <p class="text-base text-white">• {{ $durasi }}</p>
                        @endforeach
                    </div>
                    <div class="mt-auto pt-4">
                        <a href="{{ url('/user/login') }}"
                            class="flex flex-col items-center px-4 py-2 bg-white text-[#0039c9] rounded-full hover:bg-gray-100 transition-colors inline-block text-center">
                            Pilih Laundry
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
      
  </div>
    </div>
</div>