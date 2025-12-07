<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class EnforceGuestFingerprint
{
    /**
     * Nama Cookie untuk Fingerprint
     */
    const COOKIE_NAME = 'vot_guest_fp';

    /**
     * Masa berlaku cookie (5 Tahun - Anggap "Abadi")
     */
    const COOKIE_LIFETIME = 2628000; 

    public function handle(Request $request, Closure $next): Response
    {
        // 1. Jika User sudah Login, kita tidak butuh fingerprint guest (opsional, tapi lebih bersih)
        // Namun, jika Anda ingin tracking hybrid, biarkan logic ini jalan terus.
        // Untuk efisiensi, jika login, kita skip logic hashing ini.
        if ($request->user()) {
            return $next($request);
        }

        // 2. Cek apakah cookie fingerprint sudah ada
        if (!$request->hasCookie(self::COOKIE_NAME)) {
            
            // 3. Generate Fingerprint Unik
            // Kombinasi IP + User Agent + Salt Aplikasi di-Hash
            $signature = $request->ip() . '|' . $request->userAgent();
            $fingerprint = hash_hmac('sha256', $signature, config('app.key'));

            // 4. Simpan ke Queue Cookie (Akan dikirim di Response Header)
            // queue(name, value, minutes)
            Cookie::queue(self::COOKIE_NAME, $fingerprint, self::COOKIE_LIFETIME);
            
            // Masukkan juga ke request attribute agar bisa diakses langsung di Controller saat ini
            $request->attributes->add(['guest_fingerprint' => $fingerprint]);
        }

        return $next($request);
    }
}