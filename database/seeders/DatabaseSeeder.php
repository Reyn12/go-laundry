<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'username' => 'reyy',
            'email' => 'reyy12@gmail.com',
            'password' => bcrypt('reyy123'),
            'nama_lengkap' => 'Reyy Admin',
            'no_hp' => '081234567800',
            'alamat' => 'Jl. Raya No. 1, Jakarta',
            'role' => 'admin',
            'status' => 'aktif',
        ]);
        \App\Models\User::create([
            'username' => 'ahmad',
            'email' => 'ahmad12@gmail.com',
            'password' => bcrypt('ahmad123'),
            'nama_lengkap' => 'Ahmad Suryadi',
            'no_hp' => '081234567801',
            'alamat' => 'Jl. Merdeka No. 2, Bandung',
            'role' => 'customer',
            'status' => 'aktif',
        ]);
        \App\Models\User::create([
            'username' => 'budi',
            'email' => 'budi12@gmail.com',
            'password' => bcrypt('budi123'),
            'nama_lengkap' => 'Budi Santoso',
            'no_hp' => '081234567802',
            'alamat' => 'Jl. Kebon Kacang No. 3, Surabaya',
            'role' => 'customer',
            'status' => 'aktif',
        ]);
        \App\Models\User::create([
            'username' => 'cici',
            'email' => 'cici12@gmail.com',
            'password' => bcrypt('cici123'),
            'nama_lengkap' => 'Cici Nuraini',
            'no_hp' => '081234567803',
            'alamat' => 'Jl. Citra No. 4, Yogyakarta',
            'role' => 'customer',
            'status' => 'aktif',
        ]);
        \App\Models\User::create([
            'username' => 'dedi',
            'email' => 'dedi12@gmail.com',
            'password' => bcrypt('dedi123'),
            'nama_lengkap' => 'Dedi Pratama',
            'no_hp' => '081234567804',
            'alamat' => 'Jl. Pahlawan No. 5, Medan',
            'role' => 'customer',
            'status' => 'aktif',
        ]);
        \App\Models\User::create([
            'username' => 'eka',
            'email' => 'eka12@gmail.com',
            'password' => bcrypt('eka123'),
            'nama_lengkap' => 'Eka Oktaviani',
            'no_hp' => '081234567805',
            'alamat' => 'Jl. Suka Maju No. 6, Makassar',
            'role' => 'customer',
            'status' => 'aktif',
        ]);
        \App\Models\User::create([
            'username' => 'faisal',
            'email' => 'faisal12@gmail.com',
            'password' => bcrypt('faisal123'),
            'nama_lengkap' => 'Faisal Hadi',
            'no_hp' => '081234567806',
            'alamat' => 'Jl. Bintang No. 7, Bali',
            'role' => 'customer',
            'status' => 'aktif',
        ]);
        \App\Models\User::create([
            'username' => 'gita',
            'email' => 'gita12@gmail.com',
            'password' => bcrypt('gita123'),
            'nama_lengkap' => 'Gita Putri',
            'no_hp' => '081234567807',
            'alamat' => 'Jl. Alam No. 8, Bogor',
            'role' => 'customer',
            'status' => 'aktif',
        ]);
        \App\Models\User::create([
            'username' => 'hana',
            'email' => 'hana12@gmail.com',
            'password' => bcrypt('hana123'),
            'nama_lengkap' => 'Hana Kusuma',
            'no_hp' => '081234567808',
            'alamat' => 'Jl. Puspa No. 9, Semarang',
            'role' => 'customer',
            'status' => 'aktif',
        ]);
        \App\Models\User::create([
            'username' => 'irfan',
            'email' => 'irfan12@gmail.com',
            'password' => bcrypt('irfan123'),
            'nama_lengkap' => 'Irfan Ahmad',
            'no_hp' => '081234567809',
            'alamat' => 'Jl. Merpati No. 10, Palembang',
            'role' => 'customer',
            'status' => 'aktif',
        ]);
        \App\Models\User::create([
            'username' => 'joko',
            'email' => 'joko12@gmail.com',
            'password' => bcrypt('joko123'),
            'nama_lengkap' => 'Joko Santoso',
            'no_hp' => '081234567810',
            'alamat' => 'Jl. Raya Timur No. 11, Solo',
            'role' => 'customer',
            'status' => 'aktif',
        ]);

// Menambahkan data merchant secara manual
        \App\Models\Merchant::create([
            'user_id' => 1, // Asumsikan user_id 1 adalah pemilik laundry A
            'nama_laundry' => 'Kilat Laundry',
            'alamat_laundry' => 'Jl. Kebon Jeruk No. 1, Jakarta',
            'deskripsi' => 'Laundry cepat dan bersih',
            'no_hp' => '081234567811',
            'email' => 'kilatlaundry@example.com',
            'latitude' => -6.200000,
            'longitude' => 106.816666,
        ]);
        \App\Models\Merchant::create([
            'user_id' => 2, // Asumsikan user_id 2 adalah pemilik laundry B
            'nama_laundry' => 'Bersih Sejahtera Laundry',
            'alamat_laundry' => 'Jl. Merdeka No. 2, Bandung',
            'deskripsi' => 'Laundry dengan pelayanan terbaik',
            'no_hp' => '081234567812',
            'email' => 'bersihsejahteralaundry@example.com',
            'latitude' => -6.917464,
            'longitude' => 107.619123,
        ]);
        \App\Models\Merchant::create([
            'user_id' => 3, // Asumsikan user_id 3 adalah pemilik laundry C
            'nama_laundry' => 'Super Clean Laundry',
            'alamat_laundry' => 'Jl. Pahlawan No. 3, Surabaya',
            'deskripsi' => 'Laundry praktis dengan harga terjangkau',
            'no_hp' => '081234567813',
            'email' => 'supercleanlaundry@example.com',
            'latitude' => -7.250445,
            'longitude' => 112.768845,
        ]);
        \App\Models\Merchant::create([
            'user_id' => 4, // Asumsikan user_id 4 adalah pemilik laundry D
            'nama_laundry' => 'Cerah Laundry',
            'alamat_laundry' => 'Jl. Raya No. 4, Yogyakarta',
            'deskripsi' => 'Laundry cepat dan ramah lingkungan',
            'no_hp' => '081234567814',
            'email' => 'cerahlaundry@example.com',
            'latitude' => -7.795580,
            'longitude' => 110.369489,
        ]);
        \App\Models\Merchant::create([
            'user_id' => 5, // Asumsikan user_id 5 adalah pemilik laundry E
            'nama_laundry' => 'Santai Laundry',
            'alamat_laundry' => 'Jl. Citra No. 5, Medan',
            'deskripsi' => 'Laundry dengan pelayanan terbaik dan cepat',
            'no_hp' => '081234567815',
            'email' => 'santailaundry@example.com',
            'latitude' => 3.595192,
            'longitude' => 98.672226,
        ]);
        
        // Menambahkan saldo untuk merchant
        \App\Models\SaldoMerchant::create([
            'merchant_id' => 1,
            'saldo_tersedia' => 100000,
            'saldo_terkunci' => 50000,
            'saldo_diproses' => 20000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\SaldoMerchant::create([
            'merchant_id' => 2,
            'saldo_tersedia' => 200000,
            'saldo_terkunci' => 100000,
            'saldo_diproses' => 50000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\SaldoMerchant::create([
            'merchant_id' => 3,
            'saldo_tersedia' => 300000,
            'saldo_terkunci' => 150000,
            'saldo_diproses' => 75000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\SaldoMerchant::create([
            'merchant_id' => 4,
            'saldo_tersedia' => 400000,
            'saldo_terkunci' => 200000,
            'saldo_diproses' => 100000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\SaldoMerchant::create([
            'merchant_id' => 5,
            'saldo_tersedia' => 500000,
            'saldo_terkunci' => 250000,
            'saldo_diproses' => 125000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Menambahkan data layanan_laundries secara manual
        \App\Models\LayananLaundry::create([
            'merchant_id' => 1,
            'kategori_layanan' => 'Cuci Setrika',
            'nama_layanan' => 'Reguler',
            'harga_per_unit' => 6000,
            'satuan' => 'kg',
            'waktu_pengerjaan' => '3 Hari',
            'deskripsi' => 'Layanan cuci dan setrika standar.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 1,
            'kategori_layanan' => 'Cuci Setrika',
            'nama_layanan' => 'Express',
            'harga_per_unit' => 9000,
            'satuan' => 'kg',
            'waktu_pengerjaan' => '1 Hari',
            'deskripsi' => 'Layanan cuci dan setrika cepat.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 1,
            'kategori_layanan' => 'Cuci Setrika',
            'nama_layanan' => 'Kilat',
            'harga_per_unit' => 12000,
            'satuan' => 'kg',
            'waktu_pengerjaan' => '6 Jam',
            'deskripsi' => 'Layanan cuci dan setrika kilat.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 2,
            'kategori_layanan' => 'Cuci Sepatu',
            'nama_layanan' => 'Reguler',
            'harga_per_unit' => 25000,
            'satuan' => 'pasang',
            'waktu_pengerjaan' => '3 Hari',
            'deskripsi' => 'Layanan cuci sepatu standar.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 2,
            'kategori_layanan' => 'Cuci Sepatu',
            'nama_layanan' => 'Express',
            'harga_per_unit' => 35000,
            'satuan' => 'pasang',
            'waktu_pengerjaan' => '1 Hari',
            'deskripsi' => 'Layanan cuci sepatu cepat.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 2,
            'kategori_layanan' => 'Cuci Sepatu',
            'nama_layanan' => 'Kilat',
            'harga_per_unit' => 45000,
            'satuan' => 'pasang',
            'waktu_pengerjaan' => '6 Jam',
            'deskripsi' => 'Layanan cuci sepatu kilat.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 3,
            'kategori_layanan' => 'Cuci Karpet',
            'nama_layanan' => 'Reguler',
            'harga_per_unit' => 20000,
            'satuan' => 'karpet',
            'waktu_pengerjaan' => '3 Hari',
            'deskripsi' => 'Layanan cuci karpet standar.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 3,
            'kategori_layanan' => 'Cuci Karpet',
            'nama_layanan' => 'Express',
            'harga_per_unit' => 25000,
            'satuan' => 'karpet',
            'waktu_pengerjaan' => '1 Hari',
            'deskripsi' => 'Layanan cuci karpet cepat.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 3,
            'kategori_layanan' => 'Cuci Karpet',
            'nama_layanan' => 'Kilat',
            'harga_per_unit' => 30000,
            'satuan' => 'karpet',
            'waktu_pengerjaan' => '6 Jam',
            'deskripsi' => 'Layanan cuci karpet kilat.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 4,
            'kategori_layanan' => 'Cuci Jas',
            'nama_layanan' => 'Reguler',
            'harga_per_unit' => 15000,
            'satuan' => 'baju',
            'waktu_pengerjaan' => '3 Hari',
            'deskripsi' => 'Layanan cuci jas standar.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 4,
            'kategori_layanan' => 'Cuci Jas',
            'nama_layanan' => 'Express',
            'harga_per_unit' => 19000,
            'satuan' => 'baju',
            'waktu_pengerjaan' => '1 Hari',
            'deskripsi' => 'Layanan cuci jas cepat.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 4,
            'kategori_layanan' => 'Cuci Jas',
            'nama_layanan' => 'Kilat',
            'harga_per_unit' => 25000,
            'satuan' => 'baju',
            'waktu_pengerjaan' => '6 Jam',
            'deskripsi' => 'Layanan cuci jas kilat.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 5,
            'kategori_layanan' => 'Cuci Kering Lipat',
            'nama_layanan' => 'Reguler',
            'harga_per_unit' => 4000,
            'satuan' => 'kg',
            'waktu_pengerjaan' => '3 Hari',
            'deskripsi' => 'Layanan cuci kering lipat standar.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 5,
            'kategori_layanan' => 'Cuci Kering Lipat',
            'nama_layanan' => 'Express',
            'harga_per_unit' => 6000,
            'satuan' => 'kg',
            'waktu_pengerjaan' => '1 Hari',
            'deskripsi' => 'Layanan cuci kering lipat cepat.',
        ]);
        
        \App\Models\LayananLaundry::create([
            'merchant_id' => 5,
            'kategori_layanan' => 'Cuci Kering Lipat',
            'nama_layanan' => 'Kilat',
            'harga_per_unit' => 9000,
            'satuan' => 'kg',
            'waktu_pengerjaan' => '6 Jam',
            'deskripsi' => 'Layanan cuci kering lipat kilat.',
        ]);
        
        // Menambahkan 2 data pesanan secara manual
        \App\Models\Pesanan::create([
            'customer_id' => 1,
            'layanan_id' => 1,
            'status' => 'menunggu',
            'alamat_pengambilan' => 'Jl. Kebon Jeruk No. 1, Bandung',
            'alamat_pengiriman' => 'Jl. Kebon Jeruk No. 1, Bandung',
            'total_harga' => 6000,
            'berat_kg' => 1.0,
            'jumlah_pesanan' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Pesanan::create([
            'customer_id' => 2,
            'layanan_id' => 2,
            'status' => 'proses',
            'alamat_pengambilan' => 'Jl. Merdeka No. 2, Bandung',
            'alamat_pengiriman' => 'Jl. Merdeka No. 2, Bandung',
            'total_harga' => 30000,
            'berat_kg' => 2.0,
            'jumlah_pesanan' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Pesanan::create([
            'customer_id' => 3,
            'layanan_id' => 1,
            'status' => 'selesai',
            'alamat_pengambilan' => 'Jl. Riau No. 3, Bandung',
            'alamat_pengiriman' => 'Jl. Riau No. 3, Bandung',
            'total_harga' => 15000,
            'berat_kg' => 1.5,
            'jumlah_pesanan' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Pesanan::create([
            'customer_id' => 4,
            'layanan_id' => 3,
            'status' => 'menunggu',
            'alamat_pengambilan' => 'Jl. Cikapundung No. 4, Bandung',
            'alamat_pengiriman' => 'Jl. Cikapundung No. 4, Bandung',
            'total_harga' => 45000,
            'berat_kg' => 3.0,
            'jumlah_pesanan' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Pesanan::create([
            'customer_id' => 5,
            'layanan_id' => 2,
            'status' => 'proses',
            'alamat_pengambilan' => 'Jl. Merdeka No. 5, Bandung',
            'alamat_pengiriman' => 'Jl. Merdeka No. 5, Bandung',
            'total_harga' => 25000,
            'berat_kg' => 2.2,
            'jumlah_pesanan' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Menambahkan 4 data pembayaran secara manual
        \App\Models\Payment::create([
            'pesanan_id' => 1,
            'metode_pembayaran' => 'COD',
            'jumlah' => 6000,
            'biaya_admin' => 500,
            'status' => 'sudah dibayar',
            'tanggal_pembayaran' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Payment::create([
            'pesanan_id' => 2,
            'metode_pembayaran' => 'QRIS',
            'jumlah' => 30000,
            'biaya_admin' => 2000,
            'status' => 'sudah dibayar',
            'tanggal_pembayaran' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Payment::create([
            'pesanan_id' => 3,
            'metode_pembayaran' => 'COD',
            'jumlah' => 15000,
            'biaya_admin' => 1000,
            'status' => 'sudah dibayar',
            'tanggal_pembayaran' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Payment::create([
            'pesanan_id' => 4,
            'metode_pembayaran' => 'QRIS',
            'jumlah' => 45000,
            'biaya_admin' => 3000,
            'status' => 'sudah dibayar',
            'tanggal_pembayaran' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Menambahkan 4 data review secara manual
        \App\Models\Review::create([
            'pesanan_id' => 1,
            'customer_id' => 1,
            'merchant_id' => 1,
            'rating' => 5,
            'komentar' => 'Pelayanan sangat baik dan cepat!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Review::create([
            'pesanan_id' => 2,
            'customer_id' => 2,
            'merchant_id' => 2,
            'rating' => 4,
            'komentar' => 'Kualitas laundry memuaskan, tapi pengiriman agak lambat.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Review::create([
            'pesanan_id' => 3,
            'customer_id' => 3,
            'merchant_id' => 1,
            'rating' => 5,
            'komentar' => 'Pelayanan sangat baik dan cepat!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Models\Review::create([
            'pesanan_id' => 4,
            'customer_id' => 4,
            'merchant_id' => 2,
            'rating' => 4,
            'komentar' => 'Kualitas laundry memuaskan, tapi pengiriman agak lambat.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
