<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Lato', sans-serif;
    }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-b from-[#e1e9ff] to-[#4c6fc7] flex flex-col items-center">
    <div class="flex flex-col items-center w-full max-w-[1280px] px-6 sm:px-12 lg:px-24 py-8">
        <div class="text-center mb-8">
            <p class="text-[24px] sm:text-[32px] lg:text-[40px] text-black">DAFTAR AKUN</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Pelanggan Card -->
            <div
                class="flex flex-col items-center p-6 rounded-[36px] bg-white shadow-md hover:shadow-lg transition-shadow h-full">
                <img src="{{ asset('images/user.png') }}" alt="user" class="w-20 h-20 object-cover mb-4" />
                <p class="text-center text-sm sm:text-base text-black mb-4 min-h-[80px]">
                    Daftarkan dan dapatkan kemudahan mencari laundry terdekat sesuai dengan kebutuhan anda
                </p>
                <div class="mt-auto">
                    <button
                        class="w-64 h-12 rounded-3xl bg-[#0039c9] text-xs text-white hover:bg-[#002fa3] transition-colors">
                        DAFTAR SEBAGAI PELANGGAN
                    </button>
                </div>
            </div>
            <!-- Kemitraan Card -->
            <div
                class="flex flex-col items-center p-6 rounded-[36px] bg-white shadow-md hover:shadow-lg transition-shadow h-full">
                <img src="{{ asset('images/merchant.png') }}" alt="merchant" class="w-20 h-20 object-cover mb-4" />
                <p class="text-center text-sm sm:text-base text-black mb-4 min-h-[80px]">
                    Daftarkan usaha laundry anda sehingga para pelanggan menemukan usaha anda
                </p>
                <div class="mt-auto">
                    <button
                        class="w-64 h-12 px-2 rounded-3xl bg-[#0039c9] text-xs text-white hover:bg-[#002fa3] transition-colors">
                        DAFTAR SEBAGAI KEMITRAAN
                    </button>
                </div>
            </div>
            <!-- Admin Card -->
            <div
                class="flex flex-col items-center p-6 rounded-[36px] bg-white shadow-md hover:shadow-lg transition-shadow h-full">
                <img src="{{ asset('images/admin.png') }}" alt="admin" class="w-20 h-20 object-cover mb-4" />
                <p class="text-center text-sm sm:text-base text-black mb-4 min-h-[80px]">
                    Kelola aplikasi laundry dengan mudah sebagai penghubung terpercaya antara pelanggan dan mitra.
                </p>
                <div class="mt-auto">
                    <button
                        class="w-64 h-12 px-2 rounded-3xl bg-[#0039c9] text-xs text-white hover:bg-[#002fa3] transition-colors">
                        DAFTAR SEBAGAI ADMIN
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>