@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
<!-- HERO SECTION -->
<section class="hero-section">
    <div class="hero-background">
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <div class="hero-badge">
                    <i class="fas fa-circle-check me-2"></i>
                    Sistem PPDB Online Terpercaya
                </div>
                <h1 class="hero-title">Penerimaan Peserta Didik Baru</h1>
                <p class="hero-subtitle">Bergabunglah dengan SMK Pusat Keunggulan Terakreditasi A dan wujudkan masa depan gemilang bersama kami</p>
                <div class="d-flex gap-3 mt-4 justify-content-center flex-wrap">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-hero-primary">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-hero-primary">
                            <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                        </a>
                        <a href="{{ route('tracking.index') }}" class="btn btn-hero-secondary">
                            <i class="fas fa-search me-2"></i>Cek Status
                        </a>
                    @endauth
                </div>
                <div class="hero-stats mt-5">
                    <div class="row g-4">
                        <div class="col-md-3 col-6">
                            <div class="hero-stat-item">
                                <i class="fas fa-graduation-cap"></i>
                                <div class="stat-content">
                                    <span class="number">2.5K+</span>
                                    <span class="label">Alumni</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="hero-stat-item">
                                <i class="fas fa-trophy"></i>
                                <div class="stat-content">
                                    <span class="number">150+</span>
                                    <span class="label">Prestasi</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="hero-stat-item">
                                <i class="fas fa-user-tie"></i>
                                <div class="stat-content">
                                    <span class="number">45+</span>
                                    <span class="label">Pengajar</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="hero-stat-item">
                                <i class="fas fa-building"></i>
                                <div class="stat-content">
                                    <span class="number">5</span>
                                    <span class="label">Jurusan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SCHEDULE INFO SECTION -->
<section class="schedule-section">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge">
                <i class="fas fa-calendar-alt me-2"></i>
                Informasi Jadwal
            </div>
            <h2 class="section-title">Informasi Pendaftaran PPDB</h2>
            <p class="section-subtitle">Tahun Ajaran 2024/2025 - Masa Depan Cerah Dimulai dari Sini</p>
        </div>
        <div class="row g-4">
            <!-- CARD 1: PERIODE UTAMA -->
            <div class="col-lg-6">
                <div class="schedule-card main-period">
                    <div class="schedule-header">
                        <div class="schedule-icon blue">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h4>Periode Pendaftaran</h4>
                    </div>
                    <div class="schedule-content">
                        <div class="period-details">
                            <div class="date-info">
                                <i class="fas fa-calendar"></i>
                                <span>1 Januari 2024 - 31 Desember 2024</span>
                            </div>
                            <div class="time-info">
                                <i class="fas fa-clock"></i>
                                <span>Buka 24 Jam (Online System)</span>
                            </div>
                        </div>
                        <div class="status-indicator active">
                            <i class="fas fa-circle"></i>
                            SEDANG BERLANGSUNG
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 2: GELOMBANG PENDAFTARAN -->
            <div class="col-lg-6">
                <div class="schedule-card waves-card">
                    <div class="schedule-header">
                        <div class="schedule-icon green">
                            <i class="fas fa-water"></i>
                        </div>
                        <h4>Gelombang Pendaftaran</h4>
                    </div>
                    <div class="schedule-content">
                        <div class="waves-timeline">
                            @php
                                $gelombang = DB::table('gelombang')->orderBy('tgl_mulai')->get();
                            @endphp
                            @if($gelombang->count() > 0)
                                @foreach($gelombang->take(3) as $index => $wave)
                                <div class="wave-timeline-item">
                                    <div class="wave-dot">{{ $index + 1 }}</div>
                                    <div class="wave-info">
                                        <span class="wave-name">{{ $wave->nama }}</span>
                                        <span class="wave-date">{{ \Carbon\Carbon::parse($wave->tgl_mulai)->format('d M') }} - {{ \Carbon\Carbon::parse($wave->tgl_selesai)->format('d M Y') }}</span>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="wave-timeline-item">
                                    <div class="wave-dot">1</div>
                                    <div class="wave-info">
                                        <span class="wave-name">Gelombang 1</span>
                                        <span class="wave-date">1 Jan - 30 Apr 2024</span>
                                    </div>
                                </div>
                                <div class="wave-timeline-item">
                                    <div class="wave-dot">2</div>
                                    <div class="wave-info">
                                        <span class="wave-name">Gelombang 2</span>
                                        <span class="wave-date">1 Mei - 31 Agu 2024</span>
                                    </div>
                                </div>
                                <div class="wave-timeline-item">
                                    <div class="wave-dot">3</div>
                                    <div class="wave-info">
                                        <span class="wave-name">Gelombang 3</span>
                                        <span class="wave-date">1 Sep - 31 Des 2024</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CTA ROW -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="/informasi" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                    <i class="fas fa-info-circle me-2"></i>Lihat Informasi Lengkap
                </a>
            </div>
        </div>
    </div>
