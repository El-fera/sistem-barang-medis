@extends('layouts.admin')

@section('title', 'Detail Ruangan')

@section('content')
<div class="page-header">
    <h4>Detail Ruangan</h4>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="200">Nama Ruangan</th>
                <td>{{ $room->nama_ruangan }}</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>{{ $room->lokasi ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Alat Medis</th>
                <td>{{ $room->medicalDevices->count() }} alat</td>
            </tr>
            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $room->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Diperbarui Pada</th>
                <td>{{ $room->updated_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

        <div class="d-flex gap-2">
            <a href="{{ route('rooms.edit', $room) }}" class="btn btn-warning text-white">
                <i class="bi bi-pencil me-1"></i> Edit
            </a>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection