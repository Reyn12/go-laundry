<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Service Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahkan Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Left Side - Blue Section -->
        <div class="hidden md:flex md:w-1/2 bg-blue-900 p-8 items-center justify-center">
            <div class="text-center text-white">
                <!-- Illustrations -->
                <div class="flex justify-center mb-8 space-x-4">
                    <div class="p-1 rounded-lg">
                        <img src="{{ asset('images/laundryPicture.png') }}" alt="">
                    </div>
                </div>
                <h2 class="text-2xl font-bold mb-2">Solusi Cerdas</h2>
                <h3 class="text-xl mb-4">Untuk Cucian Anda</h3>
                <p class="text-sm text-gray-300">Cuci Tanpa Ribet, Lipat Tanpa Repot</p>
            </div>
        </div>

        <!-- Right Side - Form Section -->
        <div class="w-full md:w-1/2 bg-gray-100 p-8 flex items-center justify-center">
            <div class="w-full max-w-md">
                <h1 class="text-3xl font-bold mb-4">Buat Akun</h1>
                <p class="mb-6">
                    Sudah punya akun? 
                    <a href="#" class="text-blue-600 hover:underline">Log In</a>
                </p>

                <form class="space-y-4">
                    <div class="flex gap-4">
                        <input
                            type="text"
                            placeholder="Nama depan"
                            class="w-1/2 p-3 rounded-md border border-gray-300"
                        />
                        <input
                            type="text"
                            placeholder="Nama belakang"
                            class="w-1/2 p-3 rounded-md border border-gray-300"
                        />
                    </div>
                    
                    <input
                        type="email"
                        placeholder="Email"
                        class="w-full p-3 rounded-md border border-gray-300"
                    />
                    
                    <input
                        type="password"
                        placeholder="Password"
                        class="w-full p-3 rounded-md border border-gray-300"
                    />
                    
                    <input
                        type="password"
                        placeholder="Konfirmasi Password"
                        class="w-full p-3 rounded-md border border-gray-300"
                    />

                    <div class="flex items-center">
                        <input type="checkbox" class="mr-2" />
                        <span class="text-sm">
                            Saya menyetujui 
                            <a href="#" class="text-blue-600 hover:underline">syarat & ketentuan</a>
                        </span>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-yellow-100 hover:bg-yellow-200 text-gray-800 font-semibold p-3 rounded-md transition duration-200"
                    >
                        BUAT AKUN
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>