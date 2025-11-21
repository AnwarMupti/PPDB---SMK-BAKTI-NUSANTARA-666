@extends('layouts.dashboard')

@section('content')
<style>
    .page-title { font-family: 'Poppins', sans-serif; font-weight: 700; }
    .page-subtitle { font-family: 'Inter', sans-serif; }
    .table { font-family: 'Inter', sans-serif; font-size: 13px; }
    .card { border-radius: 12px; border: 1px solid #e2e8f0; }
    h2, h5 { font-family: 'Poppins', sans-serif; }
</style>
<div class="container-fluid py-4">
    <div class="page-header mb-4">
        <h4 class="page-title"><i class="bi bi-file-earmark-text me-2"></i>Rekap Keuangan</h4>
        <p class="page-subtitle">Laporan pembayaran yang sudah terverifikasi</p>
    </div>

    <!-- Summary Card -->
    <div class="card shadow-sm mb-4" style="border-left: 4px solid #10b981;">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="mb-2">Total Pembayaran Terkonfirmasi</h5>
                    <h2 class="text-success mb-0">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</h2>
                    <small class="text-muted">Dari {{ $rekap->count() }} transaksi</small>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-success" onclick="window.print()">
                        <i class="bi bi-printer me-2"></i>Cetak Laporan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Rekap -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>No. Pendaftaran</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Jumlah</th>
                            <th>Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekap as $index => $r)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><small>{{ \Carbon\Carbon::parse($r->tanggal_verifikasi)->format('d/m/Y H:i') }}</small></td>
                            <td><span class="badge bg-secondary">{{ $r->no_pendaftaran }}</span></td>
                            <td><strong>{{ $r->nama_lengkap }}</strong></td>
                            <td>{{ $r->nama_jurusan }}</td>
                            <td><strong class="text-success">Rp {{ number_format($r->jumlah, 0, ',', '.') }}</strong></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ asset($r->bukti_bayar) }}" target="_blank" class="btn btn-sm btn-outline-primary" title="Lihat">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ asset($r->bukti_bayar) }}" download="bukti_bayar_{{ $r->no_pendaftaran }}.{{ pathinfo($r->bukti_bayar, PATHINFO_EXTENSION) }}" class="btn btn-sm btn-success" title="Download">
                                        <i class="bi bi-download"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="bi bi-inbox" style="font-size: 48px; color: #cbd5e1;"></i>
                                <p class="text-muted mt-2 mb-0">Belum ada pembayaran terkonfirmasi</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
