<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Laundry Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-900 m-0">
    <div class="flex items-center justify-center h-screen">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 w-10/12 max-w-23xl">
            <!-- Image Section -->
            <div class="flex flex-col items-center justify-center text-white">
                <h1 class="text-5xl font-bold drop-shadow-lg mb-8">GO LAUNDRYY</h1>
                <img src="{{ asset('images/washing-machine.png') }}" alt="Laundry" class="hover:scale-110 transition-transform duration-300">
            </div>
            <!-- Login Form Section -->
            <div class="bg-white rounded-lg shadow-lg p-20 flex items-center justify-center">
                <div class="w-full max-w-md">
                    <h2 class="text-3xl font-bold text-center mb-8">Welcome Back!</h2>
                    <form action="" method="POST" class="space-y-4">
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" id="username" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan Username" required>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan Password" required>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat Saya</label>
                        </div>
                        <div>
                            <button type="button" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition-colors" onclick="window.location.href='/user/dashboard';">Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="#" class="text-blue-600 hover:underline">Lupa Password</a>
                        </div>
                        <div class="text-center mt-3">
                            <button type="button" class="w-full bg-gray-100 text-gray-700 font-medium py-2 px-4 rounded flex items-center justify-center hover:bg-gray-200 transition-colors">
                                <img src="https://img.icons8.com/color/48/000000/google-logo.png" width="20" class="mr-2">Sign In with Google
                            </button>
                        </div>
                        <div class="text-center mt-3">
                            <small>Belum punya akun? <a href="#" class="text-blue-600 hover:underline">Daftar Sekarang!</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
