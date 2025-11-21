<!DOCTYPE html>
<html>
<head>
    <title>Kartu Peserta - {{ $pendaftar->no_pendaftaran }}</title>
    <style>
        @media print { @page { margin: 0; size: 85.6mm 53.98mm; } body { margin: 0; } }
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .card { width: 85.6mm; height: 53.98mm; border: 2px solid #000; position: relative; background: #fff; }
        .header { background: linear-gradient(135deg, #1e293b, #334155); color: white; padding: 8px 12px; text-align: center; }
        .header h3 { margin: 0; font-size: 14px; font-weight: bold; }
        .header p { margin: 2px 0 0 0; font-size: 9px; }
        .content { padding: 10px 12px; }
        .photo { width: 80px; height: 100px; border: 2px solid #ddd; float: left; margin-right: 10px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; font-size: 10px; color: #999; }
        .info { font-size: 10px; line-height: 1.6; }
        .info-row { margin-bottom: 3px; }
        .label { font-weight: bold; display: inline-block; width: 80px; }
        .footer { position: absolute; bottom: 5px; right: 12px; font-size: 8px; text-align: right; }
        .qr { width: 40px; height: 40px; border: 1px solid #ddd; background: #f9f9f9; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <h3>KARTU PESERTA PPDB</h3>
            <p>SMK BAKTI NUSANTARA 666</p>
        </div>
        <div class="content">
            <div class="photo">3x4</div>
            <div class="info">
                <div class="info-row"><span class="label">No. Pendaftaran</span>: {{ $pendaftar->no_pendaftaran }}</div>
                <div class="info-row"><span class="label">Nama</span>: {{ $user->name }}</div>
                <div class="info-row"><span class="label">Jurusan</span>: {{ $pendaftar->jurusan }}</div>
                <div class="info-row"><span class="label">Gelombang</span>: {{ $pendaftar->gelombang }}</div>
                <div class="info-row"><span class="label">Status</span>: {{ $pendaftar->status }}</div>
            </div>
        </div>
        <div class="footer">
            <div class="qr"></div>
            <div style="margin-top: 2px;">{{ date('d/m/Y') }}</div>
        </div>
    </div>
    <script>window.print();</script>
</body>
</html>
