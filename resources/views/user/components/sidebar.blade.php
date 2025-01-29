<!-- Sidebar Component -->
<div class="fixed left-0 top-0 w-20 bg-gray-100 shadow-lg h-screen flex flex-col items-center py-5 space-y-8 z-10">
    <!-- Logo -->
    <div class="mb-8">
        <img src="{{ asset('images/logoGolaundry.png') }}" alt="Logo" class="w-12 h-12">
    </div>

    <!-- Navigation Items -->
    <nav class="flex flex-col items-center space-y-6">
        <a href="/user/dashboard" id="dashboard" class="menu-sidebar p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
        </a>
        <a href="/user/pencarian" id="search" class="menu-sidebar p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </a>
        <a href="/user/ulasan" id="ulasan" class="menu-sidebar p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.302 7.073a1 1 0 00.95.69h7.427c.969 0 1.371 1.24.588 1.81l-6.018 4.366a1 1 0 00-.364 1.118l2.302 7.073c.3.921-.755 1.688-1.54 1.118l-6.018-4.366a1 1 0 00-1.176 0l-6.018 4.366c-.784.57-1.839-.197-1.54-1.118l2.302-7.073a1 1 0 00-.364-1.118L2.116 12.5c-.783-.57-.38-1.81.588-1.81h7.427a1 1 0 00.95-.69l2.302-7.073z"></path>
            </svg>
        </a>
        <a href="/user/pelacakan" id="pelacakan" class="menu-sidebar p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </a>
        <a href="/user/riwayat" id="history" class="menu-sidebar p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </a>
    </nav>

    <!-- Bottom Icons -->
    <div class="mt-auto flex flex-col items-center space-y-6">
        <a href="#" class="p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
        </a>
        <a href="#" class="p-2 hover:bg-gray-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="p-2 hover:bg-gray-100 rounded-lg mb-4">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const menuItems = document.querySelectorAll(".menu-sidebar");

        // Set active menu
        function setActiveMenu(menuId) {
            menuItems.forEach(menu => menu.classList.remove("bg-primary", "text-white"));
            const activeMenu = document.getElementById(menuId);
            if (activeMenu) {
                activeMenu.classList.add("bg-primary", "text-white");
            }
            localStorage.setItem("activeMenu", menuId);
        }

        menuItems.forEach(item => {
            item.addEventListener("click", () => {
                const menuId = item.getAttribute("id");
                setActiveMenu(menuId);
            });
        });

        // Restore active menu
        const activeMenu = localStorage.getItem("activeMenu");
        if (activeMenu) setActiveMenu(activeMenu);
    });
</script>
