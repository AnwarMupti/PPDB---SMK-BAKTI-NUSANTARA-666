@extends('layouts.public')

@section('title', 'Status Pendaftaran')

@push('styles')
<style>
    .tracking-detail-section {
        min-height: 100vh;
        padding: 120px 0 80px;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }
    
    .status-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border: none;
        overflow: hidden;
        margin-bottom: 2rem;
    }
    
    .status-header {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        color: white;
        padding: 2rem;
        text-align: center;
    }
    
    .status-badge {
        display: inline-block;
        padding: 1rem 2rem;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }
    
    .info-table {
        background: #f8fafc;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .info-row:last-child {
        border-bottom: none;
    }
    
    .info-label {
        font-weight: 600;
        color: #374151;
        flex: 0 0 40%;
    }
    
    .info-value {
        color: #1f2937;
        flex: 1;
        text-align: right;
    }
    
    .timeline-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }
    
    .timeline {
        position: relative;
        padding-left: 2rem;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, #2563eb, #e2e8f0);
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 2rem;
        background: #f8fafc;
        border-radius: 12px;
        padding: 1.5rem;
        margin-left: 1rem;
    }
    
    .timeline-marker {
        position: absolute;
        left: -2.5rem;
        top: 1.5rem;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }
    
    .document-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
    
    .table th {
        background: #f1f5f9;
        border: none;
        font-weight: 600;
        color: #374151;
        padding: 1rem;
    }
    
    .table td {
        border: none;
        padding: 1rem;
        vertical-align: middle;
    }
    
    .status-pending { background: #fef3c7; color: #92400e; }
    .status-verified { background: #d1fae5; color: #065f46; }
    .status-rejected { background: #fee2e2; color: #991b1b; }
    
    .back-btn {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.75rem 1.5rem;
        color: #64748b;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .back-btn:hover {
        border-color: #2563eb;
        color: #2563eb;
        transform: translateY(-2px);
    }
    
    @media (max-width: 768px) {
        .tracking-detail-section {
            padding: 100px 0 60px;
        }
        
        .status-header {
            padding: 1.5rem 1rem;
        }
        
        .timeline-card {
            padding: 1.5rem;
        }
        
        .info-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .info-value {
            text-align: left;
        }
    }
</style>
@endpush

@section('content')
<section class="tracking-detail-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header -->
                <div class="text-center mb-4">
                    <a href="{{ route('tracking.index') }}" class="back-btn">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Pencarian
                    </a>
                </div>
                
                <!-- Status Card -->
                <div class="status-card">
                    <div class="status-header">
                        <h2 class="mb-3 fw-bold">Status Pendaftaran</h2>
                        <div class="mb-3">
                            @if($pendaftar->status == 'SUBMIT')
                                <span class="status-badge" style="background: #fef3c7; color: #92400e;">
                                    <i class="bi bi-clock-fill me-2"></i>Menunggu Verifikasi
                                </span>
                            @elseif($pendaftar->status == 'ADM_PASS')
                                <span class="status-badge" style="background: #d1fae5; color: #065f46;">
                                    <i class="bi bi-check-circle-fill me-2"></i>Lulus Administrasi
                                </span>
                            @elseif($pendaftar->status == 'ADM_REJECT')
                                <span class="status-badge" style="background: #fee2e2; color: #991b1b;">
                                    <i class="bi bi-x-circle-fill me-2"></i>Ditolak
                                </span>
                            @elseif($pendaftar->status == 'PAID')
                                <span class="status-badge" style="background: #dbeafe; color: #1e40af;">
                                    <i class="bi bi-credit-card-fill me-2"></i>Terbayar
                                </span>
                            @endif
                        </div>
                        <p class="mb-0 opacity-75">{{ $pendaftar->no_pendaftaran }}</p>
                    </div>
                    
                    <div class="p-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="mb-3 fw-bold text-primary">
                                    <i class="bi bi-person-circle me-2"></i>Informasi Pendaftar
                                </h5>
                                <div class="info-table">
                                    <div class="info-row">
                                        <span class="info-label">Nama Lengkap</span>
                                        <span class="info-value fw-semibold">{{ $pendaftar->nama_lengkap }}</span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">No. Pendaftaran</span>
                                        <span class="info-value">
                                            <span class="badge bg-primary">{{ $pendaftar->no_pendaftaran }}</span>
                                        </span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">Jurusan Pilihan</span>
                                        <span class="info-value fw-semibold">{{ $pendaftar->nama_jurusan }}</span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">Tanggal Daftar</span>
                                        <span class="info-value">{{ \Carbon\Carbon::parse($pendaftar->tanggal_daftar)->format('d/m/Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <h5 class="mb-3 fw-bold text-primary">
                                    <i class="bi bi-info-circle me-2"></i>Keterangan Status
                                </h5>
                                <div class="text-center p-4" style="background: #f8fafc; border-radius: 12px;">
                                    @if($pendaftar->status == 'SUBMIT')
                                        <div class="mb-3">
                                            <i class="bi bi-clock" style="font-size: 3rem; color: #f59e0b;"></i>
                                        </div>
                                        <h6 class="fw-bold mb-2">Sedang Diproses</h6>
                                        <p class="text-muted mb-0">Pendaftaran Anda sedang dalam tahap verifikasi oleh tim panitia. Mohon tunggu konfirmasi selanjutnya.</p>
                                    @elseif($pendaftar->status == 'ADM_PASS')
                                        <div class="mb-3">
                                            <i class="bi bi-check-circle" style="font-size: 3rem; color: #10b981;"></i>
                                        </div>
                                        <h6 class="fw-bold mb-2 text-success">Selamat!</h6>
                                        <p class="text-muted mb-0">Anda telah lulus verifikasi administrasi. Silakan lanjutkan ke tahap pembayaran.</p>
                                    @elseif($pendaftar->status == 'ADM_REJECT')
                                        <div class="mb-3">
                                            <i class="bi bi-x-circle" style="font-size: 3rem; color: #ef4444;"></i>
                                        </div>
                                        <h6 class="fw-bold mb-2 text-danger">Mohon Maaf</h6>
                                        <p class="text-muted mb-0">Pendaftaran Anda belum memenuhi persyaratan administrasi yang ditentukan.</p>
                                    @elseif($pendaftar->status == 'PAID')
                                        <div class="mb-3">
                                            <i class="bi bi-credit-card" style="font-size: 3rem; color: #3b82f6;"></i>
                                        </div>
                                        <h6 class="fw-bold mb-2 text-primary">Pembayaran Berhasil</h6>
                                        <p class="text-muted mb-0">Pembayaran Anda telah dikonfirmasi. Proses pendaftaran telah selesai.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Status -->
                <div class="timeline-card">
                    <h5 class="mb-4 fw-bold text-primary">
                        <i class="bi bi-clock-history me-2"></i>Timeline Verifikasi
                    </h5>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div>
                                <h6 class="fw-bold mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Pendaftaran Berhasil Diterima
                                </h6>
                                <p class="text-muted mb-1">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ \Carbon\Carbon::parse($pendaftar->tanggal_daftar)->format('d F Y, H:i') }} WIB
                                </p>
                                <p class="mb-0"><small class="text-success">Data pendaftaran telah tersimpan dalam sistem</small></p>
                            </div>
                        </div>

                        @foreach($verifications as $ver)
                            <div class="timeline-item">
                                <div class="timeline-marker {{ $ver->status == 'diterima' ? 'bg-success' : 'bg-danger' }}"></div>
                                <div>
                                    <h6 class="fw-bold mb-2">
                                        @if($ver->status == 'diterima')
                                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        @else
                                            <i class="bi bi-x-circle-fill text-danger me-2"></i>
                                        @endif
                                        {{ ucfirst($ver->jenis_verifikasi) }} - {{ ucfirst($ver->status) }}
                                    </h6>
                                    <p class="text-muted mb-1">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ \Carbon\Carbon::parse($ver->tanggal_verifikasi)->format('d F Y, H:i') }} WIB
                                    </p>
                                    @if($ver->catatan)
                                        <div class="alert alert-info py-2 px-3 mt-2">
                                            <small><strong>Catatan:</strong> {{ $ver->catatan }}</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Status Dokumen -->
                <div class="timeline-card">
                    <h5 class="mb-4 fw-bold text-primary">
                        <i class="bi bi-folder-check me-2"></i>Status Dokumen
                    </h5>
                    <div class="document-table">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th><i class="bi bi-file-earmark me-2"></i>Jenis Dokumen</th>
                                    <th><i class="bi bi-check-circle me-2"></i>Status</th>
                                    <th><i class="bi bi-chat-text me-2"></i>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($documents as $doc)
                                    <tr>
                                        <td class="fw-semibold">
                                            @if($doc->jenis_dokumen == 'ijazah')
                                                <i class="bi bi-award text-primary me-2"></i>Ijazah / SKL
                                            @elseif($doc->jenis_dokumen == 'foto')
                                                <i class="bi bi-person-square text-info me-2"></i>Pas Foto
                                            @elseif($doc->jenis_dokumen == 'kk')
                                                <i class="bi bi-people text-success me-2"></i>Kartu Keluarga
                                            @elseif($doc->jenis_dokumen == 'akta_kelahiran')
                                                <i class="bi bi-file-text text-warning me-2"></i>Akta Kelahiran
                                            @elseif($doc->jenis_dokumen == 'raport')
                                                <i class="bi bi-journal-text text-secondary me-2"></i>Raport
                                            @endif
                                        </td>
                                        <td>
                                            @if($doc->status == 'pending')
                                                <span class="badge status-pending">
                                                    <i class="bi bi-clock me-1"></i>Menunggu
                                                </span>
                                            @elseif($doc->status == 'verified')
                                                <span class="badge status-verified">
                                                    <i class="bi bi-check-circle me-1"></i>Terverifikasi
                                                </span>
                                            @elseif($doc->status == 'rejected')
                                                <span class="badge status-rejected">
                                                    <i class="bi bi-x-circle me-1"></i>Ditolak
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($doc->catatan)
                                                <small class="text-muted">{{ $doc->catatan }}</small>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="bi bi-inbox display-6 d-block mb-2"></i>
                                                <p class="mb-0">Belum ada dokumen yang diupload</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="text-center">
                    <a href="{{ route('tracking.index') }}" class="btn btn-outline-primary me-3">
                        <i class="bi bi-arrow-left me-2"></i>Cek Nomor Lain
                    </a>
                    <a href="{{ url('/') }}" class="btn btn-primary">
                        <i class="bi bi-house me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
