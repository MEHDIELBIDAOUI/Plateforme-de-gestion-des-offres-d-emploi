<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Recruiter Routes
    Route::middleware('role:recruiter')->prefix('recruiter')->name('recruiter.')->group(function () {
        Route::resource('jobs', JobController::class);
    });

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
        Route::get('users', [App\Http\Controllers\AdminController::class, 'users'])->name('users.index');
        Route::delete('users/{user}', [App\Http\Controllers\AdminController::class, 'destroyUser'])->name('users.destroy');

        Route::get('jobs', [App\Http\Controllers\AdminController::class, 'jobs'])->name('jobs.index');
        Route::delete('jobs/{job}', [App\Http\Controllers\AdminController::class, 'destroyJob'])->name('jobs.destroy');

        Route::get('applications', [App\Http\Controllers\AdminController::class, 'applications'])->name('applications.index');
        Route::delete('applications/{application}', [App\Http\Controllers\AdminController::class, 'destroyApplication'])->name('applications.destroy');

        Route::patch('jobs/{job}/validate', [App\Http\Controllers\AdminController::class, 'validateJob'])->name('jobs.validate');
    });

    // Candidate Routes
    Route::middleware('role:candidate')->prefix('candidate')->name('candidate.')->group(function () {
        Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    });

    // Public/Shared Job Routes (but authenticated for applying?)
    // Making job listing public might be better, but let's keep it simple for now as per requirements
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('jobs.apply');
});

require __DIR__ . '/auth.php';



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


