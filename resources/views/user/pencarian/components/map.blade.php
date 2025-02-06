<!-- Map Container -->
<div class="flex-1 p-4 bg-white">
    <!-- Mapbox GL CSS -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet' />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    <style>
        .marker {
            cursor: pointer;
        }
        .user-marker {
            background-color: #2563eb;
            border: 3px solid white;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            box-shadow: 0 0 0 4px rgba(37,99,235,0.2);
        }
        .mapboxgl-popup {
            max-width: 280px;
        }
        .mapboxgl-popup-content {
            padding: 16px;
            border-radius: 12px;
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
            style: 'mapbox://styles/mapbox/basic-v9',  // Ganti ke light style biar lebih clean
            center: [107.619125, -6.917464],
            zoom: 15,
            pitch: 45,
            bearing: -17.6,
            antialias: true
        });
 
        // Tambah kontrol navigasi
        map.addControl(new mapboxgl.NavigationControl());

        // Custom style saat map load
        map.on('load', () => {
            // Tambah marker untuk setiap merchant
            @foreach($merchants as $merchant)
                // Container untuk pin dan label
                const containerEl_{{$merchant->merchant_id}} = document.createElement('div');
                containerEl_{{$merchant->merchant_id}}.className = 'marker flex flex-col items-center';

                // Buat label merchant (taruh duluan biar di atas)
                const labelEl_{{$merchant->merchant_id}} = document.createElement('div');
                labelEl_{{$merchant->merchant_id}}.className = 'bg-blue-600 text-white px-3 py-1 rounded-lg whitespace-nowrap font-bold text-sm mb-2';
                labelEl_{{$merchant->merchant_id}}.textContent = '{{$merchant->nama_laundry}}';
                containerEl_{{$merchant->merchant_id}}.appendChild(labelEl_{{$merchant->merchant_id}});

                // Buat pin marker dengan titik di tengah
                const pinEl_{{$merchant->merchant_id}} = document.createElement('div');
                pinEl_{{$merchant->merchant_id}}.className = 'w-4 h-4 bg-yellow-400 border-2 border-white rounded-full shadow-md relative';
                
                // Buat titik di tengah pin
                const dotEl_{{$merchant->merchant_id}} = document.createElement('div');
                dotEl_{{$merchant->merchant_id}}.className = 'absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-1 h-1 bg-white rounded-full';
                pinEl_{{$merchant->merchant_id}}.appendChild(dotEl_{{$merchant->merchant_id}});
                containerEl_{{$merchant->merchant_id}}.appendChild(pinEl_{{$merchant->merchant_id}});
                
                // Buat popup dengan info merchant
                const popup_{{$merchant->merchant_id}} = new mapboxgl.Popup({ offset: 25 })
                    .setHTML(`
                        <div class="p-2">
                            <h3 class="font-bold text-lg mb-1">{{$merchant->nama_laundry}}</h3>
                            <p class="text-gray-600 text-sm">{{$merchant->alamat_laundry}}</p>
                        </div>
                    `);

                // Tambah marker ke map
                new mapboxgl.Marker(containerEl_{{$merchant->merchant_id}})
                    .setLngLat([parseFloat('{{$merchant->longitude}}'), parseFloat('{{$merchant->latitude}}')])
                    .setPopup(popup_{{$merchant->merchant_id}})
                    .addTo(map);
            @endforeach

            // Get user location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    const userLng = position.coords.longitude;
                    const userLat = position.coords.latitude;

                    // Buat marker untuk user
                    const userMarkerEl = document.createElement('div');
                    userMarkerEl.className = 'marker user-marker';

                    new mapboxgl.Marker(userMarkerEl)
                        .setLngLat([userLng, userLat])
                        .addTo(map);

                    // Update map center ke lokasi user
                    map.flyTo({
                        center: [userLng, userLat],
                        zoom: 15
                    });
                });
            }
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
                el.textContent = merchant.name;
                
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