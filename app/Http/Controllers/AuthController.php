<?php

namespace App\Http\Controllers;

use App\Mail\VerifyOtpMail;
use App\Models\RegistrationOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // =========================
    // REGISTER
    // =========================

    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:100',

            'contact' => [
                'required',
                'email',
                'ends_with:gmail.com',
            ],

            'password' => 'required|min:6|confirmed',

            'terms' => 'accepted',
        ]);

        // Generate 6 digit OTP
        $otp = (string) random_int(100000, 999999);

        // Delete previous OTP for this email
        RegistrationOtp::where(
            'email',
            $request->contact
        )->delete();

        // Save registration data and hashed OTP
        RegistrationOtp::create([
            'full_name' => $request->full_name,
            'email' => $request->contact,
            'password' => Hash::make($request->password),
            'otp_hash' => Hash::make($otp),
            'expires_at' => now()->addMinutes(10),
            'attempts' => 0,
            'verified' => false,
        ]);

        // Send OTP to Gmail
        Mail::to($request->contact)->send(
            new VerifyOtpMail($otp)
        );

        // Store email in session
        session([
            'registration_email' => $request->contact
        ]);

        return redirect('/verify-otp')
            ->with('success', 'OTP has been sent to your Gmail.');
    }


    // =========================
    // VERIFY OTP
    // =========================

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        // Get email from session
        $email = session('registration_email');

        if (!$email) {
            return redirect('/register')
                ->with(
                    'error',
                    'Registration session expired. Please register again.'
                );
        }

        // Find registration record
        $registration = RegistrationOtp::where(
            'email',
            $email
        )->first();

        if (!$registration) {
            return redirect('/register')
                ->with(
                    'error',
                    'Registration data not found. Please register again.'
                );
        }

        // Check OTP expiry
        if (now()->greaterThan($registration->expires_at)) {

            $registration->delete();

            session()->forget('registration_email');

            return redirect('/register')
                ->with(
                    'error',
                    'OTP has expired. Please register again.'
                );
        }

        // Check OTP
        if (!Hash::check(
            $request->otp,
            $registration->otp_hash
        )) {

            $registration->increment('attempts');

            return back()
                ->with('error', 'Invalid OTP. Please try again.');
        }

        // Create user account
        User::create([
            'name' => $registration->full_name,
            'email' => $registration->email,
            'password' => $registration->password,
        ]);

        // Mark registration as verified
        $registration->update([
            'verified' => true,
        ]);

        // Delete temporary OTP record
        $registration->delete();

        // Clear registration session
        session()->forget('registration_email');

        // Go to login page
        return redirect('/login')
            ->with(
                'success',
                'Email verified successfully. You can now login.'
            );
    }


    // =========================
    // LOGIN
    // =========================

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only(
            'email',
            'password'
        );

        // Attempt login
        if (Auth::attempt($credentials)) {

            // Regenerate session for security
            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        // Login failed
        return back()
            ->withInput()
            ->with(
                'error',
                'Invalid email or password.'
            );
    }
    public function resendOtp(Request $request)
{
    $email = session('registration_email');

    if (!$email) {
        return redirect('/register')
            ->with('error', 'Registration session expired. Please register again.');
    }

    $registration = RegistrationOtp::where('email', $email)->first();

    if (!$registration) {
        return redirect('/register')
            ->with('error', 'Registration data not found. Please register again.');
    }

    $otp = (string) random_int(100000, 999999);

    $registration->update([
        'otp_hash' => Hash::make($otp),
        'expires_at' => now()->addMinutes(10),
        'attempts' => 0,
    ]);

    Mail::to($email)->send(
        new VerifyOtpMail($otp)
    );

    return back()->with(
        'success',
        'A new OTP has been sent to your Gmail.'
    );
}
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')
        ->with('success', 'You have logged out successfully.');
}
}