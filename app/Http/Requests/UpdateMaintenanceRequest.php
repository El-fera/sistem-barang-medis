<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaintenanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'medical_device_id' => 'required|exists:medical_devices,id',
            'tanggal' => 'required|date',
            'jenis_perawatan' => 'required|string|max:255',
            'teknisi' => 'nullable|string|max:255',
            'hasil' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'medical_device_id.required' => 'Alat medis wajib dipilih.',
            'medical_device_id.exists' => 'Alat medis tidak valid.',
            'tanggal.required' => 'Tanggal perawatan wajib diisi.',
            'jenis_perawatan.required' => 'Jenis perawatan wajib diisi.',
        ];
    }
}