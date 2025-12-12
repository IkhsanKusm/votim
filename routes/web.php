<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/platform', function () {
    return view('pages.platform.index');
})->name('platform');

Route::get('/contact', function () {
    return view('pages.contact.index');
})->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

Route::get('/test-maintenance', function () {
    abort(503);
});

    Route::get('/auth/google', [\App\Http\Controllers\Auth\AuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\AuthController::class, 'handleGoogleCallback']);

    // Development Bypass Route
    if (app()->isLocal()) {
        Route::get('/dev/login', function () {
            $user = \App\Models\User::firstOrCreate(
                ['email' => 'admin@vot.id'],
                [
                    'display_name' => 'Admin Developer',
                    'google_id' => 'dev_bypass',
                    'avatar_url' => 'https://ui-avatars.com/api/?name=Admin+Developer',
                ]
            );
            Auth::login($user);
            return redirect()->route('dashboard');
        });
    }
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/settings', function () {
        return view('pages.settings.index');
    })->name('settings.index');
    
    Route::post('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

    // Dynamic Module Routes
    Route::get('/{module}/folders', function ($module) {
        return view('dashboard'); // Placeholder, will point to folder index
    })->where('module', 'voting|opinion|forum')->name('folders.index');

    Route::resource('folders', \App\Http\Controllers\FolderController::class)->except(['index']);
    
    Route::get('/folders/{folder}/activities/create', [\App\Http\Controllers\ActivityController::class, 'create'])->name('activities.create');
    Route::get('/activities/{activity}', [\App\Http\Controllers\ActivityController::class, 'show'])->name('activities.show');
});

// Public Voting Routes (No Auth Required)
Route::group(['prefix' => 'v'], function () {
    Route::get('/{slug}', [\App\Http\Controllers\PublicActivityController::class, 'show'])->name('public.activity.show');
    Route::get('/{slug}/vote', [\App\Http\Controllers\PublicActivityController::class, 'vote'])->name('public.activity.vote');
    Route::post('/{slug}/submit', [\App\Http\Controllers\PublicActivityController::class, 'submit'])->name('public.activity.submit');
    Route::get('/{slug}/closed', [\App\Http\Controllers\PublicActivityController::class, 'closed'])->name('public.activity.closed');
});
