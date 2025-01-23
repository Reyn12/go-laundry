<script>
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
            confirmPassword: form.querySelector('input[name="confirmPassword"]'),
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
        if (!inputs.email.value.trim() || !inputs.email.value.includes('@')) {
            isValid = false;
            inputs.email.nextElementSibling.style.display = 'block';
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
        }
        
        return isValid;
    }

    // Event listener untuk form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            document.getElementById('popupOverlay').style.display = 'block';
        }
    });

    function closePopup() {
        document.getElementById('popupOverlay').style.display = 'none';
    }

    function goToLogin() {
        window.location.href = '/admin/login';
    }
</script>