<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShowController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route accessible only by authenticated users
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// authenticated users 
Route::middleware(['auth', 'verified'])->group(function () {
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

// Admin routes 
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::patch('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    Route::get('/shows/{id}/edit', [ShowController::class, 'edit'])->name('admin.shows.edit');
    Route::delete('/shows/{id}', [ShowController::class, 'destroy'])->name('admin.shows.destroy');
    Route::get('/shows/create', [ShowController::class, 'create'])->name('admin.shows.create');

    Route::get('/artists/{id}/edit', [ArtistController::class, 'edit'])->name('admin.artists.edit');
    Route::delete('/artists/{id}', [ArtistController::class, 'destroy'])->name('admin.artists.destroy');
    Route::delete('/artists/create', [ArtistController::class, 'create'])->name('admin.artists.create');

    Route::get('/export/users/csv', [ExportController::class, 'exportUsersToCSV'])->name('admin.export.users.csv');
    Route::get('/export/users/pdf', [ExportController::class, 'exportUsersToPDF'])->name('admin.export.users.pdf');

    Route::get('/export/shows/csv', [ExportController::class, 'exportShowsToCSV'])->name('admin.export.shows.csv');
    Route::get('/export/shows/pdf', [ExportController::class, 'exportShowsToPDF'])->name('admin.export.shows.pdf');

    Route::get('/export/artists/csv', [ExportController::class, 'exportArtistsToCSV'])->name('admin.export.artists.csv');
    Route::get('/export/artists/pdf', [ExportController::class, 'exportArtistsToPDF'])->name('admin.export.artists.pdf');
});


require __DIR__ . '/auth.php';