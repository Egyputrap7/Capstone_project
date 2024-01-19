<!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img width="35px" src="{{ asset('img/iconWeb.png') }}" alt="iconWeb"> Mororejo</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('dashmin/img/user.png') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        <span>{{ auth()->user()->username }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/dashboard" class="nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    {{-- dropdown Update data --}}
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('profil') || Request::is('syarat') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-edit me-2"></i>Update Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/dashboard/profil" class="dropdown-item {{ Request::is('dashboard/profil*') ? 'active' : '' }}"><i class="bi bi-house"></i>  Profil Desa</a>
                            <a href="/dashboard/syarat" class="dropdown-item {{ Request::is('dashboard/syarat*') ? 'active' : '' }}"><i class="bi bi-card-checklist"></i>  Alur & Persyaratan</a>
                            <a href="/dashboard/berita" class="dropdown-item {{ Request::is('dashboard/berita*') ? 'active' : '' }}"><i class="bi bi-newspaper"></i>  Berita</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('ktp') || Request::is('kk') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-envelope-open me-2"></i>Permohonan</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/dashboard/ktp" class="dropdown-item {{ Request::is('dashboard/ktp*') ? 'active' : '' }}"><i class="bi bi-file-person"></i>  Kartu Tanda Penduduk</a>
                            <a href="/dashboard/kk" class="dropdown-item {{ Request::is('dashboard/kk*') ? 'active' : '' }}"><i class="bi bi-house-door-fill"></i>  Kartu Keluarga</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('arsipktp') || Request::is('arsipkk') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Arsip Surat</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/dashboard/arsipktp" class="dropdown-item {{ Request::is('dashboard/arsipktp*') ? 'active' : '' }}"><i class="bi bi-file-person"></i>  Arsip KTP</a>
                            <a href="/dashboard/arsipkk" class="dropdown-item {{ Request::is('dashboard/arsipkk*') ? 'active' : '' }}"><i class="bi bi-house-door-fill"></i>  Arsip KK</a>
                        </div>
                    </div>
                    <a href="/dashboard/Feedback" class="nav-item nav-link {{ Request::is('dashboard/Feedback') ? 'active' : '' }}"><i class="bi bi-inbox-fill me-2"></i>Feedback</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

