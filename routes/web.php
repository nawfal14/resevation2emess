<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;

// Public route to the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route accessible only by authenticated users
Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes that require user authentication
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Show routes
    Route::get('/shows', [ShowController::class, 'index'])->name('shows.index');
    Route::get('/shows/{id}', [ShowController::class, 'show'])->name('shows.show');

    // Artist routes
    Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
    Route::get('/artists/{id}', [ArtistController::class, 'show'])->name('artists.show');

    // Representation routes
    Route::get('/representations', [RepresentationController::class, 'index'])->name('representations.index');
    Route::get('/representations/{id}', [RepresentationController::class, 'show'])->name('representations.show');

    // Location routes
    Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/locations/{id}', [LocationController::class, 'show'])->name('locations.show');

    // Reservation routes
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('/reservations/create/{show_id}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
});

// // Admin routes with additional middleware for admin access
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
//     Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
//     Route::patch('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
//     Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

//     // Additional admin routes can be added here...
// });

require __DIR__ . '/auth.php';