<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMedicalDeviceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'room_id' => 'required|exists:rooms,id',
            'kode_alat' => [
                'required',
                'string',
                'max:255',
                Rule::unique('medical_devices', 'kode_alat')->ignore($this->route('medical_device')),
            ],
            'nama_alat' => 'required|string|max:255',
            'merk' => 'nullable|string|max:255',
            'tipe' => 'nullable|string|max:255',
            'nomor_seri' => 'nullable|string|max:255',
            'tahun_pengadaan' => 'nullable|integer|min:1900|max:' . date('Y'),
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam,Rusak,Servis',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori tidak valid.',
            'room_id.required' => 'Ruangan wajib dipilih.',
            'room_id.exists' => 'Ruangan tidak valid.',
            'kode_alat.required' => 'Kode alat wajib diisi.',
            'kode_alat.unique' => 'Kode alat sudah digunakan.',
            'nama_alat.required' => 'Nama alat wajib diisi.',
            'kondisi.required' => 'Kondisi wajib dipilih.',
            'status.required' => 'Status wajib dipilih.',
        ];
    }
}