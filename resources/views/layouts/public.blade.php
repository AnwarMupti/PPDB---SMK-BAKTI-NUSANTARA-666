<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PPDB Online') - SMK Bakti Nusantara 666</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo baknus1.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1e293b;
            --light: #f8fafc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--light);
            padding-top: 0;
            margin: 0;
        }

        #mainNavbar {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            transition: all 0.3s ease;
        }

        #mainNavbar.navbar-scrolled {
            background: #1e293b;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .navbar-brand {
            font-size: 18px;
        }

        .navbar-nav .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            padding: 8px 16px;
            transition: all 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: white !important;
        }

        .btn-outline-light {
            border-width: 2px;
            font-weight: 600;
            padding: 8px 20px;
        }

        .btn-light {
            font-weight: 600;
            padding: 8px 20px;
        }





        .footer {
            background: var(--dark);
            color: white;
            padding: 3rem 0;
        }

        .footer-link {
            transition: all 0.3s ease;
            opacity: 0.8;
        }

        .footer-link:hover {
            opacity: 1;
            color: #ffffff !important;
            transform: translateX(3px);
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- FIXED NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo baknus1.jpg') }}" alt="Logo" class="me-2" style="width: 40px; height: 40px; border-radius: 8px;">
                <span class="fw-bold">SMK Bakti Nusantara 666</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item"><a class="btn btn-outline-light me-2" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                        <li class="nav-item"><a class="btn btn-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    @else
                        <li class="nav-item"><a class="btn btn-outline-light me-2" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a></li>
                        <li class="nav-item"><a class="btn btn-light" href="{{ route('register') }}"><i class="bi bi-person-plus-fill me-2"></i>Daftar Sekarang</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <!-- SECTION 1: BRAND & DESKRIPSI -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/images/logo baknus1.jpg') }}" alt="Logo" class="me-2" style="width: 40px; height: 40px; border-radius: 8px;">
                        <h5 class="text-white mb-0">SMK Bakti Nusantara 666</h5>
                    </div>
                    <h6 class="text-white mb-2">PPDB - Sistem Penerimaan Peserta Didik Baru Online</h6>
                    <p class="text-light" style="opacity: 0.8;">Platform digital terintegrasi untuk proses penerimaan siswa baru yang efisien, transparan, dan terpercaya.</p>
                </div>

                <!-- SECTION 2: TAUTAN CEPAT -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-3">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}" class="text-light text-decoration-none footer-link"><i class="bi bi-chevron-right me-1"></i> Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('profil') }}" class="text-light text-decoration-none footer-link"><i class="bi bi-chevron-right me-1"></i> Profil</a></li>
                        <li class="mb-2"><a href="{{ route('informasi') }}" class="text-light text-decoration-none footer-link"><i class="bi bi-chevron-right me-1"></i> Informasi</a></li>
                        <li class="mb-2"><a href="{{ route('fitur') }}" class="text-light text-decoration-none footer-link"><i class="bi bi-chevron-right me-1"></i> Fitur</a></li>
                        <li class="mb-2"><a href="{{ route('tracking.index') }}" class="text-light text-decoration-none footer-link"><i class="bi bi-chevron-right me-1"></i> Tracking</a></li>
                    </ul>
                </div>

                <!-- SECTION 3: KONTAK KAMI -->
                <div class="col-lg-5 col-md-12">
                    <h5 class="text-white mb-3">Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2 d-flex align-items-start">
                            <i class="bi bi-geo-alt text-light me-2 mt-1"></i>
                            <span class="text-light" style="opacity: 0.8;">Jl. Raya Percobaan No.65, Cileunyi Kulon, Kec. Cileunyi, Kabupaten Bandung, Jawa Barat 40622</span>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-telephone text-light me-2"></i>
                            <a href="tel:+622112345678" class="text-light text-decoration-none footer-link">+62 21 1234 5678</a>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-envelope text-light me-2"></i>
                            <a href="mailto:ppdb@smkbaktinusantara.sch.id" class="text-light text-decoration-none footer-link">ppdb@smkbaktinusantara.sch.id</a>
                        </li>
                        <li class="mb-2 d-flex align-items-start">
                            <i class="bi bi-clock text-light me-2 mt-1"></i>
                            <span class="text-light" style="opacity: 0.8;">Senin - Jumat: 08:00 - 16:00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- SECTION 4: BOTTOM COPYRIGHT -->
            <div class="row mt-4 pt-4" style="border-top: 1px solid rgba(255,255,255,0.1);">
                <div class="col-md-6 text-center text-md-start">
                    <p class="text-light mb-0" style="opacity: 0.8;">&copy; 2025 SMK Bakti Nusantara 666. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="/privacy" class="text-light text-decoration-none footer-link me-3">Kebijakan Privasi</a>
                    <span class="text-light" style="opacity: 0.5;">•</span>
                    <a href="/terms" class="text-light text-decoration-none footer-link ms-3">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Logout Form -->
    @auth
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @endauth

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>