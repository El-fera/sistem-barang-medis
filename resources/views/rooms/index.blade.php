@extends('layouts.admin')

@section('title', 'Ruangan')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Data Ruangan</h4>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Ruangan
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <!-- Search -->
        <form action="{{ route('rooms.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari ruangan..." value="{{ $search ?? '' }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
                @if($search)
                    <a href="{{ route('rooms.index') }}" class="btn btn-outline-danger">
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
                        <th>Nama Ruangan</th>
                        <th>Lokasi</th>
                        <th>Jumlah Alat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rooms as $key => $room)
                        <tr>
                            <td>{{ $rooms->firstItem() + $key }}</td>
                            <td>{{ $room->nama_ruangan }}</td>
                            <td>{{ $room->lokasi ?? '-' }}</td>
                            <td>{{ $room->medicalDevices->count() }} alat</td>
                            <td>
                                <a href="{{ route('rooms.show', $room) }}" class="btn btn-sm btn-info text-white" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('rooms.edit', $room) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus ruangan ini?')">
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
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                @if($search)
                                    Tidak ada ruangan yang ditemukan untuk pencarian "{{ $search }}"
                                @else
                                    Belum ada data ruangan
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
                Menampilkan {{ $rooms->firstItem() ?? 0 }} - {{ $rooms->lastItem() ?? 0 }} dari {{ $rooms->total() }} data
            </div>
            {{ $rooms->appends(['search' => $search])->links() }}
        </div>
    </div>
</div>
@endsection