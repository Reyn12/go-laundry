<div id="popupOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 text-center w-96">
        <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-16 h-16 text-green-500 mx-auto">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h2 class="text-xl font-semibold mb-4">Proses pengajuan pembukaan toko kamu sedang kami proses ya ^^</h2>
        <div class="flex gap-4">
            <!-- Tombol Kembali -->
            <button onclick="closePopup()" class="w-1/2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-2 rounded-lg">
                Kembali
            </button>
            <!-- Tombol Login -->
            <button onclick="goToLogin()" class="w-1/2 bg-yellow-200 hover:bg-yellow-300 text-gray-900 font-semibold py-2 rounded-lg">
                Login Sekarang
            </button>
        </div>
    </div>
</div>
