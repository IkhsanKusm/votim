<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController
{
    /**
     * Redirect user ke halaman login Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google.
     */
    public function handleGoogleCallback()
    {
        try {
            // Ambil user dari Google (Stateless untuk menghindari session state mismatch di beberapa env)
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Logic: Find Existing OR Create New
            $user = User::updateOrCreate(
                [
                    'email' => $googleUser->getEmail()
                ],
                [
                    'display_name' => $googleUser->getName() ?? 'User Vot.ai', // Fallback name
                    'google_id'    => $googleUser->getId(),
                    'password'     => bcrypt(Str::random(24)), // Random password (dummy) karena login via Google
                    'plan_type'    => 'free', // Default Plan
                    // 'avatar'    => $googleUser->getAvatar(), // Opsional jika ada kolom avatar
                ]
            );

            // Login user
            Auth::login($user, true); // true = Remember Me

            // Regenerate session untuk keamanan (Fixation protection)
            request()->session()->regenerate();

            return redirect()->intended(route('dashboard'));

        } catch (\Exception $e) {
            // Error handling jika user membatalkan atau Google error
            return redirect()->route('login')->with('error', 'Login Google Gagal: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}