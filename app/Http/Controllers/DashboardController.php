<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Document;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Route based on user role
        switch($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'verifikator_adm':
                return redirect()->route('verifikator.dashboard');
            case 'keuangan':
                return redirect()->route('keuangan.dashboard');
            case 'kepsek':
                return redirect()->route('kepsek.dashboard');
            default:
                // Pendaftar dashboard
                return $this->pendaftarDashboard($user);
        }
    }
    
    private function pendaftarDashboard($user)
    {
        $pendaftar = DB::table('pendaftar')
            ->join('jurusan', 'pendaftar.jurusan_id', '=', 'jurusan.id')
            ->where('pendaftar.user_id', $user->id)
            ->select('pendaftar.*', 'jurusan.nama as nama_jurusan')
            ->first();

        if (!$pendaftar) {
            return view('dashboard.index', ['pendaftar' => null]);
        }

        $documents = Document::where('pendaftar_id', $pendaftar->id)->get();
        
        $requiredDocs = ['ijazah', 'foto', 'kk', 'akta_kelahiran', 'raport'];
        $uploadedDocs = $documents->pluck('jenis_dokumen')->toArray();
        $completeness = (count($uploadedDocs) / count($requiredDocs)) * 100;

        $verifiedDocs = $documents->where('status', 'verified')->count();
        $pendingDocs = $documents->where('status', 'pending')->count();
        $rejectedDocs = $documents->where('status', 'rejected')->count();

        return view('dashboard.index', compact('pendaftar', 'documents', 'completeness', 'verifiedDocs', 'pendingDocs', 'rejectedDocs'));
    }
}