</section>

<!-- PROFILE SECTION -->
<section class="profile-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary rounded-pill mb-3 px-4 py-2 fs-6"><i class="fas fa-school me-2"></i>Profil Sekolah</span>
            <h2 class="fw-bold mb-3 display-5">SMK Bakti Nusantara 666</h2>
            <p class="text-muted fs-5 mb-0">Menciptakan Generasi Unggul Berkarakter dan Berkompeten</p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 hover-lift">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3">
                                <i class="fas fa-bullseye fs-4"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Visi</h4>
                        </div>
                        <p class="text-muted mb-0 lh-lg">Menjadi SMK Unggulan yang Mencetak Lulusan Berkompetensi Global, Berkarakter Strong, dan Berjiwa Entrepreneur</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 hover-lift">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box bg-success bg-opacity-10 text-success rounded-3 p-3 me-3">
                                <i class="fas fa-rocket fs-4"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Misi</h4>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                <span class="text-muted"><strong>Kompetensi Teknis</strong> - Penguasaan skill industri terkini</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                <span class="text-muted"><strong>Karakter Strong</strong> - Integritas, disiplin, tanggung jawab</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                <span class="text-muted"><strong>Global Mindset</strong> - Berwawasan internasional</span>
                            </li>
                            <li class="mb-0 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                <span class="text-muted"><strong>Entrepreneurship</strong> - Jiwa wirausaha yang kreatif</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body p-4 p-md-5">
                <div class="text-center mb-5">
                    <div class="icon-box bg-warning bg-opacity-10 text-warning rounded-3 p-3 d-inline-flex mb-3">
                        <i class="fas fa-history fs-3"></i>
                    </div>
                    <h3 class="fw-bold mb-2">Sejarah Singkat</h3>
                    <p class="text-muted mb-0">Perjalanan SMK Bakti Nusantara 666 Menuju Keunggulan</p>
                </div>
                <div class="timeline-container">
                    <div class="timeline-item">
                        <span class="badge bg-primary rounded-pill timeline-year px-3 py-2"><i class="fas fa-calendar-alt me-2"></i>2005</span>
                        <div class="timeline-content">
                            <h5 class="fw-bold mb-2"><i class="fas fa-flag-checkered text-primary me-2"></i>Berdiri</h5>
                            <p class="text-muted mb-0">Pendirian dengan 2 program keahlian dan 120 siswa angkatan pertama. Awal perjalanan menuju keunggulan.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span class="badge bg-primary rounded-pill timeline-year px-3 py-2"><i class="fas fa-calendar-alt me-2"></i>2008</span>
                        <div class="timeline-content">
                            <h5 class="fw-bold mb-2"><i class="fas fa-expand-arrows-alt text-info me-2"></i>Ekspansi</h5>
                            <p class="text-muted mb-0">Penambahan 2 program keahlian baru. Merespons kebutuhan industri.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span class="badge bg-primary rounded-pill timeline-year px-3 py-2"><i class="fas fa-calendar-alt me-2"></i>2010</span>
                        <div class="timeline-content">
                            <h5 class="fw-bold mb-2"><i class="fas fa-shield-alt text-success me-2"></i>Penguatan</h5>
                            <p class="text-muted mb-0">Peroleh Akreditasi B. Standar kualitas semakin meningkat.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span class="badge bg-primary rounded-pill timeline-year px-3 py-2"><i class="fas fa-calendar-alt me-2"></i>2016</span>
                        <div class="timeline-content">
                            <h5 class="fw-bold mb-2"><i class="fas fa-star text-warning me-2"></i>Transformasi</h5>
                            <p class="text-muted mb-0">Raih Akreditasi A & modernisasi. Lompatan menuju pendidikan vokasi unggulan.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span class="badge bg-primary rounded-pill timeline-year px-3 py-2"><i class="fas fa-calendar-alt me-2"></i>2024</span>
                        <div class="timeline-content">
                            <h5 class="fw-bold mb-2"><i class="fas fa-trophy text-danger me-2"></i>Terdepan</h5>
                            <p class="text-muted mb-0">Sekolah vokasi modern dengan fasilitas terkini. Mencetak generasi unggul siap industri.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('profil') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                <i class="fas fa-info-circle me-2"></i>Lihat Profil Lengkap
            </a>
        </div>
    </div>
