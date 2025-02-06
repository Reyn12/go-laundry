<!-- Background dengan gradien -->
<div class="relative min-h-screen flex items-center justify-center px-4 lg:px-12 py-10 bg-black overflow-hidden mx-2 md:mx-8 mt-4 md:mt-12 rounded-[30px] md:rounded-[90px]" data-aos="fade-up" data-aos-duration="1000">
    <!-- Gradient Blur Effects -->
    <div class="absolute top-0 left-10 md:left-60 w-1/2 h-1/2 bg-blue-800 rounded-full mix-blend-screen filter blur-[96px] opacity-50 animate-blob"></div>
    <div class="absolute top-1/2 right-0 w-1/2 h-1/2 bg-purple-600 rounded-full mix-blend-screen filter blur-[96px] opacity-50 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-5 md:left-20 w-1/2 h-1/2 bg-pink-600 rounded-full mix-blend-screen filter blur-[96px] opacity-50 animate-blob animation-delay-4000"></div>

    <div class="container mx-auto relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-5 md:gap-10">
            <!-- Bagian Kiri - Text Content -->
            <div class="flex-1 z-10 text-center lg:text-left">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-bold mb-4 md:mb-6 space-y-8" data-aos="fade-right" data-aos-delay="200">
                    <span class="text-white block mb-12">GO-LAUNDRY</span>
                    <div class="space-y-2">
                        <span class="text-gray-200 font-light">Temukan Laundry</span>
                        <span class="text-blue-400 font-bold">Terdekat</span><br/>
                        <span class="text-gray-200 font-light">dengan</span>
                        <span class="text-blue-400 font-bold">Mudah!</span>
                    </div>
                </h1>
                
                <!-- Stats Section -->
                <div class="flex justify-center lg:justify-start gap-8 mb-6 md:mb-8" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-center">
                        <h3 class="text-3xl md:text-4xl font-bold text-blue-400">
                            <span class="counter" data-target="4.8" data-decimal="true"></span>
                        </h3>
                        <p class="text-sm md:text-base text-gray-300">Rating App</p>
                    </div>
                    <div class="text-center">
                        <h3 class="text-3xl md:text-4xl font-bold text-blue-400">
                            <span class="counter" data-target="856"></span><span>+</span>
                        </h3>
                        <p class="text-sm md:text-base text-gray-300">Pengguna Aktif</p>
                    </div>
                </div>

                <a href="#Pencarian" class="inline-block mt-[100px] md:mt-0" data-aos="fade-up" data-aos-delay="600">
                    <div class="bg-blue-600 text-white px-[100px] md:px-18 py-3 md:py-4 rounded-full hover:bg-blue-700 transition-colors md:mt-12">
                        <span class="text-base md:text-lg font-medium">Cari Laundry</span>
                    </div>
                </a>
            </div>

            <!-- Bagian Kanan - Floating Images -->
            <div class="flex-1 relative h-[400px] md:h-[600px] hidden lg:block">
                <!-- Gambar Laundry di tengah atas -->
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-48 md:w-56 -ml-10 md:-ml-14 h-auto animate-float-fast" data-aos="fade-down" data-aos-delay="300">
                    <img src="{{ asset('images/bgHero3.svg') }}" alt="Floating 3" class="w-full h-auto rounded-2xl">
                </div>
                <!-- Gambar kanan -->
                <div class="absolute top-40 md:top-60 right-10 w-56 md:w-72 h-auto animate-float-slow" data-aos="fade-left" data-aos-delay="500">
                    <img src="{{ asset('images/bgHero1.svg') }}" alt="Floating 1" class="w-full h-auto rounded-2xl bg-white">
                </div>
                <!-- Gambar kiri -->
                <div class="absolute top-40 -mb-10 left-0 w-52 md:w-64 h-auto animate-float-medium" data-aos="fade-right" data-aos-delay="700">
                    <img src="{{ asset('images/bgHero2.svg') }}" alt="Floating 2" class="w-full h-auto rounded-2xl bg-red-50">
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes float-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    @keyframes float-medium {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    @keyframes float-fast {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    .animate-float-slow {
        animation: float-slow 6s ease-in-out infinite;
    }
    .animate-float-medium {
        animation: float-medium 5s ease-in-out infinite;
    }
    .animate-float-fast {
        animation: float-fast 4s ease-in-out infinite;
    }
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    .counter {
        display: inline-block;
        opacity: 0;
        transform: translateY(10px);
        animation: fadeInUp 0.6s ease forwards;
    }
    
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('.counter');
        
        counters.forEach(counter => {
            const target = parseFloat(counter.getAttribute('data-target'));
            const decimal = counter.getAttribute('data-decimal') === 'true';
            const duration = 2000; // 2 detik
            const steps = 60;
            const stepDuration = duration / steps;
            
            let current = 0;
            const increment = target / steps;
            
            const updateCounter = () => {
                current += increment;
                if (current > target) current = target;
                
                counter.textContent = decimal ? current.toFixed(1) : Math.floor(current);
                
                if (current < target) {
                    setTimeout(updateCounter, stepDuration);
                }
            };
            
            // Mulai animasi setelah delay kecil
            setTimeout(updateCounter, 300);
        });
    });
</script>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    // Initialize AOS
    AOS.init({
        once: true, // animation hanya jalan sekali
        mirror: false,
        offset: 50
    });
</script>