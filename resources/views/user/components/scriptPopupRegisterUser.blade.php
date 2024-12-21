<script>
    const form = document.getElementById('signupForm');
    
    // Fungsi untuk memeriksa validitas form
    function validateForm() {
        const inputs = {
            firstName: form.querySelector('input[name="firstName"]'),
            lastName: form.querySelector('input[name="lastName"]'),
            email: form.querySelector('input[name="email"]'),
            password: form.querySelector('input[name="password"]'),
            confirmPassword: form.querySelector('input[name="confirmPassword"]'),
            terms: form.querySelector('input[name="terms"]')
        };
        
        let isValid = true;
        
        // Reset semua pesan error
        form.querySelectorAll('.error-message').forEach(msg => {
            msg.style.display = 'none';
        });
        
        // Validasi nama depan
        if (!inputs.firstName.value.trim()) {
            isValid = false;
            inputs.firstName.nextElementSibling.style.display = 'block';
            inputs.firstName.classList.add('border-red-500');
        } else {
            inputs.firstName.classList.remove('border-red-500');
        }
        
        // Validasi nama belakang
        if (!inputs.lastName.value.trim()) {
            isValid = false;
            inputs.lastName.nextElementSibling.style.display = 'block';
            inputs.lastName.classList.add('border-red-500');
        } else {
            inputs.lastName.classList.remove('border-red-500');
        }
        
        // Validasi email
        if (!inputs.email.value.trim() || !inputs.email.value.includes('@')) {
            isValid = false;
            inputs.email.nextElementSibling.style.display = 'block';
            inputs.email.classList.add('border-red-500');
        } else {
            inputs.email.classList.remove('border-red-500');
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
        window.location.href = '/user/login';
    }
</script>