</section>

<!-- SYSTEM FEATURES SECTION -->
<section class="system-features-section">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge">
                <i class="fas fa-rocket me-2"></i>
                Fitur Unggulan
            </div>
            <h2 class="section-title">Fitur Unggulan Sistem PPDB Online</h2>
            <p class="section-subtitle">Platform Digital Modern untuk Kemudahan Pendaftaran</p>
        </div>
        
        <!-- FEATURES GRID -->
        <div class="row g-4">
            <!-- ROW 1: PENDAFTARAN FEATURES -->
            <div class="col-lg-4 col-md-6">
                <div class="system-feature-card">
                    <div class="feature-icon-container">
                        <div class="feature-icon blue">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                    <h5 class="feature-title">Pendaftaran Online 24 Jam</h5>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Formulir digital lengkap</li>
                        <li><i class="fas fa-check"></i> Upload berkas mudah</li>
                        <li><i class="fas fa-check"></i> Simpan draft sementara</li>
                        <li><i class="fas fa-check"></i> Edit data fleksibel</li>
                    </ul>
                    <p class="feature-highlight">Daftar kapan saja, di mana saja tanpa batas waktu</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="system-feature-card">
                    <div class="feature-icon-container">
                        <div class="feature-icon green">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>
                    <h5 class="feature-title">Verifikasi Keamanan</h5>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> OTP via email terjamin</li>
                        <li><i class="fas fa-check"></i> Akun terproteksi aman</li>
                        <li><i class="fas fa-check"></i> Verifikasi kepemilikan</li>
                        <li><i class="fas fa-check"></i> Sistem anti-spam</li>
                    </ul>
                    <p class="feature-highlight">Keamanan data terjamin dengan verifikasi berlapis</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="system-feature-card">
                    <div class="feature-icon-container">
                        <div class="feature-icon orange">
                            <i class="fas fa-file-upload"></i>
                        </div>
                    </div>
                    <h5 class="feature-title">Berkas Digital</h5>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Upload multiple file</li>
                        <li><i class="fas fa-check"></i> Format PDF/JPG/PNG</li>
                        <li><i class="fas fa-check"></i> Validasi otomatis</li>
                        <li><i class="fas fa-check"></i> Pratinjau dokumen</li>
                    </ul>
                    <p class="feature-highlight">Hindari antrean dengan berkas digital terorganisir</p>
                </div>
            </div>
            
            <!-- ROW 2: MONITORING FEATURES -->
            <div class="col-lg-4 col-md-6">
                <div class="system-feature-card">
                    <div class="feature-icon-container">
                        <div class="feature-icon purple">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <h5 class="feature-title">Status Real-Time</h5>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Timeline progres</li>
                        <li><i class="fas fa-check"></i> Notifikasi update</li>
                        <li><i class="fas fa-check"></i> Histori lengkap</li>
                        <li><i class="fas fa-check"></i> Transparansi proses</li>
                    </ul>
                    <p class="feature-highlight">Pantau perkembangan pendaftaran secara real-time</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="system-feature-card">
                    <div class="feature-icon-container">
                        <div class="feature-icon teal">
                            <i class="fas fa-credit-card"></i>
                        </div>
                    </div>
                    <h5 class="feature-title">Pembayaran Online</h5>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Multiple channel</li>
                        <li><i class="fas fa-check"></i> Bukti transfer digital</li>
                        <li><i class="fas fa-check"></i> Verifikasi cepat</li>
                        <li><i class="fas fa-check"></i> E-receipt otomatis</li>
                    </ul>
                    <p class="feature-highlight">Bayar mudah via transfer bank dengan konfirmasi instan</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="system-feature-card">
                    <div class="feature-icon-container">
                        <div class="feature-icon red">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                    </div>
                    <h5 class="feature-title">Dashboard Lengkap</h5>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Data terpusat rapi</li>
                        <li><i class="fas fa-check"></i> Grafik analitik</li>
                        <li><i class="fas fa-check"></i> Ekspor laporan</li>
                        <li><i class="fas fa-check"></i> Monitoring komprehensif</li>
                    </ul>
                    <p class="feature-highlight">Kelola semua data dalam satu dashboard terintegrasi</p>
                </div>
            </div>
        </div>
        
        <!-- CTA SECTION -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('fitur') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                    <i class="fas fa-list-check me-2"></i>Lihat Fitur Lengkap
                </a>
            </div>
        </div>
    </div>
