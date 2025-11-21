<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/verify-otp';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $otp = rand(100000, 999999);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pendaftar',
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
            'email_verified' => false,
        ]);

        try {
            $this->sendOtpEmail($user->email, $otp);
            $message = 'OTP telah dikirim ke email Anda. Silakan cek inbox atau folder spam.';
        } catch (\Exception $e) {
            \Log::error('Email OTP gagal: ' . $e->getMessage());
            $message = 'Kode OTP Anda: ' . $otp . ' (Simpan kode ini untuk verifikasi)';
        }

        session(['otp_user_id' => $user->id]);

        return redirect()->route('verify.otp')->with('success', $message);
    }

    private function sendOtpEmail($email, $otp)
    {
        Mail::to($email)->send(new OtpMail($otp));
    }
}
