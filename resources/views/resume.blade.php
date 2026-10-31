@extends('layout')

@section('content')
<!-- Page Content-->
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Profil & Rekam Jejak</span></h1>
        <p class="lead fw-normal text-muted mb-0 mt-2">Firdaus BM, S.T. - Konsultan IT & Digital Marketing Strategist</p>
    </div>
    
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-10">
            
            <!-- Keahlian Utama (Skills) Section -->
            <section class="mb-5">
                <h3 class="fw-bolder mb-4 text-secondary">Keahlian Utama (Skills)</h3>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 bg-light">
                            <div class="card-body p-4">
                                <h6 class="fw-bolder text-primary mb-2"><i class="bi bi-briefcase me-2"></i>Manajemen & Bisnis</h6>
                                <p class="small text-muted mb-0">Strategic Digital Marketing, Team Leadership, Vendor Management (Koordinasi Vendor), Sales Training & Development, Budget Optimization, Customer Value Creation, Data-Driven Analysis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 bg-light">
                            <div class="card-body p-4">
                                <h6 class="fw-bolder text-primary mb-2"><i class="bi bi-megaphone me-2"></i>Digital Marketing Stack</h6>
                                <p class="small text-muted mb-0">Meta Ads Manager, Google Ads (SEO/SEM), Hard-Selling Copywriting, Leads Generation Strategy, Content Funneling.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 bg-light">
                            <div class="card-body p-4">
                                <h6 class="fw-bolder text-primary mb-2"><i class="bi bi-hdd-network me-2"></i>Teknik IT & Jaringan</h6>
                                <p class="small text-muted mb-0">Tata Kelola IT (IT Governance), Manajemen Vendor, API Integration (SIMRS & BPJS HFIS), PHP (Laravel Framework), HTML, Jaringan Komputer (LAN/WAN, DHCP, Konfigurasi Router), Administrasi Server.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 bg-light">
                            <div class="card-body p-4">
                                <h6 class="fw-bolder text-primary mb-2"><i class="bi bi-camera-reels me-2"></i>Kreatif & Multimedia</h6>
                                <p class="small text-muted mb-0">Produksi Video Komersial, Fotografi Profesional, Lisensi Pilot Drone, Adobe Photoshop, Adobe Premiere Pro.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Pengalaman Kerja Section -->
            <section class="mb-5">
                <h3 class="fw-bolder mb-4 text-secondary">Pengalaman Kerja</h3>
                
                <!-- Experience 1: Findara -->
                <div class="card shadow border-0 rounded-4 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="row align-items-center gx-5">
                            <div class="col-md-4 text-center text-md-start mb-4 mb-md-0">
                                <div class="bg-white border p-3 rounded-4">
                                    <div class="text-primary fw-bolder mb-1">2020 - Sekarang</div>
                                    <div class="small fw-bolder">Findara Digital Agency</div>
                                    <div class="small text-muted">Founder & Digital Marketing Strategist</div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <ul class="text-muted small mb-0 ps-3">
                                    <li class="mb-1">Memimpin agensi digital terintegrasi untuk klien seperti King Tour, Alfascorpii Nangka, klinik estetika (Vclinic, Aleea, Ashofa, Sunat Hero), dan sektor properti.</li>
                                    <li class="mb-1">Merancang strategi Meta Ads dengan penargetan presisi pada proyek 'Kencana House'.</li>
                                    <li class="mb-1">Mengoptimalkan ROI dan ROAS iklan, menghasilkan lebih dari 1.500 prospek (Leads) berkualitas dan meningkatkan konversi rata-rata 25% per kuartal.</li>
                                    <li class="mb-1">Melakukan A/B Testing berbasis data dan mengoptimalkan performa SEO/SEM untuk mendominasi pasar lokal.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experience 2: CV Bunda Sarana Medika -->
                <div class="card shadow border-0 rounded-4 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="row align-items-center gx-5">
                            <div class="col-md-4 text-center text-md-start mb-4 mb-md-0">
                                <div class="bg-white border p-3 rounded-4">
                                    <div class="text-primary fw-bolder mb-1">2022 - Sekarang</div>
                                    <div class="small fw-bolder">CV Bunda Sarana Medika</div>
                                    <div class="small text-muted">IT Consultant</div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <ul class="text-muted small mb-0 ps-3">
                                    <li class="mb-1">Merancang arsitektur sistem informasi dan tata kelola infrastruktur lokal untuk bisnis medis.</li>
                                    <li class="mb-1">Mengawal bridging SIMRS dengan BPJS Kesehatan dan menjadi penghubung teknis API sesuai regulasi HFIS secara real-time.</li>
                                    <li class="mb-1">Memitigasi galat bersama vendor dan mengeliminasi kesalahan data dokter, meningkatkan efisiensi administrasi hingga 40%.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experience 3 & 4 (Combined row for brevity) -->
                <div class="row gx-4 mb-4">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <div class="card h-100 shadow border-0 rounded-4">
                            <div class="card-body p-4">
                                <h6 class="fw-bolder">Klinik Pratama Salsa</h6>
                                <p class="text-primary small fw-bold mb-3">IT Support | 2023 - Sekarang</p>
                                <ul class="text-muted small ps-3 mb-0">
                                    <li class="mb-1">Memelihara infrastruktur jaringan, troubleshooting, keamanan server, dan perangkat keras klinis.</li>
                                    <li>Memastikan kelancaran pelayanan pasien secara berkelanjutan.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 shadow border-0 rounded-4">
                            <div class="card-body p-4">
                                <h6 class="fw-bolder">Yayasan Nadwah Islamiah</h6>
                                <p class="text-primary small fw-bold mb-3">Tim Media & Publikasi | 2025 - 2026</p>
                                <ul class="text-muted small ps-3 mb-0">
                                    <li class="mb-1">Memimpin produksi media visual, video sinematik, dan dokumentasi.</li>
                                    <li>Mengoperasikan drone komersial dan mendongkrak engagement audiens media sosial hingga 50%.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experience 5, 6, 7 -->
                <div class="row gx-4">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card h-100 shadow border-0 rounded-4">
                            <div class="card-body p-4">
                                <h6 class="fw-bolder">PT Alfascorpii Pasir Putih</h6>
                                <p class="text-primary small fw-bold mb-3">PIC Sales Dev & Trainer | 2024 - 2025</p>
                                <ul class="text-muted small ps-3 mb-0">
                                    <li class="mb-1">Merancang kurikulum operasional sales dan mengajarkan teknik negosiasi taktis.</li>
                                    <li>Mendongkrak pencapaian target tim penjualan sebesar 18%.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card h-100 shadow border-0 rounded-4">
                            <div class="card-body p-4">
                                <h6 class="fw-bolder">Klinik Utama Optimum</h6>
                                <p class="text-primary small fw-bold mb-3">Koordinator IT | 2019 - 2022</p>
                                <ul class="text-muted small ps-3 mb-0">
                                    <li class="mb-1">Mengelola infrastruktur jaringan lokal secara penuh.</li>
                                    <li>Memastikan keandalan sistem digital berjalan tanpa gangguan dengan uptime 99,9%.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow border-0 rounded-4">
                            <div class="card-body p-4">
                                <h6 class="fw-bolder">Retina Studio Pekanbaru</h6>
                                <p class="text-primary small fw-bold mb-3">Fotografer & Videografer | 2015 - 2020</p>
                                <ul class="text-muted small ps-3 mb-0">
                                    <li>Mengarahkan produksi pra dan pasca-produksi untuk kampanye visual produk komersial dan acara besar.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Pendidikan & Sertifikasi Section-->
            <section>
                <h3 class="fw-bolder mb-4 text-secondary">Pendidikan & Lisensi Profesional</h3>
                
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-4 p-md-5">
                        <div class="row gx-5">
                            <!-- Pendidikan -->
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-mortarboard text-primary fs-4 me-2"></i>
                                    <h5 class="fw-bolder mb-0">Pendidikan Tinggi</h5>
                                </div>
                                <ul class="text-muted mb-0 ps-3">
                                    <li class="mb-3">
                                        <strong class="text-dark">S2 - Magister Manajemen</strong><br>
                                        Institut Bisnis dan Teknologi Pelita Indonesia (2025 - Sekarang)<br>
                                        <span class="small">Fokus Studi: Pemasaran Strategis, Manajemen Operasional, Bisnis Analitik, Kepemimpinan Perusahaan.</span>
                                    </li>
                                    <li>
                                        <strong class="text-dark">S1 - Teknik Informatika</strong><br>
                                        UIN Sultan Syarif Kasim Riau (Lulus 2020)<br>
                                        <span class="small">IPK: 3.08 | Fokus: Rekayasa Perangkat Lunak, Teknologi Informasi Web, Arsitektur Jaringan Komputer.</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- Sertifikasi -->
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-award text-secondary fs-4 me-2"></i>
                                    <h5 class="fw-bolder mb-0">Sertifikasi Profesional</h5>
                                </div>
                                <ul class="text-muted mb-0 ps-3 small">
                                    <li class="mb-2">
                                        <strong class="text-dark">Mini MBA Professional Certification (2025)</strong><br>
                                        University of London x Marketing Institute Indonesia
                                    </li>
                                    <li class="mb-2">
                                        <strong class="text-dark">Kelas Iklan Online Meta Ads - Skillpedia.id (2025)</strong><br>
                                        Nilai Ujian: 100/A-Sangat Baik (11 JP)
                                    </li>
                                    <li class="mb-2">
                                        <strong class="text-dark">Sertifikasi Customer Value - PT Wahana Ajar Bisnis (2025)</strong><br>
                                        Passing Score: 96%
                                    </li>
                                    <li class="mb-2">
                                        <strong class="text-dark">Sertifikasi Digital Innovation - PT Wahana Ajar Bisnis (2025)</strong><br>
                                        Passing Score: 92%
                                    </li>
                                    <li>
                                        <strong class="text-dark">Digital Marketing Class Program Certification</strong><br>
                                        PT Talenta Sinergi Group (eduwork.id)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection