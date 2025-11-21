<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #1e293b, #334155); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f8f9fa; padding: 30px; border-radius: 0 0 8px 8px; }
        .otp-box { background: white; border: 3px dashed #3b82f6; padding: 20px; text-align: center; margin: 20px 0; border-radius: 8px; }
        .otp-code { font-size: 36px; font-weight: bold; letter-spacing: 8px; color: #1e293b; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>SMK BAKTI NUSANTARA 666</h2>
            <p>Sistem PPDB Online</p>
        </div>
        <div class="content">
            <p>Kepada Yth. Calon Siswa,</p>
            <p>Terima kasih telah mendaftar di PPDB Online SMK Bakti Nusantara 666.</p>
            <p><strong>Kode Verifikasi (OTP) Anda adalah:</strong></p>
            
            <div class="otp-box">
                <div class="otp-code">{{ $otp }}</div>
            </div>
            
            <p style="text-align: center; color: #ef4444; font-weight: bold;">Kode ini berlaku selama 10 menit</p>
            
            <p>Jika Anda tidak merasa mendaftar, abaikan email ini.</p>
            
            <div class="footer">
                <p><strong>Salam,</strong><br>Panitia PPDB SMK Bakti Nusantara 666</p>
                <hr style="border: none; border-top: 1px solid #ddd; margin: 15px 0;">
                <p>SMK Bakti Nusantara 666<br>Jl. Raya Cileunyi No. 666, Bandung<br>Telp: (022) 7654321</p>
            </div>
        </div>
    </div>
</body>
</html>
