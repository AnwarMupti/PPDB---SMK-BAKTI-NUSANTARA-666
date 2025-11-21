@extends('layouts.dashboard')

@section('content')
<style>
    .page-title { font-family: 'Poppins', sans-serif; font-weight: 700; }
    .page-subtitle { font-family: 'Inter', sans-serif; }
    .stat-card { font-family: 'Inter', sans-serif; }
    .chart-card { font-family: 'Inter', sans-serif; }
    .chart-title { font-family: 'Poppins', sans-serif; }
</style>
<div class="container-fluid py-4">
    <div class="page-header mb-4">
        <h4 class="page-title"><i class="bi bi-cash-stack me-2"></i>Dashboard Keuangan</h4>
        <p class="page-subtitle">Monitoring pembayaran dan verifikasi keuangan PPDB</p>
    </div>

    <!-- Statistik Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-icon stat-success">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <div class="stat-number text-success">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</div>
                <div class="stat-label">Total Pembayaran</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-icon stat-warning">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div class="stat-number text-warning">{{ $menungguVerifikasi }}</div>
                <div class="stat-label">Menunggu Verifikasi</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-icon stat-primary">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-number text-primary">{{ $terverifikasiHariIni }}</div>
                <div class="stat-label">Terverifikasi Hari Ini</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-icon stat-danger">
                    <i class="bi bi-x-circle"></i>
                </div>
                <div class="stat-number text-danger">{{ $ditolak }}</div>
                <div class="stat-label">Pembayaran Ditolak</div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <!-- Grafik Status Pembayaran -->
        <div class="col-xl-4 col-lg-5">
            <div class="chart-card">
                <h5 class="chart-title"><i class="bi bi-pie-chart-fill me-2"></i>Status Pembayaran</h5>
                <div style="padding: 20px 0;">
                    @php
                        $statusColors = [
                            'BELUM_BAYAR' => ['color' => '#94a3b8', 'label' => 'Belum Bayar', 'icon' => 'circle'],
                            'MENUNGGU_VERIFIKASI' => ['color' => '#f59e0b', 'label' => 'Menunggu', 'icon' => 'clock'],
                            'TERBAYAR' => ['color' => '#10b981', 'label' => 'Terbayar', 'icon' => 'check-circle'],
                            'DITOLAK' => ['color' => '#ef4444', 'label' => 'Ditolak', 'icon' => 'x-circle'],
                        ];
                        $totalStatus = $statusPembayaran->sum('total');
                    @endphp
                    @foreach($statusPembayaran as $status)
                    @php
                        $statusInfo = $statusColors[$status->status] ?? ['color' => '#64748b', 'label' => $status->status, 'icon' => 'circle'];
                        $percentage = $totalStatus > 0 ? ($status->total / $totalStatus * 100) : 0;
                    @endphp
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-{{ $statusInfo['icon'] }}" style="color: {{ $statusInfo['color'] }}; font-size: 18px;"></i>
                                <span style="font-weight: 600; font-size: 14px; color: #1e293b;">{{ $statusInfo['label'] }}</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span style="font-weight: 700; font-size: 16px; color: {{ $statusInfo['color'] }};">{{ $status->total }}</span>
                                <span style="font-size: 12px; color: #94a3b8;">({{ number_format($percentage, 1) }}%)</span>
                            </div>
                        </div>
                        <div class="progress" style="height: 12px; border-radius: 10px; background: #f1f5f9;">
                            <div class="progress-bar" 
                                 style="width: {{ $percentage }}%; 
                                        background: linear-gradient(90deg, {{ $statusInfo['color'] }}, {{ $statusInfo['color'] }}dd);
                                        border-radius: 10px;">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Grafik Pembayaran per Hari -->
        <div class="col-xl-8 col-lg-7">
            <div class="chart-card">
                <h5 class="chart-title"><i class="bi bi-bar-chart-fill me-2"></i>Pembayaran 7 Hari Terakhir</h5>
                <div style="height: 320px; padding: 20px 0;">
                    @php
                        $maxTotal = $pembayaranPerHari->max('total') ?: 1;
                    @endphp
                    <div class="d-flex align-items-end justify-content-around h-100" style="gap: 15px;">
                        @foreach($pembayaranPerHari as $hari)
                        <div class="text-center" style="flex: 1; display: flex; flex-direction: column; justify-content: flex-end; height: 100%;">
                            <div class="position-relative" style="height: 100%; display: flex; flex-direction: column; justify-content: flex-end;">
                                <div class="fw-bold mb-2" style="font-size: 18px; color: #10b981;">{{ $hari->total }}</div>
                                <div class="rounded-3 shadow-sm" 
                                     style="height: {{ ($hari->total / $maxTotal * 100) }}%; 
                                            background: linear-gradient(180deg, #10b981, #10b981dd);
                                            min-height: 30px;">
                                </div>
                            </div>
                            <div class="mt-3" style="font-size: 11px; font-weight: 600; color: #64748b;">{{ \Carbon\Carbon::parse($hari->tanggal)->format('d/m') }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Access -->
    <div class="card shadow-sm border-0" style="background: white;">
        <div class="card-body text-center py-5">
            <h4 class="mb-2" style="font-family: 'Poppins', sans-serif; font-weight: 700; letter-spacing: 1px; color: #1e293b;">QUICK ACCESS</h4>
            <p class="text-muted mb-4" style="font-family: 'Inter', sans-serif; font-size: 14px;">Akses cepat ke fitur utama keuangan</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('keuangan.verifikasi') }}" class="btn btn-lg shadow-lg" style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 15px; padding: 14px 32px; border-radius: 12px; min-width: 240px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.2)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'">
                    <i class="bi bi-check-circle-fill me-2" style="font-size: 18px;"></i>Verifikasi Pembayaran
                </a>
                <a href="{{ route('keuangan.rekap') }}" class="btn btn-lg shadow-lg" style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 15px; padding: 14px 32px; border-radius: 12px; min-width: 240px; background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white; border: none; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.2)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'">
                    <i class="bi bi-file-earmark-bar-graph-fill me-2" style="font-size: 18px;"></i>Lihat Rekap Keuangan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
