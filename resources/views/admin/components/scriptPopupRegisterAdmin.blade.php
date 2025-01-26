<script>
    const form = document.getElementById('signupForm');
    const errorMessages = form.querySelectorAll('.error-message');
    const submitButton = form.querySelector('button[type="submit"]');

    // Fungsi untuk menampilkan error message
    function showError(input, message) {
        const errorDiv = input.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('error-message')) {
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
            errorDiv.style.color = '#dc2626';
            errorDiv.style.fontSize = '0.875rem';
            input.classList.add('border-red-500');
        }
    }

    // Fungsi untuk menghapus error message
    function clearError(input) {
        const errorDiv = input.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('error-message')) {
            errorDiv.textContent = '';
            errorDiv.style.display = 'none';
            input.classList.remove('border-red-500');
        }
    }

    // Reset semua error messages
    function resetErrors() {
        form.querySelectorAll('input').forEach(input => {
            clearError(input);
        });
    }

    // Fungsi untuk mengecek apakah form valid
    function validateForm() {
        let isValid = true;
        
        // Reset error messages
        resetErrors();

        // Cek apakah semua field required terisi
        const requiredInputs = form.querySelectorAll('input[required]');
        const allFieldsFilled = Array.from(requiredInputs).every(input => {
            if (input.type === 'checkbox') return input.checked;
            return input.value.trim() !== '';
        });

        // Validasi email format
        const emailInput = form.querySelector('input[type="email"]');
        if (emailInput && emailInput.value.trim()) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(emailInput.value)) {
                isValid = false;
                showError(emailInput, 'Format email tidak valid');
            }
        }

        // Validasi konfirmasi password
        const passwordInput = form.querySelector('input[name="password"]');
        const confirmPasswordInput = form.querySelector('input[name="password_confirmation"]');
        if (confirmPasswordInput && confirmPasswordInput.value.trim() && 
            passwordInput && passwordInput.value.trim()) {
            if (confirmPasswordInput.value !== passwordInput.value) {
                isValid = false;
                showError(confirmPasswordInput, 'Password tidak cocok');
            }
        }

        // Validasi checkbox terms
        const termsCheckbox = form.querySelector('input[name="terms"]');
        if (termsCheckbox && !termsCheckbox.checked) {
            isValid = false;
        }

        // Aktifkan/nonaktifkan tombol submit
        const formIsValid = isValid && allFieldsFilled;
        submitButton.disabled = !formIsValid;
        submitButton.style.opacity = formIsValid ? '1' : '0.5';
        submitButton.style.cursor = formIsValid ? 'pointer' : 'not-allowed';
        
        return formIsValid;
    }

    // Event listener untuk semua input
    form.querySelectorAll('input').forEach(input => {
        ['input', 'change'].forEach(eventType => {
            input.addEventListener(eventType, validateForm);
        });
    });

    // Event listener untuk input email
    const emailInput = form.querySelector('input[type="email"]');
    if (emailInput) {
        emailInput.addEventListener('input', () => {
            if (emailInput.value.trim()) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(emailInput.value)) {
                    showError(emailInput, 'Format email tidak valid');
                } else {
                    clearError(emailInput);
                }
            } else {
                clearError(emailInput);
            }
            validateForm();
        });
    }

    // Event listener untuk konfirmasi password
    const confirmPasswordInput = form.querySelector('input[name="password_confirmation"]');
    const passwordInput = form.querySelector('input[name="password"]');
    if (confirmPasswordInput && passwordInput) {
        [confirmPasswordInput, passwordInput].forEach(input => {
            input.addEventListener('input', () => {
                if (confirmPasswordInput.value && passwordInput.value &&
                    confirmPasswordInput.value !== passwordInput.value) {
                    showError(confirmPasswordInput, 'Password tidak cocok');
                } else {
                    clearError(confirmPasswordInput);
                }
                validateForm();
            });
        });
    }

    // Event listener untuk form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (!validateForm()) {
            return;
        }

        try {
            console.log('Form submission started');
            
            // Log form data (kecuali password)
            const formData = new FormData(form);
            const formDataLog = {};
            formData.forEach((value, key) => {
                if (!key.includes('password')) {
                    formDataLog[key] = value;
                }
            });
            console.log('Form data:', formDataLog);

            // Kirim data form menggunakan AJAX
            console.log('Sending request to:', form.action);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            });

            console.log('Response status:', response.status);
            const data = await response.json();
            console.log('Response data:', data);

            if (data.success) {
                console.log('Registration successful');
                // Tampilkan popup sukses dengan SweetAlert2
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Registrasi berhasil dilakukan',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/admin/login';
                    }
                });
            } else {
                console.log('Registration failed:', data.errors || data.message);
                // Handle validation errors
                if (data.errors) {
                    // Jika ada error email duplikat
                    if (data.errors.email) {
                        showError(emailInput, 'Email sudah terdaftar');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Email sudah terdaftar!',
                            confirmButtonText: 'OK'
                        });
                    }

                    // Jika ada error username duplikat
                    if (data.errors.username) {
                        const usernameInput = form.querySelector('input[name="username"]');
                        showError(usernameInput, 'Username sudah digunakan');
                    }
                }
            }
        } catch (error) {
            console.error('Error details:', {
                message: error.message,
                stack: error.stack
            });
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengirim data. Silakan coba lagi.',
                confirmButtonText: 'OK'
            });
        }
    });
</script>