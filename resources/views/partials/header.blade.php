<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->
<div class="container-fluid " style="background-color: #04988F;">
    <div class="row">
        <div class="col-9 d-flex align-items-center">
            <img src="http://localhost:8000/img/logo_desa.png" alt="Company Logo" class="img-fluid rounded-circle" style="width: 180px;">
            <div class="ms-3">
                <span style="font-size: 22px; color: black;">Desa Moro Rejo</span><br>
                <span style="color: black;">Kecamatan Tempel</span>
            </div>
        </div>
        <div class="col-3 text-start d-flex align-items-center ">
            <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }} text-dark">Home</a>
            @auth
                <div class="nav-item dropdown d-inline">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="bi bi-person-circle"></i> {{ auth()->user()->name }}</a>
                    <div class="dropdown-menu " aria-labelledby="userDropdown">
                        <a href="/dashboard" class="dropdown-item"><i class="bi bi-layout-text-sidebar-reverse"></i>
                            Dashboard</a>
                        <hr class="dropdown-divider">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/login"
                    class="nav-item nav-link {{ Request::is('login') || Request::is('register') ? 'active' : '' }} d-inline"><i
                        class="bi bi-box-arrow-in-right"></i> Login</a>
            @endauth
        </div>
    </div>
</div>
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg  navbar-light bg-white sticky-top p-0 px-4 px-lg-5 ">
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="font-size: 18px;">
        <ul class="navbar-nav mx-auto  ">
            <li class="nav-item mx-auto">
                <a href="/" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="profilDesaDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profil Desa
                </a>
                <div class="dropdown-menu" aria-labelledby="profilDesaDropdown">
                    <a class="dropdown-item" href="/profilDesa/sejarah">Sejarah</a>
                    <a class="dropdown-item" href="/profilDesa/visi">Visi Misi</a>
                    <a class="dropdown-item" href="/profilDesa/struktur">Struktur Organisasi</a>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="informasiDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Alur & Persyaratan
                </a>
                <div class="dropdown-menu" aria-labelledby="informasiDropdown">
                    <a class="dropdown-item" href="/main/layanan/alur">Alur</a>
                    <a class="dropdown-item" href="/main/layanan/persyaratan">Persyaratan</a>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Layanan
                </a>
                <div class="dropdown-menu" aria-labelledby="layananDropdown">
                    <a class="dropdown-item" href="/main/newKk">Permohonan KK</a>
                    <a class="dropdown-item" href="/main/newKtp">Permohonan KTP</a>
                </div>
            </li>
            <li class="nav-item5">
                <a class="nav-link" href="/main/feedback">Feedback</a>
            </li>
        </ul>
    </div>
</nav>
<hr>
<!-- Navbar End -->
