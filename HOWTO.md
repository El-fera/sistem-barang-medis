# Panduan Menjalankan Project di Laptop Lain (Windows)

Panduan ini menjelaskan langkah-langkah untuk menjalankan Sistem Manajemen Barang Medis di laptop Windows.

---

## 📋 Persiapan Awal

### Yang Perlu Disiapkan:

1. **File Project** - Zip/compress seluruh folder project
2. **Database** (opsional) - Jika ada data yang perlu dipindah
3. **Software yang harus diinstall** di laptop target:
   - PHP 8.3 atau lebih tinggi
   - Composer
   - Node.js & NPM
   - Web Server (Apache/Nginx) atau bisa pakai PHP built-in server
   - Database (SQLite/MySQL) - sesuai konfigurasi

---

## 🚀 Langkah-Langkah Instalasi

### **Metode 1: Menggunakan XAMPP/WAMP (Recommended untuk Pemula)**

#### Step 1: Install Software Pendukung

**Untuk Windows:**
1. Download dan install **XAMPP** dari https://www.apachefriends.org/
   - Saat install, pastikan PHP, Apache, dan MySQL tercentang
2. Download dan install **Composer** dari https://getcomposer.org/
   - Ikuti installer dan ikuti petunjuk instalasi
3. Download dan install **Node.js** dari https://nodejs.org/
   - Pilih versi LTS (Long Term Support)
   - Ikuti installer dengan default settings

**Verifikasi Instalasi:**
Buka Command Prompt (CMD) atau PowerShell, ketik:
```bash
php --version
composer --version
node --version
npm --version
```

Semua harus menampilkan versi (PHP 8.3+, Composer, Node.js, NPM).

---

#### Step 2: Ekstrak Project

1. Ekstrak file zip project yang Anda dapatkan
2. Pindahkan folder project ke dalam folder web server:
   - **XAMPP**: `C:\xampp\htdocs\sistembarangmedis`
   - **WAMP**: `C:\wamp64\www\sistembarangmedis`

**Catatan**: Jika menggunakan Laragon, letakkan di `C:\laragon\www\sistembarangmedis`

---

#### Step 3: Konfigurasi Environment

1. Buka folder project di Command Prompt atau PowerShell
2. Copy file `.env.example` menjadi `.env`:
   ```bash
   copy .env.example .env
   ```

3. Generate application key:
   ```bash
   php artisan key:generate
   ```

4. Buka file `.env` dengan text editor (Notepad/VS Code) dan sesuaikan konfigurasi:

   **Jika menggunakan SQLite (default -Recommended):**
   ```env
   APP_NAME="Sistem Manajemen Barang Medis"
   APP_ENV=local
   APP_KEY= (sudah di-generate otomatis)
   APP_DEBUG=true
   APP_URL=http://localhost:8000

   DB_CONNECTION=sqlite
   # Pastikan baris DB_DATABASE tidak diubah atau dikomentari
   ```

   **Jika menggunakan MySQL:**
   ```env
   APP_NAME="Sistem Manajemen Barang Medis"
   APP_ENV=local
   APP_KEY= (sudah di-generate otomatis)
   APP_DEBUG=true
   APP_URL=http://localhost:8000

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_anda
   DB_USERNAME=root
   DB_PASSWORD= (password mysql Anda, biasanya kosong untuk XAMPP)
   ```

---

#### Step 4: Install Dependencies

Di Command Prompt/PowerShell yang masih berada di folder project, jalankan:

```bash
composer install
```

Tunggu hingga selesai (proses ini akan download library-library yang dibutuhkan, mungkin memakan waktu beberapa menit).

Kemudian install NPM dependencies:
```bash
npm install --ignore-scripts
```

---

#### Step 5: Setup Database

**Jika menggunakan SQLite:**
1. Buat file database SQLite:
   ```bash
   type nul > database\database.sqlite
   ```

2. Jalankan migrasi:
   ```bash
   php artisan migrate
   ```

