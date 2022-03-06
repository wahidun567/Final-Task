<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link d-flex justify-content-center bg-light opacity-50">
    <i class="fas fa-user-circle fa-lg mr-1 pt-1"></i>
    <span class="brand-text font-weight-light"><strong>SPP-Sekolah</strong></span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <i class="fas fa-user-circle fa-lg pt-2"></i>
        </div>
        <div class="info">
            <a href="" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            {{-- SIDEBAR UNTUK DASHBOARD BAGIAN ADMIN --}}
            @role('admin')
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home.index') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
            @endrole
            {{-- SIDEBAR UNTUK DASHBOARD BAGIAN PETUGAS --}}
            @role('petugas')
            <li class="nav-item">
                <a href="{{ route('home.index') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            @elserole('siswa')
            <li class="nav-item">
                <a href="{{ route('home.index') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            @endrole
            {{-- SIDEBAR UNTUK MANAGEMENT DATA BAGIAN ADMIN --}}
            @role('admin')
            <li class="nav-header"><strong>MANAGEMENT DATA</strong></li>
            <li class="nav-item">
                <a href="{{ route('siswa.index') }}" class="nav-link {{ Request::is('admin/siswa*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Siswa</p>
                </a>
            </li>            
            <li class="nav-item">
                <a href="{{ route('pembayaran-spp.index') }}" class="nav-link {{ Request::is('admin/pembayaran*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Pembayaran</p>
                </a>
            </li>   
            <li class="nav-item">
                <a href="{{ route('kelas.index') }}" class="nav-link {{ Request::is('admin/kelas*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-school"></i>
                    <p>Kelas</p>
                </a>
            </li>         
            <li class="nav-item">
                <a href="{{ route('admin-list.index') }}" class="nav-link {{ Request::is('admin/admin*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>Admin</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('petugas.index') }}" class="nav-link {{ Request::is('admin/petugas*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Petugas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('spp.index') }}" class="nav-link {{ Request::is('admin/spp*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>SPP</p>
                </a>
            </li>
            @endrole

            {{-- SIDEBAR UNTUK MANAGEMENT DATA BAGIAN PETUGAS --}}
            @role('petugas')
            <li class="nav-header">MANAJEMEN DATA</li>
            <li class="nav-item">
                <a href="{{ route('siswa.index') }}" class="nav-link {{ Request::is('*siswa*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Siswa</p>
                </a>
            </li>            
            <li class="nav-item">
                <a href="{{ route('pembayaran-spp.index') }}" class="nav-link {{ Request::is('*pembayaran*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Pembayaran</p>
                </a>
            </li>          
            <li class="nav-item">
                <a href="{{ route('kelas.index') }}" class="nav-link {{ Request::is('*kelas*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-school"></i>
                    <p>Kelas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('spp.index') }}" class="nav-link {{ Request::is('*spp*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>SPP</p>
                </a>
            </li>
            @endrole

            {{-- SIDEBAR UNTUK PEMBAYARAN BAGIAN ADMIN DAN PETUGAS --}}
            @role('admin|petugas')
            <li class="nav-header"><strong>PEMBAYARAN</strong></li>
            <li class="nav-item">
                <a href="{{ route('pembayaran.index') }}" class="nav-link {{ Request::is('*pembayaran/bayar*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-money-check"></i>
                    <p>Pembayaran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pembayaran.status-pembayaran') }}" class="nav-link {{ Request::is('*pembayaran/status*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>Status Pembayaran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pembayaran.history-pembayaran') }}" class="nav-link {{ Request::is('*pembayaran/history*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-history"></i>
                    <p>History Pembayaran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pembayaran.laporan') }}" class="nav-link {{ Request::is('*pembayaran/laporan*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Laporan Pembayaran</p>
                </a>
            </li>
            @endrole
            {{-- SIDEBAR UNTUK PEMBAYARAN BAGIAN SISWA --}}
            @role('siswa')
            <li class="nav-header">PEMBAYARAN</li>
            <li class="nav-item">
                <a href="{{ route('siswa.pembayaran-spp') }}" class="nav-link {{ Request::is('*pembayaran*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>Pembayaran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('siswa.history-pembayaran') }}" class="nav-link {{ Request::is('*siswa*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-history"></i>
                    <p>History Pembayaran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('siswa.laporan-pembayaran') }}" class="nav-link {{ Request::is('*siswa/laporan*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Laporan</p>
                </a>
            </li>
            @endrole
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>