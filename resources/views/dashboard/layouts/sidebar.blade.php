<!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img width="35px" src="{{ asset('img/iconWeb.png') }}" alt="iconWeb"> Arsip Surat</h3>
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
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('domisili') || Request::is('usaha') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-edit"></i>Update Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/dashboard/profil" class="dropdown-item {{ Request::is('dashboard/profil*') ? 'active' : '' }}"><i class="bi bi-house"></i>  Profil desa</a>
                            <a href="/dashboard/syarat" class="dropdown-item {{ Request::is('dashboard/syarat*') ? 'active' : '' }}"><i class="bi bi-card-checklist"></i>  persyaratan</a>
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }}"><i class="bi bi-envelope-open-fill"></i> Permohonan</a>
                    


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('domisili') || Request::is('usaha') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Arsip Surat</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/dashboard/domisili" class="dropdown-item {{ Request::is('dashboard/domisili*') ? 'active' : '' }}"><i class="bi bi-house"></i>  Ket Domisili</a>
                            <a href="/dashboard/usaha" class="dropdown-item {{ Request::is('dashboard/usaha*') ? 'active' : '' }}"><i class="bi bi-shop-window"></i>  Ket Usaha</a>
                        </div>
                    </div>
                    <a href="/dashboard/Feedback" class="dropdown-item {{ Request::is('dashboard/Feedback*') ? 'active' : '' }}"><i class="bi bi-inbox-fill"></i> feedback</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

