<?php

use App\Http\Controllers\Web\FolderController;
use App\Http\Controllers\Web\ActivityController;
use App\Http\Controllers\Web\PublicActivityController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| 1. GUEST ROUTES (Welcome, Login, Auth)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Landing Page
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    // Login Page UI
    Route::view('/login', 'auth.login')->name('login');

    // Socialite Google Auth
    Route::controller(AuthController::class)->group(function () {
        Route::get('/auth/google', 'redirectToGoogle')->name('login.google');
        Route::get('/auth/google/callback', 'handleGoogleCallback');
    });

    // DEV BYPASS: Login as Admin without Google (Local Auth)
    if (app()->isLocal()) {
        Route::get('/dev/login', function () {
            // Create or Get Dummy Admin
            $user = User::firstOrCreate(
                ['email' => 'admin@vot.id'],
                [
                    'display_name' => 'Admin Developer',
                    'password' => '$2y$12$WJ.BUJXQtuTQrpbYRJfwPuC2IBuM92hAjzDtDx027SQ.xYIGm6Y/G', // dummy hash
                    'plan_type' => 'pro',
                    'google_id' => 'dev-bypass'
                ]
            );
            
            Auth::login($user);
            return redirect()->route('dashboard');
        })->name('dev.login');
    }
});

/*
|--------------------------------------------------------------------------
| 2. PROTECTED ROUTES (Dashboard, App Logic)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Folder Management (Voting, Opinion, Forum)
    Route::get('/{module}/folders', [FolderController::class, 'index'])
        ->where('module', 'voting|opinion|forum')
        ->name('folders.index');
        
    // Generic Folder Resource (Store, Show, etc)
    Route::resource('folders', FolderController::class)->except(['index']);

    // Activity Management
    Route::get('/folders/{folder}/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/folders/{folder}/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');
    
    // Settings UI
    Route::get('/settings', function () {
        return view('pages.settings.index'); 
    })->name('settings.index');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| 3. PUBLIC VOTING ROUTES (Accessible by anyone)
|--------------------------------------------------------------------------
*/
// Note: Guest Fingerprint is handled in Global Middleware or Controller
Route::get('/v/{slug}', [PublicActivityController::class, 'show'])->name('public.activity.show');
Route::post('/v/{slug}/submit', [PublicActivityController::class, 'submit'])->name('public.activity.submit');
Route::get('/v/{slug}/closed', [PublicActivityController::class, 'closed'])->name('public.activity.closed');
