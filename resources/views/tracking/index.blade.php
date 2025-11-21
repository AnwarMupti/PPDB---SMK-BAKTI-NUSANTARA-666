@extends('layouts.public')

@section('title', 'Tracking Status')

@push('styles')
<style>
    .tracking-section {
        min-height: 100vh;
        padding: 120px 0 80px;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }
    
    .tracking-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .tracking-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
    }
    
    .tracking-header {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        color: white;
        padding: 2rem;
        text-align: center;
    }
    
    .tracking-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 2rem;
    }
    
    .tracking-body {
        padding: 2.5rem;
    }
    
    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.1);
    }
    
    .input-group-text {
        background: #f1f5f9;
        border: 2px solid #e2e8f0;
        border-right: none;
        border-radius: 12px 0 0 12px;
        color: #64748b;
    }
    
    .btn-search {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        border: none;
        border-radius: 0 12px 12px 0;
        padding: 1rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-search:hover {
        background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
        transform: translateY(-1px);
    }
    
    .tips-card {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border: 1px solid #bae6fd;
        border-radius: 16px;
        padding: 1.5rem;
        margin-top: 1.5rem;
    }
    
    .tips-icon {
        width: 40px;
        height: 40px;
        background: #0ea5e9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-right: 1rem;
    }
    
    .alert-custom {
        border: none;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
    }
    
    .alert-warning-custom {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #92400e;
        border-left: 4px solid #f59e0b;
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .section-subtitle {
        font-size: 1.1rem;
        color: #64748b;
        font-weight: 400;
    }
    
    @media (max-width: 768px) {
        .tracking-section {
            padding: 100px 0 60px;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .tracking-body {
            padding: 2rem 1.5rem;
        }
        
        .tracking-header {
            padding: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<section class="tracking-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center mb-5">
                    <h1 class="section-title">Tracking Status</h1>
                    <p class="section-subtitle">Pantau perkembangan pendaftaran Anda secara real-time</p>
                </div>
                
                <div class="tracking-card">
                    <div class="tracking-header">
                        <div class="tracking-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h3 class="mb-0 fw-bold">Cek Status Pendaftaran</h3>
                        <p class="mb-0 opacity-75">Masukkan nomor pendaftaran untuk melihat status terkini</p>
                    </div>
                    
                    <div class="tracking-body">
                        <form action="{{ route('tracking.check') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label fw-semibold mb-3" style="color: #374151; font-size: 1rem;">
                                    <i class="bi bi-card-text me-2"></i>Nomor Pendaftaran
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-hash"></i>
                                    </span>
                                    <input type="text" name="no_pendaftaran" class="form-control" 
                                           placeholder="Contoh: PPDB2024-0001" required 
                                           style="font-family: 'Courier New', monospace;">
                                    <button class="btn btn-primary btn-search" type="submit">
                                        <i class="bi bi-search me-2"></i>Cek Status
                                    </button>
                                </div>
                            </div>
                        </form>

                        @if(isset($pendaftar) && $pendaftar === null)
                            <div class="alert alert-custom alert-warning-custom">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-exclamation-triangle-fill me-3" style="font-size: 1.25rem;"></i>
                                    <div>
                                        <strong>Nomor tidak ditemukan!</strong><br>
                                        <small>Pastikan nomor pendaftaran yang Anda masukkan benar dan sudah terdaftar.</small>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="tips-card">
                            <div class="d-flex align-items-start">
                                <div class="tips-icon">
                                    <i class="bi bi-lightbulb-fill"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-2" style="color: #0c4a6e;">Tips Pencarian:</h6>
                                    <ul class="mb-0" style="color: #0c4a6e; font-size: 0.9rem;">
                                        <li class="mb-1">📧 Nomor pendaftaran dapat dilihat di email konfirmasi</li>
                                        <li class="mb-1">📝 Format: PPDB2024-XXXX (4 digit angka)</li>
                                        <li class="mb-1">🔓 Tracking dapat diakses tanpa login</li>
                                        <li class="mb-0">⏰ Status diperbarui secara real-time</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                                <i class="bi bi-shield-check me-1"></i>
                                Data Anda aman dan terlindungi
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
