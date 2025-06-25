📘 Aplikasi Manajemen Buku Digital

BookNest adalah aplikasi web untuk mengelola dan mengeksplorasi buku secara digital. Dibuat dengan Laravel dan PostgreSQL, aplikasi ini dirancang agar pengguna dapat berbagi koleksi buku, memberikan penilaian, hingga berdiskusi lewat komentar. Sistem ini juga dilengkapi grafik statistik dan dashboard interaktif untuk memantau aktivitas pengguna serta koleksi buku.

🔑 Fitur Autentikasi
Registrasi & login

Verifikasi email (akses dashboard hanya untuk user terverifikasi)

Lupa kata sandi & reset via email

Ubah password langsung dari halaman profil

Proteksi akses dengan middleware auth dan verified

📊 Dashboard
Ringkasan jumlah buku & pengguna

Pie chart status verifikasi pengguna

Grafik bar buku yang ditambahkan tiap bulan

Tampilan dinamis berbasis Chart.js

👤 Kelola Pengguna
Daftar semua pengguna

Fitur pencarian berdasarkan nama atau email

Filter status verifikasi

Pagination responsif

Tanggal pengguna bergabung juga ditampilkan

📚 Eksplorasi Buku (Tanpa Login)
Halaman eksplorasi buku terbuka untuk publik

Cari berdasarkan judul

Filter berdasarkan rating

Detail buku menampilkan cover, deskripsi, komentar, dan rating

Pagination otomatis

✍️ Kelola Buku Sendiri
Tambah buku dengan cover dan deskripsi

Edit atau hapus buku yang dimiliki

Validasi lengkap di sisi server

Hanya user login yang bisa mengelola bukunya

🌟 Penilaian & Komentar
Setiap user bisa memberi rating (1–5 bintang) untuk setiap buku

Komentar dapat ditulis dan dihapus oleh pemilik komentar

Fitur hanya aktif untuk user login dan sudah verifikasi email

🧪 Pengujian Aplikasi
Unit Test: untuk memvalidasi logika penting seperti input buku dan autentikasi

Integration Test: mencakup rating, komentar, dan fitur pencarian/filter

⚙️ Teknologi yang Digunakan
Framework: Laravel 10.x

Frontend: Blade (Laravel Breeze)

Database: PostgreSQL

Autentikasi: Laravel Breeze dengan verifikasi email

Grafik: Chart.js

Styling: Tailwind CSS

Email Dev: Mailtrap

Testing: PHPUnit

🚀 Cara Menjalankan Project
1. Clone Repositori
bash
Copy
Edit
git clone https://github.com/fachrill/SmartBook.git
cd booknest

2. Install Dependensi
bash
Copy
Edit
composer install
npm install

3. Salin .env dan Generate Key
bash
Copy
Edit
cp .env.example .env
php artisan key:generate

4. Konfigurasi Database (PostgreSQL)
env
Copy
Edit
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=booknest
DB_USERNAME=postgres
DB_PASSWORD=your_password

5. Migrasi & Seeder
bash
Copy
Edit
php artisan migrate --seed

6. Buat Storage Link dan Jalankan Laravel
bash
Copy
Edit
php artisan storage:link
php artisan serve

7. Jalankan Frontend Dev Server
bash
Copy
Edit
npm run dev

8. Konfigurasi Mailtrap (untuk testing email)
env
Copy
Edit
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=xxxxxxx
MAIL_PASSWORD=yyyyyyy
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="SmartBook"

🔍 Menjalankan Testing
bash
Copy
Edit
php artisan test

🧑‍💻 Tentang Proyek Ini
Proyek ini dikembangkan dalam waktu 2 hari sebagai bagian dari technical test Fullstack Developer. Tujuan dari pengerjaan ini adalah untuk menunjukkan pemahaman saya terhadap alur kerja pengembangan aplikasi fullstack dengan Laravel dan PostgreSQL, mencakup fitur inti seperti autentikasi, manajemen data, interaksi pengguna, hingga visualisasi data.

Selama proses singkat ini, saya berusaha menerapkan praktik terbaik dalam struktur kode, validasi, serta penggunaan fitur built-in Laravel seperti Breeze dan policy authorization. Saya juga menambahkan pengujian unit dan integrasi sebagai bentuk penerapan testable architecture.

⏱ Timeline Singkat Pengerjaan (2 Hari)
Hari	Aktivitas
1	Setup proyek, perancangan database, konfigurasi autentikasi (login, register, verifikasi email), migrasi, dan mulai membangun CRUD buku
2	Implementasi fitur rating & komentar, dashboard interaktif dengan Chart.js, pengujian aplikasi, validasi form, dan penyusunan dokumentasi

⚠️ Tantangan yang Dihadapi
Efisiensi waktu: Dengan durasi hanya 2 hari, saya harus membagi waktu secara efisien antara implementasi fitur inti, testing, dan dokumentasi.

Pengelolaan relasi antar tabel: Mengatur relasi antar user, buku, komentar, dan rating agar tetap konsisten dan tidak menimbulkan bug saat query.

Visualisasi data real-time: Mengolah data statistik pengguna & buku secara dinamis untuk ditampilkan dalam grafik membutuhkan query yang cukup kompleks.

🚧 Potensi Pengembangan Selanjutnya
Jika proyek ini dilanjutkan setelah technical test, beberapa pengembangan yang bisa ditambahkan antara lain:

🔐 Role Admin untuk mengelola seluruh buku & pengguna

🔄 Sistem notifikasi untuk interaksi seperti komentar baru

📚 Kategori atau genre buku

🌐 REST API untuk konsumsi aplikasi mobile

🧾 Fitur export/import data (CSV, Excel)