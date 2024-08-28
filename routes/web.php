<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/shows', [ShowController::class, 'index'])->name('shows.index');
    Route::get('/shows/{id}', [ShowController::class, 'show'])->name('shows.show');

    Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
    Route::get('/artists/{id}', [ArtistController::class, 'show'])->name('artists.show');

    Route::get('/representations', [RepresentationController::class, 'index'])->name('representations.index');
    Route::get('/representations/{id}', [RepresentationController::class, 'show'])->name('representations.show');

    Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/locations/{id}', [LocationController::class, 'show'])->name('locations.show');

    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('/reservations/create/{show_id}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
});

require __DIR__ . '/auth.php';


// <?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\ShowController;
// use App\Http\Controllers\ArtistController;
// use App\Http\Controllers\RepresentationController;
// use App\Http\Controllers\LocationController;
// use App\Http\Controllers\ReservationController;

// // Public routes
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);

// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register'])->name('register');

// // Routes that require authentication
// Route::middleware(['auth'])->group(function () {
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//     Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

//     Route::get('/shows', [ShowController::class, 'index'])->name('shows.index');
//     Route::get('/shows/{id}', [ShowController::class, 'show'])->name('shows.show');

//     Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
//     Route::get('/artists/{id}', [ArtistController::class, 'show'])->name('artists.show');

//     Route::get('/representations', [RepresentationController::class, 'index'])->name('representations.index');
//     Route::get('/representations/{id}', [RepresentationController::class, 'show'])->name('representations.show');

//     Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
//     Route::get('/locations/{id}', [LocationController::class, 'show'])->name('locations.show');

//     Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
//     Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
//     Route::get('/reservations/create/{show_id}', [ReservationController::class, 'create'])->name('reservations.create');
//     Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
// });

// // Admin routes with additional middleware for admin access
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
// });