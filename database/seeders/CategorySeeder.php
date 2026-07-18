<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'nama_kategori' => 'Alat Diagnostik',
            'deskripsi' => 'Alat-alat yang digunakan untuk mendiagnosis penyakit pasien',
        ]);
    }
}