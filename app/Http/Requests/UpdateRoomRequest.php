<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_ruangan' => [
                'required',
                'string',
                'max:255',
                Rule::unique('rooms', 'nama_ruangan')->ignore($this->route('room')),
            ],
            'lokasi' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_ruangan.required' => 'Nama ruangan wajib diisi.',
            'nama_ruangan.unique' => 'Nama ruangan sudah digunakan.',
        ];
    }
}