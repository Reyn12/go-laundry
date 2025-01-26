<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <form action="{{ route('merchant.register.store') }}" method="POST" id="signupForm" class="space-y-5 w-full text-center text-gray-800">
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
                    />
                </div>

                <!-- Email -->
                <div>
                    <input
                        type="email"
                        placeholder="Email"
                        name="email"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-gray-100 text-gray-900 outline-none focus:ring-2 focus:ring-blue-500"
                    />
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
                </div>

                <!-- Upload Foto -->
                <div class="text-left">
                    <label class="block mb-2 text-gray-800 font-semibold">Upload Foto Laundry:</label>
                    <div class="w-full p-4 border-2 border-dashed border-gray-300 rounded-lg bg-gray-100 flex justify-center items-center">
                        <input type="file" name="laundryPhoto" class="hidden" id="fileInput">
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

    <script>
        $(document).ready(function() {
            $('#signupForm').on('submit', function(e) {
                e.preventDefault();
                
                // Log form data
                console.log('Form data:', $(this).serialize());
                
                $.ajax({
                    url: "{{ route('merchant.register.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log('Success response:', response);
                        if(response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Proses pengajuan pembukaan toko kamu sedang kami proses ya',
                                showCancelButton: true,
                                confirmButtonText: 'Login Sekarang',
                                cancelButtonText: 'Kembali',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/merchant/login';
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Error response:', xhr.responseJSON);
                        console.log('Status:', status);
                        console.log('Error:', error);
                        
                        let errorMessage = '';
                        
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            for(let key in errors) {
                                errorMessage += errors[key][0] + '<br>';
                            }
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else {
                            errorMessage = 'Terjadi kesalahan saat registrasi. Silakan coba lagi.';
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: errorMessage
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
