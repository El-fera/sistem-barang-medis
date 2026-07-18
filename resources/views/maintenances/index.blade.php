@extends('layouts.admin')

@section('title', 'Maintenance')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Data Maintenance</h4>
        <a href="{{ route('maintenances.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Maintenance
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <!-- Search -->
        <form action="{{ route('maintenances.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari maintenance..." value="{{ $search ?? '' }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
                @if($search)
                    <a href="{{ route('maintenances.index') }}" class="btn btn-outline-danger">
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
                        <th>Nama Alat</th>
                        <th>Tanggal</th>
                        <th>Jenis Perawatan</th>
                        <th>Teknisi</th>
                        <th>Hasil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($maintenances as $key => $maintenance)
                        <tr>
                            <td>{{ $maintenances->firstItem() + $key }}</td>
                            <td>{{ $maintenance->medicalDevice->nama_alat ?? '-' }}</td>
                            <td>{{ $maintenance->tanggal->format('d/m/Y') }}</td>
                            <td>{{ $maintenance->jenis_perawatan }}</td>
                            <td>{{ $maintenance->teknisi ?? '-' }}</td>
                            <td>{{ Str::limit($maintenance->hasil, 30) ?? '-' }}</td>
                            <td>
                                <a href="{{ route('maintenances.show', $maintenance) }}" class="btn btn-sm btn-info text-white" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('maintenances.edit', $maintenance) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('maintenances.destroy', $maintenance) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data maintenance ini?')">
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
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                @if($search)
                                    Tidak ada data maintenance yang ditemukan untuk pencarian "{{ $search }}"
                                @else
                                    Belum ada data maintenance
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
                Menampilkan {{ $maintenances->firstItem() ?? 0 }} - {{ $maintenances->lastItem() ?? 0 }} dari {{ $maintenances->total() }} data
            </div>
            {{ $maintenances->appends(['search' => $search])->links() }}
        </div>
    </div>
</div>
@endsection