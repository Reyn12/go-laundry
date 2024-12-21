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
            <a href="" class="flex items-center">
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
                <a href="" class="text-xs md:text-sm lg:text-base text-gray-900 hover:text-blue-700">BERANDA</a>
                <a href="#"
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
                <a href="#"
                    class="text-xs py-1 px-4 md:py-2 md:px-6 lg:py-2 lg:px-8 text-xs md:text-sm lg:text-base text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    DAFTAR
                </a>
                <a href="#"
                    class="text-xs py-1 px-4 md:py-2 md:px-6 lg:py-2 lg:px-8 text-xs md:text-sm lg:text-base text-black border border-black rounded-full hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">
                    MASUK
                </a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden bg-gray-100 flex flex-col items-center space-y-4 py-4 md:hidden">
            <a href="#" class="text-gray-900 hover:text-blue-700">BERANDA</a>
            <a href="#" class="text-gray-900 hover:text-blue-700">CARI LAUNDRY</a>
            <a href="#keunggulan" class="text-gray-900 hover:text-blue-700">KEUNGGULAN KAMI</a>
            <a href="#tentangKami" class="text-gray-900 hover:text-blue-700">TENTANG KAMI</a>
            <a href="#hubungiKami" class="text-gray-900 hover:text-blue-700">HUBUNGI KAMI</a>
            <div class="flex items-center space-x-2">
                <a href="#"
                    class="py-2 px-6 text-xs text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    DAFTAR
                </a>
                <a href="#"
                    class="py-2 px-6 text-xs text-black border border-black rounded-full hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">
                    MASUK
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->


    <!-- Keunggulan Section -->
    <section id="keunggulan" class="py-10 bg-gray-100">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-4xl text-center mb-10">KEUNGGULAN KAMI</h2>
            <div class="space-y-8">
                <!-- Card 1 -->
                <div class="bg-white p-8 rounded-[36px] shadow-md flex flex-col md:flex-row items-center">
                    <!-- Text -->
                    <div class="ml-0 md:ml-6 py-2 text-center md:text-left">
                        <h3 class="text-3xl py-6">Mudah Digunakan</h3>
                        <p class="mt-2 text-black py-2 max-w-5xl">
                            GO-LAUNDRY memiliki antarmuka yang sederhana,
                            memudahkan pelanggan untuk memesan layanan laundry hanya dalam beberapa langkah.
                        </p>
                    </div>
                    <!-- Icon -->
                    <div class="w-40 h-40 md:w-64 md:h-64 p-4 md:p-8">
                        <img src="{{ asset('images/easyToUse.png') }}" alt="Mudah Digunakan"
                            class="w-full h-full object-contain">
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-blue-700 p-8 rounded-[36px] shadow-md flex flex-col md:flex-row items-center">
                    <!-- Icon -->
                    <div class="w-40 h-40 md:w-64 md:h-64 p-4 md:p-8">
                        <img src="{{ asset('images/quality.png') }}" alt="Berkualitas"
                            class="w-full h-full object-contain">
                    </div>
                    <!-- Text -->
                    <div class="ml-0 md:ml-6 py-2 text-center md:text-left">
                        <h3 class="text-white text-3xl py-6">Berkualitas</h3>
                        <p class="mt-2 text-white py-2 max-w-5xl">
                            Kami bekerja sama dengan penyedia laundry terbaik yang
                            menggunakan peralatan modern untuk memastikan hasil cuci dan setrika yang sempurna.
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-8 rounded-[36px] shadow-md flex flex-col md:flex-row items-center">
                    <!-- Text -->
                    <div class="ml-0 md:ml-6 py-2 text-center md:text-left">
                        <h3 class="text-3xl py-6">Terpercaya</h3>
                        <p class="mt-2 text-black py-2 max-w-5xl">
                            GO-LAUNDRY memberikan jaminan kualitas dan keamanan
                            untuk setiap pakaian Anda, dengan sistem pelacakan pesanan yang transparan.
                        </p>
                    </div>
                    <!-- Icon -->
                    <div class="w-40 h-40 md:w-64 md:h-64 p-4 md:p-8">
                        <img src="{{ asset('images/trust.png') }}" alt="Terpercaya"
                            class="w-full h-full object-contain">
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-blue-700 p-8 rounded-[36px] shadow-md flex flex-col md:flex-row items-center">
                    <!-- Icon -->
                    <div class="w-40 h-40 md:w-64 md:h-64 p-4 md:p-8">
                        <img src="{{ asset('images/bestPrice.png') }}" alt="Harga Transparan"
                            class="w-full h-full object-contain">
                    </div>
                    <!-- Text -->
                    <div class="ml-0 md:ml-6 py-2 text-center md:text-left">
                        <h3 class="text-white text-3xl py-6">Harga Transparan</h3>
                        <p class="mt-2 text-white py-2 max-w-5xl">
                            Semua harga kami sudah jelas tercantum tanpa biaya tersembunyi,
                            memastikan pelanggan tahu persis biaya yang dibayar sebelum melakukan pemesanan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="tentangKami" class="h-auto py-10 bg-white mb-10">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-center text-4xl p-4">TENTANG KAMI</h2>
            <div class="flex flex-col md:flex-row items-center">
                <!-- Text Section -->
                <div class="md:w-2/3 text-gray-700 text-justify md:pr-8">
                    <p class="m-4 leading-9">
                        Aplikasi Go Laundry adalah solusi praktis untuk kebutuhan laundry Anda, dirancang dengan tujuan
                        memberikan kenyamanan dan efisiensi dalam proses pencucian pakaian. Aplikasi ini dikembangkan
                        pada
                        tahun 2024 oleh mahasiswa semester 5 Program Studi Teknik Informatika UNIKOM, sebagai bagian
                        dari
                        proyek mata kuliah Rekayasa Perangkat Lunak 2.
                        Kami berkomitmen untuk mempermudah pengalaman pengguna dalam memilih layanan laundry yang
                        terpercaya, dengan antarmuka yang sederhana dan mudah digunakan. Go Laundry hadir untuk memenuhi
                        kebutuhan masyarakat akan layanan laundry yang cepat, praktis, dan dapat diandalkan.
                    </p>
                </div>
                <!-- Logo Section -->
                <div class="md:w-1/3 mt-6 md:mt-0 flex justify-center">
                    <img src="{{ asset('images/LogoGoLaundry.png') }}" alt="logoLaundry" class="w-128 h-128">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="hubungiKami" class="bg-blue-700 text-white py-10">
        <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Find Us Section -->
            <div>
                <h3 class="font-thin mb-4">FIND US</h3>
                <p>Jl. Dipati Ukur No.100, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40251</p>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:underline">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <!-- Empty Middle Section (for spacing) -->
            <div></div>

            <!-- Contact Us Section -->
            <div>
                <h3 class="font-thin mb-4">CONTACT US</h3>
                <ul class="space-y-2">
                    <li class="flex items-center space-x-2">
                        <span><img src="{{ asset('/images/icons/iconEmail.svg') }}" alt="iconEmail"
                                class="w-full h-full"></span>
                        <span>golaundry@gmail.com</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span><img src="{{ asset('/images/icons/iconPhone.svg') }}" alt="iconEmail"
                                class="w-full h-full"></span>
                        <span>081222222222</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span><img src="{{ asset('/images/icons/iconWhatsapp.svg') }}" alt="iconEmail"
                                class="w-full h-full"></span>
                        <span>085444444444</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span><img src="{{ asset('/images/icons/iconInstagram.svg') }}" alt="iconEmail"
                                class="w-full h-full"></span>
                        <span>go_laundry</span>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

</body>
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