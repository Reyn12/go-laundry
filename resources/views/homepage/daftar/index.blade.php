<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar | Go-Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200">
    <div class="container mx-auto px-4 py-16 max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-blue-900 mb-4">Daftar Akun</h1>
            <p class="text-lg text-blue-700">Pilih jenis akun yang ingin Anda daftarkan</p>
        </div>

        <!-- Cards Container -->
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Pelanggan Card -->
            <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="p-8 flex flex-col h-full">
                    <div class="flex justify-center mb-6">
                        <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/user.png') }}" alt="user" class="w-16 h-16 object-contain" />
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-center text-blue-900 mb-4">Pelanggan</h2>
                    <p class="text-gray-600 text-center flex-grow">
                        Daftarkan dan dapatkan kemudahan mencari laundry terdekat sesuai dengan kebutuhan anda
                    </p>
                    <div class="mt-8">
                        <a href="{{ url('user/register/') }}">
                            <button class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-3xl font-semibold transition-colors duration-200">
                                DAFTAR SEBAGAI PELANGGAN
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kemitraan Card -->
            <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="p-8 flex flex-col h-full">
                    <div class="flex justify-center mb-6">
                        <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/merchant.png') }}" alt="merchant" class="w-16 h-16 object-contain" />
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-center text-blue-900 mb-4">Kemitraan</h2>
                    <p class="text-gray-600 text-center flex-grow">
                        Daftarkan usaha laundry anda sehingga para pelanggan menemukan usaha anda
                    </p>
                    <div class="mt-8">
                        <a href="{{ url('merchant/register/') }}">
                            <button class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-3xl font-semibold transition-colors duration-200">
                                DAFTAR SEBAGAI KEMITRAAN
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>