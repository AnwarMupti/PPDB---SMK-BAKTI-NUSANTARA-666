<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pendaftaran - {{ $pendaftar->no_pendaftaran }}</title>
    <style>
        @media print { @page { margin: 1cm; size: A4; } }
        body { font-family: Arial, sans-serif; margin: 0; padding: 15px; }
        .header { text-align: center; border-bottom: 3px solid #000; padding-bottom: 8px; margin-bottom: 12px; }
        .header h2 { margin: 3px 0; font-size: 18px; font-weight: bold; }
        .header p { margin: 2px 0; font-size: 11px; }
        .title { text-align: center; font-size: 15px; font-weight: bold; margin-bottom: 12px; text-decoration: underline; }
        .info-table { width: 100%; margin-bottom: 12px; }
        .info-table td { padding: 4px 0; font-size: 11px; }
        .info-table .label { width: 200px; font-weight: bold; }
        .status-box { border: 2px solid #10b981; background: #f0fdf4; padding: 10px; border-radius: 8px; margin: 10px 0; text-align: center; }
        .status-box h3 { margin: 0 0 2px 0; color: #10b981; font-size: 13px; }
        .status-box p { margin: 0; font-size: 10px; color: #166534; }
        .footer { margin-top: 15px; text-align: right; }
        .footer p { margin: 3px 0; font-size: 12px; }
        .signature { margin-top: 25px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>SMK BAKTI NUSANTARA 666</h2>
        <p>Jl. Raya Cileunyi No. 666, Bandung, Jawa Barat 40393</p>
        <p>Telp: (022) 7654321 | Email: info@smkbaknus666.sch.id</p>
    </div>

    <div class="title">BUKTI PENDAFTARAN PPDB</div>

    <table class="info-table">
        <tr>
            <td class="label">No. Pendaftaran</td>
            <td>: {{ $pendaftar->no_pendaftaran }}</td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>: {{ $user->name }}</td>
        </tr>
        <tr>
            <td class="label">Email</td>
            <td>: {{ $user->email }}</td>
        </tr>
        <tr>
            <td class="label">Jurusan Pilihan</td>
            <td>: {{ $pendaftar->jurusan }}</td>
        </tr>
        <tr>
            <td class="label">Gelombang</td>
            <td>: {{ $pendaftar->gelombang }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Pendaftaran</td>
            <td>: {{ date('d F Y', strtotime($pendaftar->tanggal_daftar)) }}</td>
        </tr>
        <tr>
            <td class="label">Status Pendaftaran</td>
            <td>: {{ $pendaftar->status == 'SUBMIT' ? 'Dikirim' : ($pendaftar->status == 'ADM_PASS' ? 'Lulus Administrasi' : ($pendaftar->status == 'ADM_REJECT' ? 'Tolak Administrasi' : ($pendaftar->status == 'PAID' ? 'Terbayar' : $pendaftar->status))) }}</td>
        </tr>
        @if(isset($pendaftar->status_bayar))
        <tr>
            <td class="label">Status Pembayaran</td>
            <td>: {{ $pendaftar->status_bayar == 'TERBAYAR' ? 'Lunas' : ($pendaftar->status_bayar == 'MENUNGGU_VERIFIKASI' ? 'Menunggu Verifikasi' : 'Belum Bayar') }}</td>
        </tr>
        @endif
    </table>

    @if($pendaftar->status == 'ADM_PASS' || $pendaftar->status == 'PAID')
    <div class="status-box">
        <h3>✓ SELAMAT!</h3>
        <p>Anda telah lulus verifikasi administrasi. Silakan lanjutkan proses pembayaran.</p>
    </div>
    @endif

    <div style="border-top: 1px dashed #ccc; padding-top: 8px; margin-top: 10px;">
        <p style="font-size: 9px; color: #666; margin: 0; line-height: 1.3;">
            <strong>Catatan:</strong> Simpan bukti ini dengan baik. Pantau status pendaftaran melalui dashboard.
        </p>
    </div>

    <div class="footer">
        <p>Bandung, {{ date('d F Y') }}</p>
        <div class="signature">
            <p>Panitia PPDB</p>
        </div>
    </div>

    <script>window.print();</script>
</body>
</html>
