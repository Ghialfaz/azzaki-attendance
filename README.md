# Sistem Informasi Absensi Siswa TK Azzaki

Aplikasi web untuk mengelola data siswa, kelas, dan absensi di TK Azzaki dengan antarmuka yang user-friendly dan responsif.

## Jurnal
https://drive.google.com/drive/folders/1-6zdFftyTSE4FVO-81e_y1cIUDhqdQIB

## 📋 Daftar Isi

- [Fitur](#fitur)
- [Teknologi](#teknologi)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Konfigurasi Database](#konfigurasi-database)
- [Menjalankan Seeder](#menjalankan-seeder)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Preview Tampilan](#preview-tampilan)
- [Struktur Folder](#struktur-folder)
- [Akun Default](#akun-default)
- [Dokumentasi API](#dokumentasi-api)

## ✨ Fitur

### Admin
- 📊 Dashboard dengan statistik lengkap
- 👥 Kelola data akun pengguna
- 🏫 Kelola data kelas
- 👨‍🎓 Kelola data siswa (CRUD)
- 📅 Kelola jadwal
- 📈 Rekap absensi lengkap
- 🔐 Sistem keamanan berbasis role

### Guru
- 📊 Dashboard dengan statistik kelas
- 👨‍🎓 Lihat data siswa di kelas
- ✏️ Input absensi harian
- 📊 Rekap absensi per tanggal
- 📄 Export rekap ke PDF dan Excel
- ✏️ Edit absensi yang sudah diinput
- 🗑️ Hapus absensi jika diperlukan

## 🛠️ Teknologi

- **Backend:** Laravel 11
- **Frontend:** Blade Templates, Tailwind CSS
- **Database:** SQLite
- **Server:** Apache (XAMPP) / PHP Built-in Server
- **JavaScript:** Alpine.js
- **Icon:** Heroicons
- **Build Tool:** Vite

## 💻 Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js >= 16
- SQLite (sudah built-in di PHP)
- XAMPP atau server lokal lainnya

## 📦 Instalasi

### 1. Clone atau Download Proyek

```bash
cd /opt/lampp/htdocs
# atau clone dari repository
git clone <repository-url> azzaki-attendance
cd azzaki-attendance
```

### 2. Install Dependencies PHP

```bash
composer install
```

### 3. Install Dependencies Node.js

```bash
npm install
```

### 4. Setup Environment File

```bash
cp .env.example .env
```

Edit file `.env` dan pastikan database driver adalah SQLite:

```env
APP_NAME="TK Azzaki Attendance"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
# Tidak perlu konfigurasi host, port, username, password untuk SQLite
```

### 5. Buat File Database SQLite

```bash
touch database/database.sqlite
```

### 6. Generate Application Key

```bash
php artisan key:generate
```

## 🗄️ Konfigurasi Database

### 1. Verifikasi File SQLite

File database SQLite akan otomatis tersimpan di `database/database.sqlite`

```bash
# Cek apakah file sudah ada
ls -la database/database.sqlite
```

### 2. Jalankan Migration

```bash
php artisan migrate
```

Output yang diharapkan:
```
Migrating: 2024_01_01_000000_create_users_table
Migrated:  2024_01_01_000000_create_users_table (123.45ms)
Migrating: 2024_01_01_000001_create_kelas_table
Migrated:  2024_01_01_000001_create_kelas_table (98.76ms)
...
```

### 3. Verifikasi Database

```bash
sqlite3 database/database.sqlite ".tables"
```

## 🌱 Menjalankan Seeder

Seeder digunakan untuk memasukkan data awal ke database, termasuk akun default untuk login.

### Jalankan Semua Seeder

```bash
php artisan db:seed
```

### Jalankan Seeder Spesifik

```bash
php artisan db:seed --seeder=UserSeeder
```

### Output UserSeeder

Setelah menjalankan seeder, akan membuat 2 akun default:

```
Seeding: Database\Seeders\UserSeeder
Seeded:  Database\Seeders\UserSeeder (45.23ms)
Total time: 0.85s
```

### Reset Database + Seeder (Fresh Start)

```bash
php artisan migrate:fresh --seed
```

Perintah ini akan:
1. Drop semua tabel
2. Jalankan ulang semua migration
3. Jalankan semua seeder

## 🚀 Menjalankan Aplikasi

### 1. Compile Assets (Tailwind CSS & JS)

**Development mode:**
```bash
npm run dev
```

Biarkan terminal ini tetap berjalan untuk live reload

**Production mode:**
```bash
npm run build
```

### 2. Jalankan Development Server (Terminal Baru)

```bash
php artisan serve
```

Server akan berjalan di: `http://127.0.0.1:8000`

### 3. Akses Aplikasi

- **Home:** `http://localhost:8000`
- **Login:** `http://localhost:8000/login`
- **Admin Dashboard:** `http://localhost:8000/admin/dashboard`
- **Guru Dashboard:** `http://localhost:8000/guru/dashboard`

## 🎨 Preview Tampilan

### Halaman Home/Landing Page
![Home Page](./public/img/preview-home.png)
- Hero section dengan background image
- Firefly animation effect
- Informasi tentang TK Azzaki
- Daftar guru dengan foto
- Galeri kegiatan
- Footer dengan contact information


### Guru - Rekap Absensi Harian
![Guru Rekap Harian](./public/img/preview-guru-rekap-harian.png)
- Header dengan judul kelas dan tahun ajaran
- Statistik ringkas (Hadir, Sakit, Izin, Alfa) dalam 4 card
- Tabel rekap dengan kolom: Nama Siswa, Status, Keterangan
- Action buttons: Edit, Hapus, Export PDF, Export Excel
- Status badges dengan warna berbeda

### Sidebar Navigation
![Sidebar Admin](./public/img/preview-sidebar-admin.png)
- Logo dan title TK Azzaki
- Menu navigation dengan icon SVG
- Dropdown menu untuk Akademik (Admin)
- Highlight active menu
- Logout button

## 📁 Struktur Folder

```
azzaki-attendance/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── AdminDashboardController.php
│   │   │   ├── GuruDashboardController.php
│   │   │   ├── SiswaController.php
│   │   │   ├── KelasController.php
│   │   │   └── AbsensiController.php
│   │   └── Middleware/
│   │       ├── EnsureTokenIsValid.php
│   │       └── PreventBackHistory.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Siswa.php
│   │   ├── Kelas.php
│   │   └── Absensi.php
│   └── ...
├── database/
│   ├── database.sqlite (Created after migration)
│   ├── migrations/
│   ├── seeders/
│   │   ├── UserSeeder.php
│   │   ├── KelasSeeder.php
│   │   └── SiswaSeeder.php
│   └── ...
├── resources/
│   ├── views/
│   │   ├── home.blade.php
│   │   ├── login.blade.php
│   │   ├── admin/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── siswa/
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   └── edit.blade.php
│   │   │   └── kelas/
│   │   ├── guru/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── absensi/
│   │   │   │   ├── form.blade.php
│   │   │   │   ├── kelas.blade.php
│   │   │   │   ├── rekap-harian.blade.php
│   │   │   │   └── edit-harian.blade.php
│   │   │   └── siswa/
│   │   │       └── index.blade.php
│   │   └── layouts/
│   │       ├── dashboard.blade.php
│   │       ├── sidebar-admin.blade.php
│   │       └── sidebar-guru.blade.php
│   ├── css/
│   │   └── app.css
│   └── js/
│       └── app.js
├── routes/
│   └── web.php
├── public/
│   └── img/
│       ├── Icon.png
│       ├── HeroSection.jpg
│       ├── Gallery1.jpg - Gallery6.jpg
│       ├── preview-*.png (Screenshots)
│       └── ...
├── .env.example
├── .gitignore
├── composer.json
├── package.json
├── tailwind.config.js
├── vite.config.js
└── README.md
```

## 🔐 Akun Default

Setelah menjalankan seeder, gunakan akun berikut untuk login:

### Admin
```
Username: admin
Password: admin123
URL: http://localhost:8000/admin/dashboard
```

### Guru
```
Username: guru
Password: guru123
URL: http://localhost:8000/guru/dashboard
```

> ⚠️ **Penting:** Ubah password default setelah login pertama kali untuk keamanan!

## 📚 Dokumentasi API

### Authentication
- `GET /` - Halaman home/landing page
- `GET /login` - Halaman login
- `POST /login` - Process login
- `POST /logout` - Logout dari aplikasi

### Admin Routes (Requires Role: Admin)
- `GET /admin/dashboard` - Lihat dashboard admin
- `GET /admin/akun` - Kelola data akun
- `GET /admin/kelas` - List data kelas
- `GET /admin/kelas/tambah` - Form tambah kelas
- `POST /admin/kelas` - Store kelas baru
- `GET /admin/kelas/{id}/edit` - Form edit kelas
- `PUT /admin/kelas/{id}` - Update kelas
- `DELETE /admin/kelas/{id}` - Hapus kelas
- `GET /admin/siswa` - List semua siswa
- `GET /admin/siswa/create` - Form tambah siswa
- `POST /admin/siswa` - Store siswa baru
- `GET /admin/siswa/{id}/edit` - Form edit siswa
- `PUT /admin/siswa/{id}` - Update siswa
- `DELETE /admin/siswa/{id}` - Hapus siswa

### Guru Routes (Requires Role: Guru)
- `GET /guru/dashboard` - Lihat dashboard guru
- `GET /guru/kelas/{mode}` - Pilih kelas (mode: absen/rekap)
- `GET /guru/absensi/{id_kelas}` - Form input absensi
- `POST /guru/absensi/{id_kelas}` - Submit absensi
- `GET /guru/rekap/{id_kelas}` - Pilih tanggal rekap
- `POST /guru/rekap/{id_kelas}` - Lihat rekap harian
- `GET /guru/rekap/{id_kelas}/edit/{tanggal}` - Edit absensi harian
- `PUT /guru/rekap/{id_kelas}/edit/{tanggal}` - Update absensi harian
- `DELETE /guru/rekap/{id_kelas}/delete/{tanggal}` - Hapus semua absensi hari itu
- `GET /guru/rekap/{id_kelas}/export/pdf/{tanggal}` - Export PDF
- `GET /guru/rekap/{id_kelas}/{tanggal}/excel` - Export Excel
- `GET /guru/siswa` - List data siswa

## 🐛 Troubleshooting

### Error: "SQLSTATE[HY000]: General error: 1 unable to open database file"
```bash
# Pastikan direktori database writable
chmod 775 database/
chmod 666 database/database.sqlite
```

### Error: "Class 'Illuminate\Support\Str' not found"
```bash
composer update
php artisan cache:clear
php artisan config:clear
```

### Error: "No such file or directory" saat migrate
```bash
# Buat file SQLite secara manual
touch database/database.sqlite
php artisan migrate
```

### Assets tidak ter-compile (CSS/JS tidak muncul)
```bash
npm run build
php artisan serve
# Atau gunakan npm run dev di terminal terpisah
```

### Seeder gagal karena duplikasi data
```bash
php artisan migrate:fresh --seed
```

### Permission denied saat membuat database.sqlite
```bash
sudo chmod 777 database/
php artisan migrate
```

## 🔧 Development Commands

```bash
# Jalankan development server
php artisan serve

# Compile assets (development)
npm run dev

# Compile assets (production)
npm run build

# Jalankan migration
php artisan migrate

# Rollback migration
php artisan migrate:rollback

# Reset database + seeder
php artisan migrate:fresh --seed

# Jalankan seeder tertentu
php artisan db:seed --seeder=UserSeeder

# Clear cache
php artisan cache:clear
php artisan config:clear

# Generate key
php artisan key:generate

# Buat migration
php artisan make:migration create_table_name

# Buat model
php artisan make:model ModelName

# Buat controller
php artisan make:controller ControllerName
```

## 📝 Lisensi

Proyek ini dikembangkan untuk TK Azzaki.

## 👤 Kontributor

- **Developer:** Ghi, Ropi, Arul, Idan
