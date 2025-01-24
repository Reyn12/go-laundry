<!-- homepage/components/filter-pencarian.blade.php -->

<div class="flex flex-col justify-start items-center w-full py-12 relative" id="Pencarian">
    <form action="{{ url('/search-laundry') }}" method="GET" class="w-full">
        <div class="flex flex-col justify-start items-center w-full max-w-[900px] bg-white rounded-[56px] shadow-lg p-6"
            style="box-shadow: 0px 4px 24px 4px rgba(0, 0, 0, 0.5);">
            <h2 class="text-2xl lg:text-4xl text-center text-black mb-6">PENCARIAN LAUNDRY TERDEKAT</h2>

            <div class="flex flex-col lg:flex-row justify-center items-stretch w-full gap-6">
                <!-- Service Section -->
                <div class="flex flex-col w-full lg:w-1/2 bg-white rounded-xl border border-gray-300 shadow-md p-6">
                    <h3 class="text-lg lg:text-xl text-black mb-4">Service yang disediakan:</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        @foreach (['Cuci Karpet', 'Cuci Sepatu', 'Cuci Jas', 'Cuci Setrika', 'Cuci Karpet', 'Cuci Kering
                        Lipat'] as $service)
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="services[]" value="{{ $service }}" @if(in_array($service,
                                old('services', []))) checked @endif class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">{{ $service }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>


                <!-- Duration Section -->
                <div class="flex flex-col w-full lg:w-1/2 bg-white rounded-xl border border-gray-300 shadow-md p-6"
                    style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                    <h3 class="text-lg lg:text-xl text-black mb-4">Lama Pengerjaan:</h3>
                    <div class="grid grid-cols-1 gap-4">
                        @foreach (['Reguler', 'Express', 'Kilat'] as $duration)
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="durations[]" value="{{ $duration }}" @if(in_array($duration,
                                old('durations', []))) checked @endif class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">{{ $duration }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <button type="submit"
                class="mt-6 px-12 py-3 bg-blue-700 text-white text-lg rounded-full shadow hover:bg-blue-600 flex items-center gap-2">
                CARI
                <img src="{{ asset('images/icons/iconKaca.svg') }}" alt="" class="w-5 h-5">
            </button>

        </div>
    </form>
</div>