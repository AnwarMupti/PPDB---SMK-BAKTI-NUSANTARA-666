@extends('layouts.dashboard')

@section('title', 'Form Pendaftaran')

@section('content')
<div class="container-fluid py-4">
    <div class="page-header mb-4">
        <h4 class="page-title"><i class="bi bi-file-earmark-text me-2"></i>Formulir Pendaftaran PPDB</h4>
        <p class="page-subtitle">Lengkapi semua data dengan benar dan teliti</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form method="POST" action="{{ route('pendaftaran.store') }}">
                @csrf

                <!-- BAGIAN 1: DATA DIRI LENGKAP -->
                <div class="card shadow-sm mb-3" style="border-left: 4px solid #3b82f6;">
                    <div class="card-header bg-white border-bottom py-2">
                        <h6 class="mb-0 fw-bold"><i class="bi bi-person-circle me-2" style="color: #3b82f6;"></i>BAGIAN 1: DATA DIRI LENGKAP</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                       name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                                @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Agama <span class="text-danger">*</span></label>
                                <select class="form-select @error('agama') is-invalid @enderror" name="agama" required>
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                </select>
                                @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">NISN <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror" 
                                       name="nisn" value="{{ old('nisn') }}" required>
                                @error('nisn')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">NIK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                                       name="nik" value="{{ old('nik') }}" required>
                                @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                       name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                @error('tempat_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                       name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">No. HP <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('no_hp') is-invalid @enderror" 
                                       name="no_hp" value="{{ old('no_hp', Auth::user()->phone) }}" required>
                                @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email', Auth::user()->email) }}" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jurusan Pilihan <span class="text-danger">*</span></label>
                                <select class="form-select @error('jurusan_id') is-invalid @enderror" name="jurusan_id" required>
                                    <option value="">Pilih Jurusan</option>
                                    @foreach($jurusan as $j)
                                    <option value="{{ $j->id }}" {{ old('jurusan_id') == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                          name="alamat" rows="2" required>{{ old('alamat') }}</textarea>
                                @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Provinsi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" 
                                       name="provinsi" value="{{ old('provinsi') }}" required>
                                @error('provinsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kabupaten/Kota <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" 
                                       name="kabupaten" value="{{ old('kabupaten') }}" required>
                                @error('kabupaten')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kecamatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" 
                                       name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}" required>
                                @error('kecamatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kelurahan/Desa</label>
                                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" 
                                       name="kelurahan" value="{{ old('kelurahan') }}">
                                @error('kelurahan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kode Pos</label>
                                <input type="text" class="form-control @error('kodepos') is-invalid @enderror" 
                                       name="kodepos" value="{{ old('kodepos') }}" maxlength="5">
                                @error('kodepos')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 2: DATA ORANG TUA -->
                <div class="card shadow-sm mb-3" style="border-left: 4px solid #10b981;">
                    <div class="card-header bg-white border-bottom py-2">
                        <h6 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2" style="color: #10b981;"></i>BAGIAN 2: DATA ORANG TUA</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Ayah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" 
                                       name="nama_ayah" value="{{ old('nama_ayah') }}" required>
                                @error('nama_ayah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pekerjaan Ayah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" 
                                       name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required>
                                @error('pekerjaan_ayah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Ibu <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" 
                                       name="nama_ibu" value="{{ old('nama_ibu') }}" required>
                                @error('nama_ibu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pekerjaan Ibu <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" 
                                       name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required>
                                @error('pekerjaan_ibu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">No. HP Orang Tua <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('no_hp_ortu') is-invalid @enderror" 
                                       name="no_hp_ortu" value="{{ old('no_hp_ortu') }}" required>
                                @error('no_hp_ortu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Alamat Orang Tua</label>
                                <input type="text" class="form-control @error('alamat_ortu') is-invalid @enderror" 
                                       name="alamat_ortu" value="{{ old('alamat_ortu') }}" placeholder="Kosongkan jika sama dengan alamat siswa">
                                @error('alamat_ortu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 3: DATA SEKOLAH ASAL -->
                <div class="card shadow-sm mb-3" style="border-left: 4px solid #f59e0b;">
                    <div class="card-header bg-white border-bottom py-2">
                        <h6 class="mb-0 fw-bold"><i class="bi bi-building me-2" style="color: #f59e0b;"></i>BAGIAN 3: DATA SEKOLAH ASAL</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Sekolah Asal <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" 
                                       name="asal_sekolah" value="{{ old('asal_sekolah') }}" required>
                                @error('asal_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Alamat Sekolah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('alamat_sekolah') is-invalid @enderror" 
                                       name="alamat_sekolah" value="{{ old('alamat_sekolah') }}" required>
                                @error('alamat_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tahun Lulus <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror" 
                                       name="tahun_lulus" value="{{ old('tahun_lulus', date('Y')) }}" min="2000" max="{{ date('Y') }}" required>
                                @error('tahun_lulus')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nilai Rata-rata <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" class="form-control @error('nilai_rata_rata') is-invalid @enderror" 
                                       name="nilai_rata_rata" value="{{ old('nilai_rata_rata') }}" min="0" max="100" required>
                                @error('nilai_rata_rata')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUTTONS -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Simpan & Lanjutkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


