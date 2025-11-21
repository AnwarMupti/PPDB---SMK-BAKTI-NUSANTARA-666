@extends('layouts.public')

@section('title', 'Fitur Sistem PPDB')

@section('content')
<!-- HERO SECTION -->
<section class="fitur-hero-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="fitur-badge">
                    <i class="fas fa-rocket me-2"></i>
                    Fitur Unggulan
                </div>
                <h1 class="fitur-title">Fitur Unggulan Sistem PPDB Online</h1>
                <p class="fitur-subtitle">Platform Digital Modern untuk Kemudahan Pendaftaran</p>
            </div>
        </div>
    </div>
</section>

<!-- DETAILED FEATURES SECTION -->
<section class="detailed-features-section">
    <div class="container">
        <!-- FEATURES GRID -->
        <div class="row g-4">
            <!-- FEATURE 1 -->
            <div class="col-lg-6">
                <div class="detailed-feature-card">
                    <div class="feature-header">
                        <div class="feature-icon blue">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="feature-info">
                            <h4>Pendaftaran Online 24 Jam</h4>
                            <span class="feature-category">Pendaftaran Digital</span>
                        </div>
                    </div>
                    <div class="feature-content">
                        <p class="feature-description">
                            Sistem pendaftaran online yang dapat diakses 24 jam sehari, 7 hari seminggu. 
                            Formulir digital yang lengkap dan mudah digunakan dengan fitur auto-save untuk mencegah kehilangan data.
                        </p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check"></i> Formulir digital lengkap dan terstruktur</li>
                            <li><i class="fas fa-check"></i> Upload berkas dengan drag & drop</li>
                            <li><i class="fas fa-check"></i> Simpan draft sementara otomatis</li>
                            <li><i class="fas fa-check"></i> Edit data kapan saja sebelum submit</li>
                            <li><i class="fas fa-check"></i> Validasi data real-time</li>
                        </ul>
                        <div class="feature-highlight">
                            <i class="fas fa-lightbulb"></i>
                            <span>Daftar kapan saja, di mana saja tanpa batas waktu</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FEATURE 2 -->
            <div class="col-lg-6">
                <div class="detailed-feature-card">
                    <div class="feature-header">
                        <div class="feature-icon green">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="feature-info">
                            <h4>Verifikasi Keamanan</h4>
                            <span class="feature-category">Sistem Keamanan</span>
                        </div>
                    </div>
                    <div class="feature-content">
                        <p class="feature-description">
                            Sistem keamanan berlapis dengan verifikasi OTP melalui email untuk memastikan 
                            keamanan akun dan data pribadi calon siswa.
                        </p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check"></i> OTP via email untuk verifikasi akun</li>
                            <li><i class="fas fa-check"></i> Enkripsi data end-to-end</li>
                            <li><i class="fas fa-check"></i> Verifikasi kepemilikan email</li>
                            <li><i class="fas fa-check"></i> Sistem anti-spam terintegrasi</li>
                            <li><i class="fas fa-check"></i> Session timeout otomatis</li>
                        </ul>
                        <div class="feature-highlight">
                            <i class="fas fa-lightbulb"></i>
                            <span>Keamanan data terjamin dengan verifikasi berlapis</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FEATURE 3 -->
            <div class="col-lg-6">
                <div class="detailed-feature-card">
                    <div class="feature-header">
                        <div class="feature-icon orange">
                            <i class="fas fa-file-upload"></i>
                        </div>
                        <div class="feature-info">
                            <h4>Berkas Digital</h4>
                            <span class="feature-category">Manajemen Dokumen</span>
                        </div>
                    </div>
                    <div class="feature-content">
                        <p class="feature-description">
                            Upload dan kelola berkas pendaftaran secara digital dengan sistem validasi otomatis 
                            dan pratinjau dokumen untuk memastikan kelengkapan.
                        </p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check"></i> Upload multiple file sekaligus</li>
                            <li><i class="fas fa-check"></i> Support format PDF, JPG, PNG</li>
                            <li><i class="fas fa-check"></i> Validasi ukuran dan format otomatis</li>
                            <li><i class="fas fa-check"></i> Pratinjau dokumen sebelum submit</li>
                            <li><i class="fas fa-check"></i> Kompres file otomatis</li>
                        </ul>
                        <div class="feature-highlight">
                            <i class="fas fa-lightbulb"></i>
                            <span>Hindari antrean dengan berkas digital terorganisir</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FEATURE 4 -->
            <div class="col-lg-6">
                <div class="detailed-feature-card">
                    <div class="feature-header">
                        <div class="feature-icon purple">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="feature-info">
                            <h4>Status Real-Time</h4>
                            <span class="feature-category">Monitoring & Tracking</span>
                        </div>
                    </div>
                    <div class="feature-content">
                        <p class="feature-description">
                            Pantau status pendaftaran secara real-time dengan timeline yang jelas dan 
                            notifikasi otomatis untuk setiap perubahan status.
                        </p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check"></i> Timeline progres visual</li>
                            <li><i class="fas fa-check"></i> Notifikasi email otomatis</li>
                            <li><i class="fas fa-check"></i> Histori lengkap aktivitas</li>
                            <li><i class="fas fa-check"></i> Status transparansi penuh</li>
                            <li><i class="fas fa-check"></i> Estimasi waktu proses</li>
                        </ul>
                        <div class="feature-highlight">
                            <i class="fas fa-lightbulb"></i>
                            <span>Pantau perkembangan pendaftaran secara real-time</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FEATURE 5 -->
            <div class="col-lg-6">
                <div class="detailed-feature-card">
                    <div class="feature-header">
                        <div class="feature-icon teal">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="feature-info">
                            <h4>Pembayaran Online</h4>
                            <span class="feature-category">Payment Gateway</span>
                        </div>
                    </div>
                    <div class="feature-content">
                        <p class="feature-description">
                            Sistem pembayaran digital yang mendukung berbagai metode pembayaran dengan 
                            verifikasi otomatis dan e-receipt instan.
                        </p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check"></i> Multiple payment channel</li>
                            <li><i class="fas fa-check"></i> Upload bukti transfer digital</li>
                            <li><i class="fas fa-check"></i> Verifikasi pembayaran cepat</li>
                            <li><i class="fas fa-check"></i> E-receipt otomatis via email</li>
                            <li><i class="fas fa-check"></i> Riwayat pembayaran lengkap</li>
                        </ul>
                        <div class="feature-highlight">
                            <i class="fas fa-lightbulb"></i>
                            <span>Bayar mudah via transfer bank dengan konfirmasi instan</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FEATURE 6 -->
            <div class="col-lg-6">
                <div class="detailed-feature-card">
                    <div class="feature-header">
                        <div class="feature-icon red">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <div class="feature-info">
                            <h4>Dashboard Lengkap</h4>
                            <span class="feature-category">Analytics & Reporting</span>
                        </div>
                    </div>
                    <div class="feature-content">
                        <p class="feature-description">
                            Dashboard komprehensif dengan data terpusat, grafik analitik, dan fitur ekspor 
                            laporan untuk monitoring yang efektif.
                        </p>
                        <ul class="feature-benefits">
                            <li><i class="fas fa-check"></i> Data terpusat dalam satu tempat</li>
                            <li><i class="fas fa-check"></i> Grafik dan chart interaktif</li>
                            <li><i class="fas fa-check"></i> Ekspor laporan PDF/Excel</li>
                            <li><i class="fas fa-check"></i> Monitoring komprehensif</li>
                            <li><i class="fas fa-check"></i> Filter dan pencarian advanced</li>
                        </ul>
                        <div class="feature-highlight">
                            <i class="fas fa-lightbulb"></i>
                            <span>Kelola semua data dalam satu dashboard terintegrasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- CTA SECTION -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="fitur-cta-section">
                    <h3>Siap Merasakan Kemudahan Sistem PPDB?</h3>
                    <p>Mulai pendaftaran sekarang dan rasakan pengalaman digital yang modern dan efisien</p>
                    <div class="cta-buttons">
                        <a href="{{ route('register') }}" class="btn btn-fitur-primary">
                            <i class="fas fa-rocket me-2"></i>Mulai Pendaftaran
                        </a>
                        <a href="{{ url('/') }}" class="btn btn-fitur-outline">
                            <i class="fas fa-home me-2"></i>Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.fitur-hero-section {
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    color: white;
    padding: 150px 0 80px;
    margin-top: 0;
}

