@extends('layouts.public')

@section('title', 'Profil Sekolah')

@section('content')
<!-- HERO SECTION -->
<section class="profil-hero-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="profil-badge">
                    <i class="fas fa-school me-2"></i>
                    Profil Sekolah
                </div>
                <h1 class="profil-title">SMK Bakti Nusantara 666</h1>
                <p class="profil-subtitle">Menciptakan Generasi Unggul Berkarakter dan Berkompeten</p>
            </div>
        </div>
    </div>
</section>

<!-- IDENTITAS SECTION -->
<section class="identitas-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="identitas-card">
                    <div class="identitas-header">
                        <div class="identitas-icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <h3>Identitas Sekolah</h3>
                    </div>
                    <div class="identitas-content">
                        <div class="identitas-item">
                            <i class="fas fa-graduation-cap"></i>
                            <div>
                                <span class="label">Nama Sekolah</span>
                                <span class="value">SMK Bakti Nusantara 666</span>
                            </div>
                        </div>
                        <div class="identitas-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <span class="label">Alamat</span>
                                <span class="value">Jl. Raya Percobaan No.65, Cileunyi Kulon, Kec. Cileunyi, Kabupaten Bandung, Jawa Barat 40622</span>
                            </div>
                        </div>
                        <div class="identitas-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <span class="label">Telepon</span>
                                <span class="value">+62 21 1234 5678</span>
                            </div>
                        </div>
                        <div class="identitas-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <span class="label">Email</span>
                                <span class="value">ppdb@smkbaktinusantara.sch.id</span>
                            </div>
                        </div>
                        <div class="identitas-item">
                            <i class="fas fa-globe"></i>
                            <div>
                                <span class="label">Website</span>
                                <span class="value">smkbn666.sch.id</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="identitas-card">
                    <div class="identitas-header">
                        <div class="identitas-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Statistik Sekolah</h3>
                    </div>
                    <div class="identitas-content">
                        <div class="stat-grid">
                            <div class="stat-item">
                                <i class="fas fa-users"></i>
                                <span class="stat-number">500+</span>
                                <span class="stat-label">Siswa Aktif</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span class="stat-number">45+</span>
                                <span class="stat-label">Pengajar</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-trophy"></i>
                                <span class="stat-number">150+</span>
                                <span class="stat-label">Prestasi</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-handshake"></i>
                                <span class="stat-number">50+</span>
                                <span class="stat-label">Partner</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-briefcase"></i>
                                <span class="stat-number">95%</span>
                                <span class="stat-label">Penyerapan Kerja</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-book"></i>
                                <span class="stat-number">5</span>
                                <span class="stat-label">Jurusan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VISI MISI SECTION -->
<section class="visi-misi-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="visi-card">
                    <div class="visi-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Visi</h3>
                    <p>Menjadi SMK Unggulan yang Mencetak Lulusan Berkompetensi Global, Berkarakter Strong, dan Berjiwa Entrepreneur</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="misi-card">
                    <div class="misi-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3>Misi - 5 Pilar SMK Bakti Nusantara 666</h3>
                    <ul class="misi-list">
                        <li><i class="fas fa-check"></i> <strong>Kompetensi Teknis</strong> - Penguasaan skill industri terkini</li>
                        <li><i class="fas fa-check"></i> <strong>Karakter Strong</strong> - Integritas, disiplin, tanggung jawab</li>
                        <li><i class="fas fa-check"></i> <strong>Global Mindset</strong> - Berwawasan internasional</li>
                        <li><i class="fas fa-check"></i> <strong>Entrepreneurship</strong> - Jiwa wirausaha yang kreatif</li>
                        <li><i class="fas fa-check"></i> <strong>Social Responsibility</strong> - Peduli lingkungan sosial</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JURUSAN SECTION -->
<section class="jurusan-section">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Program Keahlian</h2>
            <p class="section-subtitle">Pilihan jurusan unggulan dengan kurikulum berbasis industri</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="jurusan-card">
                    <div class="jurusan-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4>Rekayasa Perangkat Lunak</h4>
                    <p>Mencetak programmer dan developer handal</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="jurusan-card">
                    <div class="jurusan-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h4>Desain Komunikasi Visual</h4>
                    <p>Menghasilkan desainer kreatif profesional</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="jurusan-card">
                    <div class="jurusan-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h4>Akuntansi</h4>
                    <p>Membentuk akuntan kompeten dan teliti</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="jurusan-card">
                    <div class="jurusan-icon">
                        <i class="fas fa-film"></i>
                    </div>
                    <h4>Animasi</h4>
                    <p>Menciptakan animator berbakat dan inovatif</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="jurusan-card">
                    <div class="jurusan-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Pemasaran</h4>
                    <p>Melatih marketer handal dan strategis</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- KEUNGGULAN SECTION -->
