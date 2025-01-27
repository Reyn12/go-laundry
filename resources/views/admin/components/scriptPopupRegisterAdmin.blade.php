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