<script>
    const form = document.getElementById('signupForm');

    // Fungsi validasi
    function validateForm() {
        const inputs = {
            firstName: form.querySelector('input[name="firstName"]'),
            lastName: form.querySelector('input[name="lastName"]'),
            email: form.querySelector('input[name="email"]'),
            password: form.querySelector('input[name="password"]'),
            confirmPassword: form.querySelector('input[name="confirmPassword"]'),
            laundryName: form.querySelector('input[name="laundryName"]'),
            laundryAddress: form.querySelector('input[name="laundryAddress"]'),
            description: form.querySelector('textarea[name="description"]'),
            operationalHours: form.querySelector('input[name="operationalHours"]'),
            services: form.querySelectorAll('input[name="services"]:checked'),
            laundryPhoto: form.querySelector('input[name="laundryPhoto"]'),
            terms: form.querySelector('input[name="terms"]')
        };

        let isValid = true;

        // Reset semua error sebelumnya
        form.querySelectorAll('.border-red-500').forEach(input => input.classList.remove('border-red-500'));
        form.querySelectorAll('.error-message').forEach(msg => msg.remove());

        // Fungsi untuk menambahkan pesan error
        function showError(input, message) {
            isValid = false;
            input.classList.add('border-red-500');
            const errorMessage = document.createElement('p');
            errorMessage.className = 'text-red-500 text-sm mt-1 error-message';
            errorMessage.textContent = message;
            input.parentNode.appendChild(errorMessage);
        }

        // Validasi masing-masing field
        if (!inputs.firstName.value.trim()) showError(inputs.firstName, 'Nama depan wajib diisi.');
        if (!inputs.lastName.value.trim()) showError(inputs.lastName, 'Nama belakang wajib diisi.');
        if (!inputs.email.value.trim() || !inputs.email.value.includes('@')) showError(inputs.email, 'Masukkan email yang valid.');
        if (!inputs.password.value || inputs.password.value.length < 8) showError(inputs.password, 'Password harus minimal 8 karakter.');
        if (inputs.confirmPassword.value !== inputs.password.value) showError(inputs.confirmPassword, 'Konfirmasi password harus sama.');
        if (!inputs.laundryName.value.trim()) showError(inputs.laundryName, 'Nama laundry wajib diisi.');
        if (!inputs.laundryAddress.value.trim()) showError(inputs.laundryAddress, 'Alamat laundry wajib diisi.');
        if (!inputs.description.value.trim()) showError(inputs.description, 'Deskripsi wajib diisi.');
        if (!inputs.operationalHours.value.trim()) showError(inputs.operationalHours, 'Jam operasional wajib diisi.');
        if (inputs.services.length === 0) showError(form.querySelector('input[name="services"]'), 'Pilih minimal satu layanan.');
        if (!inputs.laundryPhoto.files.length) showError(inputs.laundryPhoto, 'Upload foto laundry wajib dilakukan.');
        if (!inputs.terms.checked) showError(inputs.terms, 'Anda harus menyetujui syarat & ketentuan.');

        return isValid;
    }

    function showPopup() {
        document.getElementById('popupOverlay').style.display = 'flex';
    }

    function closePopup() {
        document.getElementById('popupOverlay').style.display = 'none';
    }

    function goToLogin() {
        window.location.href = '/merchant/login'; // Ganti URL sesuai dengan halaman login Anda
    }

    // Tambahkan ke form submit event listener
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (validateForm()) {
            showPopup();
        }
    });
</script>
