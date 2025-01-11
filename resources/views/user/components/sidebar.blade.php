{{-- Sidebar Component --}}
<div class="fixed left-0 top-0 w-20 bg-white shadow-lg h-screen flex flex-col items-center py-5 space-y-8">
    <!-- Logo -->
    <div class="mb-8">
        <img src="{{ asset('images/logoGolaundry.png') }}" alt="Logo" class="w-12 h-12">
    </div>

    <!-- Navigation Items -->
    <nav class="flex flex-col items-center space-y-6">
       <!-- Home -->
       <a href="/user/dashboard" id="dashboard" class="menu-sidebar p-2 hover:bg-gray-100 rounded-lg ">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
        </a>

        <!-- Search -->
        <a href="/user/pencarian" id="search" class="menu-sidebar p-2 hover:bg-gray-100 rounded-lg ">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </a>

        <!-- Menu -->
        <a href="/user/pelacakan" id="menu" class="menu-sidebar p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </a>

        <!-- History -->
        <a href="/user/riwayat" id="history" class="menu-sidebar p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </a>
    </nav>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuItems = document.querySelectorAll(".menu-sidebar");

        // Fungsi untuk menandai menu aktif
        function setActiveMenu(menuId) {
            // Hapus status aktif dari semua menu
            menuItems.forEach((menu) => menu.classList.remove("bg-primary", "text-white"));

            // Tambahkan status aktif ke menu yang diklik
            const activeMenu = document.getElementById(menuId);
            if (activeMenu) {
                activeMenu.classList.add("bg-primary", "text-white");
            }

            // Simpan menu aktif ke LocalStorage
            localStorage.setItem("activeMenu", menuId);
        }

        // Event listener untuk klik pada menu
        menuItems.forEach((item) => {
            item.addEventListener("click", function (event) {
                const menuId = this.getAttribute("id");
                setActiveMenu(menuId);
            });
        });

        // Pulihkan menu aktif dari LocalStorage saat halaman dimuat
        const activeMenu = localStorage.getItem("activeMenu");
        if (activeMenu) {
            setActiveMenu(activeMenu);
        }
    });
</script>
