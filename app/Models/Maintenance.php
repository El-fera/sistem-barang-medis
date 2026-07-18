<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maintenance extends Model
{
    protected $fillable = [
        'medical_device_id',
        'tanggal',
        'jenis_perawatan',
        'teknisi',
        'hasil',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function medicalDevice(): BelongsTo
    {
        return $this->belongsTo(MedicalDevice::class);
    }
}