**Jika menggunakan MySQL:**
1. Start XAMPP/WAMP, pastikan Apache dan MySQL berjalan
2. Buka phpMyAdmin (http://localhost/phpmyadmin)
3. Buat database baru dengan nama yang sama dengan di `.env`
4. Jalankan migrasi:
   ```bash
   php artisan migrate
   ```

**Opsional - Isi data dummy untuk testing:**
```bash
php artisan db:seed
```

---

#### Step 6: Build Assets

Compile CSS dan JavaScript:
```bash
npm run build
```

Atau untuk development (jika ingin mengembangkan lebih lanjut):
```bash
npm run dev
```

---

#### Step 7: Jalankan Aplikasi

**Metode A: Menggunakan PHP Built-in Server (Paling Mudah)**

```bash
php artisan serve
```

Aplikasi akan berjalan di: **http://localhost:8000**

Buka browser (Chrome/Firefox/Edge) dan akses: http://localhost:8000

**Metode B: Menggunakan Apache (XAMPP/WAMP)**

1. Start Apache di XAMPP/WAMP Control Panel
2. Buka browser dan akses: http://localhost/sistembarangmedis/public

---

## 🔐 Login ke Aplikasi

Setelah aplikasi berjalan:

1. Buka browser dan akses URL aplikasi
2. Klik **"Register"** untuk membuat akun baru
3. Isi data:
   - Name: Nama Anda
   - Email: email@example.com
   - Password: (minimal 8 karakter)
   - Confirm Password: (ulangi password)
4. Klik **"Register"**
5. Anda akan otomatis login dan diarahkan ke Dashboard

---

## 📦 Memindahkan Data dari Laptop Lama

### Jika Ingin Memindahkan Data yang Sudah Ada:

#### **Metode 1: Database Export/Import (MySQL)**

**Dari Laptop Lama:**
1. Buka phpMyAdmin (http://localhost/phpmyadmin)
2. Pilih database yang digunakan
3. Klik tab **"Export"**
4. Pilih **"Quick"** dan format **"SQL"**
5. Klik **"Go"** - file akan terdownload

**Ke Laptop Baru:**
1. Start XAMPP/WAMP, buka phpMyAdmin
2. Buat database baru dengan nama yang sama dengan di `.env`
3. Klik tab **"Import"**
4. Pilih file SQL yang tadi didownload
5. Klik **"Go"**

6. Update file `.env` dengan nama database yang baru dibuat

#### **Metode 2: Menggunakan SQLite (Paling Mudah)**

Jika menggunakan SQLite:
1. Copy file `database/database.sqlite` dari laptop lama
2. Paste di folder `database/` di laptop baru
3. Pastikan konfigurasi `.env` menggunakan SQLite (DB_CONNECTION=sqlite)

---

## ⚠️ Troubleshooting Umum

### **Error: "SQLSTATE[HY000] [14] unable to open database file"**

**Penyebab**: File SQLite tidak ada atau permission tidak benar

**Solusi**:
```bash
# Buat file database.sqlite
type nul > database\database.sqlite

# Set permission (jalankan CMD sebagai Administrator)
icacls database\database.sqlite /grant Users:F
```

---

### **Error: "Class not found"**

**Solusi**:
```bash
composer dump-autoload
```

---

### **Error: Assets tidak loading (CSS/JS tidak muncul)**

**Solusi**:
```bash
npm run build
```

Atau untuk development:
```bash
npm run dev
```

---

### **Error: "Permission denied" pada folder storage**

**Solusi** (jalankan CMD sebagai Administrator):
```bash
icacls storage /grant Users:F /T
icacls bootstrap\cache /grant Users:F /T
```

---

### **Error: "php artisan serve" tidak bisa dijalankan**

**Solusi**:
1. Pastikan PHP sudah terinstall dengan benar:
   ```bash
   php --version
   ```
   Harus menampilkan PHP 8.3 atau lebih tinggi

2. Pastikan APP_KEY sudah di-generate:
   ```bash
   php artisan key:generate
   ```

3. Pastikan file `.env` ada dan sudah dikonfigurasi

4. Restart Command Prompt/PowerShell setelah install PHP

---

### **Port 8000 sudah dipakai**

**Solusi**: Jalankan dengan port berbeda:
```bash
php artisan serve --port=8001
```

Atau matikan aplikasi yang menggunakan port 8000 terlebih dahulu.

---

### **Error: "No application encryption key has been specified"**

**Solusi**:
```bash
php artisan key:generate
```

---

### **Error: Composer tidak dikenali**

**Solusi**:
1. Restart Command Prompt/PowerShell
2. Atau jalankan dengan full path:
   ```bash
   C:\ProgramData\ComposerSetup\bin\composer install
   ```

---

### **Error: npm tidak dikenali**

**Solusi**:
1. Restart Command Prompt/PowerShell
2. Atau restart komputer setelah install Node.js

---

## 🎯 Quick Start (Ringkasan Cepat)

Untuk yang sudah familiar, berikut langkah cepat di Windows:

```bash
# 1. Extract project ke C:\xampp\htdocs\sistembarangmedis
# 2. Buka Command Prompt di folder project

# 3. Copy environment file
copy .env.example .env

# 4. Generate key
php artisan key:generate

# 5. Install dependencies
composer install
npm install --ignore-scripts

# 6. Setup database
type nul > database\database.sqlite
php artisan migrate

# 7. Build assets
npm run build

# 8. Jalankan aplikasi
php artisan serve

# 9. Buka browser ke http://localhost:8000
```

---

## 📝 Checklist Instalasi

Gunakan checklist ini untuk memastikan semua langkah sudah dilakukan:

- [ ] XAMPP/WAMP terinstall
- [ ] Composer terinstall
- [ ] Node.js & NPM terinstall
- [ ] Project diextract ke folder web server (C:\xampp\htdocs\sistembarangmedis)
- [ ] File `.env` sudah dibuat dari `.env.example`
- [ ] APP_KEY sudah di-generate
- [ ] Konfigurasi database sudah diatur di `.env`
- [ ] `composer install` sudah dijalankan
- [ ] `npm install` sudah dijalankan
- [ ] Database migration sudah dijalankan
- [ ] `npm run build` sudah dijalankan
- [ ] Aplikasi bisa dijalankan dengan `php artisan serve`
- [ ] Browser bisa mengakses aplikasi di http://localhost:8000
- [ ] Berhasil registrasi dan login

---

## 💡 Tips Penting

1. **Selalu backup database** sebelum melakukan migrasi atau update
2. **Jangan edit file `.env`** di production tanpa backup
3. **Gunakan SQLite** untuk development yang lebih mudah
4. **Set APP_DEBUG=false** di production untuk keamanan
5. **Routinely backup** data penting secara berkala
6. **Jangan share file `.env`** karena berisi kunci rahasia aplikasi
7. **Restart CMD/PowerShell** setelah install software baru
8. **Jalankan CMD sebagai Administrator** jika ada error permission

---

## 📞 Bantuan

Jika mengalami kendala yang tidak tercantum di atas:
1. Periksa kembali setiap langkah instalasi
2. Pastikan semua software terinstall dengan benar
3. Cek error message di terminal untuk petunjuk
4. Hubungi developer sistem untuk bantuan lebih lanjut

---

**Dibuat untuk memudahkan deployment Sistem Manajemen Barang Medis di Windows**