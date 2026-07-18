@extends('layouts.admin')

@section('title', 'Edit Ruangan')

@section('content')
<div class="page-header">
    <h4>Edit Ruangan</h4>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('rooms.update', $room) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_ruangan" class="form-label">Nama Ruangan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" id="nama_ruangan" name="nama_ruangan" value="{{ old('nama_ruangan', $room->nama_ruangan) }}" required>
                @error('nama_ruangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $room->lokasi) }}">
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Update
                </button>
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection