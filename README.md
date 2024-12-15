<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Deskripsi
Go-Laundry adalah sistem manajemen laundry yang memungkinkan pengguna untuk memesan layanan laundry dengan mudah. Proyek ini dibangun menggunakan Laravel sebagai framework backend.

## Prasyarat
Sebelum menjalankan proyek ini, pastikan Anda memiliki hal-hal berikut:
- PHP (versi 7.3 atau lebih tinggi)
- Composer
- MySQL atau MariaDB
- Node.js dan npm (jika menggunakan frontend)

## Instalasi
1. **Clone Repository**
   ```bash
   git clone https://github.com/username/go-laundry.git
   cd go-laundry
   ```

2. **Instal Dependensi**
   Jalankan perintah berikut untuk menginstal dependensi PHP menggunakan Composer:
   ```bash
   composer install
   ```

   terus bikin database dlu nama nya "go-laundry"

3. **Konfigurasi .env**
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```

   Edit file `.env` dan sesuaikan pengaturan database:
   ```plaintext
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=go-laundry
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Key Aplikasi**
   Jalankan perintah berikut untuk menghasilkan aplikasi key:
   ```bash
   php artisan key:generate
   ```

## Migrasi dan Seeding Database
1. **Migrasi Database**
   Jalankan perintah berikut untuk menjalankan migrasi dan membuat tabel di database:
   ```bash
   php artisan migrate
   ```

2. **Seeding Database**
   Untuk mengisi database dengan data dummy, jalankan perintah berikut:
   ```bash
   php artisan db:seed
   ```

   Jika Anda ingin menghapus semua tabel dan menjalankan migrasi serta seeder sekaligus, gunakan:
   ```bash
   php artisan migrate:fresh --seed
   ```

## Menjalankan Aplikasi
Setelah semua langkah di atas selesai, Anda dapat menjalankan server lokal dengan perintah:
```bash
php artisan serve
```

Akses aplikasi di browser Anda melalui:
```
http://localhost:8000
```

## Branching Strategy
Proyek ini menggunakan strategi branching untuk kolaborasi. Berikut adalah struktur branch yang digunakan:

- **Main**: Branch utama yang berisi kode yang sudah stabil dan siap untuk diproduksi.
- **Develop**: Branch pengembangan yang berisi fitur-fitur terbaru dan perubahan yang sedang dalam proses.
  - **Homepage**: Branch untuk pengembangan fitur homepage.
  - **Admin**: Branch untuk pengembangan fitur admin.
  - **Merchant**: Branch untuk pengembangan fitur merchant.
  - **User**: Branch untuk pengembangan fitur user.

Setiap anggota tim akan bekerja di branch masing-masing. Setelah selesai melakukan perubahan, anggota tim harus mengirimkan perubahan mereka ke branch `develop` untuk direview.

## Langkah-Langkah Penggunaan Git
1. **Membuat Branch Baru**
   Untuk membuat branch baru, gunakan perintah:
   ```bash
   git checkout -b nama_branch
   ```

2. **Beralih ke Branch yang Ada**
   Jika Anda ingin beralih ke branch yang sudah ada, gunakan:
   ```bash
   git checkout nama_branch
   ```

3. **Melihat Daftar Branch**
   Untuk melihat semua branch yang ada, gunakan:
   ```bash
   git branch
   ```

4. **Request Merge Request ke Develop**
   buka github cari merge request buat di review

5. **Mengirim Perubahan ke Remote Repository**
   klo udah di approve balik ke branch masing masing

6. **Klo ada status approve di branch Develop**
   semua anggota tim wajib pull dari branch Develop
   ```bash
   git checkout nama_branch_kau
   git pull origin develop
   ```

## Catatan Tambahan
- Pastikan untuk memeriksa file `.gitignore` untuk memastikan file sensitif tidak diunggah ke repository.
- Jika ada pertanyaan atau masalah, silakan hubungi pengembang proyek.

## Lisensi
Proyek ini dilisensikan di bawah [Lisensi MIT](LICENSE).
