@extends('layouts.public')

@section('title', 'Informasi Jadwal PPDB')

@section('content')
<!-- HERO SECTION -->
<section class="info-hero-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="info-badge">
                    <i class="fas fa-calendar-alt me-2"></i>
                    Informasi Resmi PPDB
                </div>
                <h1 class="info-title">Informasi Jadwal PPDB</h1>
                <p class="info-subtitle">Tahun Ajaran 2024/2025 - SMK Bakti Nusantara 666</p>
            </div>
        </div>
    </div>
</section>

<!-- SCHEDULE INFO SECTION -->
<section class="schedule-info-section">
    <div class="container">
        <div class="row g-4">
            <!-- CARD 1: PERIODE UTAMA -->
            <div class="col-lg-6">
                <div class="info-card main-period">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h4>Periode Pendaftaran</h4>
                    </div>
                    <div class="card-content">
                        <div class="period-info">
                            <div class="date-range">
                                <i class="fas fa-calendar"></i>
                                <span>1 Januari 2024 - 31 Desember 2024</span>
                            </div>
                            <div class="time-info">
                                <i class="fas fa-clock"></i>
                                <span>Buka 24 Jam (Online System)</span>
                            </div>
                        </div>
                        <div class="status-badge active">
                            <i class="fas fa-circle"></i>
                            STATUS: SEDANG BERLANGSUNG
                        </div>
                        <p class="card-description">
                            Selamat datang di Portal Penerimaan Peserta Didik Baru (PPDB) SMK Bakti Nusantara 666. 
                            Pendaftaran dibuka sepanjang tahun dengan sistem online untuk memudahkan calon siswa dan orang tua.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CARD 2: GELOMBANG PENDAFTARAN -->
            <div class="col-lg-6">
                <div class="info-card waves-info">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-water"></i>
                        </div>
                        <h4>Gelombang Pendaftaran</h4>
                    </div>
                    <div class="card-content">
                        <div class="waves-list">
                            @php
                                $gelombang = DB::table('gelombang')->orderBy('tgl_mulai')->get();
                            @endphp
                            @if($gelombang->count() > 0)
                                @foreach($gelombang as $index => $wave)
                                <div class="wave-item">
                                    <div class="wave-number">{{ $index + 1 }}</div>
                                    <div class="wave-details">
                                        <h6>{{ $wave->nama }}</h6>
                                        <span>{{ \Carbon\Carbon::parse($wave->tgl_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($wave->tgl_selesai)->format('d M Y') }}</span>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="wave-item">
                                    <div class="wave-number">1</div>
                                    <div class="wave-details">
                                        <h6>Gelombang 1</h6>
                                        <span>1 Jan - 30 Apr 2024</span>
                                    </div>
                                </div>
                                <div class="wave-item">
                                    <div class="wave-number">2</div>
                                    <div class="wave-details">
                                        <h6>Gelombang 2</h6>
                                        <span>1 Mei - 31 Agu 2024</span>
                                    </div>
                                </div>
                                <div class="wave-item">
                                    <div class="wave-number">3</div>
                                    <div class="wave-details">
                                        <h6>Gelombang 3</h6>
                                        <span>1 Sep - 31 Des 2024</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <p class="card-description">
                            Pendaftaran terbagi dalam beberapa gelombang untuk memberikan kesempatan yang luas. 
                            Setiap gelombang memiliki kuota tertentu dan proses seleksi yang berkesinambungan.
                        </p>
                    </div>
                </div>
            </div>


        </div>

        <!-- CTA BUTTONS -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="cta-buttons">
                    <a href="{{ route('register') }}" class="btn btn-primary-cta">
                        <i class="fas fa-graduation-cap me-2"></i>Daftar Sekarang
                    </a>
                    <a href="{{ route('tracking.index') }}" class="btn btn-secondary-cta">
                        <i class="fas fa-search me-2"></i>Cek Status Pendaftaran
                    </a>
                    <a href="{{ url('/') }}" class="btn btn-outline-cta">
                        <i class="fas fa-home me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.info-hero-section {
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    color: white;
    padding: 150px 0 80px;
    margin-top: 0;
}

.info-badge {
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

.info-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 3rem;
    margin-bottom: 1rem;
}

.info-subtitle {
    font-size: 1.3rem;
    opacity: 0.9;
    margin-bottom: 0;
}

.schedule-info-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.info-card {
    background: white;
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 2px solid #e5e7eb;
    transition: all 0.3s ease;
    height: 100%;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

.card-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #f1f5f9;
}

.card-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
}

.main-period .card-icon {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
}

.waves-info .card-icon {
    background: linear-gradient(135deg, #4cc9f0, #4895ef);
}



.card-header h4 {
    font-weight: 700;
    color: #1e293b;
    margin: 0;
    font-size: 1.5rem;
}

.period-info {
    margin-bottom: 1.5rem;
}

.date-range, .time-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    font-size: 1.1rem;
    color: #374151;
}

.date-range i, .time-info i {
    color: #4361ee;
    width: 20px;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: #10b981;
    color: white;
    padding: 8px 16px;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
}

.status-badge i {
    font-size: 8px;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.waves-list {
    margin-bottom: 1.5rem;
}

.wave-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid #f1f5f9;
}

.wave-item:last-child {
    border-bottom: none;
}

.wave-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4cc9f0, #4895ef);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.1rem;
}

.wave-details h6 {
    margin: 0 0 0.25rem 0;
    font-weight: 600;
    color: #1e293b;
}

.wave-details span {
    color: #6b7280;
    font-size: 0.95rem;
}



.card-description {
    color: #6b7280;
    line-height: 1.6;
    margin: 0;
    font-size: 0.95rem;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-primary-cta {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
    color: white;
    border: none;
    padding: 14px 28px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-primary-cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
    color: white;
}

.btn-secondary-cta {
    background: linear-gradient(135deg, #4cc9f0, #4895ef);
    color: white;
    border: none;
    padding: 14px 28px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-secondary-cta:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(76, 201, 240, 0.3);
    color: white;
}

.btn-outline-cta {
    background: transparent;
    color: #4361ee;
    border: 2px solid #4361ee;
    padding: 12px 28px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-outline-cta:hover {
    background: #4361ee;
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .info-hero-section {
        padding: 120px 0 60px;
    }
    
    .info-title {
        font-size: 2.2rem;
    }
    
    .info-card {
        padding: 2rem 1.5rem;
    }
    

    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-primary-cta, .btn-secondary-cta, .btn-outline-cta {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
}
</style>
@endpush