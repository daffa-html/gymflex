# GymFlex

Website katalog dan manajemen peralatan olahraga, dibangun dengan Laravel 12 dan panel admin Filament 5.

## Fitur

- Halaman publik: beranda, tentang, katalog produk (dengan halaman detail per produk), galeri, brand ambassador, dan kontak
- Form kontak tersimpan ke database
- Panel admin Filament di `/admin` untuk mengelola produk, kategori produk, galeri, brand ambassador, dan pesan kontak

## Teknologi

| Bagian      | Teknologi     |
| ----------- | ------------- |
| Framework   | Laravel 12    |
| Panel Admin | Filament 5    |
| Styling     | Tailwind CSS 4 |
| Build Tool  | Vite 7        |
| Database    | MySQL         |

## Struktur Project

```
├── app/
│   ├── Filament/          # Resource & panel admin
│   ├── Http/Controllers/  # Controller halaman publik
│   └── Models/            # Model Eloquent
├── database/migrations/   # Skema database
├── docker/entrypoint.sh   # Entrypoint container (Railway)
├── resources/views/       # Blade views
├── routes/web.php         # Rute halaman publik
└── Dockerfile             # Build multi-stage untuk deployment
```

## Menjalankan Secara Lokal

Persyaratan: PHP 8.3+, Composer, Node.js 20+, MySQL

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
php artisan serve
```

- Website: `http://localhost:8000`
- Panel admin: `http://localhost:8000/admin`
- Membuat user admin baru: `php artisan make:filament-user`

## Deployment (Railway)

Project ini berisi `Dockerfile` multi-stage:

1. Tahap aset: `npm ci && npm run build` (Node 22)
2. Tahap aplikasi: PHP 8.3 + ekstensi (`pdo_mysql`, `intl`, `zip`, `bcmath`, `gd`, `opcache`), `composer install`, lalu dijalankan dengan `php artisan serve` melalui `docker/entrypoint.sh` (migrasi otomatis saat start).

Variabel environment yang dibutuhkan:

| Variabel          | Nilai                    |
| ----------------- | ------------------------ |
| `APP_NAME`        | `GymFlex`                |
| `APP_ENV`         | `production`             |
| `APP_KEY`         | hasil `php artisan key:generate --show` |
| `APP_URL`         | domain Railway           |
| `APP_DEBUG`       | `false`                  |
| `DB_CONNECTION`   | `mysql`                  |
| `DB_HOST`         | host MySQL Railway       |
| `DB_PORT`         | port MySQL Railway       |
| `DB_DATABASE`     | nama database            |
| `DB_USERNAME`     | user database            |
| `DB_PASSWORD`     | password database        |
| `SESSION_DRIVER`  | `database`               |
| `CACHE_STORE`     | `database`               |
| `QUEUE_CONNECTION`| `database`               |
| `FILESYSTEM_DISK` | `public`                 |

## Lisensi

Proyek pembelajaran.
