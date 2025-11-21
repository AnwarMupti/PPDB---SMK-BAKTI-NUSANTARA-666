@extends('layouts.dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="page-header mb-4">
        <h4 class="page-title"><i class="bi bi-credit-card me-2"></i>Pembayaran Pendaftaran</h4>
        <p class="page-subtitle">Informasi biaya dan upload bukti pembayaran</p>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row g-4">
        <!-- Panel 1: Informasi Biaya -->
        <div class="col-lg-6">
            <div class="card shadow-sm h-100" style="border-left: 4px solid #3b82f6;">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2" style="color: #3b82f6;"></i>Informasi Biaya Pendaftaran</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td width="40%" class="text-muted">Jurusan yang Dipilih</td>
                            <td class="fw-bold">{{ $pendaftar->nama_jurusan }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Gelombang</td>
                            <td class="fw-bold">{{ $pendaftar->nama_gelombang }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">No. Pendaftaran</td>
                            <td><span class="badge bg-secondary">{{ $pendaftar->no_pendaftaran }}</span></td>
                        </tr>
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                        <tr>
                            <td class="text-muted fs-5">Total Biaya Pendaftaran</td>
                            <td class="fw-bold text-primary fs-4">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Panel 2: Instruksi Pembayaran -->
        <div class="col-lg-6">
            <div class="card shadow-sm h-100" style="border-left: 4px solid #10b981;">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-bank me-2" style="color: #10b981;"></i>Instruksi Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-3">
                        <strong><i class="bi bi-star-fill me-1"></i>Metode Transfer Bank (Recommended)</strong>
                    </div>
                    <p class="mb-2"><strong>Silakan transfer ke rekening berikut:</strong></p>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td width="35%">Bank</td>
                            <td><strong>BCA</strong></td>
                        </tr>
                        <tr>
                            <td>No. Rekening</td>
                            <td><strong>123-456-7890</strong></td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td><strong>Panitia PPDB SMK</strong></td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td><strong>Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</strong></td>
                        </tr>
                        <tr>
                            <td>Kode Unik</td>
                            <td><strong class="text-danger">{{ substr($pendaftar->no_pendaftaran, -3) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2"><hr></td>
                        </tr>
                        <tr>
                            <td class="text-primary fs-5">Total Transfer</td>
                            <td class="text-primary fs-5"><strong>Rp {{ number_format($pembayaran->jumlah + (int)substr($pendaftar->no_pendaftaran, -3), 0, ',', '.') }}</strong></td>
                        </tr>
                    </table>
                    <div class="alert alert-warning mt-3 mb-0">
                        <small><i class="bi bi-exclamation-triangle me-1"></i>Pastikan transfer sesuai dengan total + kode unik untuk mempercepat verifikasi</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel 3: Upload Bukti Bayar -->
        <div class="col-12">
            <div class="card shadow-sm" style="border-left: 4px solid #f59e0b;">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-upload me-2" style="color: #f59e0b;"></i>Upload Bukti Pembayaran</h6>
                </div>
                <div class="card-body">
                    @if($pembayaran->status == 'BELUM_BAYAR')
                    <div class="alert alert-warning">
                        <strong><i class="bi bi-exclamation-circle me-2"></i>Status Pembayaran: BELUM BAYAR</strong>
                    </div>
                    <form action="{{ route('pembayaran.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pilih File Bukti Transfer</label>
                            <input type="file" name="bukti_bayar" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                            <small class="text-muted">Format: JPG, PNG, PDF (Maks. 2MB)</small>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-upload me-2"></i>UPLOAD BUKTI BAYAR
                        </button>
                    </form>

                    @elseif($pembayaran->status == 'MENUNGGU_VERIFIKASI')
                    <div class="alert alert-info">
                        <strong><i class="bi bi-clock me-2"></i>Status Pembayaran: MENUNGGU VERIFIKASI</strong>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <p class="mb-2"><strong>Bukti bayar telah diupload pada:</strong> {{ \Carbon\Carbon::parse($pembayaran->tanggal_upload)->format('d/m/Y H:i') }}</p>
                            <p class="mb-2"><strong>File:</strong> {{ basename($pembayaran->bukti_bayar) }}</p>
                            <a href="{{ asset($pembayaran->bukti_bayar) }}" target="_blank" class="btn btn-sm btn-info me-2">
                                <i class="bi bi-eye me-1"></i>Lihat Bukti
                            </a>
                            <form action="{{ route('pembayaran.hapus') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus dan upload ulang?')">
                                    <i class="bi bi-trash me-1"></i>Hapus & Upload Ulang
                                </button>
                            </form>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="alert alert-warning mb-0">
                                <small><i class="bi bi-info-circle me-1"></i>Tim keuangan akan memverifikasi dalam 1x24 jam</small>
                            </div>
                        </div>
                    </div>

                    @elseif($pembayaran->status == 'TERBAYAR')
                    <div class="alert alert-success">
                        <strong><i class="bi bi-check-circle me-2"></i>Status Pembayaran: TERBAYAR / LUNAS</strong>
                    </div>
                    <p class="mb-2"><strong>Diverifikasi pada:</strong> {{ \Carbon\Carbon::parse($pembayaran->tanggal_verifikasi)->format('d/m/Y H:i') }}</p>
                    <p class="mb-2"><strong>Bukti bayar:</strong> <a href="{{ asset($pembayaran->bukti_bayar) }}" target="_blank">Lihat File</a></p>
                    <div class="alert alert-info mt-3">
                        <i class="bi bi-info-circle me-2"></i>Pembayaran Anda telah dikonfirmasi. Silakan lanjutkan ke tahap berikutnya.
                    </div>

                    @elseif($pembayaran->status == 'DITOLAK')
                    <div class="alert alert-danger">
                        <strong><i class="bi bi-x-circle me-2"></i>Status Pembayaran: DITOLAK</strong>
                    </div>
                    <div class="alert alert-warning">
                        <strong>Alasan Penolakan:</strong><br>
                        {{ $pembayaran->catatan ?? 'Tidak ada catatan' }}
                    </div>
                    <p class="mb-3">Silakan upload ulang bukti pembayaran yang sesuai:</p>
                    <form action="{{ route('pembayaran.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pilih File Bukti Transfer</label>
                            <input type="file" name="bukti_bayar" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                            <small class="text-muted">Format: JPG, PNG, PDF (Maks. 2MB)</small>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-upload me-2"></i>UPLOAD ULANG BUKTI BAYAR
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
