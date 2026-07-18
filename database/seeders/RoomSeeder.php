<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::create([
            'nama_ruangan' => 'Ruang Rawat Inap A',
            'lokasi' => 'Lantai 1, Gedung Utama',
        ]);
    }
}