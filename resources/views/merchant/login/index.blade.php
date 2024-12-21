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
                <img src="/path-to-your-image.png" alt="Merchant Laundry" class="w-40 mx-auto">
                <h1 class="text-white text-2xl font-bold mt-4">Merchant Laundry</h1>
                <p class="text-blue-200 mt-2">Layanan Terbaik</p>
            </div>
        </div>

        <!-- Bagian Kanan -->
        <div class="flex w-full md:w-1/2 bg-white items-center justify-center">
            <div class="w-full max-w-md p-6">
                <div class="text-center mb-6">
                    <img src="/path-to-your-logo.png" alt="Logo Go-Laundry" class="w-16 mx-auto">
                    <h2 class="text-2xl font-bold text-gray-700 mt-2">Welcome, Merchant</h2>
                    <p class="text-gray-500">Merchant Laundry Terbaik</p>
                </div>
                <form action="/login" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="username" id="username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                        </label>
                        <a href="#" class="text-sm text-blue-600 hover:underline">Lupa Password</a>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Login</button>
                </form>
                <div class="text-center mt-4">
                    <button class="w-full bg-gray-100 text-gray-600 py-2 px-4 rounded-md flex items-center justify-center space-x-2 hover:bg-gray-200">
                        <img src="/path-to-google-icon.png" alt="Google" class="w-5 h-5">
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