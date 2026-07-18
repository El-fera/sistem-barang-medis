<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MedicalDevice extends Model
{
    protected $fillable = [
        'category_id',
        'room_id',
        'kode_alat',
        'nama_alat',
        'merk',
        'tipe',
        'nomor_seri',
        'tahun_pengadaan',
        'kondisi',
        'status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function maintenances(): HasMany
    {
        return $this->hasMany(Maintenance::class);
    }
}