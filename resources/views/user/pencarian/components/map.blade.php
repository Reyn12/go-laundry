<!-- Map Container -->
<div class="flex-1 p-4 bg-white">
    <!-- Mapbox GL CSS -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet' />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    <style>
        .marker {
            background-size: cover;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
        }
        .user-marker {
            background-color: #2563eb;
            border: 2px solid white;
        }
        .merchant-marker {
            background-color: #dc2626;
            border: 2px solid white;
        }
        .mapboxgl-popup {
            max-width: 200px;
        }
    </style>
    
    <div id="map-container" class="h-[500px] w-full">
        <div id="map" class="w-full h-full rounded-md"></div>
    </div>

    <!-- Mapbox GL JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>
    <script>
        // Ambil token dari env
        mapboxgl.accessToken = '{{ env('MAPBOX_TOKEN') }}';

        // Inisialisasi map dengan lokasi default Bandung
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12', // style dengan 3D buildings
            center: [107.619125, -6.917464],
            zoom: 15,
            pitch: 45, // Sudut kemiringan untuk efek 3D
            bearing: -17.6,
            antialias: true
        });

        // Tambah kontrol navigasi
        map.addControl(new mapboxgl.NavigationControl());

        // Aktifkan 3D buildings saat map load
        map.on('load', () => {
            // Tambah 3D building layer
            map.addLayer({
                'id': '3d-buildings',
                'source': 'composite',
                'source-layer': 'building',
                'filter': ['==', 'extrude', 'true'],
                'type': 'fill-extrusion',
                'minzoom': 15,
                'paint': {
                    'fill-extrusion-color': '#aaa',
                    'fill-extrusion-height': [
                        'interpolate',
                        ['linear'],
                        ['zoom'],
                        15,
                        0,
                        15.05,
                        ['get', 'height']
                    ],
                    'fill-extrusion-base': [
                        'interpolate',
                        ['linear'],
                        ['zoom'],
                        15,
                        0,
                        15.05,
                        ['get', 'min_height']
                    ],
                    'fill-extrusion-opacity': 0.6
                }
            });
        });

        // Marker untuk lokasi user
        let userMarker;
        
        // Fungsi untuk update lokasi user
        function updateUserLocation(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            
            // Hapus marker lama jika ada
            if (userMarker) {
                userMarker.remove();
            }
            
            // Buat element untuk marker
            const el = document.createElement('div');
            el.className = 'marker user-marker';
            el.innerHTML = '<i class="fas fa-user-circle text-white"></i>';
            
            // Tambah marker baru
            userMarker = new mapboxgl.Marker(el)
                .setLngLat([lng, lat])
                .setPopup(new mapboxgl.Popup().setHTML('Lokasi Kamu'))
                .addTo(map);
            
            // Fly ke lokasi user dengan animasi
            map.flyTo({
                center: [lng, lat],
                essential: true,
                zoom: 15,
                pitch: 45
            });
            
            // Simpan koordinat
            document.getElementById('user_lat').value = lat;
            document.getElementById('user_lng').value = lng;
            
            // Update jarak ke merchant
            updateMerchantDistances(lat, lng);
        }
        
        // Array untuk simpan marker merchant
        let merchantMarkers = [];
        
        // Fungsi untuk update marker merchant
        function updateMerchantMarkers(merchants) {
            // Hapus marker lama
            merchantMarkers.forEach(marker => marker.remove());
            merchantMarkers = [];
            
            // Tambah marker untuk setiap merchant
            merchants.forEach(merchant => {
                // Buat element untuk marker
                const el = document.createElement('div');
                el.className = 'marker merchant-marker';
                el.innerHTML = '<i class="fas fa-store text-white"></i>';
                
                // Buat popup content
                const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(`
                    <div class="text-center">
                        <h3 class="font-bold">${merchant.name}</h3>
                        <p class="text-sm">${merchant.address}</p>
                        <button onclick="selectMerchant(${merchant.id})" 
                                class="mt-2 px-4 py-1 bg-blue-500 text-white rounded-full text-sm hover:bg-blue-600">
                            Pilih
                        </button>
                    </div>
                `);
                
                // Tambah marker
                const marker = new mapboxgl.Marker(el)
                    .setLngLat([merchant.lng, merchant.lat])
                    .setPopup(popup)
                    .addTo(map);
                    
                merchantMarkers.push(marker);
            });
        }

        // Fungsi untuk update jarak ke merchant
        function updateMerchantDistances(userLat, userLng) {
            const cards = document.querySelectorAll('.merchant-card');
            cards.forEach(card => {
                const merchantLat = card.dataset.lat;
                const merchantLng = card.dataset.lng;
                if (merchantLat && merchantLng) {
                    const distance = calculateDistance(userLat, userLng, merchantLat, merchantLng);
                    const distanceElement = card.querySelector('.merchant-distance');
                    if (distanceElement) {
                        distanceElement.textContent = `${distance.toFixed(1)} km`;
                    }
                }
            });
        }
        
        // Fungsi untuk hitung jarak (dalam km)
        function calculateDistance(lat1, lon1, lat2, lon2) {
            const R = 6371; // Radius bumi dalam km
            const dLat = deg2rad(lat2 - lat1);
            const dLon = deg2rad(lon2 - lon1);
            const a = 
                Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
                Math.sin(dLon/2) * Math.sin(dLon/2); 
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
            return R * c;
        }
        
        function deg2rad(deg) {
            return deg * (Math.PI/180);
        }
        
        // Get lokasi user
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(updateUserLocation, (error) => {
                console.error('Error getting location:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Tidak bisa mendapatkan lokasi kamu. Pastikan GPS aktif dan izinkan akses lokasi.',
                    icon: 'error'
                });
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: 'Browser kamu tidak support Geolocation.',
                icon: 'error'
            });
        }

        // Event listener untuk filter berdasarkan jarak
        document.getElementById('location').addEventListener('change', function() {
            const userLat = document.getElementById('user_lat').value;
            const userLng = document.getElementById('user_lng').value;
            if (userLat && userLng) {
                // Sort merchant cards berdasarkan jarak
                const cards = Array.from(document.querySelectorAll('.merchant-card'));
                cards.sort((a, b) => {
                    const distanceA = calculateDistance(userLat, userLng, a.dataset.lat, a.dataset.lng);
                    const distanceB = calculateDistance(userLat, userLng, b.dataset.lat, b.dataset.lng);
                    return this.value === '1' ? distanceA - distanceB : distanceB - distanceA;
                });
                
                // Update tampilan
                const container = document.getElementById('laundry-list');
                cards.forEach(card => container.appendChild(card));
            }
        });
    </script>
</div>