@extends('layouts.dashboard')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard Siswa</h1>
    <p class="page-subtitle">Pantau perkembangan pendaftaran dan status dokumen Anda</p>
</div>

@if(!$pendaftar)
    <div class="alert alert-info mb-4">
        <h5><i class="bi bi-info-circle me-2"></i>Selamat Datang di PPDB Online</h5>
        <p>Ikuti alur pendaftaran di bawah untuk memulai proses pendaftaran Anda.</p>
    </div>
@endif



@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- PROGRESS TRACKER FOR ALL USERS -->
<div class="progress-tracker-section mb-4">
    <div class="progress-tracker-card">
        <h5 class="tracker-title"><i class="fas fa-route me-2"></i>Alur Pendaftaran PPDB</h5>
        <div class="progress-steps">
            <!-- Step 1: Formulir -->
            <div class="step-item {{ $pendaftar ? 'completed' : 'active' }}">
                <div class="step-circle">
                    @if($pendaftar)
                        <i class="fas fa-check"></i>
                    @else
                        <span>1</span>
                    @endif
                </div>
                <div class="step-content">
                    <h6>Formulir</h6>
                    <span class="step-status">
                        @if($pendaftar)
                            Selesai
                        @else
                            Mulai di sini
                        @endif
                    </span>
                </div>
                <div class="step-line {{ $pendaftar ? 'completed' : '' }}"></div>
            </div>
            
            <!-- Step 2: Berkas -->
            <div class="step-item {{ $pendaftar && $completeness >= 100 ? 'completed' : ($pendaftar ? 'active' : 'locked') }}">
                <div class="step-circle">
                    @if($pendaftar && $completeness >= 100)
                        <i class="fas fa-check"></i>
                    @elseif($pendaftar)
                        <span>2</span>
                    @else
                        <i class="fas fa-lock"></i>
                    @endif
                </div>
                <div class="step-content">
                    <h6>Upload Berkas</h6>
                    <span class="step-status">
                        @if($pendaftar && $completeness >= 100)
                            Lengkap
                        @elseif($pendaftar)
                            {{ number_format($completeness, 0) }}% Selesai
                        @else
                            Tertutup
                        @endif
                    </span>
                </div>
                <div class="step-line {{ $pendaftar && $completeness >= 100 ? 'completed' : '' }}"></div>
            </div>
            
            <!-- Step 3: Verifikasi -->
            <div class="step-item {{ $pendaftar && in_array($pendaftar->status, ['ADM_PASS', 'PAID']) ? 'completed' : ($pendaftar && $pendaftar->status == 'SUBMIT' ? 'active' : 'locked') }}">
                <div class="step-circle">
                    @if($pendaftar && in_array($pendaftar->status, ['ADM_PASS', 'PAID']))
                        <i class="fas fa-check"></i>
                    @elseif($pendaftar && $pendaftar->status == 'SUBMIT')
                        <span>3</span>
                    @else
                        <i class="fas fa-lock"></i>
                    @endif
                </div>
                <div class="step-content">
                    <h6>Verifikasi</h6>
                    <span class="step-status">
                        @if($pendaftar && in_array($pendaftar->status, ['ADM_PASS', 'PAID']))
                            Lulus
                        @elseif($pendaftar && $pendaftar->status == 'SUBMIT')
                            Proses
                        @else
                            Tertutup
                        @endif
                    </span>
                </div>
                <div class="step-line {{ $pendaftar && in_array($pendaftar->status, ['ADM_PASS', 'PAID']) ? 'completed' : '' }}"></div>
            </div>
            
            <!-- Step 4: Pembayaran -->
            <div class="step-item {{ $pendaftar && $pendaftar->status == 'PAID' ? 'completed' : ($pendaftar && $pendaftar->status == 'ADM_PASS' ? 'active' : 'locked') }}">
                <div class="step-circle">
                    @if($pendaftar && $pendaftar->status == 'PAID')
                        <i class="fas fa-check"></i>
                    @elseif($pendaftar && $pendaftar->status == 'ADM_PASS')
                        <span>4</span>
                    @else
                        <i class="fas fa-lock"></i>
                    @endif
                </div>
                <div class="step-content">
                    <h6>Pembayaran</h6>
                    <span class="step-status">
                        @if($pendaftar && $pendaftar->status == 'PAID')
                            Lunas
                        @elseif($pendaftar && $pendaftar->status == 'ADM_PASS')
                            Menunggu
                        @else
                            Tertutup
                        @endif
                    </span>
                </div>
                <div class="step-line {{ $pendaftar && $pendaftar->status == 'PAID' ? 'completed' : '' }}"></div>
            </div>
            
            <!-- Step 5: Selesai -->
            <div class="step-item {{ $pendaftar && $pendaftar->status == 'PAID' ? 'completed' : 'locked' }}">
                <div class="step-circle">
                    @if($pendaftar && $pendaftar->status == 'PAID')
                        <i class="fas fa-graduation-cap"></i>
                    @else
                        <i class="fas fa-lock"></i>
                    @endif
                </div>
                <div class="step-content">
                    <h6>Selesai</h6>
                    <span class="step-status">
                        @if($pendaftar && $pendaftar->status == 'PAID')
                            Terdaftar
                        @else
                            Tertutup
                        @endif
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="quick-actions mt-4">
            <h6 class="actions-title">Langkah Selanjutnya:</h6>
            <div class="action-buttons">
                @if(!$pendaftar)
                    <a href="{{ route('pendaftaran.form') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit me-1"></i>Mulai Pendaftaran
                    </a>
                @elseif($completeness < 100)
                    <a href="{{ route('dokumen.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-upload me-1"></i>Lengkapi Berkas
                    </a>
                @elseif($pendaftar->status == 'ADM_PASS')
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-credit-card me-1"></i>Bayar Sekarang
                    </a>
                @elseif($pendaftar->status == 'PAID')
                    <a href="{{ route('cetak.kartu') }}" class="btn btn-info btn-sm">
                        <i class="fas fa-print me-1"></i>Cetak Kartu
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

