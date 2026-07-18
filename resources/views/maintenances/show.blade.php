@extends('layouts.admin')

@section('title', 'Detail Maintenance')

@section('content')
<div class="page-header">
    <h4>Detail Maintenance</h4>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="200">Nama Alat</th>
                <td>{{ $maintenance->medicalDevice->nama_alat ?? '-' }}</td>
            </tr>
            <tr>
                <th>Kode Alat</th>
                <td>{{ $maintenance->medicalDevice->kode_alat ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $maintenance->tanggal->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Jenis Perawatan</th>
                <td>{{ $maintenance->jenis_perawatan }}</td>
            </tr>
            <tr>
                <th>Teknisi</th>
                <td>{{ $maintenance->teknisi ?? '-' }}</td>
            </tr>
            <tr>
                <th>Hasil</th>
                <td>{{ $maintenance->hasil ?? '-' }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $maintenance->keterangan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $maintenance->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Diperbarui Pada</th>
                <td>{{ $maintenance->updated_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

        <div class="d-flex gap-2">
            <a href="{{ route('maintenances.edit', $maintenance) }}" class="btn btn-warning text-white">
                <i class="bi bi-pencil me-1"></i> Edit
            </a>
            <a href="{{ route('maintenances.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection