@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Data Kategori</h4>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <!-- Search -->
        <form action="{{ route('categories.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari kategori..." value="{{ $search ?? '' }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
                @if($search)
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-danger">
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
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Alat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $key => $category)
                        <tr>
                            <td>{{ $categories->firstItem() + $key }}</td>
                            <td>{{ $category->nama_kategori }}</td>
                            <td>{{ $category->deskripsi ?? '-' }}</td>
                            <td>{{ $category->medicalDevices->count() }} alat</td>
                            <td>
                                <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info text-white" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning text-white" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                                    Tidak ada kategori yang ditemukan untuk pencarian "{{ $search }}"
                                @else
                                    Belum ada data kategori
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
                Menampilkan {{ $categories->firstItem() ?? 0 }} - {{ $categories->lastItem() ?? 0 }} dari {{ $categories->total() }} data
            </div>
            {{ $categories->appends(['search' => $search])->links() }}
        </div>
    </div>
</div>
@endsection