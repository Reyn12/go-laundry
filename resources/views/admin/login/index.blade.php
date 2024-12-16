<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
    </style>
</head>
<body class="flex justify-center items-center w-full h-screen">

    {{-- Images Login --}}
    <div class="bg-red-500 w-1/2 h-full flex justify-center items-center relative">
        <img src="{{ asset('images/bgLoginAdmin.png') }}" alt="gambarBgAdmin" class="w-full h-full object-cover">

        {{-- Bungkus Gambar nya --}}
        <div class="gambar-login absolute -mt-35">
            <img src="{{ asset('images/laundrypicture.png') }}" alt="laundrypicture" class="-ml-16 -mt-10">
            <h2 class="text-white text-3xl font-bold mt-6 text-center tracking-wide">Solusi Cerdas</h2>
            <h2 class="text-white text-3xl font-bold mt-2 text-center tracking-wide">Untuk Cucian Anda</h2>
            <h3 class="text-xl mt-3 text-center text-slate-300">Cuci Tanpa Ribet, Lipat Tanpa Repot</h3>
        </div>

    </div>
 
    {{-- Form Login --}}
    <div class="bg-white w-1/2 h-full flex flex-col justify-center items-center">
        <div class="flex flex-col items-center text-black">
            {{-- Logo --}}
            <img src="{{ asset('images/logoGoLaundry.png') }}" alt="logoLaundry" class="mb-4 w-40 h-40">


            <div class="text-3xl font-bold tracking-wide">Welcome, Admin</div>
            <div class="text-lg text-slate-500 font-bold tracking-wide mt-2">Nyuci Gampang, Waktu Lapang</div>

            
        </div>
        
        {{-- Form --}}
        <div class="fogm-login  w-1/2" >
            <form method="POST" action="/admin/login" class="mt-4 w-full">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-base">Username
                    </label>
                    <input type="text" id="username" name="username" class="border border-blue-700 rounded-xl w-full py-2 px-3" placeholder="Masukkan username" required
                    >
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-base">Password</label>
                    <input type="password" id="password" name="password" class="border border-blue-700 rounded-xl w-full py-2 px-3" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-xl w-full">Login</button>
            </form>
        </div>
        
    </div>
</body>
</html>