<section class="keunggulan-section">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Keunggulan Sekolah</h2>
            <p class="section-subtitle">Fasilitas dan program unggulan untuk mendukung pembelajaran</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="keunggulan-card">
                    <i class="fas fa-industry"></i>
                    <h5>Teaching Factory</h5>
                    <p>Belajar langsung dengan sistem industri nyata</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="keunggulan-card">
                    <i class="fas fa-handshake"></i>
                    <h5>Industry Partnership</h5>
                    <p>Kerjasama dengan perusahaan ternama</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="keunggulan-card">
                    <i class="fas fa-globe"></i>
                    <h5>International Program</h5>
                    <p>Kesempatan magang dan pertukaran pelajar</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="keunggulan-card">
                    <i class="fas fa-laptop"></i>
                    <h5>Technology Driven</h5>
                    <p>Fasilitas lengkap berbasis teknologi terkini</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="profil-cta-section">
    <div class="container">
        <div class="profil-cta-card">
            <h3>Bergabunglah Dengan Kami</h3>
            <p>Wujudkan impian karir gemilang bersama SMK Bakti Nusantara 666</p>
            <div class="cta-buttons">
                <a href="{{ route('register') }}" class="btn btn-profil-primary">
                    <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                </a>
                <a href="{{ url('/') }}" class="btn btn-profil-outline">
                    <i class="fas fa-home me-2"></i>Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.profil-hero-section {
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    color: white;
    padding: 150px 0 80px;
    margin-top: 0;
}

.profil-badge {
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

.profil-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 3rem;
    margin-bottom: 1rem;
}

.profil-subtitle {
    font-size: 1.3rem;
    opacity: 0.9;
}

.identitas-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.identitas-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 2px solid #e5e7eb;
    height: 100%;
}

.identitas-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #f1f5f9;
}

.identitas-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
}

.identitas-header h3 {
    font-weight: 700;
    color: #1e293b;
    margin: 0;
}

.identitas-item {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.identitas-item i {
    color: #667eea;
    font-size: 20px;
    width: 24px;
    margin-top: 2px;
}

.identitas-item div {
    display: flex;
    flex-direction: column;
}

.identitas-item .label {
    font-size: 0.85rem;
    color: #6b7280;
    font-weight: 500;
    margin-bottom: 0.25rem;
}

.identitas-item .value {
    font-size: 1rem;
    color: #1e293b;
    font-weight: 600;
}

.stat-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}

.stat-item {
    text-align: center;
    padding: 1.5rem;
    background: #f8f9fa;
    border-radius: 15px;
}

.stat-item i {
    font-size: 32px;
    color: #667eea;
    margin-bottom: 0.75rem;
}

.stat-number {
    display: block;
    font-size: 2rem;
    font-weight: 800;
    color: #1e293b;
    margin-bottom: 0.25rem;
}

.stat-label {
    display: block;
    font-size: 0.9rem;
    color: #6b7280;
}

.visi-misi-section {
    padding: 80px 0;
    background: white;
}

.visi-card, .misi-card {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-radius: 20px;
    padding: 3rem;
    height: 100%;
}

.visi-icon, .misi-icon {
    width: 70px;
    height: 70px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    margin-bottom: 1.5rem;
}

.visi-card h3, .misi-card h3 {
    font-weight: 700;
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
}

.visi-card p {
    font-size: 1.1rem;
    line-height: 1.7;
    margin: 0;
}

.misi-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.misi-list li {
    display: flex;
    align-items: start;
    gap: 10px;
    margin-bottom: 1rem;
    font-size: 1rem;
}

.misi-list li i {
    color: #10b981;
    margin-top: 3px;
}

.jurusan-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.section-header {
    margin-bottom: 3rem;
}

.section-title {
    font-weight: 700;
    font-size: 2.5rem;
    color: #1e293b;
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #6b7280;
}

.jurusan-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 2px solid #e5e7eb;
    transition: all 0.3s ease;
    height: 100%;
}

.jurusan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

.jurusan-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    color: white;
    margin: 0 auto 1.5rem;
}

.jurusan-card h4 {
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 1rem;
}

.jurusan-card p {
    color: #6b7280;
    margin: 0;
}

.keunggulan-section {
    padding: 80px 0;
    background: white;
}

.keunggulan-card {
    background: #f8f9fa;
    border-radius: 20px;
    padding: 2.5rem;
    text-align: center;
    border: 2px solid #e5e7eb;
    transition: all 0.3s ease;
    height: 100%;
}

.keunggulan-card:hover {
    background: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.keunggulan-card i {
    font-size: 48px;
    color: #667eea;
    margin-bottom: 1rem;
}

.keunggulan-card h5 {
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 1rem;
}

.keunggulan-card p {
    color: #6b7280;
    margin: 0;
    font-size: 0.95rem;
}

.profil-cta-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.profil-cta-card {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 3rem;
    border-radius: 20px;
    text-align: center;
}

.profil-cta-card h3 {
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 1rem;
}

.profil-cta-card p {
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

.btn-profil-primary {
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

.btn-profil-primary:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
    color: #764ba2;
}

.btn-profil-outline {
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

.btn-profil-outline:hover {
    background: white;
    color: #667eea;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .profil-hero-section {
        padding: 120px 0 60px;
    }
    
    .profil-title {
        font-size: 2.2rem;
    }
    
    .identitas-card {
        padding: 2rem 1.5rem;
    }
    
    .stat-grid {
        grid-template-columns: 1fr;
    }
    
    .visi-card, .misi-card {
        padding: 2rem 1.5rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-profil-primary, .btn-profil-outline {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
}
</style>
@endpush