</section>

<!-- STATISTICS SECTION -->
<section class="stats-section">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge">
                <i class="fas fa-chart-line me-2"></i>
                Update Real-time
            </div>
            <h2 class="section-title">Statistik Pendaftaran</h2>
            <p class="section-subtitle">Pantau perkembangan pendaftaran PPDB tahun ajaran 2024/2025 secara langsung</p>
        </div>
        <div class="row g-4">
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon-wrapper">
                        <div class="stat-icon blue">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i> 12%
                        </div>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" data-target="150">0</div>
                        <div class="stat-label">Total Pendaftar</div>
                        <div class="stat-description">Calon siswa terdaftar</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon-wrapper">
                        <div class="stat-icon green">
                            <i class="fas fa-check-double"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i> 8%
                        </div>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" data-target="140">0</div>
                        <div class="stat-label">Terverifikasi</div>
                        <div class="stat-description">Data telah divalidasi</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon-wrapper">
                        <div class="stat-icon yellow">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i> 15%
                        </div>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" data-target="100">0</div>
                        <div class="stat-label">Sudah Bayar</div>
                        <div class="stat-description">Pembayaran lunas</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon-wrapper">
                        <div class="stat-icon red">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="fas fa-arrow-up"></i> 5%
                        </div>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" data-target="90">0</div>
                        <div class="stat-label">Diterima</div>
                        <div class="stat-description">Siswa lolos seleksi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURES SECTION -->
