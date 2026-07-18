@extends('layouts.admin')

@section('title', 'Alat Medis')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Data Alat Medis</h4>
        <a href="{{ route('medical-devices.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Alat Medis
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <!-- Search -->
        <form action="{{ route('medical-devices.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari alat medis..." value="{{ $search ?? '' }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
                @if($search)
                    <a href="{{ route('medical-devices.index') }}" class="btn btn-outline-danger">
                        <i class="bi bi-x-circle"></i>
                    </a>
                @endif
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Alat</th>
                        <th>Nama Alat</th>
                        <th>Kategori</th>
                        <th>Ruangan</th>
                        <th>Merk</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicalDevices as $key => $device)
                        <tr>
                            <td>{{ $medicalDevices->firstItem() + $key }}</td>
                            <td><strong>{{ $device->kode_alat }}</strong></td>
                            <td>{{ $device->nama_alat }}</td>
                            <td>{{ $device->category->nama_kategori ?? '-' }}</td>
                            <td>{{ $device->room->nama_ruangan ?? '-' }}</td>
                            <td>{{ $device->merk ?? '-' }}</td>
                            <td>
                                @if($device->kondisi == 'Baik')
                                    <span class="badge bg-success">{{ $device->kondisi }}</span>
                                @elseif($device->kondisi == 'Rusak Ringan')
                                    <span class="badge bg-warning text-dark">{{ $device->kondisi }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $device->kondisi }}</span>
                                @endif
                            </td>
                            <td>
                                @if($device->status == 'Tersedia')
                                    <span class="badge bg-success">{{ $device->status }}</span>
                                @elseif($device->status == 'Dipinjam')
                                    <span class="badge bg-warning text-dark">{{ $device->status }}</span>
                                @elseif($device->status == 'Rusak')
                                    <span class="badge bg-danger">{{ $device->status }}</span>
                                @else
                                    <span class="badge bg-info">{{ $device->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('medical-devices.show', $device) }}" class="btn btn-sm btn-info text-white" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('medical-devices.edit', $device) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('medical-devices.destroy', $device) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus alat medis ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                @if($search)
                                    Tidak ada alat medis yang ditemukan untuk pencarian "{{ $search }}"
                                @else
                                    Belum ada data alat medis
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-muted small">
                Menampilkan {{ $medicalDevices->firstItem() ?? 0 }} - {{ $medicalDevices->lastItem() ?? 0 }} dari {{ $medicalDevices->total() }} data
            </div>
            {{ $medicalDevices->appends(['search' => $search])->links() }}
        </div>
    </div>
</div>
@endsection