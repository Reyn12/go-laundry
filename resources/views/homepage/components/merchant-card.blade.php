<!-- filepath: resources/views/homepage/components/merchant-card.blade.php -->
<div class="flex flex-col items-center p-6 rounded-3xl bg-[#0039c9] w-[240px] h-[260px] ">
    <div class="flex flex-col items-start gap-1.5 py-4">
        <div class="flex items-start gap-1.5 pb-2">
            <p class="text-xl text-white">{{ $no }}.</p>
            <p class="text-xl text-white">{{ $name }}</p>
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