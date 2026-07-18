<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem Barang Medis') }} - @yield('title')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f4f6f9;
        }
        .wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 999;
            overflow-y: auto;
        }
        .sidebar .sidebar-header {
            padding: 20px;
            background: #2c3136;
            border-bottom: 1px solid #4e555c;
        }
        .sidebar .sidebar-header h5 {
            margin: 0;
            font-weight: 600;
        }
        .sidebar .sidebar-header small {
            color: #adb5bd;
        }
        .sidebar .nav-link {
            color: #c2c7d0;
            padding: 12px 20px;
            font-size: 14px;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background: #4e555c;
            border-left-color: #0d6efd;
        }
        .sidebar .nav-link.active {
            color: #fff;
            background: #4e555c;
            border-left-color: #0d6efd;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        .sidebar .nav-section {
            padding: 10px 20px 5px;
            font-size: 11px;
            text-transform: uppercase;
            color: #6c757d;
            letter-spacing: 1px;
        }
        .content {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar-custom {
            background: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,.08);
            padding: 10px 20px;
        }
        .navbar-custom .navbar-brand {
            font-weight: 600;
            color: #343a40;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .footer {
            background: #fff;
            padding: 15px 20px;
            border-top: 1px solid #dee2e6;
            font-size: 13px;
            color: #6c757d;
        }
        .page-header {
            margin-bottom: 20px;
        }
        .page-header h4 {
            font-weight: 600;
            color: #343a40;
            margin: 0;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,.08);
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid #f0f0f0;
            font-weight: 600;
        }
        .stat-card {
            border-radius: 10px;
            padding: 20px;
            color: #fff;
        }
        .stat-card i {
            font-size: 40px;
            opacity: 0.8;
        }
        .stat-card .stat-number {
            font-size: 32px;
            font-weight: 700;
        }
        .stat-card .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }
        .bg-stat-blue { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .bg-stat-green { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
        .bg-stat-orange { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .bg-stat-info { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .table th {
            font-weight: 600;
            font-size: 13px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .table td {
            vertical-align: middle;
        }
        .btn-sm {
            font-size: 12px;
        }
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }
            .sidebar.active {
                margin-left: 0;
            }
            .content {
                margin-left: 0;
                width: 100%;
            }
            .content.active {
                margin-left: 250px;
                width: calc(100% - 250px);
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h5><i class="bi bi-heart-pulse-fill me-2"></i>Sistem Barang Medis</h5>
                <small>Elektromedis</small>
            </div>

            <div class="nav-section">Menu Utama</div>

            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="nav-section">Master Data</div>

            <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <i class="bi bi-tags-fill"></i> Kategori
            </a>

            <a href="{{ route('rooms.index') }}" class="nav-link {{ request()->routeIs('rooms.*') ? 'active' : '' }}">
                <i class="bi bi-door-open-fill"></i> Ruangan
            </a>

            <a href="{{ route('medical-devices.index') }}" class="nav-link {{ request()->routeIs('medical-devices.*') ? 'active' : '' }}">
                <i class="bi bi-activity"></i> Alat Medis
            </a>

            <div class="nav-section">Transaksi</div>

            <a href="{{ route('maintenances.index') }}" class="nav-link {{ request()->routeIs('maintenances.*') ? 'active' : '' }}">
                <i class="bi bi-tools"></i> Maintenance
            </a>
        </nav>

        <!-- Page Content -->
        <div class="content" id="content">
            <!-- Navbar -->
            <nav class="navbar navbar-custom">
                <div class="container-fluid">
                    <button class="btn btn-sm btn-outline-secondary d-md-none" type="button" onclick="toggleSidebar()">
                        <i class="bi bi-list"></i>
                    </button>
                    <span class="navbar-brand mb-0 h6">
                        @yield('title', 'Dashboard')
                    </span>
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-person"></i> Profile
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="footer text-center">
                &copy; {{ date('Y') }} {{ config('app.name', 'Sistem Barang Medis') }}. All rights reserved.
            </footer>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        }
    </script>

    @stack('scripts')
</body>
</html>