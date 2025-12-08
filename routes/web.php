<?php

use App\Http\Controllers\Web\FolderController;
use App\Http\Controllers\Web\ActivityController;
use App\Http\Controllers\Web\PublicActivityController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Public Routes (Terapkan Guest Fingerprint via global middleware 'web')
Route::get('/', function () {
    return view('layouts.app');
})->name('home');

// Auth Routes (Login is handled by AuthController manually for now, or via socialite)
Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/google', 'redirectToGoogle')->name('login.google');
    Route::get('/auth/google/callback', 'handleGoogleCallback');
    Route::post('/logout', 'logout')->name('logout');
});

// Protected Protected Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Folder CRUD
    Route::resource('folders', FolderController::class);

    // Activity Creation Flow (Nested)
    Route::get('/folders/{folder}/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/folders/{folder}/activities', [ActivityController::class, 'store'])->name('activities.store');
    
    // Activity Show/Dashboard
    Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');
});

// Public Activity Voting Routes
Route::get('/v/{slug}', [PublicActivityController::class, 'show'])->name('public.activity.show');
Route::post('/v/{slug}', [PublicActivityController::class, 'store'])->name('public.activity.store');