<?php

namespace Database\Seeders;

use App\Models\MedicalDevice;
use Illuminate\Database\Seeder;

class MedicalDeviceSeeder extends Seeder
{
    public function run(): void
    {
        MedicalDevice::create([
            'category_id' => 1,
            'room_id' => 1,
            'kode_alat' => 'AL-001',
            'nama_alat' => 'Stetoskop Digital',
            'merk' => 'Omron',
            'tipe' => 'DS-100',
            'nomor_seri' => 'SN-2024-001',
            'tahun_pengadaan' => 2024,
            'kondisi' => 'Baik',
            'status' => 'Tersedia',
        ]);
    }
}