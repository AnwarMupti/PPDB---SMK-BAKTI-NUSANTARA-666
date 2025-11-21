<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - PPDB SMK Bakti Nusantara 666</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .auth-container {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* KOLOM KIRI */
        .left-layer {
            width: 40%;
            height: 100vh;
            background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 50%, #6366f1 100%);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .left-layer::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 400px;
            height: 400px;
            background: rgba(14, 165, 233, 0.2);
            border-radius: 50%;
            filter: blur(80px);
        }

        .left-layer::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 300px;
            height: 300px;
            background: rgba(99, 102, 241, 0.2);
            border-radius: 50%;
            filter: blur(60px);
        }

        .brand {
            display: flex;
            align-items: center;
            margin-bottom: 35px;
            position: relative;
            z-index: 1;
        }

        .brand img {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            margin-right: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .brand-text h1 {
            font-size: 21px;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(135deg, #ffffff 0%, #dbeafe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-text p {
            font-size: 12px;
            color: #bfdbfe;
            margin: 0;
            font-weight: 500;
        }

        .left-content {
            position: relative;
            z-index: 1;
        }

        .left-content h2 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.3;
            background: linear-gradient(135deg, #ffffff 0%, #dbeafe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .left-content p {
            font-size: 14px;
            color: #cbd5e1;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .security-features {
            list-style: none;
            padding: 0;
        }

        .security-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 13px;
            padding: 10px 14px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .security-item i {
            font-size: 20px;
            color: #22d3ee;
            margin-right: 12px;
            filter: drop-shadow(0 0 8px rgba(34, 211, 238, 0.6));
        }

        /* KOLOM KANAN */
        .right-layer {
            width: 60%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
        }

        /* OTP CARD */
        .otp-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 25px 30px;
            width: 90%;
            max-width: 420px;
            margin: auto;
        }

        .card-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .otp-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #0ea5e9, #3b82f6);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 28px;
            color: white;
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4);
        }

        .card-header h2 {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 5px;
        }

        .card-header p {
            font-size: 12px;
            color: #64748b;
            margin: 0;
        }

        .email-badge {
            background: #f1f5f9;
            padding: 10px 16px;
            border-radius: 8px;
            margin: 16px 0;
            text-align: center;
            border: 2px solid #e2e8f0;
        }

        .email-badge i {
            color: #0ea5e9;
            margin-right: 6px;
            font-size: 14px;
        }

        .email-badge strong {
            color: #1e293b;
            font-size: 13px;
        }

        .otp-inputs {
            display: flex;
            gap: 7px;
            justify-content: center;
            margin: 20px 0;
        }

        .otp-input {
            width: 46px;
            height: 54px;
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-family: 'Poppins', sans-serif;
            color: #1e293b;
        }

        .otp-input:focus {
            outline: none;
            border-color: #0ea5e9;
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
            transform: scale(1.05);
        }

        .btn-verify {
            width: 100%;
            background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 16px;
        }

        .btn-verify:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(14, 165, 233, 0.4);
        }

        .btn-verify:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .resend-section {
            text-align: center;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #e5e7eb;
            font-size: 12px;
            color: #64748b;
        }

        .resend-section a {
            color: #0ea5e9;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }

        .resend-section a:hover {
            color: #0284c7;
            text-decoration: underline;
        }

        .timer {
            display: inline-block;
            background: #fef3c7;
            color: #92400e;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 8px;
        }

        .alert {
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-danger {
            background: #fef2f2;
            border: 2px solid #fecaca;
            color: #dc2626;
        }

        .alert-success {
            background: #f0fdf4;
            border: 2px solid #bbf7d0;
            color: #16a34a;
        }

        .alert i {
            font-size: 16px;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .left-layer {
                display: none;
            }
            
            .right-layer {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .otp-card {
                padding: 20px 18px;
            }

            .otp-inputs {
                gap: 5px;
            }

            .otp-input {
                width: 42px;
                height: 50px;
                font-size: 18px;
            }

            .card-header h2 {
                font-size: 18px;
            }

            .otp-icon {
                width: 55px;
                height: 55px;
                font-size: 26px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- KOLOM KIRI -->
        <div class="left-layer">
            <div class="brand">
                <img src="{{ asset('assets/images/logo baknus1.jpg') }}" alt="Logo">
                <div class="brand-text">
                    <h1>SMK Bakti Nusantara 666</h1>
                    <p>Sistem PPDB Online</p>
                </div>
            </div>
            
            <div class="left-content">
                <h2>Verifikasi Email Anda</h2>
                <p>Kami telah mengirimkan kode OTP 6 digit ke email Anda. Masukkan kode tersebut untuk melanjutkan proses pendaftaran.</p>
                
                <ul class="security-features">
                    <li class="security-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Kode OTP berlaku selama 10 menit</span>
                    </li>
                    <li class="security-item">
                        <i class="bi bi-lock-fill"></i>
                        <span>Verifikasi aman dan terenkripsi</span>
                    </li>
                    <li class="security-item">
                        <i class="bi bi-envelope-check"></i>
                        <span>Cek inbox atau folder spam email Anda</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- KOLOM KANAN -->
        <div class="right-layer">
            <div class="otp-card">
                <div class="card-header">
                    <div class="otp-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h2>Masukkan Kode OTP</h2>
                    <p>Kode verifikasi telah dikirim ke email Anda</p>
                </div>

                <div class="email-badge">
                    <i class="bi bi-envelope-fill"></i>
                    <strong>{{ $user->email }}</strong>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('verify.otp.submit') }}" id="otpForm">
                    @csrf
                    <div class="otp-inputs">
                        <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required autofocus>
                        <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                        <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                        <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                        <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                        <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                    </div>
                    <input type="hidden" name="otp" id="otpValue">
                    
                    <button type="submit" class="btn-verify" id="verifyBtn">
                        <i class="bi bi-check-circle me-2"></i>Verifikasi Sekarang
                    </button>
                </form>

                <div class="resend-section">
                    Tidak menerima kode? 
                    <a href="{{ route('verify.otp.resend') }}" id="resendLink">
                        <i class="bi bi-arrow-clockwise"></i> Kirim Ulang OTP
                    </a>
                    <span class="timer" id="timer" style="display: none;">
                        <i class="bi bi-clock"></i> <span id="countdown">60</span>s
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll('.otp-input');
        const form = document.getElementById('otpForm');
        const otpValue = document.getElementById('otpValue');
        const verifyBtn = document.getElementById('verifyBtn');

        // Auto-focus dan navigasi antar input
        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length === 1) {
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                }
                updateOtpValue();
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });

            // Support paste
            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pastedData = e.clipboardData.getData('text').replace(/\D/g, '').slice(0, 6);
                pastedData.split('').forEach((char, i) => {
                    if (inputs[i]) {
                        inputs[i].value = char;
                    }
                });
                if (pastedData.length === 6) {
                    inputs[5].focus();
                }
                updateOtpValue();
            });
        });

        function updateOtpValue() {
            const otp = Array.from(inputs).map(input => input.value).join('');
            otpValue.value = otp;
            
            // Enable/disable button
            if (otp.length === 6) {
                verifyBtn.disabled = false;
            } else {
                verifyBtn.disabled = true;
            }
        }

        // Timer countdown untuk resend
        let countdown = 60;
        const timerElement = document.getElementById('timer');
        const countdownElement = document.getElementById('countdown');
        const resendLink = document.getElementById('resendLink');

        function startTimer() {
            timerElement.style.display = 'inline-block';
            resendLink.style.pointerEvents = 'none';
            resendLink.style.opacity = '0.5';
            
            const interval = setInterval(() => {
                countdown--;
                countdownElement.textContent = countdown;
                
                if (countdown <= 0) {
                    clearInterval(interval);
                    timerElement.style.display = 'none';
                    resendLink.style.pointerEvents = 'auto';
                    resendLink.style.opacity = '1';
                    countdown = 60;
                }
            }, 1000);
        }

        // Start timer on page load
        startTimer();

        // Prevent form submit if OTP incomplete
        form.addEventListener('submit', (e) => {
            updateOtpValue();
            if (otpValue.value.length !== 6) {
                e.preventDefault();
                alert('Silakan masukkan 6 digit kode OTP');
            }
        });
    </script>
</body>
</html>
