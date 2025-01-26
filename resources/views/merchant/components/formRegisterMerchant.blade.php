<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Form Daftar Kemitraan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-300">
    <div class="w-full md:w-2/3 bg-gray-300 flex items-center justify-center">
        <div class="w-full max-w bg-white p-12 rounded-2xl shadow-lg overflow-y-auto max-h-screen">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-2 text-gray-800">Daftar Kemitraan</h1>
                <p class="text-gray-600">
                    Sudah punya akun? 
                    <a href="/merchant/login" class="text-blue-600 hover:text-blue-700 font-medium transition-colors">Log In</a>
                </p>
            </div>
            <form id="merchantForm" class="space-y-5 w-full text-center text-gray-800">
                @csrf
                <!-- Nama Laundry -->
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Nama Laundry"
                        name="laundryName"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <!-- Alamat Laundry -->
                <div>
                    <input
                        type="text"
                        placeholder="Alamat Laundry"
                        name="laundryAddress"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <input
                        type="text"
                        placeholder="Nomor Telepon"
                        name="phone"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        maxlength="15"
                    />
                    <span class="text-red-500 text-sm hidden" id="phoneError">Nomor telepon hanya boleh berisi angka</span>
                </div>

                <!-- Email -->
                <div>
                    <input
                        type="email"
                        placeholder="Email"
                        name="email"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <span class="text-red-500 text-sm hidden" id="emailError">Email harus menggunakan domain @gmail.com</span>
                </div>

                <!-- Password -->
                <div>
                    <input
                        type="password"
                        placeholder="Password"
                        name="password"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <input
                        type="password"
                        placeholder="Konfirmasi Password"
                        name="password_confirmation"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <!-- Deskripsi -->
                <div>
                    <textarea
                        placeholder="Deskripsi"
                        name="description"
                        rows="4"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                    ></textarea>
                </div>

                <!-- Jam Operasional -->
                <div>
                    <input
                        type="text"
                        placeholder="Jam Operasional"
                        name="operationalHours"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <!-- Pilihan Paket Laundry -->
                <div class="text-left">
                    <p class="text-gray-800 font-semibold mb-2">Pilih Paket Laundry yang akan disediakan:</p>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="services" value="Cuci, Lipat, dan Setrika" class="mr-2">
                            Cuci, Lipat, dan Setrika
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services" value="Cuci Duvet/Bedcover" class="mr-2">
                            Cuci Duvet/Bedcover
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services" value="Cuci Mobil/Motor" class="mr-2">
                            Cuci Mobil/Motor
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services" value="Cuci Jas" class="mr-2">
                            Cuci Jas
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services" value="Cuci Sepatu" class="mr-2">
                            Cuci Sepatu
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services" value="Setrika" class="mr-2">
                            Setrika
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services" value="Cuci Karpet" class="mr-2">
                            Cuci Karpet
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services" value="Cuci Baju Kerja" class="mr-2">
                            Cuci Baju Kerja
                        </label>
                    </div>
                    <span class="text-red-500 text-sm hidden services-error">Pilih minimal satu paket laundry</span>
                </div>

                <!-- Upload Foto -->
                <div class="text-left">
                    <label class="block mb-2 text-gray-800 font-semibold">Upload Foto Laundry (Opsional):</label>
                    <div class="w-full p-4 border-2 border-dashed border-gray-300 rounded-lg bg-gray-100 flex justify-center items-center">
                        <input type="file" name="laundryPhoto" class="hidden" id="fileInput" accept="image/*">
                        <label for="fileInput" class="cursor-pointer text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16s1-1 3-1 3 1 5 1 3-1 5-1 3 1 3 1m-3 4H6a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V18a2 2 0 01-2 2z"/>
                            </svg>
                            <span>Upload Foto Laundry</span>
                        </label>
                    </div>
                </div>

                <!-- Syarat dan Ketentuan -->
                <div class="text-left">
                    <label class="flex items-center">
                        <input type="checkbox" name="terms" class="mr-2">
                        Saya menyetujui <a href="#" class="text-blue-600 hover:underline">syarat & ketentuan</a>
                    </label>
                    <span class="text-red-500 text-sm hidden terms-error">Anda harus menyetujui syarat dan ketentuan</span>
                </div>

                <!-- Tombol Submit -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors"
                >
                    BUAT AKUN
                </button>
            </form>
        </div>
    </div>

    @include('merchant.components.scriptPopupRegisterMerchant')
</body>
</html>