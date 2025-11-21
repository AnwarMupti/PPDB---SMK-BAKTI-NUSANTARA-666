<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\MasterDataController;

// Route utama
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route untuk halaman informasi
Route::get('/informasi', function() {
    return view('informasi');
})->name('informasi');

// Route untuk halaman fitur
Route::get('/fitur', function() {
    return view('fitur');
})->name('fitur');

// Route untuk halaman profil
Route::get('/profil', function() {
    return view('profil');
})->name('profil');

// Auth routes
Auth::routes(['verify' => true]);

// Custom Password Reset Routes with OTP
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/verify-otp', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showVerifyOtpForm'])->name('password.verify.otp.form');
Route::post('password/verify-otp', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'verifyOtp'])->name('password.verify.otp');
Route::get('password/resend-otp', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'resendOtp'])->name('password.resend.otp');
Route::get('password/reset/form', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('password/reset/update', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'reset'])->name('password.reset.update');

// OTP Verification Routes
Route::get('/verify-otp', [\App\Http\Controllers\OtpController::class, 'showVerifyForm'])->name('verify.otp');
Route::post('/verify-otp', [\App\Http\Controllers\OtpController::class, 'verify'])->name('verify.otp.submit');
Route::get('/verify-otp/resend', [\App\Http\Controllers\OtpController::class, 'resend'])->name('verify.otp.resend');

// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Route untuk detail jurusan
Route::get('/jurusan/{id}', function ($id) {
    $jurusanData = [
        1 => [
            'nama' => 'Rekayasa Perangkat Lunak (RPL)', 
            'deskripsi' => 'Belajar pemrograman, pengembangan software, aplikasi web dan mobile. Jurusan ini mempersiapkan siswa untuk menjadi programmer dan developer yang handal.',
            'icon' => '💻'
        ],
        2 => [
            'nama' => 'Desain Komunikasi Visual (DKV)', 
            'deskripsi' => 'Mempelajari desain grafis, ilustrasi, fotografi, dan multimedia. Cocok untuk siswa yang kreatif dan suka dengan seni visual.',
            'icon' => '🎨'
        ],
        3 => [
            'nama' => 'Akuntansi', 
            'deskripsi' => 'Belajar akuntansi, keuangan, perpajakan, dan administrasi bisnis. Membekali siswa dengan skill mengelola keuangan perusahaan.',
            'icon' => '📊'
        ],
        4 => [
            'nama' => 'Animasi', 
            'deskripsi' => 'Membuat animasi 2D/3D, visual effects, dan produksi film. Jurusan untuk calon animator dan filmmaker profesional.',
            'icon' => '🎬'
        ]
    ];

    if (!isset($jurusanData[$id])) {
        abort(404);
    }

    return view('jurusan.detail', ['jurusan' => $jurusanData[$id]]);
})->name('jurusan.detail');

// Route untuk pendaftaran (PAKAI CONTROLLER)
Route::get('/pendaftaran', [PendaftaranController::class, 'form'])->middleware('auth')->name('pendaftaran.form');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->middleware('auth')->name('pendaftaran.store');
Route::get('/pendaftaran/berhasil', [PendaftaranController::class, 'berhasil'])->middleware('auth')->name('pendaftaran.berhasil');

// Route untuk Dokumen
Route::middleware('auth')->group(function () {
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::post('/dokumen/upload', [DokumenController::class, 'upload'])->name('dokumen.upload');
    Route::delete('/dokumen/{id}', [DokumenController::class, 'delete'])->name('dokumen.delete');
    Route::post('/dokumen/submit', [DokumenController::class, 'submit'])->name('dokumen.submit');
});

// Route untuk Admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    // Laporan & Export
    Route::get('/laporan/statistik', [ExportController::class, 'laporanStatistik'])->name('admin.laporan.statistik');
    Route::get('/laporan/export', [ExportController::class, 'exportData'])->name('admin.laporan.export');
    Route::get('/laporan/export/proses', [ExportController::class, 'prosesExport'])->name('admin.laporan.export.proses');
    Route::get('/laporan/cetak', [ExportController::class, 'cetakLaporan'])->name('admin.laporan.cetak');
    Route::get('/laporan/cetak/proses', [ExportController::class, 'prosesCetak'])->name('admin.laporan.cetak.proses');
    
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/pendaftar', [AdminController::class, 'pendaftar'])->name('admin.pendaftar');
    Route::get('/pendaftar/{id}', [AdminController::class, 'pendaftarDetail'])->name('admin.pendaftar.detail');
    Route::get('/verifikasi/dashboard', [VerifikasiController::class, 'dashboard'])->name('admin.verifikasi.dashboard');
    Route::get('/verifikasi/administrasi', [VerifikasiController::class, 'administrasi'])->name('admin.verifikasi.administrasi');
    Route::post('/verifikasi/administrasi/{id}', [VerifikasiController::class, 'updateAdministrasi'])->name('admin.verifikasi.administrasi.update');
    Route::get('/verifikasi/dokumen', [AdminController::class, 'verifikasiDokumen'])->name('admin.verifikasi.dokumen.index');
    Route::post('/verifikasi/dokumen/{id}', [AdminController::class, 'verifikasiDokumenUpdate'])->name('admin.verifikasi.dokumen');
    
    // Master Data Routes
    Route::get('/master/jurusan', [App\Http\Controllers\MasterDataController::class, 'jurusan'])->name('admin.master.jurusan');
    Route::post('/master/jurusan', [App\Http\Controllers\MasterDataController::class, 'jurusanStore'])->name('admin.master.jurusan.store');
    Route::put('/master/jurusan/{id}', [App\Http\Controllers\MasterDataController::class, 'jurusanUpdate'])->name('admin.master.jurusan.update');
    Route::delete('/master/jurusan/{id}', [App\Http\Controllers\MasterDataController::class, 'jurusanDestroy'])->name('admin.master.jurusan.destroy');
    
    Route::get('/master/gelombang', [App\Http\Controllers\MasterDataController::class, 'gelombang'])->name('admin.master.gelombang');
    Route::post('/master/gelombang', [App\Http\Controllers\MasterDataController::class, 'gelombangStore'])->name('admin.master.gelombang.store');
    Route::put('/master/gelombang/{id}', [App\Http\Controllers\MasterDataController::class, 'gelombangUpdate'])->name('admin.master.gelombang.update');
    Route::delete('/master/gelombang/{id}', [App\Http\Controllers\MasterDataController::class, 'gelombangDestroy'])->name('admin.master.gelombang.destroy');
    
    Route::get('/master/biaya', [App\Http\Controllers\MasterDataController::class, 'biaya'])->name('admin.master.biaya');
    Route::post('/master/biaya', [App\Http\Controllers\MasterDataController::class, 'biayaStore'])->name('admin.master.biaya.store');
    Route::put('/master/biaya/{id}', [App\Http\Controllers\MasterDataController::class, 'biayaUpdate'])->name('admin.master.biaya.update');
    Route::delete('/master/biaya/{id}', [App\Http\Controllers\MasterDataController::class, 'biayaDestroy'])->name('admin.master.biaya.destroy');
});

