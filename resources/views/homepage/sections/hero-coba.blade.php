<div class="w-full h-auto relative overflow-hidden bg-white">
    <!-- Header Section -->
    <div
        class="flex flex-col lg:flex-row justify-between items-center w-full h-auto lg:h-[680px] relative overflow-hidden rounded-bl-[84px] rounded-br-[84px] bg-gradient-to-r from-blue-700 to-white">
        <!-- Text Content -->
        <div class="flex flex-col justify-center items-start gap-6 px-6 py-12 lg:px-12 lg:w-1/2">
            <p class="text-xl lg:text-2xl font-semibold text-left uppercase text-white">
                "GO-LAUNDRY: Temukan Laundry Terdekat dengan Mudah!"
            </p>
            <p class="text-sm lg:text-base text-justify text-white">
                Mencari laundry yang dekat dengan Anda kini lebih cepat dan praktis! GO-LAUNDRY hadir
                untuk membantu Anda menemukan layanan laundry terbaik di sekitar Anda hanya dalam
                beberapa ketukan. Tak perlu repot lagi, biarkan kami yang mengurus sisanya.
            </p>
            <button
                class="w-48 lg:w-60 h-12 lg:h-14 bg-transparent border border-white rounded-3xl text-white uppercase text-sm lg:text-base">
                Cari Laundry
            </button>
        </div>

        <!-- Map Image -->
        <div class="relative w-full lg:w-1/2 flex justify-center items-center px-6 lg:px-0">
            <div class="w-full lg:w-[360px] h-auto lg:h-[360px] rounded-[36px] bg-blue-200"></div>
            <img src="{{ asset('images/mapbandung.png')}}" alt="map-bandung"
                class="absolute w-full lg:w-[420px] h-auto lg:h-[300px] rounded-[36px] object-cover top-4 lg:top-6">
        </div>
    </div>

    <!-- Main Section -->
    <div class="flex flex-col justify-start items-center w-full py-12 relative">
        <div class="flex flex-col justify-start items-center w-full max-w-[900px] bg-white rounded-[56px] shadow-lg p-6"
            style="box-shadow: 0px 4px 24px 4px rgba(0, 0, 0, 0.5);">
            <h2 class="text-2xl lg:text-4xl text-center text-black mb-6">PENCARIAN LAUNDRY TERDEKAT</h2>
            <div class="flex flex-col lg:flex-row justify-center items-stretch w-full gap-6">
                <!-- Service Section -->
                <div class="flex flex-col w-full lg:w-1/2 bg-white rounded-xl border border-gray-300 shadow-md p-6"
                    style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                    <h3 class="text-lg lg:text-xl text-black mb-4">Service yang disediakan:</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Cuci Reguler</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Cuci Dufet/Bedroom</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Cuci Karpet</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Cuci Sepatu</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Cuci Jas</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Setrika</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Cuci Baju Kerja</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Cuci Mobil/Motor</span>
                        </label>
                    </div>
                </div>

                <!-- Duration Section -->
                <div class="flex flex-col w-full lg:w-1/2 bg-white rounded-xl border border-gray-300 shadow-md p-6"
                    style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                    <h3 class="text-lg lg:text-xl text-black mb-4">Lama Pengerjaan:</h3>
                    <div class="grid grid-cols-1 gap-4">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Normal (2-3 Hari)</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Express (1 Hari)</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4">
                            <span class="text-base lg:text-lg text-black">Kilat (4-6 Jam)</span>
                        </label>
                    </div>
                </div>
            </div>
            <button
                class="mt-6 px-6 py-3 bg-blue-700 text-white font-semibold text-lg rounded-full shadow hover:bg-blue-600">
                CARI
            </button>
        </div>
    </div>
</div>