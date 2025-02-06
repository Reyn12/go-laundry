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

    // Handle modal syarat dan ketentuan
    $(document).ready(function() {
        const modal = document.getElementById('termsModal');
        const modalBackdrop = document.getElementById('modal-backdrop');
        const openModalBtn = document.getElementById('openTermsModal');
        const closeModalBtn = document.getElementById('closeModal');
        const agreeBtn = document.getElementById('agreeButton');
        const termsCheckbox = document.getElementById('terms');

        // Buka modal
        openModalBtn.addEventListener('click', function() {
            modal.classList.remove('hidden');
            modalBackdrop.classList.remove('hidden');
        });

        // Tutup modal dengan tombol close
        closeModalBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
            modalBackdrop.classList.add('hidden');
        });

        // Tutup modal dengan klik backdrop
        modalBackdrop.addEventListener('click', function() {
            modal.classList.add('hidden');
            modalBackdrop.classList.add('hidden');
        });

        // Handle tombol setuju
        agreeBtn.addEventListener('click', function() {
            termsCheckbox.checked = true;
            modal.classList.add('hidden');
            modalBackdrop.classList.add('hidden');
        });
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

    // Fungsi untuk mendapatkan lokasi
    function getLocation() {
        if (navigator.geolocation) {
            // Tampilkan loading
            Swal.fire({
                title: 'Mendapatkan Lokasi...',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });

            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const lat = position.coords.latitude;
                    const long = position.coords.longitude;
                    
                    // Simpan koordinat
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = long;
                    
                    // Ambil alamat dari koordinat
                    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${long}`)
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector('input[name="laundryAddress"]').value = data.display_name;
                        Swal.fire({
                            icon: 'success',
                            title: 'Lokasi Ditemukan!',
                            text: 'Alamat telah diisi otomatis',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal mendapatkan alamat dari koordinat'
                        });
                    });
                },
                function(error) {
                    let errorMessage = 'Terjadi kesalahan saat mendapatkan lokasi';
                    
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            errorMessage = "Izin akses lokasi ditolak. Mohon izinkan akses lokasi di browser Anda";
                            break;
                        case error.POSITION_UNAVAILABLE:
                            errorMessage = "Informasi lokasi tidak tersedia";
                            break;
                        case error.TIMEOUT:
                            errorMessage = "Waktu permintaan lokasi habis";
                            break;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errorMessage
                    });
                }
            );
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Browser Tidak Mendukung',
                text: 'Geolocation tidak didukung di browser ini'
            });
        }
    }
</script>