// Route untuk Verifikator
Route::prefix('verifikator')->middleware(['auth', 'isVerifikator'])->group(function () {
    Route::get('/dashboard', [VerifikatorController::class, 'dashboard'])->name('verifikator.dashboard');
    Route::get('/daftar', [VerifikatorController::class, 'daftarPendaftar'])->name('verifikator.daftar');
    Route::get('/log', [VerifikatorController::class, 'logVerifikasi'])->name('verifikator.log');
    Route::get('/verifikasi/dokumen', [AdminController::class, 'verifikasiDokumen'])->name('verifikator.verifikasi.dokumen.index');
});

// Route untuk Pembayaran (Calon Siswa)
Route::middleware('auth')->group(function () {
    Route::get('/pembayaran', [\App\Http\Controllers\PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/upload', [\App\Http\Controllers\PembayaranController::class, 'upload'])->name('pembayaran.upload');
    Route::post('/pembayaran/hapus', [\App\Http\Controllers\PembayaranController::class, 'hapus'])->name('pembayaran.hapus');
    Route::get('/cetak-kartu', [\App\Http\Controllers\CetakController::class, 'kartu'])->name('cetak.kartu');
    Route::get('/cetak-bukti', [\App\Http\Controllers\CetakController::class, 'bukti'])->name('cetak.bukti');
});

// Route untuk Keuangan
Route::prefix('keuangan')->middleware(['auth', 'isKeuangan'])->group(function () {
    Route::get('/dashboard', [KeuanganController::class, 'dashboard'])->name('keuangan.dashboard');
    Route::get('/verifikasi', [KeuanganController::class, 'verifikasi'])->name('keuangan.verifikasi');
    Route::post('/verifikasi/{id}', [KeuanganController::class, 'updateVerifikasi'])->name('keuangan.verifikasi.update');
    Route::get('/rekap', [KeuanganController::class, 'rekap'])->name('keuangan.rekap');
    Route::get('/laporan', [KeuanganController::class, 'laporan'])->name('keuangan.laporan');
    Route::get('/laporan/harian', [KeuanganController::class, 'laporanHarian'])->name('keuangan.laporan.harian');
    Route::get('/laporan/periode', [KeuanganController::class, 'laporanPeriode'])->name('keuangan.laporan.periode');
    Route::get('/laporan/jurusan', [KeuanganController::class, 'laporanJurusan'])->name('keuangan.laporan.jurusan');
    Route::get('/laporan/gelombang', [KeuanganController::class, 'laporanGelombang'])->name('keuangan.laporan.gelombang');
});

// Route untuk Kepala Sekolah
Route::prefix('kepsek')->middleware(['auth', 'isKepsek'])->group(function () {
    Route::get('/dashboard', [KepsekController::class, 'dashboard'])->name('kepsek.dashboard');
    Route::get('/grafik', [KepsekController::class, 'grafik'])->name('kepsek.grafik');
    Route::get('/analisis-sekolah', [KepsekController::class, 'analisisSekolah'])->name('kepsek.analisis');
});

// Route untuk Peta Sebaran (Admin & Kepsek)
Route::middleware(['auth'])->group(function () {
    Route::get('/peta-sebaran', [PetaController::class, 'index'])->name('peta.index');
});

// Route untuk Tracking (Public)
Route::get('/tracking', function() {
    return view('tracking.index', ['pendaftar' => false]);
})->name('tracking.index');
Route::post('/tracking', function(\Illuminate\Http\Request $request) {
    return redirect()->route('tracking.detail', $request->no_pendaftaran);
})->name('tracking.check');
Route::get('/tracking/{no_pendaftaran}', [VerifikasiController::class, 'tracking'])->name('tracking.detail');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
