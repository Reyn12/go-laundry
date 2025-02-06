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
    <div class="w-full md:w-2/3 min-h-screen bg-gray-300">
        <div class="w-full h-full bg-white">
            <!-- Header Section -->
            <div class="gradient-bg text-white py-6">
                <div class="text-center">
                    <h1 class="text-3xl font-bold">Daftar Kemitraan</h1>
                    <p class="mt-2">
                        Sudah punya akun? 
                        <a href="/merchant/login" class="text-white hover:text-blue-200 font-medium underline transition-colors">Log In</a>
                    </p>
                </div>
            </div>

            <!-- Form Section -->
            <div class="px-8 py-6 mt-24">
                <form id="merchantForm" class="max-w-4xl mx-auto gap-12">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Username -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input
                                type="text"
                                name="username"
                                placeholder="Masukkan username"
                                class="w-full p-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        <!-- Nama Laundry -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Laundry</label>
                            <input
                                type="text"
                                name="laundryName"
                                placeholder="Masukkan nama laundry"
                                class="w-full p-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        <!-- Alamat Laundry -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Laundry</label>
                            <input
                                type="text"
                                name="laundryAddress"
                                placeholder="Masukkan alamat laundry"
                                required
                                class="w-full p-3 pr-12 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                            />
                            <button 
                                type="button"
                                onclick="getLocation()"
                                class="absolute right-2 top-[60%] -translate-y-1/2 p-2 text-gray-600 hover:text-blue-600 focus:outline-none"
                            >
                                <i class="fas fa-map-marker-alt"></i>
                            </button>
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <input
                                type="text"
                                name="phone"
                                placeholder="Masukkan nomor telepon"
                                class="w-full p-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                maxlength="15"
                            />
                            <span class="text-red-500 text-xs mt-1 hidden" id="phoneError">Nomor telepon hanya boleh berisi angka</span>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input
                                type="email"
                                name="email"
                                placeholder="Masukkan email"
                                class="w-full p-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                            />
                            <span class="text-red-500 text-xs mt-1 hidden" id="emailError">Email harus menggunakan domain @gmail.com</span>
                        </div>

                        <!-- Jam Operasional -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jam Operasional</label>
                            <input
                                type="text"
                                name="operationalHours"
                                placeholder="Contoh: 08:00 - 17:00"
                                class="w-full p-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input
                                type="password"
                                name="password"
                                placeholder="Masukkan password"
                                class="w-full p-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        <!-- Konfirmasi Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                placeholder="Konfirmasi password"
                                class="w-full p-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        <!-- Deskripsi -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                            <textarea
                                name="description"
                                placeholder="Masukkan deskripsi laundry"
                                rows="3"
                                class="w-full p-3 rounded-lg border border-gray-300 bg-gray-50 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                            ></textarea>
                        </div>

                        <!-- Hidden inputs untuk koordinat -->
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">

                        <!-- Checkbox Syarat dan Ketentuan -->
                        <div class="col-span-2 flex items-center justify-center mt-4">
                            <input 
                                type="checkbox" 
                                name="terms" 
                                id="terms"
                                class="w-5 h-5 mr-3 rounded text-blue-600 border-2 border-gray-300 focus:ring-blue-500 cursor-pointer" 
                            />
                            <span class="text-gray-600">
                                Saya menyetujui 
                                <button type="button" id="openTermsModal" class="text-blue-600 hover:text-blue-700 font-medium">syarat & ketentuan</button>
                            </span>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="col-span-2 mt-6">
                            <button
                                type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold p-4 rounded-lg transition duration-200 shadow-lg text-lg"
                            >
                                Daftar Sekarang
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal backdrop -->
    <div id="modal-backdrop" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity hidden"></div>

    <!-- Modal -->
    <div id="termsModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
            <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-title">
                                Syarat dan Ketentuan Merchant
                            </h3>
                            <div class="mt-4 max-h-[60vh] overflow-y-auto">
                                <div class="space-y-4">
                                    <div>
                                        <h4 class="text-blue-600 font-semibold">1. Identitas dan Legalitas</h4>
                                        <ul class="mt-2 space-y-2 text-gray-600">
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Merchant wajib memberikan data yang valid dan benar</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Memiliki KTP yang masih berlaku</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Memiliki tempat usaha yang tetap</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Bersedia diverifikasi oleh tim kami</span>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div>
                                        <h4 class="text-blue-600 font-semibold">2. Operasional</h4>
                                        <ul class="mt-2 space-y-2 text-gray-600">
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Berkomitmen memberikan layanan berkualitas sesuai standar</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Mengikuti standar kebersihan dan kehigienisan dalam proses laundry</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Menjaga ketepatan waktu pengerjaan sesuai estimasi yang diberikan</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Bertanggung jawab atas kerusakan/kehilangan barang pelanggan</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="text-blue-600 font-semibold">3. Keuangan</h4>
                                        <ul class="mt-2 space-y-2 text-gray-600">
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Menyetujui sistem pembagian komisi yang berlaku di platform</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Tidak membebankan biaya tambahan di luar ketentuan platform</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Menerima pembayaran sesuai sistem yang disediakan platform</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Bersedia memberikan ganti rugi sesuai kebijakan yang berlaku</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="text-blue-600 font-semibold">4. Penggunaan Platform</h4>
                                        <ul class="mt-2 space-y-2 text-gray-600">
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Menjaga kerahasiaan akun dan data pelanggan</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Tidak menyalahgunakan platform untuk hal-hal yang melanggar hukum</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Mengikuti panduan penggunaan aplikasi yang ditetapkan</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="text-blue-600 mr-2">•</span>
                                                <span>Bersedia menerima dan menanggapi pesanan sesuai jam operasional</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" id="agreeButton" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Setuju
                        </button>
                        <button type="button" id="closeModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

    @include('merchant.components.scriptPopupRegisterMerchant')
</body>
</html>