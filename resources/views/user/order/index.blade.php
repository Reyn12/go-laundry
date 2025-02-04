<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Layanan</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector("form");
            form.addEventListener("submit", function (event) {
                event.preventDefault();

                const layanan = document.querySelector("select[name='layanan']").value;
                const jumlah = document.querySelector("input[name='jumlah']").value;
                const catatan = document.querySelector("input[name='catatan']").value;
                const pembayaran = document.querySelector("select[name='pembayaran']").value;

                if (!jumlah) {
                    alert("Silakan masukkan jumlah cucian.");
                    return;
                }

                const orderData = {
                    layanan,
                    jumlah,
                    catatan,
                    pembayaran
                };

                console.log("Order Submitted:", orderData);
                alert("Pesanan berhasil dikonfirmasi!");
            });
        });
    </script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center text-blue-600">Form Pemesanan Laundry</h1>
        
        <form class="mt-4">
            <label class="block text-gray-700 font-medium">Pilih Jenis Layanan</label>
            <select class="w-full p-2 border rounded-lg mt-1">
                <option>Cuci Biasa</option>
                <option>Setrika</option>
                <option>Ekspres</option>
            </select>
            
            <label class="block text-gray-700 font-medium mt-3">Jumlah Cucian (kg/item)</label>
            <input type="number" class="w-full p-2 border rounded-lg mt-1" placeholder="Masukkan berat/jumlah item">
            
            <label class="block text-gray-700 font-medium mt-3">Catatan Tambahan</label>
            <input type="text" class="w-full p-2 border rounded-lg mt-1" placeholder="Misal: Jangan pakai pewangi">
            
            <div class="mt-4">
                <h2 class="text-lg font-bold">Detail Harga + Ongkos Kirim</h2>
                <p class="text-gray-600">Harga akan dihitung berdasarkan berat dan layanan yang dipilih.</p>
            </div>
            
            <label class="block text-gray-700 font-medium mt-3">Metode Pembayaran</label>
            <select class="w-full p-2 border rounded-lg mt-1">
                <option>QRIS</option>
                <option>COD (Cash on Delivery)</option>
            </select>
            
            <button class="w-full bg-blue-600 text-white p-2 rounded-lg mt-4 hover:bg-blue-700">Confirm Pesanan</button>
        </form>
    </div>
</body>
</html>