<section class="features-section">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-badge">
                <i class="fas fa-star me-2"></i>
                Keunggulan
            </div>
            <h2 class="section-title">Mengapa Memilih Sistem Kami?</h2>
            <p class="section-subtitle">Pengalaman pendaftaran yang mudah, cepat, dan terpercaya</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon blue">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                    </div>
                    <h5 class="feature-title">Pendaftaran Digital</h5>
                    <p class="feature-desc">Proses pendaftaran fully online dengan form yang user-friendly dan mudah diakses dari berbagai device</p>
                    <div class="feature-list">
                        <div class="feature-list-item">
                            <i class="fas fa-check"></i>
                            <span>Akses 24/7</span>
                        </div>
                        <div class="feature-list-item">
                            <i class="fas fa-check"></i>
                            <span>Auto-save progress</span>
                        </div>
                        <div class="feature-list-item">
                            <i class="fas fa-check"></i>
                            <span>Mobile friendly</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon green">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <h5 class="feature-title">Monitoring Real-time</h5>
                    <p class="feature-desc">Pantau status pendaftaran secara real-time dengan notifikasi update dan timeline yang jelas</p>
                    <div class="feature-list">
                        <div class="feature-list-item">
                            <i class="fas fa-check"></i>
                            <span>Live tracking</span>
                        </div>
                        <div class="feature-list-item">
                            <i class="fas fa-check"></i>
                            <span>Notifikasi otomatis</span>
                        </div>
                        <div class="feature-list-item">
                            <i class="fas fa-check"></i>
                            <span>Timeline progress</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon purple">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>
                    <h5 class="feature-title">Keamanan Terjamin</h5>
                    <p class="feature-desc">Data pribadi Anda dilindungi dengan sistem keamanan berlapis dan enkripsi tingkat tinggi</p>
                    <div class="feature-list">
                        <div class="feature-list-item">
                            <i class="fas fa-check"></i>
                            <span>Enkripsi data</span>
                        </div>
                        <div class="feature-list-item">
                            <i class="fas fa-check"></i>
                            <span>Backup reguler</span>
                        </div>
                        <div class="feature-list-item">
                            <i class="fas fa-check"></i>
                            <span>Privasi terjaga</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <div class="cta-card">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="cta-title">Siap Bergabung Dengan Kami?</h3>
                    <p class="cta-description">Jangan lewatkan kesempatan untuk menjadi bagian dari keluarga besar SMK Unggulan. Daftar sekarang dan raih masa depan gemilang!</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('register') }}" class="btn btn-cta">
                        <i class="fas fa-rocket me-2"></i>Mulai Pendaftaran
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function animateCounter(element) {
    const target = parseInt(element.getAttribute('data-target'));
    const duration = 2000;
    const step = target / (duration / 16);
    let current = 0;
    
    const timer = setInterval(() => {
        current += step;
        if (current >= target) {
            element.textContent = target.toLocaleString();
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current).toLocaleString();
        }
    }, 16);
}

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                if (!counter.classList.contains('animated')) {
                    counter.classList.add('animated');
                    animateCounter(counter);
                }
            });
        }
    });
}, { threshold: 0.3 });

document.addEventListener('DOMContentLoaded', () => {
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) observer.observe(statsSection);
});
</script>
@endpush

@push('styles')
<style>
:root {
    --primary: #4361ee;
    --primary-light: #4895ef;
    --secondary: #3f37c9;
    --success: #4cc9f0;
    --danger: #f72585;
    --warning: #f8961e;
    --info: #43aa8b;
    --dark: #1a1a2e;
    --light: #f8f9fa;
    --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.hero-section {
    background: url('/assets/images/background-baknus1.jpg') center center / cover no-repeat;
    color: #ffffff;
    padding: 210px 0 100px;
    margin-top: 0;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    z-index: 1;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
    opacity: 0;
}

.hero-shapes .shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
}

.shape-1 { width: 300px; height: 300px; top: -150px; right: -100px; }
.shape-2 { width: 200px; height: 200px; bottom: 100px; left: -50px; }
.shape-3 { width: 150px; height: 150px; bottom: 200px; right: 20%; }

.hero-section .container { position: relative; z-index: 2; }

.hero-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    padding: 10px 24px;
    border-radius: 50px;
    font-size: 0.95rem;
    margin-bottom: 2rem;
    border: 1px solid rgba(255,255,255,0.3);
    color: #ffffff;
    font-weight: 500;
}

