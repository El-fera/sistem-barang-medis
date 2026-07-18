@extends('layouts.admin')

@section('title', 'Detail Kategori')

@section('content')
<div class="page-header">
    <h4>Detail Kategori</h4>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="200">Nama Kategori</th>
                <td>{{ $category->nama_kategori }}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{ $category->deskripsi ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Alat Medis</th>
                <td>{{ $category->medicalDevices->count() }} alat</td>
            </tr>
            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $category->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Diperbarui Pada</th>
                <td>{{ $category->updated_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

        <div class="d-flex gap-2">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning text-white">
                <i class="bi bi-pencil me-1"></i> Edit
            </a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection