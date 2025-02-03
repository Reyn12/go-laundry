<<<<<<< HEAD
<!-- filepath: resources/views/homepage/components/merchant-card.blade.php -->
<div class="flex flex-col items-center p-6 rounded-3xl bg-[#0039c9] w-[240px] h-[260px] ">
    <div class="flex flex-col items-start gap-1.5 py-4">
        <div class="flex items-start gap-1.5 pb-2">
            <p class="text-xl text-white">{{ $no }}.</p>
            <p class="text-xl text-white">{{ $name }}</p>
=======
<!-- resources/views/homepage/components/merchant-card.blade.php -->
<div class="flex flex-col items-center gap-2 px-6 pb-6">
    <div class="flex flex-col items-center w-full gap-6 p-6 rounded-[36px] border border-black">
        <div class="flex flex-col items-center gap-2">
            <p class="flex flex-col items-center text-xl text-black">Hasil Pencarian :</p>
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
>>>>>>> 86af8045fc8564b97edda3aaa6235e9929a84a48
        </div>
        <p class="text-xl text-white pb-2">{{ $distance }} KM</p>
        <div class="flex items-center gap-2.5">
            <img src="{{ asset('images/icons/iconLocationInformation.svg') }}" alt="">
            <p class="text-xs font-medium text-white">{{ $address }}</p>
        </div>
        <p class="text-xs text-white">Service :</p>
        <p class="text-xs text-white">{{ $services }}</p>
    </div>
    <div class="flex items-center gap-1.5 rounded-full bg-[#efefef] py-2">
        <p class="text-xs text-black px-4">Pesan Sekarang</p>
    </div>
</div>