<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penarikan Saldo</title>
    <!-- CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    {{-- container --}}
    <div class="w-full h-screen flex bg-gray-100">
    {{-- Include Sidebar Component --}}
    @include('merchant.components.merchantsidebar')

    <!-- Konten utama -->
    <div class="flex-1 h-full p-4 overflow-y-auto">
        <!-- Header -->
        <div class="sticky top-0 z-10 mb-4 bg-white p-4 rounded-lg shadow">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-lg font-semibold">{{ $mainTitle ?? $title ?? 'Penarikan Saldo' }}</h1>
                    <p class="text-sm text-gray-500">{{ date('d F Y') }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </span>
                        <input type="search" class="pl-10 pr-4 py-2 w-64 rounded-full bg-gray-100 focus:outline-none" placeholder="Search">
                    </div>
                    {{-- Theme Toggle --}}
                    <div class="theme-toggle flex items-center bg-gray-100 rounded-full p-1 space-x-3">
                        <button class="p-1 rounded-full bg-white">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                            </svg>
                        </button>
                        <button class="p-1">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Profile -->
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/icons/iconProfile.svg') }}" alt="Profile" class="w-full h-full object-cover">
                        </div>
                        <span class="font-medium">Krisna Ariangga</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <main class="p-10 flex-1">
            <div class="bg-gray-200 p-8 rounded-lg shadow-lg">
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Saldo Merchant</label>
                    <input type="text" readonly value="Rp.2.500.000" class="w-full bg-gray-100 border rounded-lg py-2 px-4">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Rekening / E Wallet</label>
                    <select class="w-full bg-white border rounded-lg py-2 px-4">
                        <option>BNI</option>
                        <option>BRI</option>
                        <option>BCA</option>
                        <option>Mandiri</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">No Hp / No Rekening</label>
                    <input type="text" value="10122020" class="w-full bg-white border rounded-lg py-2 px-4">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Jumlah Tarik Saldo</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500">Rp.</span>
                        </div>
                        <input type="number" value="1000000" class="pl-10 w-full bg-white border rounded-lg py-2 px-4">
                    </div>
                </div>
                <div class="flex justify-end gap-4">
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-lg">Tarik Saldo</button>
                    <button class="bg-red-500 text-white px-6 py-2 rounded-lg">Cancel</button>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
