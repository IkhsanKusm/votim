<?php

use App\Http\Controllers\Web\FolderController;
use App\Http\Controllers\Web\ActivityController;
use App\Http\Controllers\Web\PublicActivityController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    // Folder CRUD
    Route::resource('folders', FolderController::class);

    // Activity Creation Flow (Nested)
    Route::get('/folders/{folder}/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/folders/{folder}/activities', [ActivityController::class, 'store'])->name('activities.store');
    
    // Activity Show/Dashboard
    Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');
});

// Public Routes
Route::get('/v/{slug}', [PublicActivityController::class, 'show'])->name('public.show');
Route::post('/v/{slug}', [PublicActivityController::class, 'submit'])->name('public.submit');