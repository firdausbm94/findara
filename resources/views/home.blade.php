@extends('layout')

@section('content')
<!-- Hero Section -->
<header class="py-5">
    <div class="container px-5 pb-5">
        <div class="row gx-5 align-items-center">
            <div class="col-xxl-7">
                <div class="text-center text-xxl-start">
                    <div class="badge bg-gradient-primary-to-secondary text-white mb-4"><div class="text-uppercase">Digital Agency & Tech Solution</div></div>
                    <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Tingkatkan Skala Bisnis Anda ke Level Digital</span></h1>
                    <p class="lead fw-light mb-4">Findara hadir memberikan solusi terintegrasi mulai dari pengembangan website, sistem informasi berskala enterprise, hingga strategi pemasaran digital yang terukur untuk pertumbuhan bisnis Anda.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                        <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder rounded-pill" href="{{ url('/projects') }}">Lihat Portofolio</a>
                        <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder rounded-pill" href="{{ url('/resume') }}">Profil Founder</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5 text-center mt-5 mt-xxl-0">
                <!-- Ilustrasi Hero dengan Efek Pop-out 3D Responsif -->
                <div class="position-relative d-flex justify-content-center align-items-end mx-auto" style="width: 100%; max-width: 380px; height: 450px;">
                    
                    <!-- Latar Belakang Kotak (Petak) -->
                    <div class="position-absolute rounded-4 bg-gradient-primary-to-secondary shadow-lg" style="width: 100%; height: 300px; bottom: 0; z-index: 1;"></div>
                    
                    <!-- Aksen Titik-titik -->
                    <div class="position-absolute d-none d-sm-block" style="width: 100px; height: 100px; background-image: radial-gradient(#212529 2px, transparent 2px); background-size: 15px 15px; top: 10%; right: -20px; opacity: 0.2; z-index: 0;"></div>

                    <!-- Foto Utama -->
                    <img src="{{ asset('assets/profile.png') }}" alt="Firdaus BM" class="position-relative" style="width: 90%; max-width: 360px; z-index: 2; filter: drop-shadow(0px 15px 15px rgba(0,0,0,0.3));" />
                </div>
                
                <!-- Nama dan Gelar Pak Uus -->
                <div class="mt-4 text-center">
                    <h4 class="fw-bolder mb-1">Firdaus BM, ST, MM</h4>
                    <div class="d-flex justify-content-center gap-2 mt-2">
                        <span class="badge bg-dark rounded-pill px-3 py-2 shadow-sm">C.aip</span>
                        <span class="badge bg-dark rounded-pill px-3 py-2 shadow-sm">C.dm</span>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</header>

<!-- Services Section -->
<section class="bg-light py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-xxl-8">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Layanan Utama Findara</span></h2>
                    <p class="lead fw-light mb-4">Ekspertise teknis dan manajerial untuk menjawab berbagai tantangan industri modern.</p>
                </div>
            </div>
        </div>
        <div class="row gx-5">
            <!-- Service 1: Web Dev -->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="bg-primary bg-gradient text-white rounded-4 mb-4 d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 4rem; height: 4rem;">
                    <i class="bi bi-code-slash fs-2"></i>
                </div>
                <h2 class="h4 fw-bolder">Web Development</h2>
                <p class="text-muted">Pembuatan website company profile, landing page, hingga platform reservasi online dengan UI/UX modern ala ThemeForest yang responsif di segala perangkat.</p>
            </div>
            <!-- Service 2: Enterprise System -->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="bg-primary bg-gradient text-white rounded-4 mb-4 d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 4rem; height: 4rem;">
                    <i class="bi bi-hdd-network fs-2"></i>
                </div>
                <h2 class="h4 fw-bolder">Enterprise Systems</h2>
                <p class="text-muted">Pengembangan sistem informasi terintegrasi, mulai dari Point of Sales (POS), E-Absensi & HRIS, hingga bridging SIMRS skala rumah sakit dan klinik.</p>
            </div>
            <!-- Service 3: Digital Marketing -->
            <div class="col-lg-4">
                <div class="bg-primary bg-gradient text-white rounded-4 mb-4 d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 4rem; height: 4rem;">
                    <i class="bi bi-megaphone fs-2"></i>
                </div>
                <h2 class="h4 fw-bolder">Digital Marketing</h2>
                <p class="text-muted">Strategi pemasaran digital berbasis data, manajemen media, optimasi kampanye iklan, hingga perancangan strategi bisnis untuk mendongkrak konversi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-gradient-primary-to-secondary text-white">
    <div class="container px-5 my-5">
        <div class="text-center">
            <h2 class="display-5 fw-bolder mb-4">Siap Berkolaborasi?</h2>
            <p class="lead mb-5">Mari diskusikan ide bisnis Anda dan wujudkan ke dalam bentuk teknologi yang nyata.</p>
            <a class="btn btn-light btn-lg px-5 py-3 fs-6 fw-bolder rounded-pill" href="{{ url('/contact') }}">Hubungi Kami Sekarang</a>
        </div>
    </div>
</section>
@endsection