.fitur-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    padding: 10px 24px;
    border-radius: 50px;
    font-size: 0.95rem;
    margin-bottom: 2rem;
    border: 1px solid rgba(255,255,255,0.3);
}

.fitur-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 3rem;
    margin-bottom: 1rem;
}

.fitur-subtitle {
    font-size: 1.3rem;
    opacity: 0.9;
    margin-bottom: 0;
}

.detailed-features-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.detailed-feature-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 2px solid #e5e7eb;
    transition: all 0.3s ease;
    height: 100%;
    margin-bottom: 2rem;
}

.detailed-feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

.feature-header {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #f1f5f9;
}

.detailed-feature-card .feature-icon {
    width: 70px;
    height: 70px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: white;
    flex-shrink: 0;
}

.detailed-feature-card .feature-icon.blue {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
}

.detailed-feature-card .feature-icon.green {
    background: linear-gradient(135deg, #10b981, #059669);
}

.detailed-feature-card .feature-icon.orange {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.detailed-feature-card .feature-icon.purple {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.detailed-feature-card .feature-icon.teal {
    background: linear-gradient(135deg, #14b8a6, #0d9488);
}

.detailed-feature-card .feature-icon.red {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}

.feature-info h4 {
    font-weight: 700;
    color: #1e293b;
    margin: 0 0 0.5rem 0;
    font-size: 1.4rem;
}

.feature-category {
    color: #6b7280;
    font-size: 0.9rem;
    font-weight: 500;
}

.feature-description {
    color: #4b5563;
    line-height: 1.7;
    margin-bottom: 1.5rem;
    font-size: 1rem;
}

.feature-benefits {
    list-style: none;
    padding: 0;
    margin-bottom: 1.5rem;
}

.feature-benefits li {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 0.75rem;
    color: #374151;
    font-size: 0.95rem;
}

.feature-benefits li i {
    color: #10b981;
    font-size: 0.8rem;
    width: 12px;
}

.feature-highlight {
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: #1e40af;
    padding: 1rem 1.25rem;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.9rem;
    font-weight: 500;
    border-left: 4px solid #2563eb;
}

.feature-highlight i {
    color: #f59e0b;
    font-size: 1rem;
}



.fitur-cta-section {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 3rem;
    border-radius: 20px;
    text-align: center;
}

.fitur-cta-section h3 {
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 1rem;
}

.fitur-cta-section p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-fitur-primary {
    background: white;
    color: #667eea;
    border: none;
    padding: 14px 28px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-fitur-primary:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
    color: #764ba2;
}

.btn-fitur-secondary {
    background: rgba(255,255,255,0.2);
    color: white;
    border: 2px solid rgba(255,255,255,0.5);
    padding: 12px 28px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-fitur-secondary:hover {
    background: rgba(255,255,255,0.3);
    border-color: white;
    color: white;
    transform: translateY(-2px);
}

.btn-fitur-outline {
    background: transparent;
    color: white;
    border: 2px solid rgba(255,255,255,0.5);
    padding: 12px 28px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-fitur-outline:hover {
    background: white;
    color: #667eea;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .fitur-hero-section {
        padding: 120px 0 60px;
    }
    
    .fitur-title {
        font-size: 2.2rem;
    }
    
    .detailed-feature-card {
        padding: 2rem 1.5rem;
    }
    
    .feature-header {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    

    
    .fitur-cta-section {
        padding: 2rem 1.5rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-fitur-primary, .btn-fitur-secondary, .btn-fitur-outline {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
}
</style>
@endpush