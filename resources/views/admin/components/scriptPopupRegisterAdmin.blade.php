<script>
    // Setup CSRF token untuk semua request AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const form = document.getElementById('signupForm');
    
    // Fungsi untuk memeriksa validitas form
    function validateForm() {
        const inputs = {
            fullname: form.querySelector('input[name="fullName"]'),
            username: form.querySelector('input[name="username"]'),
            email: form.querySelector('input[name="email"]'),
            phone: form.querySelector('input[name="phone"]'),
            address: form.querySelector('input[name="address"]'),
            password: form.querySelector('input[name="password"]'),
            confirmPassword: form.querySelector('input[name="password_confirmation"]'),
            terms: form.querySelector('input[name="terms"]')
        };
        
        let isValid = true;
        
        // Reset semua pesan error
        form.querySelectorAll('.error-message').forEach(msg => {
            msg.style.display = 'none';
        });
        
        // Validasi nama lengkap
        if (!inputs.fullname.value.trim()) {
            isValid = false;
            inputs.fullname.nextElementSibling.style.display = 'block';
            inputs.fullname.classList.add('border-red-500');
        } else {
            inputs.fullname.classList.remove('border-red-500');
        }

        // Validasi username
        if (!inputs.username.value.trim()) {
            isValid = false;
            inputs.username.nextElementSibling.style.display = 'block';
            inputs.username.classList.add('border-red-500');
        } else {
            inputs.username.classList.remove('border-red-500');
        }
        
        // Validasi email
        const emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/i;
        if (!inputs.email.value.trim() || !emailRegex.test(inputs.email.value)) {
            isValid = false;
            inputs.email.nextElementSibling.style.display = 'block';
            inputs.email.nextElementSibling.textContent = 'Email harus menggunakan domain @gmail.com';
            inputs.email.classList.add('border-red-500');
        } else {
            inputs.email.classList.remove('border-red-500');
        }

        // Validasi nomor telepon
        if (!inputs.phone.value.trim()) {
            isValid = false;
            inputs.phone.nextElementSibling.style.display = 'block';
            inputs.phone.classList.add('border-red-500');
        } else {
            inputs.phone.classList.remove('border-red-500');
        }

        // Validasi alamat
        if (!inputs.address.value.trim()) {
            isValid = false;
            inputs.address.nextElementSibling.style.display = 'block';
            inputs.address.classList.add('border-red-500');
        } else {
            inputs.address.classList.remove('border-red-500');
        }
        
        // Validasi password
        if (!inputs.password.value || inputs.password.value.length < 8) {
            isValid = false;
            inputs.password.nextElementSibling.style.display = 'block';
            inputs.password.classList.add('border-red-500');
        } else {
            inputs.password.classList.remove('border-red-500');
        }
        
        // Validasi konfirmasi password
        if (!inputs.confirmPassword.value || inputs.confirmPassword.value !== inputs.password.value) {
            isValid = false;
            inputs.confirmPassword.nextElementSibling.style.display = 'block';
            inputs.confirmPassword.classList.add('border-red-500');
        } else {
            inputs.confirmPassword.classList.remove('border-red-500');
        }
        
        // Validasi terms
        if (!inputs.terms.checked) {
            isValid = false;
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda harus menyetujui syarat & ketentuan'
            });
        }
        
        return isValid;
    }

    // Event listener untuk form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            // Disable tombol submit
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            
            // Kirim data ke server
            const formData = new FormData(form);
            
            $.ajax({
                url: '{{ route("admin.register.submit") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Registrasi berhasil! Silahkan hubungi super admin untuk aktivasi akun.',
                            confirmButtonText: 'Login Sekarang'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/login';
                            }
                        });
                    } else {
                        submitButton.disabled = false;
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message || 'Terjadi kesalahan saat registrasi'
                        });
                    }
                },
                error: function(xhr) {
                    submitButton.disabled = false;
                    let errorMessage = 'Terjadi kesalahan saat registrasi';
                    
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMessage = Object.values(xhr.responseJSON.errors)[0][0];
                    }
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errorMessage
                    });
                }
            });
        }
    });
</script>

<!-- Modal Syarat dan Ketentuan Admin -->
<div class="modal fade" id="syaratKetentuanModal" tabindex="-1" aria-labelledby="syaratKetentuanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-bold text-xl" id="syaratKetentuanModalLabel">Syarat dan Ketentuan Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body space-y-6">
                <div>
                    <h6 class="font-bold text-lg mb-3 text-blue-600">1. Kualifikasi Admin</h6>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Memiliki pemahaman tentang manajemen laundry</li>
                        <li>Berkomitmen untuk mengelola sistem dengan baik</li>
                        <li>Memiliki kemampuan komunikasi yang baik</li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-bold text-lg mb-3 text-blue-600">2. Tanggung Jawab</h6>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Mengelola dan memantau seluruh aktivitas laundry</li>
                        <li>Memastikan kualitas layanan tetap terjaga</li>
                        <li>Menangani keluhan dan feedback dari pelanggan</li>
                        <li>Menjaga kerahasiaan data pelanggan</li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-bold text-lg mb-3 text-blue-600">3. Keamanan & Privasi</h6>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Wajib menjaga kerahasiaan akun admin</li>
                        <li>Tidak membagikan akses admin kepada pihak lain</li>
                        <li>Menggunakan sistem sesuai dengan prosedur yang berlaku</li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-bold text-lg mb-3 text-blue-600">4. Sanksi</h6>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Penyalahgunaan akses admin akan dikenakan sanksi</li>
                        <li>Hak akses dapat dicabut jika melanggar ketentuan</li>
                        <li>Bertanggung jawab atas kerugian akibat kelalaian</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors" data-bs-dismiss="modal" onclick="setujuSyarat()">Setuju</button>
            </div>
        </div>
    </div>
</div>

<script>
    function setujuSyarat() {
        document.getElementById('checkboxSyarat').checked = true;
    }
</script>