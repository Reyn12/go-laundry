<!-- resources/views/homepage/components/merchant-card.blade.php -->
<div class="flex flex-col items-center gap-2 px-6 pt-6 pb-6">
    <div class="flex flex-col items-center w-full gap-6 p-6 rounded-[36px] border border-black">
        <div class="flex flex-col items-center gap-2">
            <p class="flex flex-col items-center text-xl text-black">Hasil Pencarian :</p>
            <!-- Loop hasil pencarian -->
            <div class="flex flex-wrap justify-center gap-4 px-6 pt-6 pb-6">
                @foreach ($layananLaundries as $layanan)
                @if($layanan->merchant)
                <div class="flex flex-col items-center p-6 rounded-3xl bg-[#0039c9] w-[240px] h-full">
                    <div class="flex flex-col items-start gap-1.5 py-4">
                        <div class="flex items-start gap-1.5 pb-2">
                            <p class="text-xl text-white">{{ $loop->iteration }}.</p>
                            <p class="text-xl text-white">{{ $layanan->merchant->nama_laundry }}</p>
                        </div>
                        <p class="text-xs text-white flex items-center gap-1">
                            <img src="{{ asset('images/icons/iconLocationInformation.svg') }}" alt="">
                            {{ $layanan->merchant->alamat_laundry }}
                        </p>
                        <p class="text-lg text-white py-3 font-bold">Service Category :</p>
                        <p class="text-base text-white"> {{ $layanan->kategori_layanan }}</p>
                        <p class="text-lg text-white py-3 font-bold">Durasi :</p>
                        <p class="text-base text-white"> {{ $layanan->nama_layanan }}</p>    
                    </div>
                    <div class="flex flex-col items-center">
                        <a href="{{ url('/user/login') }}"
                            class="flex flex-col items-center px-4 py-2 bg-white text-[#0039c9] rounded-full hover:bg-gray-100 transition-colors inline-block text-center">
                            Pilih Laundry
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>