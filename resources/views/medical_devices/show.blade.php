@extends('layouts.admin')

@section('title', 'Detail Alat Medis')

@section('content')
<div class="page-header">
    <h4>Detail Alat Medis</h4>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="200">Kode Alat</th>
                <td><strong>{{ $medicalDevice->kode_alat }}</strong></td>
            </tr>
            <tr>
                <th>Nama Alat</th>
                <td>{{ $medicalDevice->nama_alat }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $medicalDevice->category->nama_kategori ?? '-' }}</td>
            </tr>
            <tr>
                <th>Ruangan</th>
                <td>{{ $medicalDevice->room->nama_ruangan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Merk</th>
                <td>{{ $medicalDevice->merk ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tipe</th>
                <td>{{ $medicalDevice->tipe ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nomor Seri</th>
                <td>{{ $medicalDevice->nomor_seri ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tahun Pengadaan</th>
                <td>{{ $medicalDevice->tahun_pengadaan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Kondisi</th>
                <td>
                    @if($medicalDevice->kondisi == 'Baik')
                        <span class="badge bg-success">{{ $medicalDevice->kondisi }}</span>
                    @elseif($medicalDevice->kondisi == 'Rusak Ringan')
                        <span class="badge bg-warning text-dark">{{ $medicalDevice->kondisi }}</span>
                    @else
                        <span class="badge bg-danger">{{ $medicalDevice->kondisi }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($medicalDevice->status == 'Tersedia')
                        <span class="badge bg-success">{{ $medicalDevice->status }}</span>
                    @elseif($medicalDevice->status == 'Dipinjam')
                        <span class="badge bg-warning text-dark">{{ $medicalDevice->status }}</span>
                    @elseif($medicalDevice->status == 'Rusak')
                        <span class="badge bg-danger">{{ $medicalDevice->status }}</span>
                    @else
                        <span class="badge bg-info">{{ $medicalDevice->status }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $medicalDevice->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Diperbarui Pada</th>
                <td>{{ $medicalDevice->updated_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

        <div class="d-flex gap-2">
            <a href="{{ route('medical-devices.edit', $medicalDevice) }}" class="btn btn-warning text-white">
                <i class="bi bi-pencil me-1"></i> Edit
            </a>
            <a href="{{ route('medical-devices.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

@if($medicalDevice->maintenances->count() > 0)
<div class="card mt-4">
    <div class="card-header">
        <i class="bi bi-tools me-2"></i>Riwayat Maintenance
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jenis Perawatan</th>
                        <th>Teknisi</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicalDevice->maintenances as $key => $maintenance)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $maintenance->tanggal->format('d/m/Y') }}</td>
                            <td>{{ $maintenance->jenis_perawatan }}</td>
                            <td>{{ $maintenance->teknisi ?? '-' }}</td>
                            <td>{{ $maintenance->hasil ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection