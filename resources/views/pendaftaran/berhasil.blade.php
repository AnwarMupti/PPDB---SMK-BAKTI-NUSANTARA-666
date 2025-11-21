@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-smk">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">🎉 Pendaftaran Berhasil!</h4>
                </div>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <span style="font-size: 4rem;">✅</span>
                    </div>
                    
                    <h3 class="text-success">Data Anda Berhasil Disimpan!</h3>
                    <p class="lead">Terima kasih telah mendaftar di SMK Bakti Nusantara 666</p>
                    
                    <div class="alert alert-info">
                        <h5>Nomor Pendaftaran Anda:</h5>
                        <h2 class="text-primary">{{ $no_pendaftaran }}</h2>
                        <p class="mb-0"><small>Simpan nomor ini untuk keperluan selanjutnya</small></p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="card bg-light p-3">
                                <h6>📋 Tahap Selanjutnya</h6>
                                <p class="mb-0">Upload berkas persyaratan</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card bg-light p-3">
                                <h6>⏰ Status</h6>
                                <p class="mb-0 text-warning">Menunggu Verifikasi</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-smk btn-lg">
                            ← Kembali ke Beranda
                        </a>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-lg">
                            Lihat Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection