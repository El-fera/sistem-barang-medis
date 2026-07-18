@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h4>Dashboard</h4>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card bg-stat-blue">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">{{ $totalMedicalDevices }}</div>
                    <div class="stat-label">Total Alat Medis</div>
                </div>
                <i class="bi bi-activity"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-stat-green">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">{{ $totalCategories }}</div>
                    <div class="stat-label">Total Kategori</div>
                </div>
                <i class="bi bi-tags-fill"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-stat-orange">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">{{ $totalRooms }}</div>
                    <div class="stat-label">Total Ruangan</div>
                </div>
                <i class="bi bi-door-open-fill"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card bg-stat-info">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-number">{{ $totalMaintenances }}</div>
                    <div class="stat-label">Total Maintenance</div>
                </div>
                <i class="bi bi-tools"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-activity me-2"></i>Menu Cepat
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('medical-devices.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Alat Medis
                    </a>
                    <a href="{{ route('maintenances.create') }}" class="btn btn-info text-white">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Maintenance
                    </a>
                    <a href="{{ route('categories.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Kategori
                    </a>
                    <a href="{{ route('rooms.create') }}" class="btn btn-warning text-white">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Ruangan
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-info-circle me-2"></i>Selamat Datang
            </div>
            <div class="card-body">
                <h5 class="card-title">Halo, {{ Auth::user()->name }}!</h5>
                <p class="card-text text-muted">
                    Selamat datang di Sistem Manajemen Alat Medis Elektromedis.
                    Gunakan menu di sidebar untuk mengelola data alat kesehatan.
                </p>
                <hr>
                <div class="small text-muted">
                    <i class="bi bi-clock me-1"></i> Login terakhir: {{ Auth::user()->created_at->format('d/m/Y H:i') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection