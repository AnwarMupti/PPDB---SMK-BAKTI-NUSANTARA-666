<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
    
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar.']);
        }
        
        $otp = rand(100000, 999999);
        
        $user->update([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
            'otp_attempts' => 0,
        ]);
        
        try {
            Mail::to($user->email)->send(new OtpMail($otp));
            $message = 'Kode OTP telah dikirim ke email Anda.';
        } catch (\Exception $e) {
            \Log::error('Email OTP gagal: ' . $e->getMessage());
            $message = 'Kode OTP Anda: ' . $otp;
        }
        
        session(['reset_email' => $user->email]);
        
        return redirect()->route('password.verify.otp.form')->with('status', $message);
    }
    
    public function showVerifyOtpForm()
    {
        if (!session('reset_email')) {
            return redirect()->route('password.request');
        }
        
        return view('auth.passwords.verify-otp');
    }
    
    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);
        
        $user = User::where('email', session('reset_email'))->first();
        
        if (!$user) {
            return back()->withErrors(['otp' => 'Session expired.']);
        }
        
        if (!$user->otp_code || !$user->otp_expires_at) {
            return back()->withErrors(['otp' => 'OTP tidak valid.']);
        }
        
        if ($user->otp_attempts >= 3) {
            return back()->withErrors(['otp' => 'Terlalu banyak percobaan.']);
        }
        
        if (now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP telah kadaluarsa.']);
        }
        
        if ($user->otp_code != $request->otp) {
            $user->increment('otp_attempts');
            return back()->withErrors(['otp' => 'Kode OTP salah. Sisa: ' . (3 - $user->otp_attempts)]);
        }
        
        return redirect()->route('password.reset.form');
    }
    
    public function resendOtp()
    {
        $user = User::where('email', session('reset_email'))->first();
        
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
            $message = 'OTP baru telah dikirim.';
        } catch (\Exception $e) {
            $message = 'Kode OTP Anda: ' . $otp;
        }
        
        return back()->with('success', $message);
    }
    
    public function showResetForm()
    {
        if (!session('reset_email')) {
            return redirect()->route('password.request');
        }
        
        return view('auth.passwords.reset');
    }
    
    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        
        $email = session('reset_email');
        
        if (!$email) {
            return redirect()->route('password.request')->withErrors(['email' => 'Session expired.']);
        }
        
        $user = User::where('email', $email)->first();
        
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }
        
        $user->update([
            'password' => Hash::make($request->password),
            'otp_code' => null,
            'otp_expires_at' => null,
            'otp_attempts' => 0,
        ]);
        
        session()->forget('reset_email');
        
        return redirect()->route('login')->with('success', 'Password berhasil direset! Silakan login.');
    }
}
