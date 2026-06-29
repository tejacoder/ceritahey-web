# Panduan Deploy CeritaHey

## 1. Prasyarat Server

- PHP ^8.3 + extensions: bcmath, ctype, fileinfo, json, mbstring, openssl, PDO, pdo_mysql/pdo_sqlite, tokenium, xml
- Composer 2.x
- Node.js 20+ + npm
- MySQL 8+ (or SQLite — lihat catatan di bawah)
- Web server: Nginx or Apache
- Supervisor (for queue worker)

## 2. Clone & Setup

```bash
cd /var/www/
git clone https://github.com/tejacoder/ceritahey-web.git
cd ceritahey-web
composer install --no-dev --optimize-autoloader
npm ci && npm run build
```

## 3. Environment

```bash
cp .env.example .env
nano .env  # isi sesuai server
```

**.env wajib diisi:**

```
APP_NAME=CeritaHey
APP_ENV=production
APP_DEBUG=false
APP_URL=https://ceritahey.aksendigi.com   # domain production

DB_CONNECTION=mysql              # or sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ceritahey
DB_USERNAME=ceritahey_user
DB_PASSWORD=password_kuat

APP_KEY=                         # generate: php artisan key:generate
```

**Catatan DB:** Project ini default MySQL. Kalau mau SQLite:

```
DB_CONNECTION=sqlite
# hapus/komentari DB_HOST/DB_PORT/DB_DATABASE/DB_USERNAME/DB_PASSWORD
# lalu: touch database/database.sqlite
```

## 4. Migrate & Seed

```bash
php artisan migrate --force
# kalau perlu admin user:
php artisan db:seed --force  # optional
```

## 5. Storage Link

```bash
php artisan storage:link
chmod -R 775 storage bootstrap/cache
```

## 6. Queue Worker

CeritaHey pakai database queue untuk proses pembayaran. Setup dengan **Supervisor**:

File `/etc/supervisor/conf.d/ceritahey-worker.conf`:

```
[program:ceritahey-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/ceritahey-web/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/var/log/ceritahey-worker.log
startsecs=0
```

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start ceritahey-worker:*
```

## 7. Nginx Config

File `/etc/nginx/sites-available/ceritahey`:

```nginx
server {
    listen 80;
    server_name ceritahey.aksendigi.com www.ceritahey.aksendigi.com;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    server_name ceritahey.aksendigi.com www.ceritahey.aksendigi.com;

    root /var/www/ceritahey-web/public;
    index index.php;

    ssl_certificate /etc/letsencrypt/live/ceritahey.aksendigi.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/ceritahey.aksendigi.com/privkey.pem;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

SSL via Let's Encrypt:

```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d ceritahey.aksendigi.com -d www.ceritahey.aksendigi.com
```

## 8. Tripay Payment Gateway

Tripay callback endpoint: `POST /payment/callback`

Pastikan di Tripay dashboard:
- Callback URL: `https://ceritahey.aksendigi.com/payment/callback`
- Return URL: `https://ceritahey.aksendigi.com/payment/{payment}/waiting`

Set .env vars (cek .env.example):

```
TRIPAY_API_KEY=
TRIPAY_PRIVATE_KEY=
TRIPAY_MERCHANT_CODE=
TRIPAY_MODE=production  # production, bukan development
```

## 9. Session & Cache

Project ini pakai **database** untuk session & cache. Migrate sudah include.

Pastikan table `sessions` dan `cache` sudah terbuat dari migrasi default.

## 10. Crontab (Optional)

Schedule untuk reset atau maintenance:

```bash
crontab -e
# tambah:
* * * * * cd /var/www/ceritahey-web && php artisan schedule:run >> /dev/null 2>&1
```

## 11. Security Checklist

- [ ] APP_DEBUG=false
- [ ] APP_KEY sudah digenerate (php artisan key:generate)
- [ ] .env permission: chmod 600 .env
- [ ] storage/ chmod 775, owner www-data
- [ ] Firewall cuma buka port 80, 443, 22
- [ ] Database user terbatas (bukan root)
- [ ] Tripay private key aman
- [ ] Hapus storage/logs/laravel.log sebelum deploy

## 12. Test Deploy

```bash
php artisan down --retry=60   # maintenance mode
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan up                  # live
```

Coba akses:
- Home: https://ceritahey.aksendigi.com/
- Register: https://ceritahey.aksendigi.com/register
- Login: https://ceritahey.aksendigi.com/login
- Admin: https://ceritahey.aksendigi.com/admin (butuh user admin)
- Tripay callback: `POST https://ceritahey.aksendigi.com/payment/callback`
