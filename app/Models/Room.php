<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $fillable = [
        'nama_ruangan',
        'lokasi',
    ];

    public function medicalDevices(): HasMany
    {
        return $this->hasMany(MedicalDevice::class);
    }
}