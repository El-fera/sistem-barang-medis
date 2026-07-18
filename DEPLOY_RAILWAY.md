# Deploy ke Railway.app - Step by Step

## 📋 Persiapan

Pastikan Anda sudah memiliki:
- ✅ Akun GitHub
- ✅ Repository sudah di-push ke GitHub (https://github.com/El-fera/sistem-barang-medis)
- ✅ File `railway.json` sudah ada di repo

---

## 🚀 Langkah 1: Buat Akun Railway

1. Buka browser dan kunjungi: **https://railway.app**
2. Klik tombol **"Login"** di pojok kanan atas
3. Pilih **"Login with GitHub"**
4. Authorize Railway untuk mengakses akun GitHub Anda
5. Anda akan diarahkan ke Railway dashboard

---

## 🚀 Langkah 2: Buat Project Baru

1. Di Railway dashboard, klik tombol **"New Project"**
2. Pilih **"Deploy from GitHub repo"**
3. Jika diminta, klik **"Configure GitHub App"** untuk memberikan akses
4. Pilih repository: **`sistem-barang-medis`** dari daftar
5. Klik **"Deploy Now"**

Railway akan mulai:
- Meng-clone repository
- Mendeteksi file `railway.json`
- Menginstall dependencies (composer install, npm install)
- Build aplikasi
- Deploy ke server

**Proses ini memakan waktu 2-5 menit.**

---

## 🚀 Langkah 3: Tambah Database (MySQL)

Railway menyediakan database MySQL gratis:

1. Di project Anda, klik tombol **"New"** → **"Database"** → **"MySQL"**
2. Railway akan membuat MySQL database secara otomatis
3. Klik pada database yang baru dibuat
4. Di tab **"Connect"**, Anda akan melihat:
   - **Host:** `mysql.railway.app`
   - **Port:** `3306`
   - **Username:** `root`
   - **Password:** (auto-generated)
   - **Database:** (auto-generated)

**Copy semua kredensial ini!**

---

## 🚀 Langkah 4: Set Environment Variables

1. Klik pada service **Web** (aplikasi Laravel Anda)
2. Pilih tab **"Variables"**
3. Klik **"New Variable"** dan tambahkan satu per satu:

### Variable Wajib:

```env
APP_NAME=Sistem Barang Medis
APP_ENV=production
APP_KEY=base64:GENERATE_KEY_DISINI
APP_DEBUG=false
APP_URL=https://sistem-barang-medis-production.up.railway.app

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=tokaido.proxy.rlwy.net
DB_PORT=57937
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=ArAgDkwCDzRtsYYeKTuzFWfXEScSxFFr

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

### Cara Generate APP_KEY:

```bash
# Di terminal lokal, jalankan:
php artisan key:generate --show
```

Copy outputnya (misal: `base64:Q2Fy...`) dan paste ke variable `APP_KEY`.

---

## 🚀 Langkah 5: Deploy Ulang

1. Setelah semua environment variables sudah di-set
2. Klik tombol **"Deploy"** di pojok kanan atas
3. Tunggu proses deploy selesai (1-2 menit)
4. Lihat log untuk memastikan tidak ada error

---

## 🚀 Langkah 6: Jalankan Migrasi

Setelah deploy berhasil, jalankan migrasi database:

**Opsi 1: Via Railway CLI (Recommended)**

```bash
# Install Railway CLI
npm i -g @railway/cli

# Login
railway login

# Link ke project Anda
railway link

# Jalankan migrasi
railway run php artisan migrate --force
```

**Opsi 2: Via Railway Dashboard**

1. Klik service **Web**
2. Pilih tab **"Deployments"**
3. Klik **"Run Command"**
4. Masukkan: `php artisan migrate --force`
5. Klik **"Run"**

**Opsi 3: Via Railway CLI dengan kredensial database**

```bash
# Set environment variables dan jalankan migrasi
railway run php artisan migrate --force
```

---

## 🚀 Langkah 7: Test Aplikasi

1. Klik service **Web** di Railway dashboard
2. Di tab **"Settings"**, copy **"Public URL"** (misal: `https://sistem-barang-medis-production.up.railway.app`)
3. Buka URL tersebut di browser
4. Login dengan akun default:
   - **Email:** `admin@example.com`
   - **Password:** `password`

**Catatan:** Jika aplikasi error, cek Railway Logs untuk melihat pesan error.

---

## 🚀 Langkah 8: (Opsional) Setup Custom Domain

Jika ingin menggunakan domain sendiri:

1. Di Railway dashboard, klik service **Web**
2. Pilih tab **"Settings"**
3. Scroll ke **"Domains"**
4. Klik **"Add Domain"**
5. Masukkan domain Anda (misal: `sistembarangmedis.com`)
6. Ikuti instruksi untuk mengubah DNS records di domain provider Anda

---

## 🔧 Troubleshooting

### Error: "Class not found"

**Solusi:** Clear cache dan rebuild
```bash
railway run php artisan config:clear
railway run php artisan cache:clear
```

### Error: "Database connection failed"

**Solusi:** 
1. Pastikan MySQL service sudah running
2. Cek kredensial database di environment variables
3. Pastikan `DB_HOST` menggunakan domain dari Railway (bukan localhost)

### Error: "Storage permission denied"

**Solusi:** 
```bash
railway run php artisan storage:link
```

### Error: "Asset not loading (CSS/JS)"

**Solusi:** Build ulang assets
```bash
railway run npm run build
```

### Error: "APP_KEY not set"

**Solusi:** Generate dan set APP_KEY
```bash
php artisan key:generate --show
# Copy output dan set di Railway Variables
```

---

## 📊 Monitoring

### Melihat Logs

1. Klik service **Web**
2. Pilih tab **"Logs"**
3. Anda akan melihat real-time logs dari aplikasi

### Monitoring Metrics

1. Klik service **Web**
2. Pilih tab **"Metrics"**
3. Lihat CPU, Memory, dan Network usage

---

## 🔄 Update Aplikasi

Setiap kali Anda push ke GitHub:

1. Railway akan **otomatis detect** perubahan
2. Railway akan **otomatis deploy** ulang
3. Anda bisa monitor progress di tab **"Deployments"**

---

## 💰 Biaya

Railway offers:
- **Free tier:** $5 credit per bulan
- **Hobby plan:** $5/bulan (tidak ada sleep)
- **Pro plan:** $20/bulan

Untuk project akademis, free tier sudah cukup.

---

## 📞 Support

Jika mengalami masalah:
1. Cek Railway docs: https://docs.railway.app
2. Cek Railway Discord: https://discord.gg/railway
3. Cek logs di Railway dashboard untuk error details

---

## ✅ Checklist Deploy

- [ ] Akun Railway dibuat
- [ ] Project baru dibuat dan connect ke GitHub
- [ ] MySQL database dibuat
- [ ] Environment variables di-set (APP_KEY, DB credentials, dll)
- [ ] Migrasi database dijalankan
- [ ] Aplikasi bisa diakses via public URL
- [ ] Login berhasil dengan akun default
- [ ] Semua fitur CRUD berfungsi

---

**Selamat! Aplikasi Anda sudah live di Railway.app 🎉**

**URL:** `https://your-app.up.railway.app`