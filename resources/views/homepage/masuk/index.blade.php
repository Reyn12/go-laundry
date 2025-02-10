<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk | Go-Laundry</title>
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
            <h1 class="text-4xl md:text-5xl font-bold text-blue-900 mb-4">Selamat Datang</h1>
            <p class="text-lg text-blue-700">Silakan pilih cara masuk yang sesuai</p>
        </div>

        <!-- Cards Container -->
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Pelanggan Card -->
            <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="p-8">
                    <div class="flex justify-center mb-6">
                        <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/user.png') }}" alt="user" class="w-16 h-16 object-contain" />
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-center text-blue-900 mb-4">Pelanggan</h2>
                    <p class="text-gray-600 text-center mb-8">
                        Log-in untuk menemukan layanan laundry terbaik sesuai kebutuhan Anda dengan mudah dan cepat.
                    </p>
                    <div class="flex justify-center">
                        <a href="{{ url('user/login/') }}" class="w-full">
                            <button class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition-colors duration-200 flex items-center justify-center space-x-2">
                                <span>MASUK SEBAGAI PELANGGAN</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kemitraan Card -->
            <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="p-8">
                    <div class="flex justify-center mb-6">
                        <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/merchant.png') }}" alt="merchant" class="w-16 h-16 object-contain" />
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-center text-blue-900 mb-4">Kemitraan</h2>
                    <p class="text-gray-600 text-center mb-8">
                        Log-in untuk memantau usaha laundry Anda dan terhubung dengan lebih banyak pelanggan
                    </p>
                    <div class="flex justify-center">
                        <a href="{{ url('merchant/login/') }}" class="w-full">
                            <button class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition-colors duration-200 flex items-center justify-center space-x-2">
                                <span>MASUK SEBAGAI KEMITRAAN</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>