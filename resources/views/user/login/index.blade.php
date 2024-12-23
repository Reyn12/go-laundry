<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Laundry Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-indigo-900">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="flex flex-col lg:flex-row items-center lg:items-stretch w-full max-w-4xl bg-white bg-opacity-80 rounded-lg shadow-lg overflow-hidden">
            <!-- Image Section -->
            <div class="w-full lg:w-1/2 flex flex-col items-center justify-center bg-indigo-800 bg-opacity-90 py-20 px-20">
                <h1 class="text-4xl font-bold text-white mb-6 text-center">GO LAUNDRYY</h1>
                <img src="{{ asset('images/washing-machine.png') }}" alt="Laundry" class="w-48 sm:w-64 transform transition-transform duration-300 hover:scale-110">
            </div>
            <!-- Login Form Section -->
            <div class="w-full lg:w-1/2 flex items-center justify-center py-8 px-6">
                <div class="w-full max-w-sm">
                    <h2 class="text-3xl font-bold text-center mb-6">Welcome Back!</h2>
                    <form action="" method="POST">
                        <div class="mb-4">
                            <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                            <input type="text" id="username" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Masukkan Username" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                            <input type="password" id="password" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Masukkan Password" required>
                        </div>
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="remember" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="remember" class="ml-2 text-gray-600">Ingat Saya</label>
                        </div>
                        <div class="mb-6">
                            <button type="button" class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition" onclick="window.location.href='/user/dashboard';">Login</button>
                        </div>
                        <div class="text-center">
                            <a href="#" class="text-indigo-600 hover:underline">Lupa Password</a>
                        </div>
                        <div class="mt-4 text-center">
                            <button type="button" class="flex items-center justify-center w-full bg-gray-100 text-gray-700 py-3 rounded-lg border hover:bg-gray-200 transition">
                                <img src="https://img.icons8.com/color/48/000000/google-logo.png" width="20" class="mr-2"> Sign In with Google
                            </button>
                        </div>
                        <div class="mt-4 text-center">
                            <small class="text-gray-600">Belum punya akun? <a href="#" class="text-indigo-600 hover:underline">Daftar Sekarang!</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
