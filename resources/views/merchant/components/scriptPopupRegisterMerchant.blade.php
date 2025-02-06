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
        
        // Tampilkan loading screen
        Swal.fire({
            title: 'Mohon Tunggu',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        // Kirim form
        var formData = new FormData(this);
        $.ajax({
            url: '{{ route("merchant.register.submit") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Tutup loading screen
                Swal.close();
                
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
                // Tutup loading screen
                Swal.close();
                
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

    var map;
    var marker;
    var selectedLat = null;
    var selectedLng = null;

    // Fungsi untuk menampilkan map
    function getLocation() {
        var mapModal = document.getElementById('mapModal');
        mapModal.classList.remove('hidden');
        
        if (!map) {
            mapboxgl.accessToken = '{{ env('MAPBOX_TOKEN') }}';
            
            map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/dark-v11',
                center: [106.816666, -6.200000], // Jakarta
                zoom: 15,
                pitch: 35, // Kurangin kemiringan biar ga terlalu ekstrim
                bearing: 0, // Reset rotasi
                antialias: true
            });

            // Tambah kontrol navigasi (di kanan)
            map.addControl(new mapboxgl.NavigationControl(), 'top-right');

            // Tambah geocoder untuk pencarian lokasi (di kiri)
            var geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl,
                placeholder: 'Cari lokasi...',
                language: 'id',
                countries: 'id'
            });
            map.addControl(geocoder, 'top-left');

            // Event ketika map di klik
            map.on('click', function(e) {
                var lngLat = e.lngLat;
                setMarker(lngLat.lat, lngLat.lng);
            });

            // Event ketika hasil pencarian dipilih
            geocoder.on('result', function(e) {
                var coordinates = e.result.geometry.coordinates;
                setMarker(coordinates[1], coordinates[0]);
            });
        }

        // Pastikan map dirender dengan benar
        setTimeout(function() {
            map.resize();
        }, 100);
    }

    function setMarker(lat, lng) {
        if (!map) return;

        // Hapus marker lama jika ada
        if (marker) {
            marker.remove();
        }

        // Buat marker baru
        marker = new mapboxgl.Marker()
            .setLngLat([lng, lat])
            .addTo(map);

        selectedLat = lat;
        selectedLng = lng;

        // Pindahkan view ke marker
        map.flyTo({
            center: [lng, lat],
            zoom: 17
        });
    }

    function handleMyLocation() {
        if (!navigator.geolocation) {
            Swal.fire({
                icon: 'error',
                title: 'Waduh...',
                text: 'Browser kamu ga support GPS nih'
            });
            return;
        }

        Swal.fire({
            title: 'Bentar ya...',
            text: 'Lagi nyari lokasi kamu',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        navigator.geolocation.getCurrentPosition(
            function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                
                if (map) {
                    setMarker(lat, lng);
                }
                Swal.close();
            },
            function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Waduh...',
                    text: 'Ga bisa dapet lokasi nih. Coba aktifin GPS dulu ya'
                });
            }
        );
    }

    function handleConfirmLocation() {
        if (!selectedLat || !selectedLng) {
            Swal.fire({
                icon: 'warning',
                title: 'Eh...',
                text: 'Pilih lokasinya dulu ya'
            });
            return;
        }

        document.getElementById('latitude').value = selectedLat;
        document.getElementById('longitude').value = selectedLng;

        // Gunakan Mapbox Geocoding API untuk mendapatkan alamat
        fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${selectedLng},${selectedLat}.json?access_token=${mapboxgl.accessToken}&language=id`)
            .then(response => response.json())
            .then(data => {
                if (data.features && data.features.length > 0) {
                    document.querySelector('input[name="laundryAddress"]').value = data.features[0].place_name;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        closeModal();
    }

    function closeModal() {
        var mapModal = document.getElementById('mapModal');
        if (mapModal) {
            mapModal.classList.add('hidden');
            // Reset marker saat modal ditutup
            if (marker) {
                marker.remove();
                marker = null;
            }
            selectedLat = null;
            selectedLng = null;
        }
    }

    // Event untuk backdrop
    var backdrop = document.getElementById('mapModalBackdrop');
    if (backdrop) {
        backdrop.onclick = closeModal;
    }

    // Event untuk tombol ESC
    document.onkeydown = function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    };

    // Event untuk tombol Lokasi Saya
    document.getElementById('myLocation').onclick = function() {
        handleMyLocation();
    };

    // Event untuk tombol Pilih Lokasi
    document.getElementById('confirmLocation').onclick = function() {
        handleConfirmLocation();
    };
</script>
