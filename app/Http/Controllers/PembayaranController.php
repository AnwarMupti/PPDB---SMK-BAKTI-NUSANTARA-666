<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $pendaftar = DB::table('pendaftar')
            ->join('jurusan', 'pendaftar.jurusan_id', '=', 'jurusan.id')
            ->join('gelombang', 'pendaftar.gelombang_id', '=', 'gelombang.id')
            ->join('biaya_pendaftaran', 'pendaftar.gelombang_id', '=', 'biaya_pendaftaran.gelombang_id')
            ->where('pendaftar.user_id', Auth::id())
            ->select(
                'pendaftar.*',
                'jurusan.nama as nama_jurusan',
                'gelombang.nama as nama_gelombang',
                'biaya_pendaftaran.biaya as biaya'
            )
            ->first();

        if (!$pendaftar) {
            return redirect()->route('dashboard')->with('error', 'Anda belum melakukan pendaftaran. Silakan lengkapi formulir pendaftaran terlebih dahulu.');
        }

        // Cek status verifikasi administrasi
        if ($pendaftar->status !== 'ADM_PASS') {
            $statusMessage = [
                'SUBMIT' => 'Mohon tunggu, pendaftaran Anda sedang dalam proses verifikasi administrasi.',
                'REJECTED' => 'Pendaftaran Anda ditolak. Silakan hubungi admin untuk informasi lebih lanjut.',
            ];
            
            $message = $statusMessage[$pendaftar->status] ?? 'Status pendaftaran Anda belum memenuhi syarat untuk melakukan pembayaran.';
            
            return redirect()->route('dashboard')->with('warning', $message);
        }

        $pembayaran = DB::table('pembayaran')
            ->where('pendaftar_id', $pendaftar->id)
            ->first();

        if (!$pembayaran) {
            DB::table('pembayaran')->insert([
                'pendaftar_id' => $pendaftar->id,
                'jumlah' => $pendaftar->biaya,
                'status' => 'BELUM_BAYAR',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $pembayaran = DB::table('pembayaran')->where('pendaftar_id', $pendaftar->id)->first();
        }

        return view('pembayaran.index', compact('pendaftar', 'pembayaran'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'bukti_bayar' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $pendaftar = DB::table('pendaftar')->where('user_id', Auth::id())->first();
        
        if (!$pendaftar || $pendaftar->status !== 'ADM_PASS') {
            return back()->with('error', 'Anda belum bisa melakukan pembayaran. Tunggu verifikasi administrasi terlebih dahulu.');
        }
        
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $filename = 'bukti_bayar_' . $pendaftar->no_pendaftaran . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/bukti_bayar'), $filename);

            DB::table('pembayaran')
                ->where('pendaftar_id', $pendaftar->id)
                ->update([
                    'bukti_bayar' => 'uploads/bukti_bayar/' . $filename,
                    'status' => 'MENUNGGU_VERIFIKASI',
                    'tanggal_upload' => now(),
                    'updated_at' => now()
                ]);
        }

        return back()->with('success', 'Bukti pembayaran berhasil diupload');
    }

    public function hapus()
    {
        $pendaftar = DB::table('pendaftar')->where('user_id', Auth::id())->first();
        
        DB::table('pembayaran')
            ->where('pendaftar_id', $pendaftar->id)
            ->update([
                'bukti_bayar' => null,
                'status' => 'BELUM_BAYAR',
                'tanggal_upload' => null,
                'catatan' => null,
                'updated_at' => now()
            ]);

        return back()->with('success', 'Bukti pembayaran berhasil dihapus');
    }
}