.hero-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 3.5rem;
    line-height: 1.2;
    margin-bottom: 1.5rem;
    color: #ffffff;
    text-shadow: 0 2px 10px rgba(0,0,0,0.5);
}

.hero-subtitle {
    font-size: 1.3rem;
    font-weight: 400;
    color: rgba(255,255,255,0.95);
    margin-bottom: 2.5rem;
    line-height: 1.7;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.btn-hero-primary {
    background: #ffffff;
    color: #667eea;
    border: none;
    font-weight: 600;
    padding: 16px 36px;
    border-radius: 12px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.btn-hero-primary:hover {
    background: #f8f9fa;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    color: #764ba2;
}

.btn-hero-secondary {
    background: transparent;
    color: #ffffff;
    border: 2px solid rgba(255,255,255,0.5);
    font-weight: 600;
    padding: 14px 36px;
    border-radius: 12px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-hero-secondary:hover {
    background: rgba(255,255,255,0.15);
    border-color: #ffffff;
    color: #ffffff;
    transform: translateY(-3px);
}

.hero-stats {
    border-top: 1px solid rgba(255,255,255,0.25);
    padding-top: 3rem;
    margin-top: 3rem;
}

.hero-stat-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    color: #ffffff;
    background: rgba(255,255,255,0.1);
    padding: 1.5rem;
    border-radius: 15px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
}

.hero-stat-item i { font-size: 2.5rem; color: #ffffff; opacity: 0.9; }
.stat-content { display: flex; flex-direction: column; }
.stat-content .number { font-size: 1.8rem; font-weight: 700; line-height: 1; color: #ffffff; }
.stat-content .label { font-size: 0.9rem; color: rgba(255,255,255,0.85); margin-top: 0.25rem; }

.section-header { margin-bottom: 4rem; }

.section-badge {
    display: inline-flex;
    align-items: center;
    background: var(--primary-light);
    color: white;
    padding: 8px 20px;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 500;
    margin-bottom: 1.5rem;
}

.section-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 2.8rem;
    color: var(--dark);
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.2rem;
    color: #6b7280;
    line-height: 1.6;
}

.stats-section {
    padding: 100px 0;
    background: #ffffff;
}

.stat-card {
    background: #f8f9fa;
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: all 0.4s ease;
    border: 2px solid #e5e7eb;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stat-card:hover::before { opacity: 1; }
.stat-card:hover { transform: translateY(-10px); box-shadow: 0 20px 60px rgba(0,0,0,0.12); }

.stat-icon-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2rem;
}

.stat-icon {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.stat-icon.blue { background: linear-gradient(135deg, #4361ee, #3a0ca3); color: white; }
.stat-icon.green { background: linear-gradient(135deg, #4cc9f0, #4895ef); color: white; }
.stat-icon.yellow { background: linear-gradient(135deg, #f8961e, #f3722c); color: white; }
.stat-icon.red { background: linear-gradient(135deg, #f72585, #b5179e); color: white; }

.stat-trend {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    background: #10b981;
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.stat-number {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 3rem;
    color: var(--dark);
    margin-bottom: 0.5rem;
    line-height: 1;
}

.stat-label {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 0.5rem;
}

.stat-description {
    font-size: 0.9rem;
    color: #6b7280;
}

.features-section {
    padding: 100px 0;
    background: #f8f9fa;
}

.feature-card {
    background: white;
    border-radius: 24px;
    padding: 3rem 2.5rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: all 0.4s ease;
    border: 2px solid #e5e7eb;
    height: 100%;
    text-align: center;
}

.feature-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
}

.feature-icon-wrapper { margin-bottom: 2rem; }

.feature-icon {
    width: 100px;
    height: 100px;
    border-radius: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    margin: 0 auto;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    transition: all 0.4s ease;
}

.feature-card:hover .feature-icon { transform: scale(1.1) rotate(5deg); }

.feature-icon.blue { background: linear-gradient(135deg, #4361ee, #3a0ca3); color: white; }
.feature-icon.green { background: linear-gradient(135deg, #4cc9f0, #4895ef); color: white; }
.feature-icon.purple { background: linear-gradient(135deg, #7209b7, #560bad); color: white; }

.feature-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 1.5rem;
    color: var(--dark);
    margin-bottom: 1.5rem;
}

.feature-desc {
    font-size: 1rem;
    color: #6b7280;
    line-height: 1.7;
    margin-bottom: 2rem;
}

.feature-list { text-align: left; }

.feature-list-item {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 0.8rem;
    color: #4b5563;
    font-size: 0.95rem;
}

.feature-list-item i { color: #10b981; font-size: 0.8rem; }

.cta-section {
    padding: 80px 0;
    background: #ffffff;
    border-top: 1px solid #e5e7eb;
}

.cta-card {
    background: url('/assets/images/background-baknus2.jpg') center center / cover no-repeat;
    color: white;
    padding: 4rem;
    border-radius: 30px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    position: relative;
    overflow: hidden;
}

.cta-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    z-index: 0;
    border-radius: 30px;
}

.cta-card .row {
    position: relative;
    z-index: 1;
}

.cta-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 2.2rem;
    margin-bottom: 1rem;
}

.cta-description {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
    line-height: 1.6;
}

.btn-cta {
    background: white;
    color: var(--primary);
    border: none;
    font-weight: 700;
    padding: 16px 40px;
    border-radius: 15px;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-cta:hover {
    background: #f8fafc;
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(255,255,255,0.2);
    color: var(--secondary);
}

/* PROFILE SECTION STYLES */
.profile-section {
    padding: 100px 0;
    background: #f8f9fa;
}

.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.15) !important;
}

.icon-box {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.timeline-container {
    position: relative;
    padding-left: 2.5rem;
}

.timeline-container:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    background: linear-gradient(to bottom, #0d6efd, #6c757d);
    border-radius: 10px;
}

.timeline-item {
    position: relative;
    margin-bottom: 3rem;
    padding-left: 2rem;
}

.timeline-item:last-child {
    margin-bottom: 0;
}

.timeline-item:before {
    content: '';
    position: absolute;
    left: -0.6rem;
    top: 10px;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background: #0d6efd;
    border: 4px solid #fff;
    box-shadow: 0 0 0 3px #0d6efd;
    z-index: 1;
}

.timeline-year {
    margin-bottom: 1rem;
    display: inline-block;
}

.timeline-content {
    margin-top: 0.75rem;
}

@media (max-width: 768px) {
    .hero-section { padding: 120px 0 60px; }
    .hero-title { font-size: 2.5rem; }
    .hero-subtitle { font-size: 1.2rem; }
    .section-title { font-size: 2.2rem; }
    .stat-card, .feature-card { padding: 2rem 1.5rem; }
    .cta-card { padding: 3rem 2rem; text-align: center; }
    .timeline-container { padding-left: 1.5rem; }
}

/* SCHEDULE SECTION STYLES */
.schedule-section {
    padding: 80px 0;
    background: #ffffff;
}

.schedule-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    border: 2px solid #f1f5f9;
    transition: all 0.4s ease;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.schedule-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.schedule-card:hover::before {
    opacity: 1;
}

.schedule-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

.schedule-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #f8f9fa;
}

.schedule-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.schedule-icon.blue {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
}

.schedule-icon.green {
    background: linear-gradient(135deg, #4cc9f0, #4895ef);
}

.schedule-header h4 {
    font-weight: 700;
    color: var(--dark);
    margin: 0;
    font-size: 1.4rem;
}

.period-details {
    margin-bottom: 1.5rem;
}

.date-info, .time-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    font-size: 1rem;
    color: #374151;
    font-weight: 500;
}

.date-info i, .time-info i {
    color: #4361ee;
    width: 18px;
    font-size: 16px;
}

.status-indicator {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: #10b981;
    color: white;
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 0.85rem;
    font-weight: 600;
}

.status-indicator i {
    font-size: 8px;
    animation: pulse 2s infinite;
}

.waves-timeline {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.wave-timeline-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.75rem 0;
}

.wave-dot {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4cc9f0, #4895ef);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.wave-info {
    display: flex;
    flex-direction: column;
}

.wave-name {
    font-weight: 600;
    color: var(--dark);
    font-size: 0.95rem;
    margin-bottom: 0.25rem;
}

.wave-date {
    color: #6b7280;
    font-size: 0.85rem;
}

.btn-schedule-info {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.btn-schedule-info:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    color: white;
}

@media (max-width: 576px) {
    .hero-title { font-size: 2rem; }
    .btn-hero-primary, .btn-hero-secondary { width: 100%; justify-content: center; }
    .hero-stat-item { justify-content: center; text-align: center; flex-direction: column; gap: 0.5rem; }
    
    .schedule-card {
        padding: 2rem 1.5rem;
    }
    
    .schedule-header {
        flex-direction: column;
        text-align: center;
        gap: 0.75rem;
    }
    
    .wave-timeline-item {
        padding: 1rem 0;
    }
}

/* SYSTEM FEATURES SECTION STYLES */
.system-features-section {
    padding: 100px 0;
    background: #f8f9fa;
}

.system-feature-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    border: 2px solid #f1f5f9;
    transition: all 0.4s ease;
    height: 100%;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.system-feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.system-feature-card:hover::before {
    opacity: 1;
}

.system-feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
}

.feature-icon-container {
    margin-bottom: 2rem;
}

.system-feature-card .feature-icon {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    margin: 0 auto;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    transition: all 0.4s ease;
    color: white;
}

.system-feature-card:hover .feature-icon {
    transform: scale(1.1) rotate(5deg);
}

.system-feature-card .feature-icon.blue {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
}

.system-feature-card .feature-icon.green {
    background: linear-gradient(135deg, #10b981, #059669);
}

.system-feature-card .feature-icon.orange {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.system-feature-card .feature-icon.purple {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.system-feature-card .feature-icon.teal {
    background: linear-gradient(135deg, #14b8a6, #0d9488);
}

.system-feature-card .feature-icon.red {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}

.system-feature-card .feature-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 1.4rem;
    color: var(--dark);
    margin-bottom: 1.5rem;
}

.system-feature-card .feature-list {
    list-style: none;
    padding: 0;
    margin-bottom: 1.5rem;
    text-align: left;
}

.system-feature-card .feature-list li {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 0.75rem;
    color: #4b5563;
    font-size: 0.95rem;
}

.system-feature-card .feature-list li i {
    color: #10b981;
    font-size: 0.8rem;
    width: 12px;
}

.feature-highlight {
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: #1e40af;
    padding: 1rem;
    border-radius: 12px;
    font-size: 0.9rem;
    font-weight: 500;
    margin: 0;
    border-left: 4px solid #2563eb;
    font-style: italic;
}



.btn-feature-primary {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: white;
    border: none;
    padding: 16px 32px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    font-size: 1.1rem;
}

.btn-feature-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(37, 99, 235, 0.3);
    color: white;
}

.btn-feature-secondary {
    background: transparent;
    color: #2563eb;
    border: 2px solid #2563eb;
    padding: 14px 32px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    font-size: 1.1rem;
}

.btn-feature-secondary:hover {
    background: #2563eb;
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .system-feature-card {
        padding: 2rem 1.5rem;
    }
    

    
    .btn-feature-primary, .btn-feature-secondary {
        width: 100%;
        justify-content: center;
        margin-bottom: 1rem;
    }
}
</style>
@endpush
