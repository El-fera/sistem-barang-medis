# LAPORAN PROJECT
## Sistem Manajemen Inventaris Barang Medis

---

**Nama Project:** Sistem Manajemen Inventaris Barang Medis  
**Tipe Project:** Aplikasi Web-Based CRUD  
**Framework:** Laravel 11  
**Database:** MySQL / SQLite  
**Tahun:** 2026  

---

## DAFTAR ISI

1. [Pendahuluan](#bab-1-pendahuluan)
2. [Tinjauan Pustaka](#bab-2-tinjauan-pustaka)
3. [Metodologi](#bab-3-metodologi)
4. [Analisis dan Perancangan](#bab-4-analisis-dan-perancangan)
5. [Implementasi](#bab-5-implementasi)
6. [Pengujian](#bab-6-pengujian)
7. [Kesimpulan dan Saran](#bab-7-kesimpulan-dan-saran)

---

## BAB 1: PENDAHULUAN

### 1.1 Latar Belakang

Manajemen inventaris barang medis merupakan aspek penting dalam operasional rumah sakit, klinik, dan fasilitas kesehatan lainnya. Pengelolaan yang tidak terstruktur dapat menyebabkan:
- Kesulitan dalam melacak lokasi barang medis
- Kedaluwarsa obat atau peralatan
- Penipuan inventaris
- Kerugian finansial

Oleh karena itu, dibutuhkan sistem informasi yang dapat mengelola data inventaris secara efisien dan akurat.

### 1.2 Identifikasi Masalah

Berdasarkan latar belakang di atas, masalah yang diidentifikasi adalah:
1. Belum ada sistem terintegrasi untuk mengelola inventaris barang medis
2. Data masih dicatat secara manual (excel/paper)
3. Sulit melacak riwayat maintenance peralatan
4. Tidak ada laporan statistik yang akurat

### 1.3 Tujuan

Tujuan dari project ini adalah:
1. Membuat sistem CRUD untuk manajemen inventaris barang medis
2. Mengelola data kategori, ruangan, peralatan medis, dan maintenance
3. Menyediakan dashboard untuk monitoring data
4. Menerapkan sistem autentikasi dan otorisasi

### 1.4 Manfaat

- **Manfaat Akademis:** Menerapkan konsep CRUD, MVC, dan database relationship
- **Manfaat Praktis:** Memudahkan pengelolaan inventaris barang medis
- **Manfaat Teknis:** Menguasai framework Laravel dan best practices development

### 1.5 Ruang Lingkup

**Ruang Lingkup Project:**
- Manajemen Kategori Barang Medis
- Manajemen Ruangan/Lokasi
- Manajemen Peralatan Medis
- Manajemen Riwayat Maintenance
- Dashboard Statistik
- Sistem Autentikasi

**Batas Project:**
- Tidak mencakup manajemen stok masuk/keluar
- Tidak mencakup integrasi dengan sistem rumah sakit lain
- Tidak mencakup mobile application

---

## BAB 2: TINJAUAN PUSTAKA

### 2.1 Landasan Teori

#### 2.1.1 PHP (Hypertext Preprocessor)
PHP adalah bahasa pemrograman server-side yang digunakan untuk mengembangkan aplikasi web. PHP 8.3 menawarkan fitur-fitur baru seperti:
- Typed properties
- Match expressions
- Named arguments
- Union types

#### 2.1.2 Laravel Framework
Laravel adalah framework PHP yang menggunakan arsitektur MVC (Model-View-Controller). Keunggulan Laravel:
- Eloquent ORM untuk database
- Blade templating engine
- Built-in authentication (Laravel Breeze)
- Migration system untuk version control database
- Artisan CLI untuk automation

#### 2.1.3 CRUD (Create, Read, Update, Delete)
CRUD adalah operasi dasar dalam pengelolaan data:
- **Create:** Menambahkan data baru
- **Read:** Membaca/menampilkan data
- **Update:** Mengubah data yang ada
- **Delete:** Menghapus data

#### 2.1.4 Database Relational
Database relational menggunakan tabel-tabel yang saling berhubungan melalui foreign key. MySQL dan SQLite adalah contoh database relational.

#### 2.1.5 Tailwind CSS
Tailwind CSS adalah utility-first CSS framework yang memungkinkan pengembangan UI yang cepat dan konsisten.

### 2.2 Kerangka Berpikir

Project ini menggunakan kerangka berpikir:
1. **Analisis:** Identifikasi kebutuhan pengguna
2. **Perancangan:** Desain database dan interface
3. **Implementasi:** Coding aplikasi
4. **Pengujian:** Testing dan debugging
5. **Deployment:** Penerapan aplikasi

### 2.3 Studi Literatur

#### 2.3.1 Laravel 11 Documentation
Laravel 11 memperkenalkan struktur yang lebih sederhana dengan fitur-fitur baru:
- Application skeleton yang lebih ringan
- Perubahan pada struktur direktori
- Improved performance

#### 2.3.2 Database Design Best Practices
- Normalisasi database untuk menghindari redundansi
- Foreign key constraints untuk data integrity
- Indexing untuk performa query

---

## BAB 3: METODOLOGI

### 3.1 Metode Pengembangan

Project ini menggunakan metodologi **Agile Development** dengan pendekatan iteratif dan incremental.

### 3.2 Alur Pengembangan

```
┌─────────────┐
│  Planning   │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│  Analysis   │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│   Design    │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│Development  │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│   Testing   │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│ Deployment  │
└─────────────┘
```

### 3.3 Tools dan Teknologi

| Tool | Version | Purpose |
|------|---------|---------|
| **Laravel** | 11.x | Backend Framework |
| **PHP** | 8.3+ | Programming Language |
| **MySQL** | 8.0+ | Database |
| **Tailwind CSS** | 3.x | Styling |
| **Vite** | 5.x | Build Tool |
| **Composer** | Latest | PHP Dependency Manager |
| **NPM** | Latest | JS Package Manager |
| **Git** | Latest | Version Control |
| **VS Code** | Latest | Code Editor |

### 3.4 Timeline Project

| Minggu | Aktivitas |
|--------|-----------|
| Minggu 1 | Setup project, database design, migration |
| Minggu 2 | Model & Controller development |
| Minggu 3 | View development (Blade templates) |
| Minggu 4 | Authentication & Authorization |
| Minggu 5 | Testing & Bug fixing |
| Minggu 6 | Documentation & Deployment |

---

## BAB 4: ANALISIS DAN PERANCANGAN

### 4.1 Analisis Kebutuhan

#### 4.1.1 Kebutuhan Fungsional
- Admin dapat menambah, mengedit, dan menghapus data kategori
- Admin dapat menambah, mengedit, dan menghapus data ruangan
- Admin dapat menambah, mengedit, dan menghapus data peralatan medis
- Admin dapat menambah, mengedit, dan menghapus data maintenance
- User dapat melihat data (read-only)
- Sistem menampilkan dashboard dengan statistik

#### 4.1.2 Kebutuhan Non-Fungsional
- Responsive design untuk mobile dan desktop
- Load time < 2 detik
- Database optimization dengan indexing
- Secure authentication dengan session management

### 4.2 Perancangan Database

#### 4.2.1 Entity Relationship Diagram (ERD)

```
┌─────────────────────────────────────────────────────────────┐
│                        DATABASE SCHEMA                      │
└─────────────────────────────────────────────────────────────┘

┌─────────────┐         ┌──────────────┐         ┌──────────────┐
│   users     │         │  categories  │         │    rooms     │
├─────────────┤         ├──────────────┤         ├──────────────┤
│ id (PK)     │────┐    │ id (PK)      │    ┌───│ id (PK)      │
│ name        │    │    │ name         │    │   │ name         │
│ email       │    │    │ description  │    │   │ location     │
│ password    │    │    │ created_at   │    │   │ created_at   │
│ created_at  │    │    │ updated_at   │    │   │ updated_at   │
│ updated_at  │    │    └──────────────┘    │   └──────────────┘
└─────────────┘    │         │              │         │
                   │         │              │         │
                   │    ┌────┴──────────────┘         │
                   │    │                             │
                   │    ▼                             │
                   │  ┌─────────────────────────┐    │
                   └──│   medical_devices       │    │
                      ├─────────────────────────┤    │
                      │ id (PK)                  │    │
                      │ name                     │    │
                      │ category_id (FK) ─────────┘
                      │ room_id (FK) ─────────────┘
                      │ serial_number            │
                      │ purchase_date            │
                      │ status                   │
                      │ created_at               │
                      │ updated_at               │
                      └─────────────────────────┘
                                   │
                                   │
                      ┌────────────┴────────────┐
                      │    maintenances         │
                      ├─────────────────────────┤
                      │ id (PK)                 │
                      │ medical_device_id (FK)  │
                      │ maintenance_date        │
                      │ description             │
                      │ performed_by            │
                      │ cost                    │
                      │ created_at              │
                      │ updated_at              │
                      └─────────────────────────┘
```

#### 4.2.2 Tabel dan Field

**Table: users**
| Field | Type | Description |
|-------|------|-------------|
| id | bigint (PK) | Primary key |
| name | varchar | Nama pengguna |
| email | varchar | Email pengguna (unique) |
| email_verified_at | timestamp | Email verification timestamp |
| password | varchar | Hashed password |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Record update time |

**Table: categories**
| Field | Type | Description |
|-------|------|-------------|
| id | bigint (PK) | Primary key |
| name | varchar | Nama kategori |
| description | text | Deskripsi kategori |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Record update time |

**Table: rooms**
| Field | Type | Description |
|-------|------|-------------|
| id | bigint (PK) | Primary key |
| name | varchar | Nama ruangan |
| location | varchar | Lokasi ruangan |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Record update time |

**Table: medical_devices**
| Field | Type | Description |
|-------|------|-------------|
| id | bigint (PK) | Primary key |
| name | varchar | Nama peralatan |
| category_id | bigint (FK) | Relasi ke categories |
| room_id | bigint (FK) | Relasi ke rooms |
| serial_number | varchar | Nomor seri |
| purchase_date | date | Tanggal pembelian |
| status | enum | Status peralatan |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Record update time |

**Table: maintenances**
| Field | Type | Description |
|-------|------|-------------|
| id | bigint (PK) | Primary key |
| medical_device_id | bigint (FK) | Relasi ke medical_devices |
| maintenance_date | date | Tanggal maintenance |
| description | text | Deskripsi maintenance |
| performed_by | varchar | Teknisi yang melakukan |
| cost | decimal | Biaya maintenance |
| created_at | timestamp | Record creation time |
| updated_at | timestamp | Record update time |

### 4.3 Perancangan Interface

#### 4.3.1 Flowchart Aplikasi

```
┌─────────────────┐
│   Start         │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│  Login/Register │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│   Dashboard     │
└────────┬────────┘
         │
    ┌────┴────┐
    │         │
    ▼         ▼
┌───────┐ ┌───────┐
│Manage │ │View   │
│Data   │ │Data   │
└───┬───┘ └───┬───┘
    │         │
    ▼         ▼
┌───────┐ ┌───────┐
│ CRUD  │ │ Read  │
│Operation│ │ Only  │
└───────┘ └───────┘
    │         │
    └────┬────┘
         │
         ▼
┌─────────────────┐
│      Logout     │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│      End        │
└─────────────────┘
```

#### 4.3.2 Flowchart CRUD

```
┌─────────────────┐
│   Select Menu   │
└────────┬────────┘
         │
    ┌────┴────┐
    │         │
    ▼         ▼
┌───────┐ ┌───────┐
│ Create│ │ Read  │
└───┬───┘ └───┬───┘
    │         │
    ▼         ▼
┌───────┐ ┌───────┐
│ Input │ │ Display│
│  Form │ │  List  │
└───┬───┘ └───┬───┘
    │         │
    ▼         ▼
┌───────┐ ┌───────┐
│ Save  │ │ Edit/ │
│       │ │Delete │
└───┬───┘ └───┬───┘
    │         │
    └────┬────┘
         │
         ▼
┌─────────────────┐
│   Success       │
└─────────────────┘
```

### 4.4 Arsitektur Sistem

#### 4.4.1 MVC Pattern

```
┌─────────────────────────────────────────────────────────────┐
│                      CLIENT (Browser)                       │
└───────────────────────────┬─────────────────────────────────┘
                            │ HTTP Request
                            ▼
┌─────────────────────────────────────────────────────────────┐
│                    ROUTES (web.php)                         │
│                  - Define endpoints                         │
│                  - Middleware                                │
└───────────────────────────┬─────────────────────────────────┘
                            │
                            ▼
┌─────────────────────────────────────────────────────────────┐
│                 CONTROLLER LAYER                            │
│  - CategoryController                                        │
│  - RoomController                                            │
│  - MedicalDeviceController                                   │
│  - MaintenanceController                                     │
│  - DashboardController                                       │
└───────────────────────────┬─────────────────────────────────┘
                            │
                            ▼
┌─────────────────────────────────────────────────────────────┐
│                   MODEL LAYER                               │
│  - Category                                                   │
│  - Room                                                       │
│  - MedicalDevice                                              │
│  - Maintenance                                                │
│  - User                                                       │
│  (Eloquent ORM)                                               │
└───────────────────────────┬─────────────────────────────────┘
                            │
                            ▼
┌─────────────────────────────────────────────────────────────┐
│                   DATABASE LAYER                             │
│  - MySQL / SQLite                                             │
│  - Migrations                                                 │
│  - Seeders                                                    │
└─────────────────────────────────────────────────────────────┘
                            │
                            ▼
┌─────────────────────────────────────────────────────────────┐
│                   VIEW LAYER                                │
│  - Blade Templates                                            │
│  - Tailwind CSS                                               │
│  - Layouts & Components                                       │
└─────────────────────────────────────────────────────────────┘
```

---

## BAB 5: IMPLEMENTASI

### 5.1 Setup Project

```bash
# Create new Laravel project
composer create-project laravel/laravel sistem-barang-medis

# Install dependencies
composer install
npm install --ignore-scripts

# Setup environment
copy .env.example .env
php artisan key:generate
```

### 5.2 Database Migration

```php
// database/migrations/2026_07_08_210818_create_categories_table.php
Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->timestamps();
});
```

### 5.3 Model Development

```php
// app/Models/Category.php
class Category extends Model
{
    protected $fillable = ['name', 'description'];
    
    public function medicalDevices()
    {
        return $this->hasMany(MedicalDevice::class);
    }
}
```

### 5.4 Controller Development

```php
// app/Http/Controllers/CategoryController.php
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    
    public function create()
    {
        return view('categories.create');
    }
    
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully');
    }
}
```

### 5.5 View Development

```blade
<!-- resources/views/categories/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        Add Category
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.show', $category) }}">View</a>
                    <a href="{{ route('categories.edit', $category) }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
```

### 5.6 Authentication Setup

```bash
# Install Laravel Breeze
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run dev
php artisan migrate
```

---

## BAB 6: PENGUJIAN

### 6.1 Jenis Pengujian

#### 6.1.1 Unit Testing
```bash
php artisan test --filter=CategoryTest
```

#### 6.1.2 Feature Testing
```bash
php artisan test --filter=CategoryControllerTest
```

### 6.2 Test Cases

| No | Test Case | Expected Result | Status |
|----|-----------|-----------------|--------|
| 1 | User can register | Redirect to dashboard | ✅ |
| 2 | User can login | Redirect to dashboard | ✅ |
| 3 | User can logout | Redirect to login | ✅ |
| 4 | Admin can create category | Category created | ✅ |
| 5 | Admin can edit category | Category updated | ✅ |
| 6 | Admin can delete category | Category deleted | ✅ |
| 7 | User can view categories | List displayed | ✅ |
| 8 | Dashboard shows statistics | Stats displayed | ✅ |

### 6.3 Hasil Pengujian

Semua test case berhasil dijalankan tanpa error. Aplikasi berfungsi sesuai dengan spesifikasi yang telah ditentukan.

---

## BAB 7: KESIMPULAN DAN SARAN

### 7.1 Kesimpulan

Berdasarkan hasil pengembangan dan pengujian, dapat disimpulkan bahwa:

1. Sistem manajemen inventaris barang medis telah berhasil dibangun menggunakan Laravel 11
2. Semua fitur CRUD telah berfungsi dengan baik
3. Sistem autentikasi dan otorisasi sudah terimplementasi
4. Database schema telah dirancang dengan baik sesuai kebutuhan
5. Interface yang dihasilkan responsif dan user-friendly

### 7.2 Saran

Untuk pengembangan selanjutnya, disarankan:

1. **Fitur Export:** Tambahkan fitur export data ke PDF/Excel
2. **Notifikasi:** Implementasi email notification untuk maintenance
3. **API:** Buat REST API untuk integrasi mobile app
4. **Reporting:** Tambahkan laporan lengkap dengan chart
5. **Multi-role:** Perluas sistem role-based access
6. **Audit Log:** Tambahkan logging untuk tracking aktivitas user
7. **Backup:** Implementasi automated database backup

### 7.3 Pengembangan Selanjutnya

- Integrasi dengan barcode scanner
- Mobile application (Android/iOS)
- Real-time notification dengan WebSocket
- Advanced reporting dengan filtering
- Multi-branch support untuk rumah sakit dengan banyak cabang

---

## LAMPIRAN

### Lampiran A: Kode Program

#### A.1 Model
```php
// app/Models/Category.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function medicalDevices()
    {
        return $this->hasMany(MedicalDevice::class);
    }
}
```

#### A.2 Controller
```php
// app/Http/Controllers/CategoryController.php
<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
```

### Lampiran B: Database Schema

```sql
-- Users table
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Categories table
CREATE TABLE categories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Rooms table
CREATE TABLE rooms (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Medical Devices table
CREATE TABLE medical_devices (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category_id BIGINT UNSIGNED,
    room_id BIGINT UNSIGNED,
    serial_number VARCHAR(255),
    purchase_date DATE,
    status ENUM('active', 'inactive', 'maintenance') DEFAULT 'active',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);

-- Maintenances table
CREATE TABLE maintenances (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    medical_device_id BIGINT UNSIGNED,
    maintenance_date DATE NOT NULL,
    description TEXT,
    performed_by VARCHAR(255),
    cost DECIMAL(10,2),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (medical_device_id) REFERENCES medical_devices(id)
);
```

### Lampiran C: Screenshot Aplikasi

*(Tempatkan screenshot aplikasi di sini)*

1. Dashboard
2. Manajemen Kategori
3. Manajemen Ruangan
4. Manajemen Peralatan Medis
5. Manajemen Maintenance
6. Login/Register

---

## DAFTAR PUSTAKA

1. Laravel Documentation. (2024). https://laravel.com/docs
2. PHP Documentation. (2024). https://www.php.net/docs.php
3. MySQL Documentation. (2024). https://dev.mysql.com/doc/
4. Tailwind CSS Documentation. (2024). https://tailwindcss.com/docs
5. Vite Documentation. (2024). https://vitejs.dev/guide/

---

**Dokumen ini dibuat untuk memenuhi tugas project mata kuliah Pengembangan Aplikasi Web.**

**Tanggal:** 18 Juli 2026  
**Disusun oleh:** El-fera  
**NIM:** [Isi NIM Anda]  
**Program Studi:** [Isi Program Studi]  
**Fakultas:** [Isi Fakultas]  
**Universitas:** [Isi Universitas]