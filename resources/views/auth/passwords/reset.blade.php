<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - PPDB SMK Bakti Nusantara 666</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; height: 100vh; overflow: hidden; }
        .auth-container { display: flex; height: 100vh; overflow: hidden; }
        
        .left-layer {
            width: 40%; height: 100vh;
            background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 50%, #6366f1 100%);
            color: white; display: flex; flex-direction: column; justify-content: center;
            padding: 40px; position: relative; overflow: hidden;
        }
        .left-layer::before {
            content: ''; position: absolute; top: -50%; right: -20%;
            width: 400px; height: 400px; background: rgba(14, 165, 233, 0.2);
            border-radius: 50%; filter: blur(80px);
        }
        .left-layer::after {
            content: ''; position: absolute; bottom: -30%; left: -10%;
            width: 300px; height: 300px; background: rgba(99, 102, 241, 0.2);
            border-radius: 50%; filter: blur(60px);
        }
        .brand { display: flex; align-items: center; margin-bottom: 35px; position: relative; z-index: 1; }
        .brand img {
            width: 55px; height: 55px; border-radius: 12px; margin-right: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); border: 2px solid rgba(255, 255, 255, 0.1);
        }
        .brand-text h1 {
            font-size: 21px; font-weight: 700; margin: 0;
            background: linear-gradient(135deg, #ffffff 0%, #dbeafe 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }
        .brand-text p { font-size: 12px; color: #bfdbfe; margin: 0; font-weight: 500; }
        .left-content { position: relative; z-index: 1; }
        .left-content h2 {
            font-size: 30px; font-weight: 700; margin-bottom: 20px; line-height: 1.3;
            background: linear-gradient(135deg, #ffffff 0%, #dbeafe 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }
        .left-content p { font-size: 14px; color: #cbd5e1; line-height: 1.6; margin-bottom: 25px; }
        .security-features { list-style: none; padding: 0; }
        .security-item {
            display: flex; align-items: center; margin-bottom: 15px; font-size: 13px;
            padding: 10px 14px; background: rgba(255, 255, 255, 0.08); border-radius: 10px;
            backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.15);
        }
        .security-item i {
            font-size: 20px; color: #22d3ee; margin-right: 12px;
            filter: drop-shadow(0 0 8px rgba(34, 211, 238, 0.6));
        }
        
        .right-layer {
            width: 60%; height: 100vh; display: flex; align-items: center;
            justify-content: center; background: #f8f9fa;
        }
        .reset-card {
            background: white; border-radius: 16px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 25px 30px; width: 90%; max-width: 420px; margin: auto;
        }
        .card-header { text-align: center; margin-bottom: 20px; }
        .reset-icon {
            width: 60px; height: 60px; background: linear-gradient(135deg, #0ea5e9, #3b82f6);
            border-radius: 14px; display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px; font-size: 28px; color: white;
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.4);
        }
        .card-header h2 { font-size: 20px; font-weight: 700; color: #1a1a2e; margin-bottom: 5px; }
        .card-header p { font-size: 12px; color: #64748b; margin: 0; }
        
        .form-group { margin-bottom: 16px; }
        .form-label { font-size: 13px; font-weight: 600; color: #1e293b; margin-bottom: 6px; display: block; }
        .form-control {
            width: 100%; padding: 12px 14px; border: 2px solid #e5e7eb; border-radius: 8px;
            font-size: 13px; transition: all 0.2s; font-family: 'Poppins', sans-serif;
        }
        .form-control:focus {
            outline: none; border-color: #0ea5e9;
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
        }
        .is-invalid { border-color: #dc2626; }
        .invalid-feedback { color: #dc2626; font-size: 12px; margin-top: 4px; }
        
        .btn-submit {
            width: 100%; background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
            color: white; border: none; padding: 12px; border-radius: 8px;
            font-size: 13px; font-weight: 700; cursor: pointer; transition: all 0.2s ease;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(14, 165, 233, 0.4); }
        
        .alert {
            padding: 10px 14px; border-radius: 8px; margin-bottom: 16px;
            font-size: 12px; display: flex; align-items: center; gap: 8px;
        }
        .alert-danger { background: #fef2f2; border: 2px solid #fecaca; color: #dc2626; }
        .alert i { font-size: 16px; }
        
        @media (max-width: 992px) {
            .left-layer { display: none; }
            .right-layer { width: 100%; }
        }
        @media (max-width: 576px) {
            .reset-card { padding: 20px 18px; }
            .card-header h2 { font-size: 18px; }
            .reset-icon { width: 55px; height: 55px; font-size: 26px; }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="left-layer">
            <div class="brand">
                <img src="{{ asset('assets/images/logo baknus1.jpg') }}" alt="Logo">
                <div class="brand-text">
                    <h1>SMK Bakti Nusantara 666</h1>
                    <p>Sistem PPDB Online</p>
                </div>
            </div>
            
            <div class="left-content">
                <h2>Buat Password Baru</h2>
                <p>Masukkan password baru Anda. Pastikan password yang Anda buat kuat dan mudah diingat.</p>
                
                <ul class="security-features">
                    <li class="security-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Minimal 8 karakter</span>
                    </li>
                    <li class="security-item">
                        <i class="bi bi-lock-fill"></i>
                        <span>Kombinasi huruf dan angka</span>
                    </li>
                    <li class="security-item">
                        <i class="bi bi-key-fill"></i>
                        <span>Password aman dan terenkripsi</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="right-layer">
            <div class="reset-card">
                <div class="card-header">
                    <div class="reset-icon">
                        <i class="bi bi-lock-fill"></i>
                    </div>
                    <h2>Reset Password</h2>
                    <p>Masukkan password baru Anda</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.reset.update') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="bi bi-lock-fill me-1"></i>Password Baru
                        </label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password baru" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="bi bi-lock-fill me-1"></i>Konfirmasi Password
                        </label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password baru" required>
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-circle me-2"></i>Reset Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