@if($pendaftar)
                @if($rejectedDocs > 0)
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>⚠️ Perhatian!</strong> Ada {{ $rejectedDocs }} dokumen yang ditolak. Silakan upload ulang dokumen yang ditolak.
                        <a href="{{ route('dokumen.index') }}" class="alert-link">Upload Sekarang</a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($pendaftar->status == 'SUBMIT')
                    <div class="alert alert-info alert-dismissible fade show">
                        <strong>⏳ Mohon Tunggu</strong> Pendaftaran Anda sedang dalam proses verifikasi administrasi. Menu pembayaran akan tersedia setelah verifikasi selesai.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @elseif($pendaftar->status == 'ADM_PASS')
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong>🎉 Selamat!</strong> Anda telah lulus verifikasi administrasi. Silakan lanjutkan ke tahap pembayaran.
                        <a href="{{ route('pembayaran.index') }}" class="alert-link">Bayar Sekarang</a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @elseif($pendaftar->status == 'ADM_REJECT')
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>❌ Mohon Maaf</strong> Pendaftaran Anda tidak memenuhi syarat administrasi. Silakan hubungi admin untuk informasi lebih lanjut.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @elseif($pendaftar->status == 'PAID')
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong>✅ Pembayaran Berhasil</strong> Selamat! Proses pendaftaran Anda telah selesai.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

    <!-- Statistic Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon stat-primary">
                    <i class="bi bi-file-earmark-check"></i>
                </div>
                <div class="stat-number text-primary">
                    @if($pendaftar->status == 'SUBMIT')
                        Menunggu
                    @elseif($pendaftar->status == 'ADM_PASS')
                        Lulus
                    @elseif($pendaftar->status == 'ADM_REJECT')
                        Ditolak
                    @elseif($pendaftar->status == 'PAID')
                        Terbayar
                    @endif
                </div>
                <div class="stat-label">Status Pendaftaran</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon stat-success">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-number text-success">{{ $verifiedDocs }}/5</div>
                <div class="stat-label">Dokumen Terverifikasi</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon stat-warning">
                    <i class="bi bi-clock"></i>
                </div>
                <div class="stat-number text-warning">{{ $pendingDocs }}</div>
                <div class="stat-label">Menunggu Verifikasi</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon stat-danger">
                    <i class="bi bi-x-circle"></i>
                </div>
                <div class="stat-number text-danger">{{ $rejectedDocs }}</div>
                <div class="stat-label">Dokumen Ditolak</div>
            </div>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="chart-card">
                <h5 class="chart-title"><i class="bi bi-file-earmark-text me-2"></i>Informasi Pendaftaran</h5>
                <table class="table table-borderless">
                    <tr>
                        <td width="40%"><strong>No. Pendaftaran</strong></td>
                        <td>{{ $pendaftar->no_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jurusan Pilihan</strong></td>
                        <td><span class="badge bg-primary">{{ $pendaftar->nama_jurusan }}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Daftar</strong></td>
                        <td>{{ \Carbon\Carbon::parse($pendaftar->tanggal_daftar)->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="chart-card">
                <h5 class="chart-title"><i class="bi bi-folder me-2"></i>Kelengkapan Dokumen</h5>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Progress Upload</span>
                        <span class="fw-bold">{{ number_format($completeness, 0) }}%</span>
                    </div>
                    <div class="progress" style="height: 12px;">
                        <div class="progress-bar bg-success" style="width: {{ $completeness }}%"></div>
                    </div>
                </div>
                <a href="{{ route('dokumen.index') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-upload me-1"></i>Upload Dokumen
                </a>
            </div>
        </div>
    </div>

    <!-- Status Dokumen -->
    <div class="chart-card">
        <h5 class="chart-title"><i class="bi bi-file-earmark-check me-2"></i>Status Dokumen</h5>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Jenis Dokumen</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Tanggal Upload</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documents as $doc)
                        <tr>
                            <td>
                                <i class="bi bi-file-earmark me-2"></i>
                                @if($doc->jenis_dokumen == 'ijazah') Ijazah / SKL
                                @elseif($doc->jenis_dokumen == 'foto') Pas Foto
                                @elseif($doc->jenis_dokumen == 'kk') Kartu Keluarga
                                @elseif($doc->jenis_dokumen == 'akta_kelahiran') Akta Kelahiran
                                @elseif($doc->jenis_dokumen == 'raport') Raport
                                @endif
                            </td>
                            <td>
                                @if($doc->status == 'pending')
                                    <span class="badge bg-warning"><i class="bi bi-clock me-1"></i>Menunggu</span>
                                @elseif($doc->status == 'verified')
                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Terverifikasi</span>
                                @elseif($doc->status == 'rejected')
                                    <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Ditolak</span>
                                @endif
                            </td>
                            <td>{{ $doc->catatan ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($doc->created_at)->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                <i class="bi bi-inbox me-2"></i>Belum ada dokumen yang diupload
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection
