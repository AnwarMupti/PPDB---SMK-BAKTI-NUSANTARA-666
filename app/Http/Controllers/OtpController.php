<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

class OtpController extends Controller
{
    public function showVerifyForm()
    {
        if (!session('otp_user_id')) {
            return redirect()->route('register');
        }
        
        $user = User::find(session('otp_user_id'));
        return view('auth.verify-otp', compact('user'));
    }
    
    public function verify(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);
        
        $user = User::find(session('otp_user_id'));
        
        if (!$user) {
            return back()->withErrors(['otp' => 'Session expired. Silakan daftar ulang.']);
        }
        
        if (!$user->otp_code || !$user->otp_expires_at) {
            return back()->withErrors(['otp' => 'OTP tidak valid. Silakan minta OTP baru.']);
        }
        
        if ($user->otp_attempts >= 3) {
            return back()->withErrors(['otp' => 'Terlalu banyak percobaan. Silakan minta OTP baru.']);
        }
        
        if (now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP telah kadaluarsa.']);
        }
        
        if ($user->otp_code != $request->otp) {
            $user->increment('otp_attempts');
            return back()->withErrors(['otp' => 'Kode OTP salah. Sisa percobaan: ' . (3 - $user->otp_attempts)]);
        }
        
        $user->update([
            'email_verified' => true,
            'otp_code' => null,
            'otp_expires_at' => null,
            'otp_attempts' => 0,
        ]);
        
        session()->forget('otp_user_id');
        
        return redirect()->route('login')->with('success', 'Email berhasil diverifikasi! Silakan login.');
    }
    
    public function resend()
    {
        $user = User::find(session('otp_user_id'));
        
        if (!$user) {
            return back()->withErrors(['otp' => 'Session expired.']);
        }
        
        $otp = rand(100000, 999999);
        
        $user->update([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
            'otp_attempts' => 0,
        ]);
        
        try {
            Mail::to($user->email)->send(new OtpMail($otp));
            $message = 'OTP baru telah dikirim ke email Anda. Silakan cek inbox atau folder spam.';
        } catch (\Exception $e) {
            \Log::error('Email OTP gagal: ' . $e->getMessage());
            $message = 'Kode OTP Anda: ' . $otp . ' (Simpan kode ini untuk verifikasi)';
        }
        
        return back()->with('success', $message);
    }
}
