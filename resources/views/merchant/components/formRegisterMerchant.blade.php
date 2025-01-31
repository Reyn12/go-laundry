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
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="agreement" name="agreement" required>
                        <label class="form-check-label" for="agreement">
                            Saya menyetujui <a href="#" class="text-primary" data-modal-trigger>syarat & ketentuan</a>
                        </label>
                    </div>
                    <span class="text-red-500 text-sm hidden terms-error">Anda harus menyetujui syarat dan ketentuan</span>
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