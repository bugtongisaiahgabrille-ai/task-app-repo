<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// 1. Public Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 2. Protected Dashboard (Requires Login & Email Verification)
// If a guest tries to access this, Laravel automatically redirects them to /login
Route::get('/dashboard', [TaskController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 3. Authenticated Route Group
// Everything inside here is protected; users must be logged in.
Route::middleware('auth')->group(function () {
    
    // Task Management
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::patch('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

    // User Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. The "Magic" Line
// This includes all routes for: /register, /login, /forgot-password, and /logout
require __DIR__.'/auth.php';