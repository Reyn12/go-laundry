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
                text: 'Please accept the terms & conditions'
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
                            title: 'Success!',
                            text: 'Registration successful! Please login.',
                            confirmButtonText: 'Login Now'
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
                            text: response.message || 'Registration failed'
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
                                showTooltip(input, 'Please fill out this field');
                                input.focus();
                            }
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Registration failed'
                        });
                    }
                }
            });
        }
    });

    function closePopup() {
        document.getElementById('popupOverlay').style.display = 'none';
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