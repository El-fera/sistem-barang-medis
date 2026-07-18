<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Seeder;

class MaintenanceSeeder extends Seeder
{
    public function run(): void
    {
        Maintenance::create([
            'medical_device_id' => 1,
            'tanggal' => '2024-07-01',
            'jenis_perawatan' => 'Kalibrasi Alat',
            'teknisi' => 'Teknisi A',
            'hasil' => 'Alat berfungsi dengan baik setelah dikalibrasi',
            'keterangan' => 'Kalibrasi rutin bulanan',
        ]);
    }
}