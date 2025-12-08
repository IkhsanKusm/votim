<?php

use App\Http\Controllers\Web\FolderController;
use App\Http\Controllers\Web\ActivityController;
use App\Http\Controllers\Web\PublicActivityController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Public Routes (Terapkan Guest Fingerprint via global middleware 'web')
Route::get('/dashboard', function () {
    // Contoh cara akses fingerprint di view/logic jika user belum login
    // $fp = Cookie::get('vot_guest_fp');
    return view('dashboard');
    })->name('dashboard');


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