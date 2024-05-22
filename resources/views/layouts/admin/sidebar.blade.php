<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img class="animation__shake" src="{{asset('../frontend/assets/images/logo.png')}}" alt="Singawas" height="80"
            width="100">
        <span class="brand-text font-weight-light">Singawas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img class="animation__shake" src="{{asset('../frontend/assets/images/logo.png')}}" alt="Singawas"
                    height="80" width="100">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item {{ Request::is('dashboard') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}"
                                class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard-Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ Request::is('dashboard/kendaraan') || Request::is('dashboard/sertifikat') || Request::is('dashboard/inspektor') || Request::is('dashboard/inspeksi') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard/kendaraan') || Request::is('dashboard/sertifikat') || Request::is('dashboard/inspektor') || Request::is('dashboard/inspeksi') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Data Master Singawas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.kendaraan.index') }}"
                                class="nav-link {{ Request::is('dashboard/kendaraan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kendaraan Terdata</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.sertifikat.index') }}"
                                class="nav-link {{ Request::is('dashboard/sertifikat') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sertifikat Active</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.inspektor.index') }}"
                                class="nav-link {{ Request::is('dashboard/inspektor') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Inspektor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.inspeksi.index') }}"
                                class="nav-link {{ Request::is('dashboard/inspeksi*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Inspeksi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Menu Action</li>
                <li class="nav-item">
                    <a href="{{route('dashboard.verified.index')}}"
                        class="nav-link {{ Request::is('dashboard/verified*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-file"></i>
                        <p>1 - Verifikasi Kendaraan </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.inspeksi.create')}}"
                        class="nav-link {{ Request::is('dashboard/inspeksi/create') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-file"></i>
                        <p>2 - Buat Data Inspeksi </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.pengajuan.index')}}"
                        class="nav-link {{ Request::is('dashboard/pengajuan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>3 - Pengajuan Sertifikat </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('dashboard.sertifikat.create')}}"
                        class="nav-link {{ Request::is('dashboard/sertifikat/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>4 - Buat Sertifikat </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.inspektor.create')}}"
                        class="nav-link {{ Request::is('dashboard/inspektor/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>+ Buat Data Inspektor </p>
                    </a>
                </li>


                <li class="nav-header">Laporan </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.laporan.kendaraan')}}"
                        class="nav-link {{ Request::is('dashboard/laporan-kendaraan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p> Laporan Data Kendaraan </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.laporan.inspeksi')}}"
                        class="nav-link {{ Request::is('dashboard/laporan-inspeksi') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p> Laporan Data Inspeksi </p>
                    </a>
                </li>


                <li class="nav-header">Action</li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home text-warning"></i>
                        <p>Home Depan</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>