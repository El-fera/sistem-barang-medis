@extends('layouts.admin')

@section('title', 'Tambah Maintenance')

@section('content')
<div class="page-header">
    <h4>Tambah Maintenance</h4>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('maintenances.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="medical_device_id" class="form-label">Alat Medis <span class="text-danger">*</span></label>
                <select class="form-select @error('medical_device_id') is-invalid @enderror" id="medical_device_id" name="medical_device_id" required>
                    <option value="">-- Pilih Alat Medis --</option>
                    @foreach($medicalDevices as $device)
                        <option value="{{ $device->id }}" {{ old('medical_device_id') == $device->id ? 'selected' : '' }}>
                            {{ $device->kode_alat }} - {{ $device->nama_alat }}
                        </option>
                    @endforeach
                </select>
                @error('medical_device_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jenis_perawatan" class="form-label">Jenis Perawatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('jenis_perawatan') is-invalid @enderror" id="jenis_perawatan" name="jenis_perawatan" value="{{ old('jenis_perawatan') }}" required>
                        @error('jenis_perawatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="teknisi" class="form-label">Teknisi</label>
                <input type="text" class="form-control @error('teknisi') is-invalid @enderror" id="teknisi" name="teknisi" value="{{ old('teknisi') }}">
                @error('teknisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hasil" class="form-label">Hasil</label>
                <textarea class="form-control @error('hasil') is-invalid @enderror" id="hasil" name="hasil" rows="3">{{ old('hasil') }}</textarea>
                @error('hasil')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
                <a href="{{ route('maintenances.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection