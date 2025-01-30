<!-- resources/views/homepage/components/merchant-card.blade.php -->
<div class="flex flex-col items-center gap-2 px-6 pt-6 pb-6">
    <div class="flex flex-col items-center w-full gap-6 p-6 rounded-[36px] border border-black">
        <div class="flex flex-wrap items-center gap-2">
            <p class="text-xl text-black">Hasil Pencarian :</p>
            <!-- Loop hasil pencarian -->
            @foreach ($layananLaundries as $layanan)
            @if($layanan->merchant)
            <div class="flex flex-col items-center p-6 rounded-3xl bg-[#0039c9] w-[240px] h-[260px]">
                <div class="flex flex-col items-start gap-1.5 py-4">
                    <div class="flex items-start gap-1.5 pb-2">
                        <p class="text-xl text-white">{{ $loop->iteration }}.</p>
                        <p class="text-xl text-white">{{ $layanan->merchant->nama_laundry }}</p>
                    </div>
                    <p class="text-base text-white">Jarak: TBD</p>
                    <p class="text-base text-white">{{ $layanan->merchant->alamat_laundry }}</p>
                    <p class="text-base text-white">{{ $layanan->nama_layanan }}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>