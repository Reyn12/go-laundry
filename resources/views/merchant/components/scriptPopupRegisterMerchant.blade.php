<script>
    // Setup CSRF token untuk semua request AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Handle form submission
    $('#merchantForm').on('submit', function(e) {
        e.preventDefault();
        
        // Disable tombol submit
        var submitButton = $(this).find('button[type="submit"]');
        if (submitButton.prop('disabled')) {
            return; // Jika tombol sudah disabled, jangan submit lagi
        }
        submitButton.prop('disabled', true);
        
        // Kirim form
        var formData = new FormData(this);
        $.ajax({
            url: '{{ route("merchant.register.submit") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Proses pengajuan pembukaan toko kamu sedang kami proses ya',
                    confirmButtonText: 'Login Sekarang'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/merchant/login';
                    }
                });
            },
            error: function(xhr) {
                submitButton.prop('disabled', false);
                var errorMessage = 'Terjadi kesalahan saat registrasi';
                
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
    });

    // Validasi email saat input
    $('input[name="email"]').on('input', function() {
        var email = $(this).val();
        var emailError = $('#emailError');
        
        if (email && !email.endsWith('@gmail.com')) {
            emailError.removeClass('hidden');
            $(this).addClass('border-red-500');
        } else {
            emailError.addClass('hidden');
            $(this).removeClass('border-red-500');
        }
    });

    // Validasi nomor telepon saat input
    $('input[name="phone"]').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Event untuk membuka modal syarat dan ketentuan
    $('#showTerms').on('click', function(e) {
        e.preventDefault();
        $('#termsModal').modal('show');
    });

    // Event untuk menutup modal syarat dan ketentuan
    // Show modal
    document.querySelector('[data-modal-trigger]').addEventListener('click', function(e) {
                        e.preventDefault();
                        document.getElementById('modal-backdrop').classList.remove('hidden');
                        document.getElementById('termsModal').classList.remove('hidden');
                    });

                    // Hide modal
                    function hideModal() {
                        document.getElementById('modal-backdrop').classList.add('hidden');
                        document.getElementById('termsModal').classList.add('hidden');
                    }

                    // Close button
                    document.getElementById('closeModal').addEventListener('click', hideModal);

                    // Agree button
                    document.getElementById('agreeButton').addEventListener('click', function() {
                        document.getElementById('agreement').checked = true;
                        hideModal();
                    });

                    // Close when clicking outside
                    document.getElementById('termsModal').addEventListener('click', function(e) {
                        if (e.target === this) {
                            hideModal();
                        }
                    });
</script>
