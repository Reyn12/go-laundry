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
                        <h1 class="text-lg font-semibold">Penarikan Saldo</h1>
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
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <main class="p-10 flex-1">
                <div class="bg-gray-200 p-8 rounded-lg shadow-lg">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('merchant.penarikansaldo.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label class="block text-gray-700 font-bold mb-2">Saldo Merchant</label>
                            <input type="text" readonly value="Rp. {{ number_format($saldo->saldo_tersedia ?? 0, 0, ',', '.') }}" class="w-full bg-gray-100 border rounded-lg py-2 px-4">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 font-bold mb-2">Rekening / E Wallet</label>
                            <select name="bank" class="w-full bg-white border rounded-lg py-2 px-4 @error('bank') border-red-500 @enderror">
                                <option value="">Pilih Bank</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                            </select>
                            @error('bank')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 font-bold mb-2">No Hp / No Rekening</label>
                            <input type="text" name="account_number" class="w-full bg-white border rounded-lg py-2 px-4 @error('account_number') border-red-500 @enderror">
                            @error('account_number')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 font-bold mb-2">Jumlah Tarik Saldo</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-gray-500">Rp.</span>
                                </div>
                                <input type="number" name="amount" min="10000" class="w-full pl-12 bg-white border rounded-lg py-2 px-4 @error('amount') border-red-500 @enderror">
                            </div>
                            @error('amount')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Tarik Saldo</button>
                            <button type="button" onclick="window.history.back()" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">Cancel</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
