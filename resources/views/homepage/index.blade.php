<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
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
    <div class="flex flex-col items-center justify-center min-h-screen w-full py-12" id="Pencarian">
        <form action="{{ url('/search-laundry') }}" method="GET" class="w-full flex justify-center">
            <div class="flex flex-col items-center w-full max-w-[900px] bg-white rounded-[56px] shadow-lg p-6"
                style="box-shadow: 0px 4px 24px 4px rgba(0, 0, 0, 0.5);">
                <h2 class="text-2xl lg:text-4xl text-center text-black mb-6">PENCARIAN LAUNDRY TERDEKAT</h2>

                <div class="flex flex-col lg:flex-row justify-center items-stretch w-full gap-6">
                    <!-- Service Section -->
                    <div class="flex flex-col w-full lg:w-1/2 bg-white rounded-xl border border-gray-300 shadow-md p-6"
                        style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                        <h3 class="text-lg lg:text-xl text-black mb-4">Service yang disediakan:</h3>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            @foreach ([ 'Cuci Karpet', 'Cuci Sepatu', 'Cuci Jas',
                            'Cuci Setrika', 'Cuci Karpet', 'Cuci Kering Lipat'] as $service)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="services[]" value="{{ $service }}" @if(in_array($service,
                                    old('services', []))) checked @endif class="w-4 h-4">
                                <span class="text-base lg:text-lg text-black">{{ $service }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Duration Section -->
                    <div class="flex flex-col w-full lg:w-1/2 bg-white rounded-xl border border-gray-300 shadow-md p-6"
                        style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                        <h3 class="text-lg lg:text-xl text-black mb-4">Lama Pengerjaan:</h3>
                        <div class="grid grid-cols-1 gap-4">
                            @foreach (['Reguler', 'Express', 'Kilat'] as $duration)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="durations[]" value="{{ $duration }}"
                                    @if(in_array($duration, old('durations', []))) checked @endif class="w-4 h-4">
                                <span class="text-base lg:text-lg text-black">{{ $duration }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="mt-6 px-12 py-3 bg-blue-700 text-white text-lg rounded-full shadow hover:bg-blue-600 flex items-center gap-2">
                    CARI
                    <img src="{{ asset('images/icons/iconKaca.svg') }}" alt="" class="w-5 h-5">
                </button>
            </div>
        </form>
    </div>
    <!-- search_results.blade.php -->
    <!-- Hasil Pencarian -->
    <!-- Hasil Pencarian -->
    @if(isset($layananLaundries) && count($layananLaundries) > 0)
    @include('homepage.components.merchant-card', ['layananLaundries' => $layananLaundries])
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