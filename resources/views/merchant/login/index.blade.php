<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant Laundry - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Bagian Kiri -->
        <div class="hidden md:flex w-1/2 bg-blue-900 items-center justify-center">
            <div class="text-center">
                <img src="{{ asset('images/logomerchantx1.png') }}" alt="Merchant Laundry" class="w-40 mx-auto">
                <h1 class="text-white text-3xl font-bold mt-4">Merchant Laundry</h1>
                <p class="text-blue-200 mt-2 text-lg">Layanan Terbaik</p>
            </div>
        </div>

        <!-- Bagian Kanan -->
        <div class="flex w-full md:w-1/2 bg-white items-center justify-center">
            <div class="w-full max-w-md px-8 py-6">
                <div class="text-center mb-6">
                    <img src="{{ asset('images/logomerchantx1.png') }}" alt="Logo Merchant" class="w-16 mx-auto">
                    <h2 class="text-2xl font-bold text-gray-700 mt-2">Welcome, Merchant</h2>
                    <p class="text-gray-500 text-sm">Merchant Laundry Terbaik</p>
                </div>
                <form action="/login" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <div class="relative">
                            <input type="text" name="username" id="username" placeholder="Enter your username"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-10">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">@</span>
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="Enter your password"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-10">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.38 0 2.5 1.12 2.5 2.5S13.38 16 12 16s-2.5-1.12-2.5-2.5S10.62 11 12 11z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 9.172a4 4 0 015.656 0M15 13.5a6 6 0 00-6-6" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center text-sm text-gray-600">
                            <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                            <span class="ml-2">Ingat Saya</span>
                        </label>
                        <a href="#" class="text-sm text-blue-600 hover:underline">Lupa Password</a>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                        Login
                    </button>
                </form>
                <div class="text-center mt-4">
                    <button class="w-full bg-gray-100 text-gray-600 py-2 px-4 rounded-md flex items-center justify-center space-x-2 hover:bg-gray-200">
                        <img src="{{ asset('images/icons/iconGoogle.svg') }}" alt="Google" class="w-5 h-5">
                        <span>Sign In with Google</span>
                    </button>
                </div>
                <p class="text-center text-sm text-gray-600 mt-6">
                    Belum punya akun? <a href="/register" class="text-blue-600 hover:underline">Daftar Sekarang</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
