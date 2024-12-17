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
        .bg-primary {
        background-color: #0039C9;
        }

        .text-primary {
            color: #0039C9;
        }
    </style>
</head>
<body class="flex justify-center items-center w-full h-screen">

    {{-- Images Login --}}
    <div class="bg-red-500 w-1/2 h-full flex justify-center items-center relative hidden sm:flex">
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
    <div class="bg-white w-2/3 lg:w-1/2 h-full flex flex-col justify-center items-center">
        <div class="flex flex-col items-center text-black">
            {{-- Logo --}}
            <img src="{{ asset('images/logoGoLaundry.png') }}" alt="logoLaundry" class="mb-4 w-32 h-32">
            <div class="text-3xl font-bold tracking-wide">Welcome, Admin</div>
            <div class="text-lg text-slate-400 font-bold tracking-wide mt-1">Nyuci Gampang, Waktu Lapang</div>
        </div>
        
        {{-- Form --}}
        <div class="fogm-login w-full lg:w-1/2" >
            <form method="POST" action="/admin/login" class="mt-4 w-full">
                @csrf
                <div class="mb-4 flex flex-col relative">
                    <label for="username" class="block text-base">Username
                    </label>
                    <input type="text" id="username" name="username" class="border border-blue-700 rounded-xl w-full py-2 px-3 bg-slate-50" placeholder="Masukkan username" required
                    >
                    <img src="{{ asset('images/icons/iconAt.svg') }}" alt="iconAt" class="flex justify-end w-4 h-4 right-3 absolute top-1/2 mt-1 cursor-pointer">
                </div>

                <div class="flex flex-col relative">
                    <label for="password" class="block text-base">Password</label>
                    <input type="password" id="password" name="password" class="border border-blue-700 rounded-xl w-full py-2 px-3 bg-slate-50" placeholder="Masukkan password" required>
                    <img src="{{ asset('images/icons/iconPassword.svg') }}" alt="iconPasssword" class="flex justify-end w-4 h-4 right-3 absolute top-1/2 mt-1 cursor-pointer">
                </div>

                {{-- Ingat Saya --}}
                <div class="ingat-saya mb-10 flex justify-between items-center">
                    <div class="flex items-center">
                        <input type="checkbox" name="" id="">
                        <span class="text-slate-500 ml-2">Ingat Saya</span>
                    </div>
                    <a href="#" class="text-blue-500 cursor-pointer">Lupa Password</a>
                </div>

                {{-- Button Login --}}
                <button type="submit" class="bg-primary text-white py-2 px-4 rounded-xl w-full h-12 mb-4 hover:bg-blue-900">Login</button>

                {{-- Button Login Google--}}
                <div class="login-google flex justify-center relative">
                    <span class="absolute left-28 top-1/2 -translate-x-1/2 -translate-y-1/2">
                        <img src="{{ asset('images/icons/iconGoogle.svg') }}" alt="">
                    </span>
                    <button type="submit" class="bg-slate-50 text-slate-500 py-2 px-4 rounded-xl w-full h-12 border border-blue-700 hover:bg-blue-700 hover:text-white">
                        <span class="ml-2">Sign In with Google</span>
                    </button>
                </div>
            </form>

            
        {{-- Belum Punya Akun --}}
        </div>
        <div class="belum-punya-akun flex justify-center bottom-0 mt-10">
            <span>Belum Punya Akun ? <a href="#" class="text-primary cursor-pointer ml-4">Daftar Sekarang</a></span>
        </div>
    </div>
</body>
</html>