<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
    body {
        font-family: 'Lato', sans-serif;
    }

    html {
        scroll-padding-top: 6rem;
    }

    /* Pastikan gambar tidak melebihi lebar layar */
    img {
        max-width: 100%;
    }
    </style>
</head>

<body>
    <nav class="sticky top-0 z-50 bg-white shadow-lg">
        <div
            class="max-w-screen-xl flex items-center justify-between mx-auto py-3 px-4 md:py-4 md:px-6 lg:py-4 lg:px-8">
            <!-- Logo -->
            <a href="#hero" class="flex items-center">
                <img src="{{ asset('images/LogoGoLaundry.png') }}" alt="logoLaundry"
                    class="w-6 h-6 md:w-8 md:h-8 lg:w-12 lg:h-12 mr-2 lg:p-2">

            </a>

            <!-- Hamburger Menu (Mobile) -->
            <button id="menu-toggle" class="block md:hidden text-gray-900 focus:outline-none">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>

            <!-- Navbar Links -->
            <div id="menu"
                class="hidden md:flex flex-col md:flex-row items-center space-y-2 md:space-y-0 lg:space-x-12">
                <a href="#hero" class="text-xs md:text-sm lg:text-base text-gray-900 hover:text-blue-700">BERANDA</a>
                <a href="#Pencarian"
                    class="text-xs md:text-sm lg:text-base text-gray-900 hover:text-blue-700 leading-tight text-center">CARI
                    LAUNDRY</a>
                <a href="#keunggulan"
                    class="text-xs md:text-sm lg:text-base text-gray-900 hover:text-blue-700 leading-tight text-center">
                    KEUNGGULAN KAMI
                </a>
                <a href="#tentangKami"
                    class="text-xs md:text-sm lg:text-base text-gray-900 hover:text-blue-700 leading-tight text-center">
                    TENTANG KAMI
                </a>
                <a href="#hubungiKami"
                    class="text-xs md:text-sm lg:text-base text-gray-900 hover:text-blue-700 leading-tight text-center">
                    HUBUNGI KAMI
                </a>
            </div>

            <!-- Buttons Section -->
            <div class="hidden md:flex items-center space-x-1 lg:space-x-4">
                <a href="{{ url('/daftar') }}"
                    class="text-xs py-1 px-4 md:py-2 md:px-6 lg:py-2 lg:px-8 text-xs md:text-sm lg:text-base text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    DAFTAR
                </a>
                <a href="{{ url('/masuk') }}"
                    class="text-xs py-1 px-4 md:py-2 md:px-6 lg:py-2 lg:px-8 text-xs md:text-sm lg:text-base text-black border border-black rounded-full hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">
                    MASUK
                </a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden bg-gray-100 flex flex-col items-center space-y-4 py-4 md:hidden">
            <a href="#hero" class="text-gray-900 hover:text-blue-700">BERANDA</a>
            <a href="#Pencarian" class="text-gray-900 hover:text-blue-700">CARI LAUNDRY</a>
            <a href="#keunggulan" class="text-gray-900 hover:text-blue-700">KEUNGGULAN KAMI</a>
            <a href="#tentangKami" class="text-gray-900 hover:text-blue-700">TENTANG KAMI</a>
            <a href="#hubungiKami" class="text-gray-900 hover:text-blue-700">HUBUNGI KAMI</a>
            <div class="flex items-center space-x-2">
                <a href="{{ url('/daftar') }}"
                    class="py-2 px-6 text-xs text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    DAFTAR
                </a>
                <a href="{{ url('/masuk') }}"
                    class="py-2 px-6 text-xs text-black border border-black rounded-full hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">
                    MASUK
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    @include('homepage.sections.hero-section')

    <!-- Filter Pencarian Laundry -->
    <!-- homepage/components/filter-pencarian.blade.php -->
    <div class="flex flex-col items-center justify-center min-h-screen w-full py-12 bg-gradient-to-b from-blue-800 to-cyan-600 md:my-20 mt-10 md:mt-10" id="Pencarian">
        <form action="{{ route('pencarian.search') }}" method="GET" class="w-full flex justify-center px-4">
            <div class="w-full max-w-[900px] backdrop-blur-md bg-white/10 rounded-[40px] p-8 lg:p-12" 
                 style="box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);">
                
                <h2 class="text-2xl lg:text-4xl text-center text-white font-bold mb-12" data-aos="fade-down">
                    PENCARIAN LAUNDRY TERDEKAT
                </h2>
    
                <div class="flex flex-col lg:flex-row justify-between gap-8" data-aos="fade-up">
                    <!-- Service Section -->
                    <div class="flex-1 bg-blue-600/90 rounded-3xl p-6 lg:p-8 transition-all duration-300 hover:bg-blue-700/90">
                        <h3 class="text-xl text-white font-semibold mb-6">Service yang disediakan:</h3>
                        <div class="grid grid-cols-1 gap-4">
                            @foreach (['Cuci Karpet', 'Cuci Sepatu', 'Cuci Jas', 'Cuci Setrika', 'Cuci Kering Lipat'] as $service)
                            <label class="flex items-center gap-3 group cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" name="services[]" value="{{ $service }}"
                                        @if(in_array($service, old('services', []))) checked @endif
                                        class="peer appearance-none w-5 h-5 border-2 border-white/50 rounded-md checked:bg-blue-500 checked:border-blue-500 transition-all duration-300">
                                    <svg class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3 h-3 pointer-events-none opacity-0 peer-checked:opacity-100 text-white transition-opacity"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-lg text-white group-hover:text-blue-200 transition-colors">{{ $service }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
    
                    <!-- Duration Section -->
                    <div class="flex-1 bg-blue-600/90 rounded-3xl p-6 lg:p-8 transition-all duration-300 hover:bg-blue-700/90">
                        <h3 class="text-xl text-white font-semibold mb-6">Lama Pengerjaan:</h3>
                        <div class="grid grid-cols-1 gap-4">
                            @foreach (['Reguler', 'Express', 'Kilat'] as $duration)
                            <label class="flex items-center gap-3 group cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" name="durations[]" value="{{ $duration }}"
                                        @if(in_array($duration, old('durations', []))) checked @endif
                                        class="peer appearance-none w-5 h-5 border-2 border-white/50 rounded-md checked:bg-blue-500 checked:border-blue-500 transition-all duration-300">
                                    <svg class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3 h-3 pointer-events-none opacity-0 peer-checked:opacity-100 text-white transition-opacity"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-lg text-white group-hover:text-blue-200 transition-colors">{{ $duration }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
    
                <div class="flex justify-center mt-12" data-aos="fade-up" data-aos-delay="200">
                    <button type="submit"
                        class="group relative px-16 py-4 bg-blue-600 text-white text-lg rounded-full overflow-hidden transition-all duration-300 hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/30">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative flex items-center gap-3">
                            CARI
                            <img src="{{ asset('images/icons/iconKaca.svg') }}" alt="" class="w-5 h-5 group-hover:scale-110 transition-transform">
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- search_results.blade.php -->
    <!-- Hasil Pencarian -->
    <!-- Hasil Pencarian -->
    @if(isset($groupedServices))
    @include('homepage.components.merchant-card', ['groupedServices' => $groupedServices])
    @endif
    <!-- Keunggulan Section -->
    @include('homepage.sections.keunggulan-section')

    <!-- Tentang Kami -->
    @include('homepage.sections.tentangkami-section')

    <!-- Footer -->
    @include('homepage.sections.footer-section')

    </div>
    <script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuLinks = document.querySelectorAll('#mobile-menu a');

    // Fungsi untuk toggle menu
    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Tutup menu ketika link diklik
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden'); // Sembunyikan menu
        });
    });
    </script>

</html>
