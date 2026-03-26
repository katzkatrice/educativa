# Environment Variables untuk Laravel Cloud

## Setup Database

Database Anda sudah tersedia di Laravel Cloud dengan detail:
- **Host:** `ep-proud-hill-a1227s39.aws-ap-southeast-1.pg.laravel.cloud`
- **Port:** `5432`
- **Driver:** `pgsql`

## Environment Variables yang Diperlukan

Set di Laravel Cloud Dashboard → Settings → Environment Variables:

```env
# App
APP_NAME=Educativa
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.laravel.cloud

# Database (dapatkan dari Laravel Cloud Dashboard)
DB_CONNECTION=pgsql
DB_HOST=ep-proud-hill-a1227s39.aws-ap-southeast-1.pg.laravel.cloud
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Session & Cache
SESSION_DRIVER=cookie
SESSION_SECURE_COOKIE=true
SESSION_LIFETIME=120

# CACHE_STORE akan di-inject otomatis oleh Laravel Cloud
# Jangan set manual jika Laravel Cloud sudah inject
# CACHE_STORE=database (otomatis dari Laravel Cloud)
```

## Injected Variables dari Laravel Cloud

Laravel Cloud mungkin meng-inject variables berikut secara otomatis (tidak dapat diubah):

- `CACHE_STORE=database` - Cache akan disimpan di tabel `cache`
- `SESSION_DRIVER=cookie` - Session disimpan di cookie
- `LOG_CHANNEL=stderr` - Log dikirim ke stderr

**Jika `CACHE_STORE=database` di-inject:**
1. Migration `create_cache_table` sudah disiapkan
2. Jalankan migration untuk membuat tabel cache
3. Tidak perlu set manual di dashboard

## Cara Mendapatkan Kredensial Database

1. Login ke [Laravel Cloud Dashboard](https://cloud.laravel.com)
2. Pilih project Anda
3. Buka menu **Database**
4. Klik pada database PostgreSQL Anda
5. Cari bagian **Credentials** atau **Connection Info**
6. Copy:
   - Database name
   - Username
   - Password

## Cara Mendapatkan APP_KEY

Jika belum ada, generate APP_KEY:

```bash
php artisan key:generate --show
```

Copy output dan set di Laravel Cloud Dashboard.

## Deploy Checklist

- [ ] Set semua environment variables di Laravel Cloud
- [ ] Jalankan migrations: `php artisan migrate --force`
- [ ] Clear cache: `php artisan optimize:clear`
- [ ] Test login admin

## Troubleshooting 403 Forbidden

Jika masih mendapat error 403 setelah login:

1. **Check logs** di Laravel Cloud Dashboard
2. **Verify user role** - pastikan user memiliki `role = 'admin'`
3. **Check session** - pastikan cookie session dibuat dengan benar
4. **Clear all caches**:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan route:clear
   php artisan view:clear
   ```

## Verifikasi User Admin

Untuk memastikan ada user admin di database:

```bash
php artisan tinker
>>> App\Models\User::where('role', 'admin')->get();
```

Jika tidak ada, buat user admin:

```bash
php artisan tinker
>>> App\Models\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password'), 'role' => 'admin']);
```
