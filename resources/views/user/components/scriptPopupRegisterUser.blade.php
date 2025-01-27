<script>
    // Setup CSRF token untuk semua request AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const form = document.getElementById('signupForm');
    
    // Fungsi untuk menampilkan tooltip error
    function showTooltip(input, message) {
        // Hapus tooltip yang sudah ada
        removeTooltip(input);

        // Buat tooltip baru
        const tooltip = document.createElement('div');
        tooltip.className = 'tooltip-error';
        tooltip.style.cssText = `
            position: absolute;
            right: 0;
            top: 0;
            background: white;
            padding: 4px 8px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 50;
            display: flex;
            align-items: center;
            white-space: nowrap;
            font-size: 12px;
            border: 1px solid #fee2e2;
            margin-top: -25px;
        `;
        
        // Tambah icon warning
        const icon = document.createElement('span');
        icon.innerHTML = '⚠️';
        icon.style.marginRight = '4px';
        
        // Tambah pesan error
        const text = document.createElement('span');
        text.textContent = message;
        text.style.color = '#991b1b';
        
        tooltip.appendChild(icon);
        tooltip.appendChild(text);
        
        // Tambahkan tooltip ke form
        input.parentElement.appendChild(tooltip);
        
        // Tambah class error ke input
        input.classList.add('border-red-500');
        input.classList.remove('border-gray-100', 'focus:border-blue-500');
        input.classList.add('focus:border-red-500');
    }

    // Fungsi untuk menghapus tooltip
    function removeTooltip(input) {
        const tooltip = input.parentElement.querySelector('.tooltip-error');
        if (tooltip) {
            tooltip.remove();
        }
        input.classList.remove('border-red-500', 'focus:border-red-500');
        input.classList.add('border-gray-100', 'focus:border-blue-500');
    }
    
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
        
        // Reset semua tooltip
        form.querySelectorAll('.tooltip-error').forEach(tooltip => tooltip.remove());
        form.querySelectorAll('input').forEach(input => {
            input.classList.remove('border-red-500', 'focus:border-red-500');
            input.classList.add('border-gray-100', 'focus:border-blue-500');
        });
        
        // Validasi semua field required
        Object.entries(inputs).forEach(([key, input]) => {
            if (key !== 'terms' && !input.value.trim()) {
                isValid = false;
                showTooltip(input, 'Please fill out this field');
            }
        });

        // Validasi email format
        if (inputs.email.value.trim() && !inputs.email.value.trim().endsWith('@gmail.com')) {
            isValid = false;
            showTooltip(inputs.email, 'Please use @gmail.com');
        }

        // Validasi nomor telepon harus angka
        const phoneValue = inputs.phone.value.trim();
        if (phoneValue && !/^\d+$/.test(phoneValue)) {
            isValid = false;
            showTooltip(inputs.phone, 'Please enter numbers only');
        }

        // Validasi password length
        if (inputs.password.value && inputs.password.value.length < 8) {
            isValid = false;
            showTooltip(inputs.password, 'Minimum 8 characters');
        }

        // Validasi password match
        if (inputs.confirmPassword.value && inputs.confirmPassword.value !== inputs.password.value) {
            isValid = false;
            showTooltip(inputs.confirmPassword, 'Passwords do not match');
        }
        
        // Validasi terms
        if (!inputs.terms.checked) {
            isValid = false;
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kamu harus menyetujui syarat & ketentuan'
            });
        }
        
        return isValid;
    }

    // Event listener untuk input focus dan input
    form.querySelectorAll('input').forEach(input => {
        input.addEventListener('focus', () => {
            removeTooltip(input);
        });
        
        input.addEventListener('input', () => {
            removeTooltip(input);
            
            // Khusus untuk input nomor telepon
            if (input.name === 'phone') {
                input.value = input.value.replace(/\D/g, '');
            }
        });
    });

    // Event listener untuk mencegah input selain angka di nomor telepon
    const phoneInput = form.querySelector('input[name="phone"]');
    phoneInput.addEventListener('keypress', (e) => {
        if (!/^\d$/.test(e.key) && e.key !== 'Backspace' && e.key !== 'Delete' && e.key !== 'ArrowLeft' && e.key !== 'ArrowRight') {
            e.preventDefault();
        }
    });

    // Mencegah paste teks yang mengandung huruf di nomor telepon
    phoneInput.addEventListener('paste', (e) => {
        e.preventDefault();
        const pastedText = (e.clipboardData || window.clipboardData).getData('text');
        const numbersOnly = pastedText.replace(/\D/g, '');
        phoneInput.value = numbersOnly;
    });

    // Event listener untuk link syarat & ketentuan
    document.querySelector('[data-bs-toggle="modal"]').addEventListener('click', function(e) {
        e.preventDefault();
        $('#syaratKetentuanModal').modal('show');
    });

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
                url: '{{ route("user.register.submit") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Akun kamu berhasil dibuat, silakan login.',
                            confirmButtonText: 'Login Sekarang'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/user/login';
                            }
                        });
                    } else {
                        submitButton.disabled = false;
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message || 'Registrasi gagal'
                        });
                    }
                },
                error: function(xhr) {
                    submitButton.disabled = false;
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        // Cek apakah error terkait email yang sudah terdaftar
                        if (xhr.responseJSON.errors.email && 
                            xhr.responseJSON.errors.email[0].includes('sudah terdaftar')) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Email Sudah Terdaftar',
                                text: 'Email yang kamu masukkan sudah terdaftar, silakan login atau gunakan email lain.',
                                showCancelButton: true,
                                confirmButtonText: 'Login',
                                cancelButtonText: 'Coba Lagi',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/user/login';
                                } else {
                                    const emailInput = form.querySelector('input[name="email"]');
                                    emailInput.focus();
                                    emailInput.select();
                                }
                            });
                        } else {
                            // Untuk error lainnya, tampilkan tooltip seperti biasa
                            const firstErrorField = Object.keys(xhr.responseJSON.errors)[0];
                            const input = form.querySelector(`input[name="${firstErrorField}"]`);
                            if (input) {
                                showTooltip(input, xhr.responseJSON.errors[firstErrorField][0]);
                                input.focus();
                            }
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Registrasi gagal'
                        });
                    }
                }
            });
        }
    });

    function closePopup() {
        document.getElementById('popupOverlay').style.display = 'none';
        form.reset();
    }

    function goToLogin() {
        window.location.href = '/user/login';
    }

    // Tambahkan style untuk animasi
    const style = document.createElement('style');
    style.textContent = `
        .tooltip-error {
            animation: fadeIn 0.2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(style);
</script>

<style>
    .tooltip-error {
        animation: fadeIn 0.2s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-5px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Modal Syarat dan Ketentuan User -->
<div class="modal fade" id="syaratKetentuanModal" tabindex="-1" aria-labelledby="syaratKetentuanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-bold text-xl" id="syaratKetentuanModalLabel">Syarat dan Ketentuan Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body space-y-6">
                <div>
                    <h6 class="font-bold text-lg mb-3 text-blue-600">1. Layanan</h6>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Kami menyediakan layanan laundry dengan standar profesional</li>
                        <li>Estimasi waktu pengerjaan 2-3 hari kerja</li>
                        <li>Pengambilan dan pengantaran sesuai dengan jadwal yang disepakati</li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-bold text-lg mb-3 text-blue-600">2. Tanggung Jawab</h6>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Kami bertanggung jawab atas kehilangan atau kerusakan pakaian selama proses laundry</li>
                        <li>Ganti rugi maksimal 5x biaya laundry untuk kerusakan yang terbukti kesalahan kami</li>
                        <li>Mohon periksa barang sebelum meninggalkan outlet</li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-bold text-lg mb-3 text-blue-600">3. Pembayaran</h6>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Pembayaran dilakukan setelah proses laundry selesai</li>
                        <li>Kami menerima pembayaran tunai dan transfer bank</li>
                        <li>Harga sesuai dengan berat dan jenis layanan yang dipilih</li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-bold text-lg mb-3 text-blue-600">4. Privasi</h6>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Data pribadi Anda akan dijaga kerahasiaannya</li>
                        <li>Kami tidak akan menyebarkan informasi Anda ke pihak ketiga</li>
                        <li>Anda setuju menerima notifikasi terkait layanan kami</li>
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