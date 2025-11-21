<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    public function kartu()
    {
        $user = Auth::user();
        $pendaftar = DB::table('pendaftar')
            ->join('jurusan', 'pendaftar.jurusan_id', '=', 'jurusan.id')
            ->join('gelombang', 'pendaftar.gelombang_id', '=', 'gelombang.id')
            ->where('pendaftar.user_id', $user->id)
            ->select('pendaftar.*', 'jurusan.nama as jurusan', 'gelombang.nama as gelombang')
            ->first();
        
        if (!$pendaftar) {
            return redirect()->route('dashboard')->with('error', 'Data pendaftaran tidak ditemukan');
        }
        
        return view('cetak.kartu', compact('pendaftar', 'user'));
    }
    
    public function bukti()
    {
        $user = Auth::user();
        $pendaftar = DB::table('pendaftar')
            ->join('jurusan', 'pendaftar.jurusan_id', '=', 'jurusan.id')
            ->join('gelombang', 'pendaftar.gelombang_id', '=', 'gelombang.id')
            ->leftJoin('pembayaran', 'pendaftar.id', '=', 'pembayaran.pendaftar_id')
            ->where('pendaftar.user_id', $user->id)
            ->select('pendaftar.*', 'jurusan.nama as jurusan', 'gelombang.nama as gelombang', 'pembayaran.jumlah', 'pembayaran.status as status_bayar', 'pembayaran.tanggal_verifikasi')
            ->first();
        
        if (!$pendaftar) {
            return redirect()->route('dashboard')->with('error', 'Data pendaftaran tidak ditemukan');
        }
        
        return view('cetak.bukti', compact('pendaftar', 'user'));
    }
}
