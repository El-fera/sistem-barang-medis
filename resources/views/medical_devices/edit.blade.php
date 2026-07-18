@extends('layouts.admin')

@section('title', 'Edit Alat Medis')

@section('content')
<div class="page-header">
    <h4>Edit Alat Medis</h4>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('medical-devices.update', $medicalDevice) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kode_alat" class="form-label">Kode Alat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kode_alat') is-invalid @enderror" id="kode_alat" name="kode_alat" value="{{ old('kode_alat', $medicalDevice->kode_alat) }}" required>
                        @error('kode_alat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama_alat" class="form-label">Nama Alat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_alat') is-invalid @enderror" id="nama_alat" name="nama_alat" value="{{ old('nama_alat', $medicalDevice->nama_alat) }}" required>
                        @error('nama_alat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $medicalDevice->category_id) == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Ruangan <span class="text-danger">*</span></label>
                        <select class="form-select @error('room_id') is-invalid @enderror" id="room_id" name="room_id" required>
                            <option value="">-- Pilih Ruangan --</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" {{ old('room_id', $medicalDevice->room_id) == $room->id ? 'selected' : '' }}>{{ $room->nama_ruangan }}</option>
                            @endforeach
                        </select>
                        @error('room_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="merk" class="form-label">Merk</label>
                        <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk" value="{{ old('merk', $medicalDevice->merk) }}">
                        @error('merk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe</label>
                        <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe" value="{{ old('tipe', $medicalDevice->tipe) }}">
                        @error('tipe')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="nomor_seri" class="form-label">Nomor Seri</label>
                        <input type="text" class="form-control @error('nomor_seri') is-invalid @enderror" id="nomor_seri" name="nomor_seri" value="{{ old('nomor_seri', $medicalDevice->nomor_seri) }}">
                        @error('nomor_seri')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tahun_pengadaan" class="form-label">Tahun Pengadaan</label>
                        <input type="number" class="form-control @error('tahun_pengadaan') is-invalid @enderror" id="tahun_pengadaan" name="tahun_pengadaan" value="{{ old('tahun_pengadaan', $medicalDevice->tahun_pengadaan) }}" min="1900" max="{{ date('Y') }}">
                        @error('tahun_pengadaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi <span class="text-danger">*</span></label>
                        <select class="form-select @error('kondisi') is-invalid @enderror" id="kondisi" name="kondisi" required>
                            <option value="Baik" {{ old('kondisi', $medicalDevice->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak Ringan" {{ old('kondisi', $medicalDevice->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="Rusak Berat" {{ old('kondisi', $medicalDevice->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                        @error('kondisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="Tersedia" {{ old('status', $medicalDevice->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Dipinjam" {{ old('status', $medicalDevice->status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="Rusak" {{ old('status', $medicalDevice->status) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                            <option value="Servis" {{ old('status', $medicalDevice->status) == 'Servis' ? 'selected' : '' }}>Servis</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Update
                </button>
                <a href="{{ route('medical-devices.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection