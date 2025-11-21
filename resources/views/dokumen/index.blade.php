@extends('layouts.dashboard')

@section('title', 'Upload Dokumen')

@section('content')
<div class="page-header">
    <h1 class="page-title">Upload Berkas Pendaftaran</h1>
    <p class="page-subtitle">Upload semua dokumen yang diperlukan untuk verifikasi</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="chart-card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="alert alert-info">
                        <strong>📋 Dokumen yang harus diupload:</strong>
                        <ul class="mb-0 mt-2">
                            <li>Ijazah / Surat Keterangan Lulus (PDF/JPG, max 2MB)</li>
                            <li>Pas Foto 3x4 (JPG/PNG, max 2MB)</li>
                            <li>Kartu Keluarga (PDF/JPG, max 2MB)</li>
                            <li>Akta Kelahiran (PDF/JPG, max 2MB)</li>
                            <li>Raport Semester Terakhir (PDF/JPG, max 2MB)</li>
                        </ul>
                    </div>

                    <!-- Status Info -->
                    @if($pendaftar->status == 'SUBMIT')
                        <div class="alert alert-success mb-4">
                            <i class="bi bi-check-circle me-2"></i><strong>Dokumen sudah disubmit untuk verifikasi!</strong>
                            <p class="mb-0 mt-2">Anda masih bisa mengupload atau mengganti dokumen jika diperlukan.</p>
                        </div>
                    @endif

                    @if($documents->where('status', 'rejected')->count() > 0)
                        <div class="alert alert-warning mb-4">
                            <i class="bi bi-exclamation-triangle me-2"></i><strong>Ada dokumen yang ditolak!</strong> Silakan upload ulang dokumen yang ditolak.
                        </div>
                    @endif

                    <!-- Form Upload - SELALU TAMPIL -->
                    <div class="card mb-4 border-primary shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h6 class="m-0"><i class="bi bi-cloud-upload me-2"></i>Upload Dokumen</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dokumen.upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold" style="font-size: 13px;">Jenis Dokumen</label>
                                        <select name="jenis_dokumen" class="form-select" required>
                                            <option value="">Pilih Jenis Dokumen</option>
                                            <option value="ijazah">Ijazah / SKL</option>
                                            <option value="foto">Pas Foto 3x4</option>
                                            <option value="kk">Kartu Keluarga</option>
                                            <option value="akta_kelahiran">Akta Kelahiran</option>
                                            <option value="raport">Raport</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label fw-bold" style="font-size: 13px;">Pilih File</label>
                                        <input type="file" name="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                                        <small class="text-muted" style="font-size: 11px;">Format: PDF, JPG, PNG (Max 2MB)</small>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">&nbsp;</label>
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-cloud-upload me-1"></i>Upload
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Daftar Dokumen -->
            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="m-0">Dokumen yang Sudah Diupload</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Jenis Dokumen</th>
                                    <th>Nama File</th>
                                    <th>Ukuran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($documents as $doc)
                                    <tr>
                                        <td>
                                            @if($doc->jenis_dokumen == 'ijazah') Ijazah / SKL
                                            @elseif($doc->jenis_dokumen == 'foto') Pas Foto
                                            @elseif($doc->jenis_dokumen == 'kk') Kartu Keluarga
                                            @elseif($doc->jenis_dokumen == 'akta_kelahiran') Akta Kelahiran
                                            @elseif($doc->jenis_dokumen == 'raport') Raport
                                            @endif
                                        </td>
                                        <td>{{ $doc->nama_file }}</td>
                                        <td>{{ number_format($doc->ukuran_file / 1024, 2) }} KB</td>
                                        <td>
                                            @if($doc->status == 'pending')
                                                <span class="badge bg-warning">Menunggu Verifikasi</span>
                                            @elseif($doc->status == 'verified')
                                                <span class="badge bg-success">Terverifikasi</span>
                                            @elseif($doc->status == 'rejected')
                                                <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                            @if($doc->catatan)
                                                <br><small class="text-muted">{{ $doc->catatan }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ asset($doc->path_file) }}" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                                            @if($doc->status != 'verified' && $pendaftar->status != 'SUBMIT')
                                                <form action="{{ route('dokumen.delete', $doc->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus dokumen ini?')">Hapus</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada dokumen yang diupload</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if(count($missingDocs) > 0)
                        <div class="alert alert-warning mt-3">
                            <strong>⚠️ Dokumen yang belum diupload:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($missingDocs as $missing)
                                    <li>
                                        @if($missing == 'ijazah') Ijazah / SKL
                                        @elseif($missing == 'foto') Pas Foto
                                        @elseif($missing == 'kk') Kartu Keluarga
                                        @elseif($missing == 'akta_kelahiran') Akta Kelahiran
                                        @elseif($missing == 'raport') Raport
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="alert alert-success mt-3">
                            ✅ Semua dokumen sudah diupload!
                        </div>
                        
                        <div class="text-center mt-4">
                            <form action="{{ route('dokumen.submit') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 14px; padding: 10px 28px; border: none; border-radius: 8px; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(16, 185, 129, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(16, 185, 129, 0.3)'">
                                    <i class="bi bi-send-check me-2"></i>Submit Dokumen untuk Verifikasi
                                </button>
                                <p class="text-muted mt-2" style="font-size: 12px;"><i class="bi bi-info-circle me-1"></i>Setelah submit, Anda masih bisa mengupload ulang jika diperlukan</p>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleUploadForm() {
    const form = document.getElementById('uploadForm');
    if (form.style.display === 'none') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
}
</script>
@endpush
