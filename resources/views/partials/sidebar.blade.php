<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">


        @if (Auth::user()->role == 'admin')
            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/manajemen-guru') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.manajemenGuru') }}">
                    <i class="menu-icon mdi mdi-file-document"></i>
                    <span class="menu-title">Manajemen Guru</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/kelola-absensi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.kelolaAbsensi') }}">
                    <i class="menu-icon mdi mdi-file-document"></i>
                    <span class="menu-title">Kelola Absensi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/absensi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.absensi') }}">
                    <i class="menu-icon mdi mdi-file-document"></i>
                    <span class="menu-title">Manajemen Absensi</span>
                </a>
            </li>
            <style>
                /* Warna latar belakang sidebar */
                .sidebar {
                    background-color: #0c0e11;
                    /* Warna biru untuk sidebar */
                    color: white;
                    /* Warna teks putih */
                    padding: 20px;
                }

                /* Warna latar belakang dan teks item menu yang aktif */
                .nav-item.active .nav-link {
                    background-color: #0b1014;
                    /* Warna biru lebih gelap untuk item yang aktif */
                    color: white;
                    /* Teks putih saat item aktif */
                }

                /* Warna latar belakang dan teks untuk item menu */
                .nav-item .nav-link {
                    color: white;
                    /* Teks putih untuk item menu */
                    padding: 10px;
                    border-radius: 5px;
                    transition: background-color 0.3s ease;
                    /* Efek transisi ketika hover */
                }

                /* Efek hover untuk item menu */
                .nav-item .nav-link:hover {
                    background-color: #0c0e11;
                    /* Warna biru lebih gelap saat hover */
                    color: white;
                    /* Teks tetap putih saat hover */
                }

                /* Warna ikon pada item menu */
                .nav-item .nav-link .menu-icon {
                    color: white;
                    /* Warna ikon putih */
                }

                /* Mengubah warna latar belakang sidebar saat di-hover */
                .sidebar:hover {
                    background-color: #0c0e11;
                    /* Warna biru sedikit lebih gelap saat di-hover */
                }
            </style>
       @else
       <li class="nav-item {{ request()->is('guru/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('guru.dashboard') }}">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('guru/settings-akun') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('guru.user.index') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Settings Akun</span>
            </a>
        </li>

       @endif

        
    </ul>
</nav>
