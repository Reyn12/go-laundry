<script>
    const form = document.getElementById('signupForm');
    const errorMessages = form.querySelectorAll('.error-message');

    // Reset error messages
    function resetErrors() {
        errorMessages.forEach(msg => {
            msg.style.display = 'none';
            msg.textContent = '';
        });
        form.querySelectorAll('input').forEach(input => {
            input.classList.remove('border-red-500');
        });
    }

    // Event listener untuk form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        resetErrors();

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
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Email sudah terdaftar!',
                            confirmButtonText: 'OK'
                        });
                    }
                    
                    Object.entries(data.errors).forEach(([field, messages]) => {
                        console.log(`Error for ${field}:`, messages);
                        const input = form.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.add('border-red-500');
                            const errorElement = input.nextElementSibling;
                            if (errorElement && errorElement.classList.contains('error-message')) {
                                errorElement.textContent = messages[0];
                                errorElement.style.display = 'block';
                            }
                        }
                    });
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