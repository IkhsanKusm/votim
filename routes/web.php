// routes/web.php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Public Routes (Terapkan Guest Fingerprint via global middleware 'web')
Route::get('/', function () {
    // Contoh cara akses fingerprint di view/logic jika user belum login
    // $fp = Cookie::get('vot_guest_fp');
    return view('welcome');
})->name('home');

// Auth Routes (Google)
Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/google', 'redirectToGoogle')->name('login.google');
    Route::get('/auth/google/callback', 'handleGoogleCallback');
    Route::post('/logout', 'logout')->name('logout');
});

// Protected Routes (Dashboard)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return "Welcome to Insight Studio, " . auth()->user()->display_name;
    })->name('dashboard');
});