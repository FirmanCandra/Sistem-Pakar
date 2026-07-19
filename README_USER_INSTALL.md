# Sistem Pakar (Laravel) — Panduan Instalasi

> Dokumen ini dibuat untuk membantu user menjalankan project di lokal sebelum dipublikasikan.

---

## 1) Persyaratan Sistem (Requirements)
Pastikan komputer/server Anda memiliki:
- **PHP 8.3+**
- **Composer**
- **Node.js 18+** dan **npm** (untuk build assets Vite)
- **Database**: MySQL/MariaDB (atau ubah sesuai kebutuhan di `.env`)

---

## 2) Persiapan Project
### A. Clone repository
```bash
git clone <url-repository>
cd sistempakar
```

### B. Install dependency PHP (Composer)
```bash
composer install
```

### C. Salin file konfigurasi `.env`
1. Pastikan file contoh tersedia: **`.env.example`**
2. Buat `.env` dengan cara:
```bash
copy .env.example .env
```

### D. Konfigurasi database
Buka file `.env` lalu atur:
- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`

---

## 3) Generate Application Key
```bash
php artisan key:generate
```

---

## 4) Migrasi & Seeder (Data Awal)
Jalankan:
```bash
php artisan migrate --seed
```

Dengan perintah ini, database akan:
- membuat tabel sesuai migration
- mengisi data awal (termasuk data *plant*, *question*, *rule*)
- membuat akun admin default

### Akun Admin Default
Setelah `--seed` dijalankan, akun admin default:
- **Email:** `admin@gmail.com`
- **Password:** `admin123`

---

## 5) Build Asset Frontend (Vite)
### A. Install dependency frontend
```bash
npm install
```

### B. Build assets
Untuk produksi:
```bash
npm run build
```

Jika ingin mode development (lebih cepat saat perubahan):
```bash
npm run dev
```

---

## 6) Menjalankan Aplikasi
Jalankan server Laravel:
```bash
php artisan serve
```

Lalu akses:
- Aplikasi utama: `http://127.0.0.1:8000/`
- Admin: `http://127.0.0.1:8000/admin`

---

## 7) (Jika diperlukan) Storage Link
Beberapa project Laravel membutuhkan symlink agar file storage bisa terbaca.
Jika muncul masalah terkait file di `storage`, jalankan:
```bash
php artisan storage:link
```

---

## 8) Catatan Penting untuk Deployment
- Jangan commit file `.env` ke GitHub.
- Pastikan folder `storage/` dan `bootstrap/cache/` memiliki permission yang sesuai.

---

## Struktur Singkat Project
- `routes/web.php`: routing aplikasi dan admin
- `database/migrations/`: struktur tabel
- `database/seeders/`: data awal (termasuk plant/question/rule dan admin)
- `app/Services/ForwardChainingService.php`: implementasi metode forward chaining

---

## Troubleshooting (Umum)
- **Error PHP version**: pastikan PHP minimal **8.3**.
- **Error Node/Vite**: pastikan Node.js dan npm terpasang, lalu jalankan ulang `npm install`.
- **Error database**: pastikan konfigurasi `.env` benar dan database sudah dibuat.

---

Selamat mencoba! 

